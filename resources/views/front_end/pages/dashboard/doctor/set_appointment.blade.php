@extends('front_end.templates.dashboard')
@section('content')

    <div class="inner_body_content_wrapper">
        <div class="row" >
            <div class="col-xs-12">
                <h2>
                    <i class="fa fa-medkit"></i> Set An Appointment
                </h2>
            </div>
        </div>
        <hr>

        <div class="row">
            <div  class="col-md-12 col-xs-12  wow fadeInUp animated">

                <?php echo Form::open(array('class' => "form-horizontal", 'route' => 'saveSetAppointmentData', 'files' => true))?>

                        <!-- Patient Detail -->
                <?php foreach ($appointment_info as $appointment_detail ){?>
                <div style="border:1px solid #bbb; padding-top: 15px; background:#ccc;">
                    <div class=" form-group">
                        {{--patient detail--}}
                        <div class="col-xs-8 col-xs-offset-1">
                            <h3>Patient' Name
                                : <?php echo $value = $appointment_detail->f_name . '  ' . $appointment_detail->l_name?>
                                . </h3>
                            <p> <b> Blood Group :</b> <?php echo $appointment_detail->bloodgroup;?> </p>
                            <p> <b> Gender :</b> <?php echo $appointment_detail->gender;?> </p>
                            <p> <b> About : </b><?php echo $appointment_detail->about; ?> </p>
                            <p> <b> Communication Type :</b> <?php echo $appointment_detail->communication_type;?> </p>
                            <p> <b> Mobile No :</b> <?php echo $appointment_detail->mobile;?> </p>
                            <p><b> Convenient Time :</b> <?php echo $appointment_detail->patient_time;?> </p>
                        </div>


                        {{--// Display patient  profile image --}}
                        <div class="col-xs-3 doctor-profile">
                            <?php
                            if($appointment_detail->image === ''){?>
                            <img src="<?php echo URL::to('public/uploads/profile/empty.png');?>" height="70"
                                 width="100" alt="User Image">
                            <?php }else{?>
                            <img src="<?php echo URL::to('public/uploads/profile/' . $appointment_detail->image);?>"
                                 height="100" width="150" alt="User Image">
                            <?php }?>  <!-- End of the image existance checkinh -->
                        </div>
                        {{--end of profile image--}}
                    </div>


                    <div class="form-group">
                        <div class="col-xs-10 col-xs-offset-1" style="border:1px solid #bbb;border-radius:5px ;background:#eee;padding:10px">
                            <b> Problem : </b><hr><?php echo $appointment_detail->problem; ?>
                        </div>
                    </div>
                </div>
                <!-- end of the patient and Appointment info -->

                {{--Doctor's Area start--}}

                <div class="form-group">
                    <div class="col-xs-9">
                        <?php
                        echo Form::hidden('appoint_id', $value = $appointment_detail->appoint_id);
                        echo Form::hidden('patient_f_name', $value = $appointment_detail->f_name);
                        echo Form::hidden('patient_l_name', $value = $appointment_detail->l_name);
                        echo Form::hidden('patient_email', $value = $appointment_detail->email);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-9">
                        <p style="color:red"> All srat marked (*) fields are required.</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputBiography" class="control-label col-xs-3"> Appointment Time : <b
                                class="mandetory_star">*</b> </label>
                    <div class="col-xs-9">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <?php echo Form::text('convenient_time', $value = $appointment_detail->patient_time , $attributes = array('class' => 'form-control', 'id' => "reservationtime")); ?>
                        </div><!-- /.input group -->
                        <span class="text-red"><?php echo $errors->first('convenient_time'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputBiography" class="control-label col-xs-3"> Primary Advice : <b
                                class="mandetory_star">*</b> </label>
                    <div class="col-xs-9">
                        <div class="box-body pad">
                            <?php echo Form::textarea('advice', '', $attributes = array('class' => 'form-control', 'id' => "editor1", 'rows' => "10", 'cols' => "80", 'placeholder' => 'Type your Problem here..........')); ?>
                            <span class="text-red"><?php echo $errors->first('advice'); ?></span>
                        </div>
                    </div>
                </div>

                <?php }?>


                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-9">
                        <?php echo Form::submit('Submit', array('class' => 'btn btn-primary btn-block btn-flat inside_body_submit')) ?>
                    </div>
                </div>
                <?php echo Form::close(); ?>


            </div>
        </div>
    </div>

@stop