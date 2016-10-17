@extends('front_end.templates.dashboard')
@section('content')

    <div class="inner_body_content_wrapper">
        <div class="row">
            <div class="col-xs-3 col-xs-offset-1">
                <h2>
                    <i class="fa fa-user"></i> Profile
                </h2>

            </div>
            <div class="col-xs-5">
            </div>
            <div class="col-xs-3">
                <div class="pull-right hvr-float-shadow my_account sign_in">
                    <a href="<?php echo URL::route('editPatient'); ?>"><i class="fa fa-pencil-square-o"></i>Edit</a>
                </div>
            </div>
        </div>

        <div class="row">
            <?php if(Session::get('success_massege')) { ?>
            <div class="col-xs-6 col-xs-offset-3">
                <div class="alert alert-success fade in wow fadeInUp animated">
                    <a href="" class="close" data-dismiss="alert">&times;</a>
                    <strong>Success!</strong> <?php echo Session::get('success_massege'); ?>
                </div>
            </div>
            <?php }?>
        </div>
        <hr>


        <div class="row">
            <div class="col-md-6 col-xs-11-5 col-xs-offset-1 wow fadeInLeftBig animated">
                <p><b>Name: </b> <?php echo Auth::user()->f_name . ' ' . Auth::user()->l_name?>
                <hr>
                </p>
                <p><b>Gender:</b> <?php echo Auth::user()->gender?>
                <hr>
                </p>
                <p><b>Mobile:</b> <?php echo Auth::user()->mobile?>
                <hr>
                </p>
                <p><b>Email:</b> <?php echo Auth::user()->email?>
                <hr>
                </p>
                <p><b>Blood Group:</b> <?php echo Auth::user()->bloodgroup?>
                <hr>
                </p>
                <p><b>National ID:</b> <?php echo Auth::user()->nidno?>
                <hr>
                </p>
                <p><b>About:</b> <?php echo Auth::user()->about?>
                <hr>
                </p>
            </div>

            <div class="col-md-5 col-xs-11 doctor-profile wow fadeInRightBig animated">
                <?php if( empty(Auth::user()->image)){?>
                <img class="pull-right" src="{{URL::to('public/uploads/profile/empty.png')}}" width="200"
                     height="150" alt="Image"/>
                <?php   }
                else{
                ?>
                <img class="pull-right" src="{{URL::to('public/uploads/profile/'.Auth::user()->image)}}" width="200"
                     height="150" alt="Image"/>
                <?php  }?>
            </div>
        </div>
    </div>

@stop
