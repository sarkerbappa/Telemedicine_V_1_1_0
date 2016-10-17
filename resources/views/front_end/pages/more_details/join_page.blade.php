@extends('front_end.templates.default')
@section('content')

    <div style="padding:30px 0px 30px 0px;">

        <div class="row">
            <div class="col-md-5 wow fadeInLeftBig animated">
                <div class="inner_body_content_wrapper">
                    <div class="tlmd_join_page_description">
                        <h1> I am a Doctor</h1>
                        <p>I want to join this Community to serve helpless people.</p>
                    </div><hr>
                    <div class="tlmd_signup_button hvr-hang ">
                        <a href="<?php echo URL::route('signUpDoctor'); ?>"><i class="fa fa fa-user-plus"> Sign up </i></a>
                    </div>
                </div>
            </div>


            <div class="col-md-5 col-md-offset-2 wow fadeInRightBig ">
                <div class="inner_body_content_wrapper">
                    <div class="tlmd_join_page_description">
                        <h1> I am a Patient</h1>
                        <p>I want to join this community to get medical services form Doctors.</p>
                    </div><hr>
                    <div class="tlmd_signup_button hvr-hang">
                        <a href="<?php echo URL::route('signUpPatient'); ?>"><i class="fa fa fa-user-plus"> Sign up </i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop