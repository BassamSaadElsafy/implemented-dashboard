<?php

namespace App\DataTables;

use App\Models\Admin;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AdminDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('checkbox', 'dashboard.admins.btn.checkbox')
            ->addColumn('edit', 'dashboard.admins.btn.edit')
            ->addColumn('delete', 'dashboard.admins.btn.delete')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox',
            ])
            ->editColumn('created_at', function ($request) {
                return optional(optional($request)->created_at)->toDayDateTimeString();
            })
            ->editColumn('updated_at', function ($request) {
                return optional(optional($request)->updated_at)->toDayDateTimeString();
            });

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Admin $model)
    {
        // return $model->newQuery();
        return Admin::query();
    }

    // datatables languages
    public static function lang()
    {
        $langJson = [
            'sProcessing' => trans('dashboard.sProcessing'),
            'sLengthMenu' => trans('dashboard.sLengthMenu'),
            'sZeroRecords' => trans('dashboard.sZeroRecords'),
            'sEmptyTable' => trans('dashboard.sEmptyTable'),
            'sInfo' => trans('dashboard.sInfo'),
            'sInfoEmpty' => trans('dashboard.sInfoEmpty'),
            'sInfoFiltered' => trans('dashboard.sInfoFiltered'),
            'sInfoPostFix' => trans('dashboard.sInfoPostFix'),
            'sSearch' => trans('dashboard.sSearch'),
            'sUrl' => trans('dashboard.sUrl'),
            'sInfoThousands' => trans('dashboard.sInfoThousands'),
            'sLoadingRecords' => trans('dashboard.sLoadingRecords'),
            'oPaginate' => [
                'sFirst' => trans('dashboard.sFirst'),
                'sLast' => trans('dashboard.sLast'),
                'sNext' => trans('dashboard.sNext'),
                'sPrevious' => trans('dashboard.sPrevious'),
            ],

            'oAria' => [
                'sSortAscending' => trans('dashboard.sProcessing'),
                'sSortDescending' => trans('dashboard.sProcessing'),
            ],

        ];
        return $langJson;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('admindatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->lengthMenu([[15, 25, 50, -1], [10, 25, 50, trans('dashboard.all_record')]])
            ->orderBy(1)
            ->buttons(
                Button::make('create')->className('btn btn-primary btn-sm')->text('<i class="fa fa-plus"></i>' . trans('dashboard.create_admin')),
                Button::make('print')->className('btn btn-info btn-sm')->text('<i class="fa fa-print"></i>' . trans('dashboard.print')),
                Button::make('csv')->className('btn btn-success btn-sm')->text('<i class="fa fa-file"></i> ' . trans('dashboard.export_csv')),
                Button::make('excel')->className('btn btn-warning btn-sm')->text('<i class="fa fa-file"></i> ' . trans('dashboard.export_excel')),
                Button::make('reload')->className('btn btn-default btn-sm')->text('<i class="fa fa-refresh"></i> '),
                Button::make()->className('btn btn-danger btn-sm delBtn')->text('<i class="fa fa-trash"></i>'),
            )
            ->initComplete("function () {
                        this.api().columns([1,2]).every(function () {
                            var column = this;
                            var input = document.createElement(\"input\");
                            $(input).appendTo($(column.footer()).empty())
                            .on('keyup', function () {
                                column.search($(this).val(), false, false, true).draw();
                            });
                        });
                    }")
            ->language(self::lang());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')
                ->name('id')
                ->data('id')
                ->title('#')
                ->width('10'),

            Column::make('name')
                ->name('name')
                ->data('name')
                ->title(trans('dashboard.name')),

            Column::make('email')
                ->name('email')
                ->data('email')
                ->title(trans('dashboard.email')),

            Column::make('phone')
                ->name('phone')
                ->data('phone')
                ->title(trans('dashboard.phone')),

            Column::make('level')
                ->name('level')
                ->data('level')
                ->title(trans('dashboard.level')),

            Column::make('created_at'),
            Column::make('updated_at'),

            Column::computed('edit')
                ->name('edit')
                ->data('edit')
                ->title(trans('dashboard.edit'))
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->searchable(false)
                ->width(10)
                ->addClass('text-center'),

            Column::computed('delete')
                ->name('delete')
                ->data('delete')
                ->title(trans('dashboard.delete'))
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->searchable(false)
                ->width(10)
                ->addClass('text-center'),

            Column::computed('checkbox')
                ->name('checkbox')
                ->data('checkbox')
                ->title('<input type="checkbox" class="check_all" onclick="check_all()"/>')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->searchable(false)
                ->width(60)
                ->addClass('text-center'),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin_' . date('YmdHis');
    }
}
