@extends('admin.index')
@section('content')

@push('js')
<script>
    $(document).ready(function(){

        //select states that belongs to selected city
        @if($admin->city_id)
            $.ajax({
                url: '{{aurl('users/create')}}',
                type:'get',
                datatype:'html',
                data:{city_id:'{{$admin->city_id}}',select:'{{$admin->city_id}}'},
                success:function(data){
                    $('.state').html(data);
                }
            });
        @endif //end of selected related states

        var city = $('.city_id option:selected').val();
        if(city > 0){
            $('.div_state').removeClass('hidden');
            $.ajax({
                url: '{{aurl('users/create')}}',
                type:'get',
                datatype:'html',
                data:{city_id:city,select:'{{ $admin->state_id }}' },
                success:function(data){
                    $('.state').html(data);
                }
            });
        }else{
        $('.div_state').addClass('hidden');
        $('.state').html('');
        }

        //change city
        $('.city_id').change(function(){
            var city = $('.city_id option:selected').val();
            //check if isset cities
            if(city > 0){

                $('.div_state').removeClass('hidden');
                $.ajax({
                    url: '{{aurl('users/create')}}',
                    type:'get',
                    datatype:'html',
                    data:{city_id:city,select:''},
                    success:function(data){
                        $('.state').html(data);
                    }
                });
        }else{
            $('.div_state').addClass('hidden');
            $('.state').html('');
        }//end of check

        });//end of change city


        //show selecting photo

        $('.image').change(function(){

        if(this.files && this.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('.image-preview').attr('src' , e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
        });//end of image function

    });
</script>
@endpush

<div class="box">
    <div class="box-header">
        <h3 class="box-title">{{$title}}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        {!! Form::open(['route' => ['admin.update' , $admin->id] , 'method' => 'put', 'files'=> true]) !!}

        <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-6">

                {!! Form::label('created_at' , trans('admin.created_at')) !!} {{ $admin->created_at }}

            </div>
            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-6">

                {!! Form::label('updated_at' , trans('admin.updated_at')) !!} {{ $admin->updated_at }}

            </div>
        </div>

        <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">

            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-6">
                {!! Form::label('name' , trans('admin.name')) !!}
                {!! Form::text('name' ,$admin->name,['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-6">
                {!! Form::label('phone' , trans('admin.phone')) !!}
                {!! Form::text('phone' ,$admin->phone,['class' => 'form-control']) !!}
            </div>

        </div>

        <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">


            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-6">
                {!! Form::label('city_id' , trans('admin.city_id')) !!}
                {!! Form::select('city_id', \App\Model\City::pluck('city_name_'.lang(),'id'),
                $admin->city_id,['class' => 'form-control city_id' , 'placeholder' => '...']) !!}
            </div>

            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-6  div_state hidden">
                {!! Form::label('state_id' , trans('admin.state_id')) !!}
                <span class="state"></span>
            </div>

        </div>


        <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">

            <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-4">
                {!! Form::label('photo' , trans('admin.photo')) !!}
                {!! Form::file('photo' ,['class' => 'form-control image']) !!}

            </div>

            <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-4">
                {!! Form::label('email' , trans('admin.email')) !!}
                {!! Form::email('email' ,$admin->email,['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-4">
                {!! Form::label('level' , trans('admin.level')) !!}
                {!! Form::select('level' ,['manager' => trans('admin.manager') ,
                'accountant' => trans('admin.accountant'),
                'customer_service' => trans('admin.customer_service'),
                'delivery' => trans('admin.delivery'),
                'technical_support' => trans('admin.technical_support'),
                'sales_man' => trans('admin.sales_man'),

                ],$admin->level,
                ['class' => 'form-control' , 'placeholder'=>'...']) !!}
            </div>


        </div>


        <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">



            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-6">
                {!! Form::label('password' , trans('admin.password')) !!}
                {!! Form::password('password',['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-6">
                {!! Form::label('confirm_password' , trans('admin.confirm_password')) !!}
                {!! Form::password('confirm_password',['class' => 'form-control']) !!}
            </div>


        </div>

        {!! Form::submit(trans('admin.edit') , ['class' => 'btn btn-success']) !!}


        {!! Form::close() !!}

        <a href="{{ aurl('tab/users') }}" class="btn btn-warning" style="float: left" ><i class="fa fa-arrow-left "></i></a>


    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection
