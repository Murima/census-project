<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="assets/img/admin-img.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Murima</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active treeview">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-users"></i>
                    <span>Registration Module</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{isActiveURL('admin/create-census')}}"><a href="{{ route('create-census') }}">
                            <i class="fa fa-calendar-o"></i> Register census Event</a>
                    </li>
                    <li class=" {{ isActiveURL('/admin/register-official') }}"><a href="{{ route('register-official') }}">
                            <i class="fa fa-user-plus"></i> Register Census Official</a>
                    </li>
                    <li class=" {{ isActiveURL('/admin/register-enumerator') }}"><a href="{{ route('register-enumerator') }}">
                            <i class="fa fa-user-plus"></i> Register Enumerator</a>
                    </li>

                </ul>
            </li>

            <li class="active treeview">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-user"></i>
                    <span>User Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{isActiveURL('admin/create-census')}}"><a href="{{ route('view-users') }}">
                            <i class="fa fa-eye"></i> View Users</a>
                    </li>

                </ul>
            </li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>


