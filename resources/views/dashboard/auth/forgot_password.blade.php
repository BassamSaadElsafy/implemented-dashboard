@include('dashboard.auth.layouts.header')

<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Reset Account</p>

    @include('dashboard.partials._success')
    @include('dashboard.partials._error')

    <form action="{{ route('forgotpassword') }}" method="post"> 

      @csrf

      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
     
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  

    <a href="#">I forgot my password</a><br>
    I have not account <a href="{{ route('register') }}" class="text-center">Sign up</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@include('dashboard.auth.layouts.footer')

