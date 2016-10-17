@extends('front_end.templates.dashboard')
@section('content')
    <div class="inner_body_content_wrapper">
        <div class="row" >
            <div class="col-xs-7">
                <h2>
                    <i class="fa fa-shopping-basket"></i>
                    Pending Appointments
                </h2>
            </div>
            <div class="col-xs-5">

            </div>
        </div>

        <div class="row" >
            <?php if(Session::get('success_massege')) { ?>
            <div class="col-xs-6 col-xs-offset-3">
                <div class="alert alert-success fade in wow fadeInUp animated">
                    <a href="" class="close" data-dismiss="alert">&times;</a>
                    <strong>Success!</strong> <?php echo Session::get('success_massege'); ?>
                </div>
            </div>
            <?php }?>
        </div>
        <hr>


        <div class="row">
            <div  class="col-md-12 col-xs-12  wow fadeIn animated">
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th> Name</th>
                        <th>Communication Type</th>
                        <th>Create Time</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    if(isset($pending_appointments))
                    foreach($pending_appointments as  $single_appointments){?>
                    <tr>
                        <td><?php
                            if($single_appointments->image === ''){?>
                            <img src="<?php echo URL::to('public/uploads/profile/empty.png');?>" height="70"
                                 width="100" alt="User Image">
                            <?php }else{?>
                            <img src="<?php echo URL::to('public/uploads/profile/' . $single_appointments->image);?>"
                                 height="100" width="150" alt="User Image">
                            <?php }?></td>
                        <td> <?php echo $single_appointments->f_name.'  '.$single_appointments->l_name ?> </td>
                        <td> <?php echo $single_appointments->communication_type ?></td>
                        <td> <?php echo $single_appointments->created_at ?> </td>

                        <td>
                            <div class="doctor_select_action">
                                <a href="<?php echo URL::action('Admin\Doctor@setAppointment', [$single_appointments->appoint_id]) ?>"> <i class="fa fa-hand-pointer-o"></i>
                                    Select </a>
                            </div>
                        </td>
                    </tr>
                    <?php }?>
                    </tbody>


                    <tfoot>
                    <tr>
                        <th>Image</th>
                        <th> Name</th>
                        <th>Communication Type</th>
                        <th>Create Time</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
                </div>
            </div>
        </div>
    </div>
@stop