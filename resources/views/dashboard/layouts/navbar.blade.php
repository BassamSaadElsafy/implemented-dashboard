<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('/') }}/dashboard/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ admin()->user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>


        <li><a href="{{ route('dashboard.home') }}"><i class="fa fa-dashboard text-red header"></i> <span>{{ trans('dashboard.dashboard') }}</span></a></li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>{{ trans('dashboard.admins') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admins.index') }}"><i class="fa fa-users text-green"></i>{{ trans('dashboard.all_admins') }}</a></li>
          </ul>
        </li>
        
      
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>