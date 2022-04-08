<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    
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
        
{{--  route('settings.edit')   --}}
        <li><a href=""><i class="fa fa-gears text-gray"></i>{{ trans('dashboard.settings') }}</a></li>

      
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>