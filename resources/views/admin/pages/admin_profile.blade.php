@extends('admin.templates.default')
@section('content')
    <section class="content">
        <?php if(Session::get('update_success_massege')){?>
        <div class="bs-example col-md-11">
            <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong> <?php echo Session::get('update_success_massege'); ?>
            </div>
        </div>
        <?php }?>
        <div class="row">
            <!--<div class="col-md-1"></div>-->
            <!-- left column -->
            <div class="col-md-11">
                <!-- general form elements -->
                <div class="box box-info">
                    <div class="box-header">
                        <h2 class="box-title">Update User Profile</h2><hr>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php echo Form::open(array('route' => 'updateAdminProfile','files' => true))?>
                    <div class="box-body">
                        <div class="row form-group">
                            <div class="col-md-4 form-level"><label>First Name<b class="mandetory_star">*</b></label></div>
                            <div class="col-md-7">
                                <?php echo Form::text('f_name', $value = Auth::user()->f_name, $attributes = array('class' => 'form-control','placeholder' =>'First Name'));?>
                                <span class="text-red"><?php echo $errors->first('f_name'); ?></span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 form-level"><label>Last Name<b class="mandetory_star">*</b></label></div>
                            <div class="col-md-7">
                                <?php echo Form::text('l_name', $value = Auth::user()->l_name, $attributes = array('class' => 'form-control','placeholder' =>'Last Name'));?>
                                <span class="text-red"><?php echo $errors->first('l_name'); ?></span>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-4 form-level"><label>Email<b class="mandetory_star">*</b></label></div>
                            <div class="col-md-7">
                                <?php echo Form::email('email', $value = Auth::user()->email, $attributes = array('class' => 'form-control','placeholder' =>'Email'));?>
                                <span class="text-red"><?php echo $errors->first('email'); ?></span>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-4 form-level"><label>Mobile<b class="mandetory_star">*</b></label></div>
                            <div class="col-md-7">
                                <?php echo Form::number('mobile', $value = Auth::user()->mobile, $attributes = array('class' => 'form-control','placeholder' =>'Mobile Number'));?>
                                <span class="text-red"><?php echo $errors->first('mobile'); ?></span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 form-level"><label>Password</label></div>
                            <div class="col-md-7">
                                <?php echo Form::text('password','',array('class' => 'form-control','placeholder' =>'Password....'));?>
                                <span class="text-red"><?php echo $errors->first('password'); ?></span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 form-level"><label>Password</label></div>
                            <div class="col-md-7">
                                <?php echo Form::text('password_confirmation','',array('class' => 'form-control','placeholder' =>'Password....'));?>
                                <span class="text-red"><?php echo $errors->first('password_confirmation'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 form-level"><label>Profile Image</label></div>
                            <div class="col-md-7">
                                <?php echo Form::hidden('image',Auth::user()->image);?>
                                <?php echo Form::file('image');?>
                                <span class="text-red"><?php  echo  Session::get('image_validation_error'); ?></span>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-4 form-level">
                                <input name="id" type="hidden" value="<?php echo Auth::user()->id; ?>"/>
                            </div>
                            <div class="col-md-2">
                                <?php echo Form::submit('Submit',array('class' => 'btn btn-primary btn-block btn-flat inside_body_submit'))?>
                            </div>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
@stop