<ul class="nav nav-list left-dashboard-menu nav-stacked nav-pills ">
    <li class="user-profile-header-name">
        <h2> <?php echo Auth::user()->f_name . '  ' . Auth::user()->l_name?> </h2>
        <p><b>Signed In As : </b> <?php echo Auth::user()->role ?></p>
    </li>
    <li class="nav-header"><h3>Main Menu</h3></li>
    <hr>


    <!-------------------------------------------------------Patients Area --------------------------------------------------->

    @if (Auth::user()->role === "patient")
    <!-- To keep  the menu "Make appointment" activeted mood in Make appointment page  it need to add the id to the url.
    //But in evry page the id is not available. so it need to check.-->


    <?php
    if (isset($doctor_info)) {
        $doct_id = $doctor_info->id;
    } else {
        $doct_id = 0;
    }
    ?>

    <li <?php echo(Request::is('searchDoctorForAppointment') ? 'class=active' : '' || Request::is('makeAppointment/' . $doct_id) ? 'class=active' : '' || Request::is('appoinmentCreatSuccess') ? 'class=active' : '')?>>
        <a href="<?php echo URL::route('searchDoctorForAppointment')?>"><i class="fa fa-plus-square-o"></i> Make Appointment</a>
    </li>

    <li <?php echo(Request::is('allSetAppointmentResponstList') ? 'class=active' : '')?>>
        <a href="<?php echo URL::route('allSetAppointmentResponstList')?>">
            <i class="fa fa-user-md"></i> <span>Doctor's Respons</span>
             @if (isset($all_appointment_notification) && $all_appointment_notification != 0)
            <small class="label pull-right bg-red"><?php echo isset($all_appointment_notification) ? $all_appointment_notification : '' ?></small>
             @endif
        </a>
    </li>

    @endif
    <!--Endif  for Patient role checking-->


            <!-------------------------------------------------- Doctor's Area ------------------------------------------------------------------------------------>


    @if (Auth::user()->role === "doctor")

    <li <?php echo(Request::is('getAppointmentNotification') ? 'class=active' : '')?>>
        <a href="<?php echo URL::route('getAppointmentNotification')?>">
            <i class="fa fa-users"></i> <span>Appointment</span>
            <?php if ( isset($appointment_number) && $appointment_number != 0):?>
            <small class="label pull-right bg-red"><?php echo isset($appointment_number)? $appointment_number :'' ?></small>
            <?php endif;?>
        </a>
    </li>

    @endif



          <!-------------------------------------------------- General Area ------------------------------------------------------------------------------------></br>

    <li class="nav-header"><h3>Account</h3></li>
    <hr>
    <li <?php echo(Request::is('patientDashboard') ? 'class=active' : '' || Request::is('doctorDashboard') ? 'class=active' : '')?>>
        <a href="<?php echo Auth::user()->role === 'patient' ? URL::route('patientDashboard') : URL::route('doctorDashboard') ?>"><i
                    class="fa fa-user"></i> Profile</a></li>
    {{--<li><a href="#"><i class="fa fa-cogs"></i> Settings</a></li>--}}
    <li class="divider"></li>
    <li <?php echo(Request::is('changePassword') ? 'class=active' : '' || Request::is('changePassword') ? 'class=active' : '')?>>
        <a href="<?php echo Auth::user()->role === 'patient' ? URL::route('changePassword') : URL::route('changePassword') ?>"><i
                    class="fa fa-pencil-square-o"></i> Change Password</a>
    </li>

</ul>

