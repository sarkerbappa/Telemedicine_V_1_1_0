<!-- Logo -->
        <a href="<?php echo URL::route('adminDashboard');?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>T</b>M</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Tele-Medicine</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="<?php echo URL::route('adminDashboard');?>" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- Notifications: style can be found in dropdown.less -->

              <?php
              $inactive_users ;
              if(isset($inactive_users))
                    $user_number = count($inactive_users);?>

              <li class="dropdown notifications-menu" id="user-notification">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <?php if ($user_number != 0):?>
                      <span class="label label-warning"><?php echo $user_number;?></span>
                  <?php endif;?>
                </a>
                <ul class="dropdown-menu" id="user-notification-down">
                  <li class="header"><?php echo $user_number;?>  new members joined.</li>

                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <?php foreach($inactive_users as $single_user){?>
                      <li style="padding:8px; ">
                        <a href="<?php echo $single_user->role === 'patient' ? URL::route('allInActivePatients') : URL::route('getAllInactiveDoctor') ?>">
                        <div class="row">
                          <div class="col-xs-6">

                              <i class="fa fa-user text-aqua"></i> <?php echo $single_user->f_name.' '. $single_user->l_name ?>

                          </div>
                          <div class="col-xs-6">
                            <img src="<?php echo  $single_user->image ===''? URL::to('public/uploads/profile/empty.png') : URL::to('public/uploads/profile/'. $single_user->image)?>" class="img-circle notification-image" alt="Profile Image"/>
                          </div>
                        </div>
                        </a>
                      </li>
                        <?php    }?>
                    </ul>
                  </li>
                  <li class="footer"><a href="<?php echo URL::route('allPatients');?>">View all</a></li>
                </ul>
              </li>
             <!-- End of the new member addition notification -->


              <li class="dropdown notifications-menu" id="user-notification">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-medkit"></i>
                  <?php if (count($all_general_appointment_notification) != 0):?>
                  <span class="label label-danger"><?php echo count($all_general_appointment_notification);?></span>
                  <?php endif;?>
                </a>
                <ul class="dropdown-menu" id="user-notification-down">
                  <li class="header"><?php echo count($all_general_appointment_notification);?>  new appointments.</li>

                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <?php foreach($all_general_appointment_notification as $single_appointment){

                      ?>
                      <li style="padding:8px; ">
                        <a href="<?php echo  URL::route('getAllInactiveGeneralAppointment') ?>">
                          <div class="row">
                            <div class="col-xs-6">
                              <i class="fa fa-user text-aqua"></i>
                              <?php echo $single_appointment->f_name.' '.$single_appointment->l_name;?>
                            </div>
                            <div class="col-xs-6">
                              <img src="<?php echo  $single_appointment->image ===''? URL::to('public/uploads/profile/empty.png') : URL::to('public/uploads/profile/'. $single_appointment->image)?>" class="img-circle notification-image" alt="Profile Image"/>
                            </div>

                          </div>
                        </a>
                      </li>

                      <?php    }?>
                    </ul>
                  </li>
                  <li class="footer"><a href="<?php echo URL::route('getAllInactiveGeneralAppointment');?>">View all</a></li>
                </ul>
              </li>




              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown user user-menu open">
                <a href="<?php echo URL::route('homePage');?>">
                  <i class="fa fa-location-arrow" style="color:red"></i>
                  <span class="hidden-xs">Visit Site</span>
                </a>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu" id="user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{URL::to('public/uploads/profile/'. Auth::user()->image)}}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{Auth::user()->f_name.' '.Auth::user()->l_name}}</span>
                </a>
                <ul class="dropdown-menu" id="user-header-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{URL::to('public/uploads/profile/'. Auth::user()->image)}}" class="img-circle" alt="User Image">
                    <p>
                      <?php echo Auth::user()->f_name.' '.Auth::user()->l_name.'-'.ucwords(Auth::user()->role)?>
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo URL::route('adminProfile');?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo URL::route('logout');?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>