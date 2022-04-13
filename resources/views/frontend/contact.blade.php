
@extends('layout.homes')

@section('homes')

<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section" style="background-image: url(img/banner9.jpg)" >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-banner-content text-center">
                    <h1 class="fonesize">Contact Page</h1>
                    <p>
                        <span><a href="{{route('index')}}">HOME</a></span>
                        <span class="ative">CONTACT PAGE</span>
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
<!-- shopping-cart-area start -->
<div class="contact-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="contact-map-wrapper">
                    
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.657475611048!2d105.78126221473262!3d21.04638699255271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab32dd484c53%3A0x4201b89c8bdfd968!2zMjM4IEhvw6BuZyBRdeG7kWMgVmnhu4d0LCBD4buVIE5odeG6vywgQ-G6p3UgR2nhuqV5LCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1595911957624!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                   
                    <div class="contact-message">
                        <div class="contact-title">
                            <h4>Contact Information</h4>
                        </div>
                        <form id="contact-form" class="contact-form" action="assets/mail.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="contact-input-style mb-30">
                                        <label>Name*</label>
                                        <input name="name" required="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-input-style mb-30">
                                        <label>Email*</label>
                                        <input name="email" required="" type="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-input-style mb-30">
                                        <label>Telephone</label>
                                        <input name="telephone" required="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-input-style mb-30">
                                        <label>subject</label>
                                        <input name="subject" required="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-textarea-style mb-30">
                                        <label>Comment*</label>
                                        <textarea class="form-control2" name="message" required=""></textarea>
                                    </div>
                                    <button class="submit contact-btn btn-hover" type="submit">
                                            Send Message 
                                        </button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-info-wrapper">
                    <div class="contact-title">
                        <h4>Location & Details</h4>
                    </div>
                    <div class="contact-info">
                        <div class="single-contact-info">
                            <div class="contact-info-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="contact-info-text">
                                <p><span>Address:</span> 238-Hoang quoc viet-Cau giay-Ha Noi </p>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="contact-info-icon">
                                <i class="pe-7s-mail"></i>
                            </div>
                            <div class="contact-info-text">
                                <p><span>Email: </span> bakery@gmail.com</p>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="contact-info-icon">
                                <i class="pe-7s-call"></i>
                            </div>
                            <div class="contact-info-text">
                                <p><span>Phone: </span>+093567888</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- shopping-cart-area end -->

    
@endsection