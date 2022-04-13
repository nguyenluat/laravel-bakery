
@extends('layout.homes')

@section('homes')

    <!-- header end -->
<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section" style="background-image: url(img/banner9.jpg)" >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-banner-content text-center">
                    <h1 class="fonesize">Blog Page</h1>
                    <p>
                        <span><a href="{{route('index')}}">HOME</a></span>
                        <span class="ative">BLOG PAGE</span>
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
<div class="blog-area pt-95 pb-100">
    <div class="container">
        <div class="blog-mesonry">
            <div class="row grid">
                @foreach ($blog as $blo)

                <div class="col-lg-6 col-md-6 grid-item">
                    <div class="blog-wrapper mb-40">
                        <div class="blog-img">
                        <a href="{{route('blog')}}"><img src="{{(url('uploads'))}}/{{$blo->image}}" alt=""></a>
                        </div>
                        <div class="blog-info-wrapper">
                            <div class="blog-meta">
                                <ul>
                                    {{-- <li>{{date_format($blo->created_at,'d-m-Y')}}</li> --}}
                                </ul>
                            </div>
                            <h4><a href="{{route('blog_detail',$blo->id)}}">{{$blo->name}}</a></h4>
                            <li>{{date_format($blo->created_at,'d-m-Y')}}</li>
                        <p>{{$blo->content}}</p>
                        <a class="blog-btn btn-hover" href="{{route('blog_detail',$blo->id)}}">Read More</a>
                        </div>
                    </div>
                </div>
                                            
                @endforeach
                
            </div>
        </div>
        <div class="pagination-style mt-50 text-center">
            <ul>
                <li>{{ $blog->links()}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- shopping-cart-area end -->
@endsection