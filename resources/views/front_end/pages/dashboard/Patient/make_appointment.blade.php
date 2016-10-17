@extends('front_end.templates.dashboard')
@section('content')

    <div class="inner_body_content_wrapper">
        <div class="row" >
            <div class="col-xs-12">
                <h2>
                    <i class="fa fa-medkit"></i> Make An Appointment
                </h2>
            </div>
        </div>
        <hr>

        <div class="row">
            <div  class="col-md-12 col-xs-12  wow fadeInUp animated">
                <div class="">
                    <?php echo Form::open(array('class' => "form-horizontal", 'route' => 'saveAppointmentData', 'files' => true))?>

                        <div class=" form-group" style="border:1px solid #bbb;padding-top: 15px;margin: 10px; background:#ccc;">
                            <div class="col-xs-7 col-xs-offset-1">
                                <h3> Dr.   <?php echo $value= $doctor_info->f_name.'  '.$doctor_info->l_name?>.   </h3>
                                <p> <b> Specialist :</b> <?php echo $doctor_info->medical_speciality?> </p>
                                <p> <b>Working at  :</b> <?php echo $doctor_info->p_job?> </p>
                                <p> <b>Designation :</b> <?php echo 'This field have to add in DB'?> </p>
                            </div>
                            <div class="col-xs-4 doctor-profile">
                                <?php
                                if($doctor_info->image === ''){?>
                                <img src="<?php echo URL::to('public/uploads/profile/empty.png');?>" height="70"
                                     width="100" alt="User Image">
                                <?php }else{?>
                                <img src="<?php echo URL::to('public/uploads/profile/' . $doctor_info->image);?>"
                                     height="150" width="200" alt="User Image">
                                <?php }?>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="col-xs-9">
                            <?php
                            echo Form::hidden('id',$value= $doctor_info->id);
                            echo Form::hidden('appointment_type', $value = 'custom');
                            echo Form::hidden('email',$value= $doctor_info->email);
                            echo Form::hidden('f_name',$value= $doctor_info->f_name);
                            echo Form::hidden('l_name',$value= $doctor_info->l_name);
                            ?>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="col-xs-9">
                                <p style="color:red"> All srat marked (*) fields are required.</p>
                            </div>
                        </div>

                    <div class="form-group">
                        <label for="patient_gender" class="control-label col-xs-3">Communication Type: <b class="mandetory_star">*</b></label>
                        <div class="col-xs-9">
                            <div class="col-sm-6">
                                <div class="radio">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <?php  echo Form::radio('communication_type', 'email');?>
                                         Email
                                        </div>
                                        <div class="col-xs-4">
                                            <?php  echo Form::radio('communication_type', 'mobile','select');?>
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
                        <label for="inputBiography" class="control-label col-xs-3"> Problem: <b class="mandetory_star">*</b> </label>
                        <div class="col-xs-9">
                            <div class="box-body pad">
                            <?php echo Form::textarea('problem', '', $attributes = array('class' => 'form-control', 'id' => "editor1", 'rows'=>"10", 'cols'=>"80",'placeholder' => 'Type your Problem here..........')); ?>
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

@stop
