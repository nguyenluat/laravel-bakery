@extends('layout.homes')

@section('homes')
 
 
 
 
 
 
<!-- header slider -->
<div class="slider-area">
    <div class="slider-active owl-carousel">
    @foreach ($baner as $bra)
        <div class="single-slider-4 slider-height-5 bg-img" style="background-image: url({{(url('uploads'))}}/{{$bra->image}}">
            <div class="container">
                <div class="slider-content-5 fadeinup-animated">
                    <h2 class="animated">{{$bra->title}}</h2>
                <p class="animated">{{$bra->content}}</p>
                    <a class="handicraft-slider-btn btn-hover animated" href="{{route('product')}}">Shop Now</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>

<!-- banner area start -->
<div class="banner-area pt-90 pb-160 fix">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="furits-banner-wrapper mb-30 wow fadeInLeft">
                    <img src="uploads/gallery4.jpg" alt="" style="width=370px;height:300px">
                    <div class="furits-banner-content">
                        <h4>Super Natural</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="furits-banner-wrapper mb-30 wow fadeInUp">
                    <img src="uploads/gallery8.jpg" alt="" style="width=370px;height:300px">
                    <div class="furits-banner-content">
                        <h4>KIWI Fresh</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="furits-banner-wrapper mb-30 wow fadeInRight">
                    <img src="uploads/gallery1.jpg" alt="" style="width=370px;height:300px">
                    <div class="furits-banner-content">
                        <h4>Pomegranate</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner area end -->

<!-- premium area start -->
<div class="catch-banner-area">
    <div class="container">
        <div class="catch-wrapper">
            <img src="img/index1.jpeg" alt="" >
            <div class="catch-content tilter-3">
                <h5>Get <span></span> Dicount</h5>
                <h2>CATCH</h2>
                <div class="catch-text-right">
                    <h5>Your Dream</h5>
                </div>
                <div class="catch-btn">
                <a class="discount-btn-2 btn-hover" href="{{route('product')}}">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- premium area end -->

<!-- discount area start -->
<div class="discount-area pt-70 pb-120">
    <div class="container">
            <div class="section-title-furits text-center mb-95">
            
                    <h2>Abouts Bakery News</h2>
                </div>
        <div class="row">
            
            <div class="ml-auto col-lg-7">
                <div class="discount-img pl-70">
                    <img src="assets/img/2.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-5">
                <div class="discount-details-wrapper">
                    <h5>Verified quality</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <h2>Summer Discount <br></h2>
                    <p class="discount-peragraph">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <a class="discount-btn btn-hover" href="{{route('about')}}">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- discount area end -->


<!--  product area start -->
<div class="popular-product-area wrapper-padding-3 pt-115 pb-115">
    <div class="container-fluid">
        <div class="section-title-6 text-center mb-50">
            <h2>Popular Product</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
        </div>
        <div class="product-style">
            <div class="popular-product-active owl-carousel">
                @foreach ($products as $pro)
                    
                <div class="product-wrapper">
                    <div class="product-img">
                        <a >
                        <img src="{{(url('uploads'))}}/{{$pro->image}}" alt="" style="width:300px;height:350px">
                        </a>
                        <div class="product-action">
                            <a class="animate-left" title="Wishlist" href="#">
                                <i class="pe-7s-like"></i>
                            </a>
                            <a class="animate-top" title="Add To Cart" onclick="AddCart({{$pro->id}})" href="javascript:">
                                <i class="pe-7s-cart"></i>
                            </a>
                            <a class="animate-right" title="Quick View" href="{{route('product_detail',$pro->id)}}">
                                <i class="pe-7s-look"></i>
                            </a>
                        </div>
                    </div>
                    <div class="funiture-product-content text-center">
                    <h4><a href="{{route('product_detail',$pro->id)}}">{{$pro->name}}</a></h4>
                    @if ($pro->sale_price > 0)
                        <s style="padding-right: 10px">$ {{$pro->price}}</s>
                        <span>${{$pro->price}}</span>
                    @else
                    <span>${{$pro->price}}</span>
                    @endif
                    </div>
                </div>

                @endforeach
                
            </div>
        </div>
    </div>
</div>
<!-- product area end --> 


