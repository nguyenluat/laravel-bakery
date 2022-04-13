@extends('layout.homes')

@section('homes')

<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section" style="background-image: url(img/banner9.jpg)" >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-banner-content text-center">
                    <h1 class="fonesize">Shop Page</h1>
                    <p>
                        <span><a href="{{route('index')}}">HOME</a></span>
                        <span class="ative">SHOP PAGE</span>
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

<!-- product -->
<div class="shop-page-wrapper shop-page-padding ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop-sidebar mr-50">
                    <div class="sidebar-widget mb-40">
                        <h3 class="sidebar-title">Filter by Price</h3>
                        <div class="price_filter">
                        <form action="{{ route('searchPrice') }}" method="GET">
                            <div id="slider-range"></div>
                            <div class="price_slider_amount">
                                <div class="label-input">
                                    <label>price : </label>
                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                </div>
                                <button type="submit">Filter</button>
                            </div>
                        </form>
                        </div>
                    </div>
    
                    <div class="sidebar-widget mb-45">
                        <h3 class="sidebar-title">Categories</h3>
                        @foreach ($category as $cats)           
                            
                        <div class="sidebar-categories">
                            <ul>
                            <li><a href="{{url('products',$cats->id)}}">{{$cats->name}}</a></li>
                            </ul>
                        </div>

                        @endforeach
                    </div>
                    <div class="sidebar-widget mb-50">
                        <h3 class="sidebar-title">Top rated products</h3>
                        <div class="sidebar-top-rated-all">
                            @foreach ($set_products as $pros)
                        
                            <div class="sidebar-top-rated mb-30">
                                <div class="single-top-rated">
                                    <div class="top-rated-img" >
                                        <a ><img src="{{(url('uploads'))}}/{{$pros->image}}" alt="" style="width: 100px; height: 88px; }"></a>
                                    </div>
                                    <div class="top-rated-text">
                                    <h4><a href="{{route('product_detail',$pros->id)}}">{{$pros->name}}</a></h4>
                                        <div class="top-rated-rating">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                        @if ($pros->sale_price > 0)
                                            <s style="padding-right: 10px">$ {{$pros->price}}</s>
                                            <span>${{$pros->price}}</span>
                                        @else
                                            <span>${{$pros->price}}</span>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                           
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <!-- START ERROR SECTION -->
                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible ">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> {{Session::get('success')}}
                </div>
            @endif
        
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error!</strong> {{Session::get('error')}}
                </div>
            @endif

            @if (Session::has('warning'))
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error!</strong> {{Session::get('warning')}}
                </div>
            @endif
        <!-- END ERROR SECTION -->
                <div class="shop-product-wrapper res-xl">
                    <div class="shop-bar-area">
                        <div class="shop-bar pb-60">
                            <div class="shop-found-selector">
                                <div class="shop-found">
                                    <p><span>23</span> Product Found of <span>50</span></p>
                                </div>
                                
                            </div>
                            <div class="shop-filter-tab">
                                <div class="shop-tab nav" role=tablist>
                                    <a class="active" href="#grid-sidebar3" data-toggle="tab" role="tab" aria-selected="false">
                                        <i class="ti-layout-grid4-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="shop-product-content tab-content">
                            <div id="grid-sidebar3" class="tab-pane fade active show">
                                <div class="row">

                             @foreach($product as $pro)
                             @if($pro->check_category())
                            <div class="col-md-6 col-xl-4">
                                <div class="product-wrapper mb-30">
                                    <div class="product-img">
                                        <a href="#">
                                        <img src="{{(url('uploads'))}}/{{$pro->image}}" alt="" style="width: 300px;height: 300px;">
                                        </a>
                                        <div class="product-action">
                                            <a class="animate-left" title="Wishlist" href="#">
                                                <i class="pe-7s-like"></i>
                                            </a>
                                            <a class="animate-top" title="Add to Cart" onclick="AddCart({{$pro->id}})" href="javascript:">
                                                <i class="pe-7s-cart"></i>
                                            </a>
                                            <a class="animate-right" title="Quick View"  href="{{route('product_detail',$pro->id)}}">
                                                <i class="pe-7s-look"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                    <h4><a href="{{route('product_detail',$pro->id)}}"> {{$pro->name}}</a></h4>
                                    @if ($pro->sale_price > 0)
                                        <s style="padding-right: 10px">$ {{$pro->price}}</s>
                                        <span>${{$pro->price}}</span>
                                    @else
                                        <span>${{$pro->price}}</span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="pagination-style mt-50 text-center">
        <ul>
            <li>{{ $product->links()}}</li>
        </ul>
    </div>
</div>
<!-- end product -->



    
@endsection