<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                    @if(Auth::check())
                        {{Auth::user()->fullname}}
                    @endif

                </p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- Optionally, you can add icons to the links -->
            <li class="header">MAIN NAVIGATION</li>
            <li class=""><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-users"></i> <span>Quản lý tài khoản</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('approved')}}"><i class="fa fa-check"></i>Tài khoản đã cấp phép</a></li>
                    <li><a href="{{url('notapproved')}}"><i class="fa fa-close"></i>Tài khoản chưa cấp phép</a></li>
                </ul>
            </li>
            <li><a href="{{url('userdata')}}"><i class="fa fa-history"></i> <span>Dữ liệu người dùng</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-heartbeat"></i> <span>Quản lý dữ liệu nhịp tim</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('hrindex')}}"><i class="fa fa-book"></i>Dữ liệu chỉ số</a></li>
                    <li><a href="{{url('hrnutrition')}}"><i class="fa fa-fa fa-handshake-o"></i>Dữ liệu chế độ dinh
                            dưỡng</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Quản lý dữ liệu huyết áp</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('bpindex')}}"><i class="fa fa-book"></i>Dữ liệu chỉ số</a></li>
                    <li><a href="{{url('bpnutrition')}}"><i class="fa fa-fa fa-handshake-o"></i>Dữ liệu chế độ dinh
                            dưỡng</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>