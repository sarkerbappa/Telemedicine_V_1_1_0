@extends('front_end.templates.dashboard')
@section('content')

    <div class="inner_body_content_wrapper" id="choose_doctor">

        <div><h1>Doctor's Appointment </h1></div><hr>
        <div id="exTab1">
            <ul  class="nav nav-pills">
                <li class="active">
                    <a  href="#1a" data-toggle="tab"> Specialist Doctor's Appoinment</a>
                </li>
                <li><a href="#2a" data-toggle="tab">General Appointment</a>
                </li>
            </ul>

            <div class="tab-content clearfix">
                <div class="tab-pane active" id="1a">
                    <div class="row" >
                        <div class="col-xs-5">
                            <h2>
                                <i class="fa fa-search"></i>  Choose Doctor
                            </h2>
                        </div>
                        <div class="col-xs-6">

                        </div>
                    </div>
                    <div class="row" >
                        <?php if(Session::get('edit_success_success')) { ?>
                        <div class="col-xs-6 col-xs-offset-3">
                            <div class="alert alert-success fade in wow fadeInUp animated">
                                <a href="" class="close" data-dismiss="alert">&times;</a>
                                <strong>Success!</strong> <?php echo Session::get('edit_success_success'); ?>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <hr>
                    <div class="row">
                        <div  class="col-md-12 col-xs-12  wow fadeIn animated">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Present Job Institute</th>
                                    <th> </th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                if(isset($all_doctor))
                                foreach($all_doctor as  $single_doctor){?>
                                <tr>
                                    <td><?php
                                        if($single_doctor->image === ''){?>
                                        <img src="<?php echo URL::to('public/uploads/profile/empty.png');?>" height="70"
                                             width="100" alt="User Image">
                                        <?php }else{?>
                                        <img src="<?php echo URL::to('public/uploads/profile/' . $single_doctor->image);?>"
                                             height="70" width="100" alt="User Image">
                                        <?php }?></td>
                                    <td><?php echo $single_doctor->f_name.' '.$single_doctor->l_name?></td>
                                    <td><?php echo $single_doctor->medical_speciality;?></td>
                                    <td><?php echo $single_doctor->p_job;?></td>

                                    <td>
                                        <div class="doctor_select_action">
                                            <a href="<?php echo URL::action('Admin\Patient@makeAppointment', [$single_doctor->id]) ?>"> <i class="fa fa-hand-pointer-o"></i>
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
                                    <th>Speciality</th>
                                    <th>Present Job Institute</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="2a">
                   <hr> <div class="row">
                        <div class="col-md-12 col-xs-12  wow fadeIn animated">
                            <?php echo Form::open(array('class' => "form-horizontal", 'route' => 'saveAppointmentData', 'files' => true))?>

                            <div class="form-group">
                                <div class="col-xs-9">
                                    <?php echo Form::hidden('appointment_type', $value = 'general');?>
                                </div>
                            </div>

                            <div class="form-group">
                                <p style="color:red; padding:20px 0px 5px 10px;"> All srat marked (*) fields are
                                    required.</p>
                                <label for="patient_gender" class="control-label col-xs-3">Communication Type: <b
                                            class="mandetory_star">*</b></label>
                                <div class="col-xs-9">
                                    <div class="col-sm-6">
                                        <div class="radio">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <?php  echo Form::radio('communication_type', 'email');?>
                                                    Email
                                                </div>
                                                <div class="col-xs-4">
                                                    <?php  echo Form::radio('communication_type', 'mobile', 'select');?>
                                                    Mobile
                                                </div>
                                                <div class="col-xs-4">
                                                    <?php  echo Form::radio('communication_type', 'video_call');?>
                                                    Video Call
                                                </div>
                                            </div>
                                        </div>
                                        <span class="text-red"><?php echo $errors->first('gender'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="patient_gender" class="control-label col-xs-3">Convenient Time: <b
                                            class="mandetory_star">*</b></label>
                                <div class="col-xs-9">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <?php echo Form::text('convenient_time', '', $attributes = array('class' => 'form-control', 'id' => "reservationtime")); ?>
                                    </div><!-- /.input group -->
                                    <span class="text-red"><?php echo $errors->first('convenient_time'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputBiography" class="control-label col-xs-3"> Problem: <b
                                            class="mandetory_star">*</b> </label>
                                <div class="col-xs-9">
                                    <div class="box-body pad">
                                        <?php echo Form::textarea('problem', '', $attributes = array('class' => 'form-control', 'id' => "editor1", 'rows' => "10", 'cols' => "80", 'placeholder' => 'Type your Problem here..........')); ?>
                                        <span class="text-red"><?php echo $errors->first('problem'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9">
                                    <?php echo Form::submit('Submit', array('class' => 'btn btn-primary btn-block btn-flat inside_body_submit')) ?>
                                </div>
                            </div>
                            <?php echo Form::close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop
