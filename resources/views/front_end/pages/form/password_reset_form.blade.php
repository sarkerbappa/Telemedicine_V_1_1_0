@extends('front_end.templates.default')
@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3 wow fadeInDown animated ">
            <div class="tlmd_inner_page_heading">
                <div class="inner_body_content_wrapper">
                    <h1> Create New Password</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    <hr>

                    <?php echo Form::open(array('class'=>"form-horizontal",'route' => 'resetForgotPassword'))?>

                    <div class="form-group">
                        <label for="inputPassword" class="control-label col-xs-3">New Password:</label>
                        <div class="col-xs-9">
                            <?php
                                 echo Form::hidden('email', $value = $email);
                                 echo Form::password('new_password', array('class' => 'form-control','id'=>"inputPassword"));
                            ?>
                            <span class="text-red"><?php echo $errors->first('new_password'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="control-label col-xs-3"> Confirm Password:</label>
                        <div class="col-xs-9">
                            <?php echo Form::password('new_password_confirmation', array('class' => 'form-control','id'=>"inputPassword")); ?>
                            <span class="text-red"><?php echo $errors->first('new_password_confirmation'); ?></span>
                        </div>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-9 ">
                            <?php echo Form::submit('Submit', array('class' => 'btn btn-primary btn-block btn-flat inside_body_submit')) ?>

                        </div>
                    </div>
                    <?php echo Form::close(); ?>
                </div>
            </div>
        </div>
    </div>


@stop