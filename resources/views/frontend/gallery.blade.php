@extends('layout.homes')

@section('homes')

<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section" style="background-image: url(img/banner9.jpg)" >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-banner-content text-center">
                    <h1 class="fonesize">Gallery Page</h1>
                    <p>
                        <span><a href="{{route('index')}}">HOME</a></span>
                        <span class="ative">GALLERY PAGE</span>
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
<div class="product-details pt-100 pb-80">
    <div class="about-banner-area pb-65">
        <div class="container">
            <div class="row">

                @foreach ($gallery as $ga)
                    

                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="banner-wrapper-4 mb-30">
                    <a ><img src="{{(url('uploads'))}}/{{$ga->image}}" alt="" style="width:375px; height:280px;"></a>
                    </div>
                </div>

                @endforeach
                
            </div>
        </div>
    </div>
</div>


@endsection