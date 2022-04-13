
@extends('layout.homes')

@section('homes')

    <!-- header end -->
<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section" style="background-image: url(img/banner9.jpg)" >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-banner-content text-center">
                        <h1 class="fonesize">About Page</h1>
                        <p>
                            <span><a href="{{route('index')}}">HOME</a></span>
                            <span class="ative">ABOUT PAGE</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <div class="page-banner-social">
        <p class="fonesize"> Share this page:</p>
        <div class="social">
            <a ><i class="fa fa-facebook"></i></a>
            <a ><i class="fa fa-twitter"></i></a>
            <a ><i class="fa fa-instagram"></i></a>
        </div>
    </div>
</div>
<!-- END PAGE BANNER SECTION -->

<div class="about-story pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="story-img">
                    <img src="img/about1.jpg" alt="">
                
                </div>
            </div>
            <div class="col-lg-6">
                <div class="story-details pl-50">
                    <div class="story-details-top">
                        <h2>WELCOME TO <span>Bakery</span></h2>
                        <p>Bakery provide how all this mistaken idea of denouncing pleasure and sing pain was born an will give you a complete account of the system, and expound the actual teachings of the eat explorer. </p>
                    </div>
                    <div class="story-details-bottom">
                        <h4>WE START AT 2020</h4>
                        <p>Bakery provide how all this mistaken idea of denouncing pleasure and sing pain was born an will give you a complete account of the system, and expound the actual teachings of the eat explorer.</p>
                    </div>
                    <div class="story-details-bottom">
                        <h4>WIN BEST ONLINE SHOP AT 2020</h4>
                        <p>Bakery provide how all this mistaken idea of denouncing pleasure and sing pain was born an will give you a complete account of the system, and expound the actual teachings of the eat explorer. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about-banner-area pb-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="banner-wrapper-4 mb-30">
                    <a href="#"><img src="img/about5.jpg" alt="" style="width:492px;height:280px;"></a>
                    <div class="banner-content4-style1">
                        <h4>Best <br>Electronics <br>Products.</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="banner-wrapper-4 mb-30">
                    <a href="#"><img src="img/banner0.jpg" alt="" style="width:492px;height:280px;"></a>
                    <div class="banner-content4-style2">
                        <h3>Bitso X1202</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="banner-wrapper-4 mb-30">
                    <a href="#"><img src="img/about6.jpg" alt="" style="width:492px;height:280px;"></a>
                    <div class="banner-content4-style3">
                        
                        <h3>Lonovo Vio D22</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="goal-area pb-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="goal-wrapper mb-30">
                    <h3>OUR VISSION</h3>
                    <p>Bakery provide how all this mistaken idea of denouncing pleasure and sing pain was born an will give you a ete account of the system, and expound the actual teangs of the eat explorer of the truth.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="goal-wrapper mb-30">
                    <h3>OUR MISSION</h3>
                    <p>Bakery provide how all this mistaken idea of denouncing pleasure and sing pain was born an will give you a ete account of the system, and expound the actual teangs of the eat explorer of the truth.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="goal-wrapper mb-30">
                    <h3>OUR GOAL</h3>
                    <p>Bakery provide how all this mistaken idea of denouncing pleasure and sing pain was born an will give you a ete account of the system, and expound the actual teangs of the eat explorer of the truth.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonials area start -->
<div class="testimonials-area pt-100 pb-95 bg-img" style="background-image: url(assets/img/bg/7.jpg)">
    <div class="container">
        <div class="testimonials-active owl-carousel">
            <div class="single-testimonial-2 text-center">
                <img src="img/about3.jpg" alt="" style="width:150px;height:180px;border-radius:50%">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                <img src="assets/img/team/2.png" alt="">
                <h4>tayeb rayed</h4>
                <span>uiux Designer</span>
            </div>
        </div>
    </div>
</div>
<!-- testimonials area end -->

    
@endsection