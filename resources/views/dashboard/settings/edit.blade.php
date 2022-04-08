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

        {!! Form::open(['route' => [ 'settings.update', $setting->id ] , 'method' => 'put',  'files'=> true]) !!}


        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->

</div>
<!-- /.box -->


@endsection
