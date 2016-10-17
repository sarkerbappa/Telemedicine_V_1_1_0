@extends('front_end.templates.default')
@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3 wow fadeInDown animated ">
            <div class="tlmd_inner_page_heading">
                <div class="inner_body_content_wrapper">
                <h1> Sign In</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                <hr>

                <?php if(Session::get('authentication_error') !== null){?>
                <div class="form-group row">
                    <div class="col-xs-9 col-xs-offset-3">
                        <div class="alert alert-danger alert-dismissable"> <?php  echo  Session::get('authentication_error'); ?></div>
                    </div>
                </div>
                <?php }?>


                <?php echo Form::open(array('class'=>"form-horizontal",'route' => 'adminLoginCheck'))?>

                <div class="form-group">
                    <label for="inputText" class="control-label col-xs-3">User Name:</label>
                    <div class="col-xs-9">
                        <?php echo Form::text('username', '', $attributes = array('class' => 'form-control','id'=>"inputUsername",'placeholder' => 'username or email or mobile')); ?>
                        <span class="text-red"><?php echo $errors->first('username'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="control-label col-xs-3">Password:</label>
                    <div class="col-xs-9">
                        <?php echo Form::password('password', array('class' => 'form-control','id'=>"inputPassword")); ?>
                        <span class="text-red"><?php echo $errors->first('password'); ?></span>
                    </div>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-9 forgot_password">
                        <?php echo Form::submit('Sign In', array('class' => 'btn btn-primary btn-block btn-flat inside_body_submit')) ?>
                        <div class="forgot_password">
                            <a href='<?php echo URL::route('forgotPassword');?>'><p>Forgot Password ?</p></a>
                        </div>
                    </div>
                </div>
                <?php echo Form::close(); ?>
            </div>
            </div>
        </div>
    </div>


@stop