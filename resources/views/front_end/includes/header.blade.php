<div class="row">
    <div class="col-md-6 col-xs-3 ">
        <div class="logo">
            <a href="<?php echo URL::route('homePage'); ?>">
                <img src="{{URL::to('public/assets/frontend/img/logo.png')}}" class="img-circle" alt="Logo">
            </a>
        </div>
    </div><!-- End of the logo -->

    @if (Auth::check())

        <div class="col-md-6 col-xs-9">
            <div class="row header_sign_in">
                <div class="col-md-8 col-xs-6 ">
                    <div class="pull-right hvr-float-shadow my_account sign_in">
                        <a href="<?php echo URL::route('logout'); ?>"><i class="fa fa-sign-out"></i> Log Out</a>
                    </div>
                </div>

                <?php
                $dashboardName;
                switch (Auth::user()->role) {
                    case "admin":
                        $dashboardName = 'adminDashboard';
                        break;
                    case "doctor":
                        $dashboardName = 'doctorDashboard';
                        break;
                    case "patient":
                        $dashboardName = 'patientDashboard';
                        break;
                    default:
                        $dashboardName = 'adminDashboard';
                }
                ?>

                <div class="col-md-4 col-xs-6 ">
                    <div class="pull-left hvr-float-shadow join ">
                        <a href="<?php echo URL::route($dashboardName)?>">My Account</a>
                    </div>
                </div>
            </div>
        </div>



    @else

        <div class="col-md-6 col-xs-9">
            <div class="row header_sign_in">
                <div class="col-md-8 col-xs-6 ">
                    <div class="pull-right hvr-float-shadow sign_in ">
                        <a href="<?php echo URL::route('signIn'); ?>"><i class="fa fa-sign-in"></i> Sign In</a>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6 ">
                    <div class="pull-left hvr-float-shadow join ">
                        <a href="<?php echo URL::route('joinPage'); ?>"><i class="fa fa-user-plus"></i> Join</a>
                    </div>
                </div>
            </div>
        </div>

    @endif


</div>
