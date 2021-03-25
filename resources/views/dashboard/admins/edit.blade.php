@extends('dashboard.index')

@section('title') {{ $title }} @endsection


@push('js')
<script>

</script>
@endpush

@section('content')


<div class="box">
    <div class="box-header">
        <h3 class="box-title">{{$title}}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        {!! Form::open(['route' => [ 'admins.update', $admin->id ] , 'method' => 'put',  'files'=> true]) !!}

        <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">

            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-6">
                {!! Form::label('name' , trans('dashboard.name')) !!}
                {!! Form::text('name' ,$admin->name,['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-6">
                {!! Form::label('phone' , trans('dashboard.phone')) !!}
                {!! Form::text('phone' , $admin->phone,['class' => 'form-control']) !!}
            </div>

        </div>


        <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">

            <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-4">
                {!! Form::label('level' , trans('dashboard.level')) !!}
                {!! Form::select('level' ,[
                'manager'      => trans('dashboard.manager'),
                'receptionist' => trans('dashboard.receptionist'),
                'client'       => trans('dashboard.client'),
                ], $admin->level , 
                ['class' => 'form-control user_level' , 'placeholder'=>'...']) !!}
            </div>

            <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-4">
                {!! Form::label('email' , trans('dashboard.email')) !!}
                {!! Form::email('email' , $admin->email , ['class' => 'form-control']) !!}
            </div>

        </div>

        <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">


            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-6">
                {!! Form::label('password' , trans('dashboard.password')) !!}
                {!! Form::password('password',['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-6">
                {!! Form::label('confirm_password' , trans('dashboard.confirm_password')) !!}
                {!! Form::password('confirm_password',['class' => 'form-control']) !!}
            </div>


        </div>

        {!! Form::submit(trans('dashboard.add_admin') , ['class' => 'btn btn-primary']) !!}


        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->

</div>
<!-- /.box -->


@endsection
