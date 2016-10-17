@extends('front_end.templates.default')
@section('content')

    <div class="row  wow fadeInDown animated animated">
        <div class="col-md-6 col-md-offset-3 ">
            <div class="tlmd_inner_page_heading">
                <h1> Join As a Patient</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                <hr>

                @if ($errors->any())
                    <p class="wow bounceInUp animated validation_error_massege"><b>Alert !</b> Form validation Error! Please Check the form fields again.</p>
                @endif
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-7  wow fadeInLeftBig animated">
            <div class="inner_body_content_wrapper">
            <?php echo Form::open(array('class' => "form-horizontal", 'route' => 'addPatient', 'files' => true))?>

            <div class=" form-group form_section_title ">
                <p class="star_mark"> All srat marked (*) fields are required.</p>
                <h4> Personal Information</h4>
            </div>

            <div class="form-group">
                <label for="inputText" class="control-label col-xs-3"> First Name:<b class="mandetory_star">*</b></label>
                <div class="col-xs-9">
                    <?php echo Form::text('f_name', '', $attributes = array('class' => 'form-control', 'id' => "f_name", 'placeholder' => ' First Name')); ?>
                    <?php echo Form::hidden('role',$value="patient"); ?>
                    <span class="text-red"><?php echo $errors->first('f_name'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <label for="inputText" class="control-label col-xs-3"> Last Name:<b class="mandetory_star">*</b></label>
                <div class="col-xs-9">
                    <?php echo Form::text('l_name', '', $attributes = array('class' => 'form-control', 'id' => "l_name", 'placeholder' => ' Last Name')); ?>
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
                                    <?php  echo Form::radio('gender', 'male');?>
                                    Male
                                </div>
                                <div class="col-xs-6">
                                    <?php  echo Form::radio('gender', 'female');?>
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
                    echo Form::select('bloodgroup', $bloodgroup,'', $attributes = array('class' => 'form-control')); ?>
                    <span class="text-red"><?php echo $errors->first('bloodgroup'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <label for="nationalId" class="control-label col-xs-3">National Id: <b class="mandetory_star">*</b></label>
                <div class="col-xs-9">
                    <?php echo Form::number('nidno', '', $attributes = array('class' => 'form-control', 'id' => "inputNID", 'placeholder' => 'National ID No')); ?>
                    <span class="text-red"><?php echo $errors->first('nidno'); ?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputBiography" class="control-label col-xs-3"> About: </label>
                <div class="col-xs-9">
                    <?php echo Form::textarea('about', '', $attributes = array('class' => 'form-control', 'id' => "BioGraphy", 'placeholder' => 'BioGraphy')); ?>
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
                    <?php echo Form::number('mobile', '', $attributes = array('class' => 'form-control', 'id' => "inputMobile", 'placeholder' => 'Mobile No')); ?>
                    <span class="text-red"><?php echo $errors->first('mobile'); ?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="control-label col-xs-3">Email:<b class="mandetory_star">*</b></label>
                <div class="col-xs-9">
                    <?php echo Form::text('email', '', $attributes = array('class' => 'form-control', 'id' => "inputEmail", 'placeholder' => 'Email ID')); ?>
                    <span class="text-red"><?php echo $errors->first('email'); ?></span>
                </div>
            </div>


            <div class=" form-group form_section_title "> <h4> Account Information</h4></div>

            <div class="form-group">
                <label for="inputText" class="control-label col-xs-3">User Name:<b class="mandetory_star">*</b></label>
                <div class="col-xs-9">
                    <?php echo Form::text('username', '', $attributes = array('class' => 'form-control', 'id' => "inputUsername", 'placeholder' => 'Username')); ?>
                    <span class="text-red"><?php echo $errors->first('username'); ?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="control-label col-xs-3">Password:<b class="mandetory_star">*</b></label>
                <div class="col-xs-9">
                    <?php echo Form::password('password', array('class' => 'form-control', 'id' => "inputPassword")); ?>
                    <span class="text-red"><?php echo $errors->first('password'); ?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputConfirmPassword" class="control-label col-xs-3"> Confirm Password:<b class="mandetory_star">*</b></label>
                <div class="col-xs-9">
                    <?php echo Form::password('password_confirmation', array('class' => 'form-control', 'id' => "inputConfirmPassword")); ?>
                    <span class="text-red"><?php echo $errors->first('password_confirmation'); ?></span>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-offset-3 col-xs-9">
                    <?php echo Form::submit('Sign Up', array('class' => 'btn btn-primary btn-block btn-flat inside_body_submit')) ?>
                </div>
            </div>
            <?php echo Form::close(); ?>
        </div>
        </div>
        <div class="col-md-5  wow fadeInRightBig animated pull-right">
            <div class="tlmd_form_page_image_patient inner_body_content_wrapper_patient_image ">
                <img src="{{URL::to('public/assets/frontend/img/patient.png')}}"/>
            </div>
        </div>
    </div>

    <div style="padding-bottom:30px;"></div>
@stop