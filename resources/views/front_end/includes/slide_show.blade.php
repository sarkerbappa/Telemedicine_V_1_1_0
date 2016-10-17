<div class="row">
    <div class="col-md-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="{{URL::to('public/assets/frontend/img/slide/slide_1_bg.png')}}" width="100%" alt="...">
                    <div class="carousel-caption">
                        <div class=" front_slide_2 wow slideInUp animated animated">
                            <h1> Welcome To The </br> Health Haven.</h1>

                        </div>
                        <div class=" front_slide wow slideInLeft animated animated" id="slide_2_right">
                            <img src="{{URL::to('public/assets/frontend/img/slide/slide_2_nurs.png')}}"  alt="...">
                        </div>
                        <div class=" front_slide wow bounceInDown animated animated">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{URL::to('public/assets/frontend/img/slide/slide_1_bg.png')}}" width="100%" alt="...">

                    <div class="carousel-caption">
                        <div class=" front_slide wow bounceInDown animated" id="slide_1_title">
                            <h1>The first wealth is <br> health </h1>
                        </div>
                        <div class="front_slide  wow slideInLeft animated animated" id="slide_1_doctor">
                            <img src="{{URL::to('public/assets/frontend/img/slide/slide_1_doctor.png')}}"  alt="...">
                        </div>
                        <div class=" front_slide wow slideInRight animated animated" id="slide_1_patient">
                            <img src="{{URL::to('public/assets/frontend/img/slide/slide_1_patient.png')}}"  alt="...">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{URL::to('public/assets/frontend/img/slide/slide_1_bg.png')}}" width="100%" alt="...">
                    <div class="carousel-caption">
                        <div class=" front_slide wow slideInLeft animated animated" id="slide_3_right">
                            <img src="{{URL::to('public/assets/frontend/img/slide/slide_3.png')}}"  alt="...">

                        </div>
                        <div class=" front_slide wow rollIn animated animated" id="slide_3_title">
                            <h1> Helth Is Happiness </h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

