@extends('front_end.templates.default')
@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3 wow slideInLeft">
            <div class="tlmd_inner_page_heading">
                <div class="inner_body_content_wrapper">
                <h1> Reset Password</h1>
                <p>Enter Your Email Address.</p>
                <hr>

                <?php if(Session::get('email_not_exist_massege') !== null){?>
                <div class="form-group row">
                    <div class="col-xs-9 col-xs-offset-3">
                        <div class="alert alert-danger alert-dismissable"> <?php  echo  Session::get('email_not_exist_massege'); ?></div>
                    </div>
                </div>
                <?php }?>

                <?php echo Form::open(array('class'=>"form-horizontal",'route' => 'forgotPasswordSendMail'))?>

                <div class="form-group">
                    <label for="inputText" class="control-label col-xs-3">Email Address:</label>
                    <div class="col-xs-9">
                        <?php echo Form::email('email', '', $attributes = array('class' => 'form-control','id'=>"inputUsername",'placeholder' => 'Email Address')); ?>
                        <span class="text-red"><?php echo $errors->first('email'); ?></span>
                    </div>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-9">
                        <?php echo Form::submit('Send Password Reset Link', array('class' => 'btn btn-primary btn-block btn-flat inside_body_submit')) ?>
                    </div>
                </div>
                <?php echo Form::close(); ?>
            </div>
            </div>
        </div>
    </div>


@stop