<!-- discount area start -->
<div class="discount-area pr-205 gray-bg-4 pt-115 pb-90">
    <div class="discount-left text-center">
        <img class="tilter" src="img/iscount.jpg" alt="" style="width:680px;height:477px">
        <h4>Photo Realistic - Discount</h4>
        <a href="{{route('product')}}">Buy Now</a>
    </div>
    <div class="discount-right gray-bg-4">
        <div class="row no-gutters">
            <div class="col-lg-6 col-xl-6 col-md-12">
                <div class="new-top mr-15">
                    <h3 class="new-top-title">New Arrival</h3>
                    <div class="new-top-product">
                        @foreach ($ind_product as $ind_product)
                            
                        <div class="new-top-wrapper mb-50">
                            <div class="new-top-img">
                                <a href="#"><img src="{{(url('uploads'))}}/{{$ind_product->image}}" alt="" style="width:160px;height:190px;"></a>
                                <div class="discount-book-cart">
                                    <a class="animate-left add-style-2" title="Add To Cart" onclick="AddCart({{$ind_product->id}})" href="javascript:">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="new-top-content">
                                <h4><a href="{{route('product_detail',$ind_product->id)}}">{{$ind_product->name}}</a></h4>
                                
                                <div class="product-price">
                                    <div class="old-price">
                                        <span>${{$ind_product->sale_price}}<span>
                                    </div>
                                    <div class="new-price">
                                        <span>${{$ind_product->price}}</span>
                                    </div>
                                </div>
                                <div class="product-rating-3">
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 col-md-12">
                <div class="new-top ml-15">
                    <h3 class="new-top-title">Sky Fall</h3>
                    <div class="new-top-product">
                            @foreach ($ind_products as $ind_products)
                            
                            <div class="new-top-wrapper mb-50">
                                <div class="new-top-img">
                                    <a href="#"><img src="{{(url('uploads'))}}/{{$ind_products->image}}" alt="" style="width:160px;height:190px;"></a>
                                    <div class="discount-book-cart">
                                        <a class="animate-left add-style-2" title="Add To Cart" onclick="AddCart({{$ind_product->id}})" href="javascript:">
                                            <i class="ti-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="new-top-content">
                                    <h4><a href="{{route('product_detail',$ind_products->id)}}">{{$ind_products->name}}</a></h4>
                                    
                                    <div class="product-price">
                                        <div class="old-price">
                                            <span>${{$ind_products->sale_price}}<span>
                                        </div>
                                        <div class="new-price">
                                            <span>${{$ind_products->price}}</span>
                                        </div>
                                    </div>
                                    <div class="product-rating-3">
                                        <i class="pe-7s-star"></i>
                                        <i class="pe-7s-star"></i>
                                        <i class="pe-7s-star"></i>
                                        <i class="pe-7s-star"></i>
                                        <i class="pe-7s-star"></i>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- discount area end -->


<!-- testimonial area start -->
<div class="testimonial-area bg-img pt-110 pb-160" style="background-image: url(img/testimonial.jpg)" data-overlay="6">
    <div class="container">
        <h3>Client opinion about us</h3>
        <div class="testimonials-active pagination-style owl-carousel">
            <div class="single-testimonial-3 text-center">
                <img src="img/about3.jpg" alt="" style="width:200px;height:200px;border-radius:50%">
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>
                <h4>Dr. Khairul Vasher Arif</h4>
                <span>CEO of KB’s Kitchen</span>
            </div>
            <div class="single-testimonial-3 text-center">
                <img src="img/chef1.jpg" alt="" style="width:200px;height:200px;border-radius:50%">
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>
                <h4>Dr. Tayeb Rayed</h4>
                <span>CEO of KB’s Kitchen</span>
            </div>
            <div class="single-testimonial-3 text-center">
                <img src="img/chef2.jpg" alt="" style="width:200px;height:200px;border-radius:50%">
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>
                <h4>Dr. Tayeb Rayed</h4>
                <span>CEO of KB’s Kitchen</span>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial area end -->

<!-- blog area end -->
<div class="blog-area pt-130 pb-70">
    <div class="container">
        <div class="section-title-furits text-center mb-95">
            
            <h2>Recent Fruits News</h2>
        </div>
        <div class="row">
            @foreach ($blog as $set)

            <div class="col-lg-4 col-md-6">
                <div class="blog-wrapper mb-30 wow fadeInLeft">
                    <div class="blog-img-2">
                        <a href="{{route('blog_detail',$set->id)}}">
                            <img alt="" src="{{(url('uploads'))}}/{{$set->image}}" >
                        </a>
                    </div>
                    <div class="blog-info-wrapper-2 text-center">
                        <div class="blog-meta-2"></div>
                        <div class="blog-meta-2">
                            <ul>
                                <li>{{date_format($set->created_at,'d-m-Y')}}</li>
                            </ul>
                        </div>
                        <h3><a href="{{route('blog_detail',$set->id)}}">{{$set->name}}</a></h3>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- blog area end -->

<!-- newsletter area end -->
<div class="newsletter-area bg-img ptb-105" style="background-image: url(img/newsletter.jpg)">
    <div class="container">
        <div class="newsletter-wrapper">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="fruits-newsletter-title">
                        <span>Subscribe</span>
                        <h3>To Our Newsletter</h3>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <div id="mc_embed_signup" class="subscribe-form-furits f-right">
                        <form action="" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll" class="mc-form">
                                <input type="email" value="" name="EMAIL" class="email" placeholder="Enter Mail Address" required>
                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- newsletter area end -->


    
@endsection