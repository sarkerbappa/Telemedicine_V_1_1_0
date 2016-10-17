@extends('front_end.templates.dashboard')
@section('content')

    <div class="inner_body_content_wrapper">

        <div class="row wow fadeInDown animated animated" >
            <div class="col-xs-4">
                <h2>
                    <i class="fa fa-pencil-square-o"></i>  Edit Profile
                </h2>
            </div>
            <div class="col-xs-8">
                @if ($errors->any())
                    <p class="wow bounceInUp animated validation_error_massege"><b>Alert !</b> Form validation Error! Please Check the form fields again.</p>
                @endif
            </div>
        </div> <hr>


        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 wow fadeInLeft animated">

                <?php echo Form::open(array('class' => "form-horizontal", 'route' => 'updatePatient', 'files' => true))?>

                <div class=" form-group form_section_title ">
                    <p class="star_mark"> All srat marked (*) fields are required.</p>
                    <h4> Personal Information</h4>
                </div>

                <div class="form-group">
                    <label for="inputText" class="control-label col-xs-3"> First Name:<b class="mandetory_star">*</b></label>
                    <div class="col-xs-9">
                        <?php
                        echo Form::hidden('role',$value  = "doctor");
                        echo Form::hidden('id',$value    = $patient_info->id);
                        echo Form::hidden('image',$value = $patient_info->image);
                        echo Form::text('f_name',$patient_info->f_name, $attributes = array('class' => 'form-control', 'id' => "f_name", 'placeholder' => ' First Name'));
                        ?>
                        <span class="text-red"><?php echo $errors->first('f_name'); ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputText" class="control-label col-xs-3"> Last Name:<b class="mandetory_star">*</b></label>
                    <div class="col-xs-9">
                        <?php echo Form::text('l_name', $patient_info->l_name, $attributes = array('class' => 'form-control', 'id' => "l_name", 'placeholder' => ' Last Name')); ?>
                        <span class="text-red"><?php echo $errors->first('l_name'); ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="patient_gender" class="control-label col-xs-3">Gender: <b class="mandetory_star">*</b></label>
                    <div class="col-xs-9">
                        <div class="col-sm-4">
                            <div class="radio">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <?php
                                        $g_select_male = $g_select_female = false;
                                        $patient_info->gender === 'male' ? $g_select_male = true :$g_select_female = true ;
                                        ?>
                                        <?php  echo Form::radio('gender', 'male',$g_select_male);?>
                                        Male
                                    </div>
                                    <div class="col-xs-6">
                                        <?php  echo Form::radio('gender', 'female',$g_select_female);?>
                                        Female
                                    </div>
                                </div>
                            </div>
                            <span class="text-red"><?php echo $errors->first('gender'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="bloodgroup" class="control-label col-xs-3">Blood Group:</label>
                    <div class="col-xs-9">
                        <?php
                        $bloodgroup = array(
                                'A +' => 'A +',
                                'A -' => 'A -',
                                'B +' => 'B +',
                                'B -' => 'B -',
                                'O +' => 'O +',
                                'O -' => 'O -',
                                'O -' => 'O -',
                                'O -' => 'O -',
                        );
                        echo Form::select('bloodgroup', $bloodgroup,$patient_info->bloodgroup, $attributes = array('class' => 'form-control')); ?>
                        <span class="text-red"><?php echo $errors->first('bloodgroup'); ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nationalId" class="control-label col-xs-3">National Id: <b class="mandetory_star">*</b></label>
                    <div class="col-xs-9">
                        <?php echo Form::number('nidno',$value = $patient_info->nidno, $attributes = array('class' => 'form-control', 'id' => "inputNID", 'placeholder' => 'National ID No')); ?>
                        <span class="text-red"><?php echo $errors->first('nidno'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputBiography" class="control-label col-xs-3"> About: </label>
                    <div class="col-xs-9">
                        <?php echo Form::textarea('about',$value = $patient_info->about, $attributes = array('class' => 'form-control', 'id' => "BioGraphy", 'placeholder' => 'BioGraphy')); ?>
                        <span class="text-red"><?php echo $errors->patient->first('about'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-3 control-label">Profile Image</div>
                    <div class="col-xs-9">
                        <?php echo Form::file('image');?>
                        <span class="text-red"><?php  echo  Session::get('image_validation_error'); ?></span>
                    </div>
                </div>

                <div class=" form-group form_section_title "> <h4> Contact Information</h4></div>

                <div class="form-group">
                    <label for="inputPhone" class="control-label col-xs-3">Mobile:<b class="mandetory_star">*</b></label>
                    <div class="col-xs-9">
                        <?php echo Form::number('mobile', $value = $patient_info->mobile, $attributes = array('class' => 'form-control', 'id' => "inputMobile", 'placeholder' => 'Mobile No')); ?>
                        <span class="text-red"><?php echo $errors->first('mobile'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-3">Email:<b class="mandetory_star">*</b></label>
                    <div class="col-xs-9">
                        <?php echo Form::text('email', $value = $patient_info->email, $attributes = array('class' => 'form-control', 'id' => "inputEmail", 'placeholder' => 'Email ID')); ?>
                        <span class="text-red"><?php echo $errors->first('email'); ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-9">
                        <?php echo Form::submit('Update', array('class' => 'btn btn-primary btn-block btn-flat inside_body_submit')) ?>
                    </div>
                </div>
                <?php echo Form::close(); ?>
            </div>
        </div>
    </div>
@stop