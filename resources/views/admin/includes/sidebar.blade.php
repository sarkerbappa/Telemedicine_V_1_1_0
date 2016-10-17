<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{URL::to('public/uploads/profile/'. Auth::user()->image)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php echo Auth::user()->name?></p>
            <a href="<?php echo URL::route('adminDashboard');?>"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="<?php echo URL::route('adminDashboard');?>" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
            <a href="<?php echo URL::route('adminDashboard');?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-user"></i>
                <span>User Managment</span><i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="#"><i class="fa fa-circle-o"></i> Doctor <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo URL::route('allDoctors'); ?>"><i class="fa fa-user-md"></i>All Doctors</a></li>
                        <li><a href="<?php echo URL::route('getAllTrasDoctor'); ?>"><i class="fa fa-circle-o"></i> Trash List</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-circle-o"></i> Patient <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo URL::route('allPatients'); ?>"><i class="fa fa-user-md"></i>All Patients</a></li>
                        <li><a href="<?php echo URL::route('allTrasPatients'); ?>"><i class="fa fa-circle-o"></i> Trash List</a></li>
                    </ul>
                </li>

            </ul>
        </li>
    </ul>
</section>
</section>
<!-- /.sidebar -->
