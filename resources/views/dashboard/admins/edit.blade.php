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

            <div class="form-group col-md-4 col-lg-4 col-sm-12 col-xs-12">
                {!! Form::label('name' , trans('dashboard.name')) !!}
                {!! Form::text('name' ,$admin->name,['class' => 'form-control', 'placeholder' => trans('dashboard.name')]) !!}
            </div>

            <div class="form-group col-md-4 col-lg-4 col-sm-12 col-xs-12">
                {!! Form::label('phone' , trans('dashboard.phone')) !!}
                {!! Form::text('phone' ,$admin->phone,['class' => 'form-control', 'placeholder' => trans('dashboard.phone')]) !!}
            </div>


            <div class="form-group col-md-4 col-lg-4 col-sm-12 col-xs-12">
                {!! Form::label('email' , trans('dashboard.email')) !!}
                {!! Form::email('email' ,$admin->email,['class' => 'form-control', 'placeholder' => trans('dashboard.email')]) !!}
            </div>


        </div>


        <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">


            <div class="form-group col-md-6 col-lg-6 col-sm-12 col-xs-12">
                {!! Form::label('password' , trans('dashboard.password')) !!}
                {!! Form::password('password',['class' => 'form-control', 'placeholder' => trans('dashboard.password')]) !!}
            </div>

            <div class="form-group col-md-6 col-lg-6 col-sm-12 col-xs-12">
                {!! Form::label('confirm_password' , trans('dashboard.confirm_password')) !!}
                {!! Form::password('confirm_password',['class' => 'form-control', 'placeholder' => trans('dashboard.confirm_password') ]) !!}
            </div>


        </div>

        {!! Form::submit(trans('dashboard.save_changes') , ['class' => 'btn btn-primary']) !!}


        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->

</div>
<!-- /.box -->


@endsection
