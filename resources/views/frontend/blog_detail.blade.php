
@extends('layout.homes')

@section('homes')

<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section" style="background-image: url(img/banner9.jpg)" >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-banner-content text-center">
                    <h1 class="fonesize">Blog_detail Page</h1>
                    <p>
                        <span><a href="{{route('index')}}">HOME</a></span>
                        <span class="ative">BLOG_DETAIL PAGE</span>
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
<div class="blog-details pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-details-info">
                    <div class="blog-meta">
                        <ul>
                        </ul>
                    </div>
                    <h3>{{$blog->name}} </h3>
                    <li>{{date_format($blog->created_at,'d-m-Y')}}</li>
                    <img src="{{(url('uploads'))}}/{{$blog->image}}" alt="">
                    
                    <div class="blog-feature">
                        <p>{!!$blog->description!!}</p>
                    </div>
                </div>
               
                <div class="blog-replay-wrapper">
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=1035256920224448&autoLogAppEvents=1" nonce="VVLaFvzw"></script>
                    <div class="fb-comments" data-href="{{Request::url('blog_detail')}}"     data-numposts="5" data-width=""></div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection