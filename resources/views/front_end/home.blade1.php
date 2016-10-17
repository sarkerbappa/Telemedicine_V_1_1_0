@extends('front_end.templates.frontpage')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tlmd-main-content" id="join">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 wow fadeInUp animated">
                    <div class="tlmd-join-us ">
                        <h1>Join With Us !</h1>
                        <p>Ipsum is simply dummy text of the printing and typesetting industry.</p><hr>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>

            
            <div class="row">
                <div class="col-md-5 wow fadeInLeft animated">
                    <div class="tlmd-join-doctor ">
                        <h2> Are you a Doctor?</h2><hr>
                        <p>Lorem Ipsum is simply dummy text 
                            of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's 
                            standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of 
                            type and scrambled it to make a type specimen book</p>
                        <div style="text-align: right" >
                            <a href="<?php echo URL::route('doctorRegDetail'); ?>" class="more-details-specialize hvr-float " style="color:#f10026;"><i class="fa fa fa-user-md"></i>  More Details</a>
                        </div>
                       
                    </div>
                </div>

                <div class="col-md-5 col-md-offset-2 wow fadeInRight animated">
                    <div class="tlmd-join-patient">
                        <h2> Are you a Patient?</h2><hr>
                        <p>Lorem Ipsum is simply dummy text 
                            of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's 
                            standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of 
                            type and scrambled it to make a type specimen book</p>
                        <div  style="text-align: right">
                            <a href="<?php echo URL::route('patientRegDetail'); ?>"class="more-details-specialize hvr-float" style="color:#a600a6;"><i class="fa fa fa-user-md"></i>  More Details</a>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            <div class="row">
                <div class="col-md-12">
                    <div class="tlmd-specialized-doctor wow fadeInLeftBig animated">
                        <h1> Specialized Doctors</h1>
                        <p>Ipsum is simply dummy text of the printing and typesetting industry.</p><hr>
                    </div>
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-md-3 wow fadeIn animated">
                    <div class="tlmd-single-special-doctor" style="background:#a600a6;">
                        <h2> General Medicine</h2><hr>
                        <p>Lorem Ipsum is simply dummy text 
                            of the printing and typesetting industry.
                            
                            </p>
                        <div  style="text-align:left">
                            <a class="more-details-specialize hvr-float" style="color:#a600a6;"><i class="fa fa fa-user-md"></i>  More Details</a>
                        </div>
                    </div>
                </div>
                 <div class="col-md-3 wow fadeInRightBig animated">
                     <div class="tlmd-single-special-doctor" style="background:#f10026;">
                        <h2> General Surgery</h2><hr>
                        <p>Lorem Ipsum is simply dummy text 
                            of the printing and typesetting industry.
                            
                            </p>
                        <div  style="text-align:left">
                            <a class="more-details-specialize hvr-float " style="color:#f10026;"><i class="fa fa fa-user-md"></i>  More Details</a>
                        </div>
                    </div>
                </div>
                 <div class="col-md-3 wow fadeInUp animated">
                     <div class="tlmd-single-special-doctor" style="background:#3e97d1;">
                        <h2> Pediatrics</h2><hr>
                        <p>Lorem Ipsum is simply dummy text 
                            of the printing and typesetting industry.
                            
                            </p>
                        <div  style="text-align:left">
                            <a class="more-details-specialize hvr-float " style="color:#3e97d1;"><i class="fa fa fa-user-md"></i>  More Details</a>
                        </div>
                    </div>
                </div>
                 <div class="col-md-3 wow fadeInRightBig animated">
                     <div class="tlmd-single-special-doctor" style="background:#3415b0;">
                        <h2>Gynecology</h2><hr>
                        <p>Lorem Ipsum is simply dummy text 
                            of the printing and typesetting industry.
                            
                            </p>
                        <div  style="text-align:left">
                            <a class="more-details-specialize hvr-float " style="color:#3415b0;"><i class="fa fa fa-user-md"></i>  More Details</a>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div style="padding-top:30px;"></div>
            
            
            
            <div class="row">
                 <div class="col-md-3 wow fadeInLeftBig animated">
                     <div class="tlmd-single-special-doctor" style="background:#3415b0;">
                        <h2>Anesthesiology</h2><hr>
                        <p>Lorem Ipsum is simply dummy text 
                            of the printing and typesetting industry.
                            
                            </p>
                        <div  style="text-align:left">
                            <a class="more-details-specialize hvr-float " style="color:#3415b0;"><i class="fa fa fa-user-md"></i>  More Details</a>
                        </div>
                    </div>
                </div>
                 <div class="col-md-3 wow fadeInLeftBig animated">
                    <div class="tlmd-single-special-doctor" style="background:#a600a6;">
                        <h2> Psychiatry</h2><hr>
                        <p>Lorem Ipsum is simply dummy text 
                            of the printing and typesetting industry.
                            
                            </p>
                        <div  style="text-align:left">
                            <a class="more-details-specialize hvr-float" style="color:#a600a6;"><i class="fa fa fa-user-md"></i>  More Details</a>
                        </div>
                    </div>
                </div>
                 <div class="col-md-3 wow fadeInUp animated">
                     <div class="tlmd-single-special-doctor" style="background:#f10026;">
                        <h2> Orthopedics</h2><hr>
                        <p>Lorem Ipsum is simply dummy text 
                            of the printing and typesetting industry.
                            
                            </p>
                        <div  style="text-align:left">
                            <a class="more-details-specialize hvr-float " style="color:#f10026;"><i class="fa fa fa-user-md"></i>  More Details</a>
                        </div>
                    </div>
                </div>
               
                 <div class="col-md-3 wow fadeInRightBig animated">
                     <div class="tlmd-single-special-doctor" style="background:#3e97d1;">
                        <h2> Ophthalmology</h2><hr>
                        <p>Lorem Ipsum is simply dummy text 
                            of the printing and typesetting industry.
                            
                            </p>
                        <div  style="text-align:left">
                            <a class="more-details-specialize hvr-float " style="color:#3e97d1;"><i class="fa fa fa-user-md"></i>  More Details</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div style="padding-top:30px;"></div>
            
        </div>
    </div>
</div>

@stop