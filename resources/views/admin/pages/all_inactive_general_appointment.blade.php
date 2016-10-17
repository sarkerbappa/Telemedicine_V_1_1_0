@extends('admin.templates.default')
@section('content')
    <section class="content-header">
        <h1>
            All General Appointments

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Notification</a></li>
            <li class="active">All Inactive General Appointment</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <?php if(Session::get('activetion_success')) { ?>
                            <div class="col-xs-6 col-xs-offset-3">
                                <div class="alert alert-success fade in">
                                    <a href="" class="close" data-dismiss="alert">&times;</a>
                                    <strong>Success!</strong> <?php echo Session::get('activetion_success'); ?>
                                </div>
                            </div>
                            <?php }elseif (Session::get('deactivetion_success')){?>
                            <div class="col-xs-6 col-xs-offset-3">
                                <div class="alert alert-success fade in ">
                                    <a href="" class="close" data-dismiss="alert">&times;</a>
                                    <strong>Success!</strong> <?php echo Session::get('deactivetion_success'); ?>
                                </div>
                            </div>
                            <?php }?>
                        </div>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Problem</th>
                                <th>Mobile</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            if(isset($all_inactive_general_appointment))
                            foreach($all_inactive_general_appointment as  $single_appointment){?>
                            <tr>
                                <td>
                                    <?php
                                    if($single_appointment->image === ''){?>
                                    <img src="<?php echo URL::to('public/uploads/profile/empty.png');?>" height="70"
                                         width="100" alt="User Image">
                                    <?php }else{?>
                                    <img src="<?php echo URL::to('public/uploads/profile/' . $single_appointment->image);?>"
                                         height="70" width="100" alt="User Image">
                                    <?php }?>
                                </td>
                                <td><?php echo $single_appointment->f_name . ' ' . $single_appointment->l_name ?></td>
                                <td><?php echo $single_appointment->problem?></td>
                                <td><?php echo $single_appointment->mobile?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary ">Action</button>
                                        <button type="button" class="btn btn-primary  dropdown-toggle"
                                                data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href ="" data-toggle="modal" class="inactiveAppointDetails" data-target="#inactiveAppointmentDetailModal" class=" user_details" id="<?php echo $single_appointment->appoint_id ?>"><i class="fa fa-eye"></i> View</a></li>

                                            <li>
                                                <a href="<?php echo URL::action('Admin\AdminUser@searchDoctorForAssignGeneralAppointment', [$single_appointment->appoint_id])?>">
                                                    <i class="fa fa-hand-pointer-o"></i> Assign Doctor</a>
                                            </li>

                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php }?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Problem</th>
                                <th>Mobile</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->


        <!-- Modal -->
        <div id="inactiveAppointmentDetailModal" class="modal fade" role="dialog">
        </div>

    </section><!-- /.content -->



@stop




