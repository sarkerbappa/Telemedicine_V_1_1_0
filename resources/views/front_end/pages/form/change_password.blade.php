@extends('front_end.templates.dashboard')
@section('content')

        <div class="inner_body_content_wrapper">
            <div class="row" >
                <div class="col-xs-5">
                    <h2>
                        <i class="fa fa-pencil-square-o"></i>    Change Password
                    </h2>
                </div>
                    <?php if(Session::get('old_pass_error')) { ?>
                <div class="col-xs-7">
                        <div class="alert alert-danger fade in wow fadeInUp animated">
                            <a href="" class="close" data-dismiss="alert">&times;</a>
                            <strong>Alert!</strong> <?php echo Session::get('old_pass_error'); ?>
                        </div>
                </div>
                    <?php }?>
                <?php if(Session::get('password_change_success')) { ?>
                <div class="col-xs-7">
                    <div class="alert alert-success fade in wow fadeInUp animated">
                        <a href="" class="close" data-dismiss="alert">&times;</a>
                        <strong>Alert!</strong> <?php echo Session::get('password_change_success'); ?>
                    </div>
                </div>
                <?php }?>
            </div>

            <hr>

            <div class="row">
                <div  class="col-md-11  col-xs-offset-1 wow fadeIn animated">
                        <?php echo Form::open(array('class' => "form-horizontal", 'route' => 'changePasswordUpdate'))?>
                            <div class="form-group">
                                <label for="inputPassword" class="control-label col-xs-3">Old Password:<b class="mandetory_star">*</b></label>
                                <div class="col-xs-9">
                                    <?php echo Form::password('old_password', array('class' => 'form-control', 'id' => "inputPassword")); ?>
                                    <span class="text-red"><?php echo $errors->first('old_password'); ?></span>
                                </div>
                            </div>
                        <div class="form-group">
                            <label for="inputPassword" class="control-label col-xs-3">Password:<b class="mandetory_star">*</b></label>
                            <div class="col-xs-9">
                                <?php echo Form::password('new_password', array('class' => 'form-control', 'id' => "inputPassword")); ?>
                                <span class="text-red"><?php echo $errors->first('new_password'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputConfirmPassword" class="control-label col-xs-3"> Confirm Password:<b class="mandetory_star">*</b></label>
                            <div class="col-xs-9">
                                <?php echo Form::password('new_password_confirmation', array('class' => 'form-control', 'id' => "inputConfirmPassword")); ?>
                                <span class="text-red"><?php echo $errors->first('new_password_confirmation'); ?></span>
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

@stop
