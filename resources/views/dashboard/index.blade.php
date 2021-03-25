@include('dashboard.layouts.header')
  
  <!-- Left side column. contains the logo and sidebar -->
  @include('dashboard.layouts.navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title' , 'Dashboard')
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>

    </section>

    

    <!-- Main content -->
    <section class="content">
        <!-- error messages -->
        @include('dashboard.partials._error')
        
        <!-- success messages -->
        @include('dashboard.partials._success')

        @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- footer-content -->
  @include('dashboard.layouts.footer')
  