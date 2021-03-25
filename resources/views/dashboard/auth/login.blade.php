@include('dashboard.auth.layouts.header')

<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    @include('dashboard.partials._error')


    <form action="{{ route('dashboard.login') }}" method="post"> 

      @csrf

      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="rememberme" value="1"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  

    <a href="{{ route('dashboard.forgot_password') }}">I forgot my password</a><br>
    {{-- I have not account <a href="{{ route('register') }}" class="text-center">Sign up</a> --}}

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@include('dashboard.auth.layouts.footer')

