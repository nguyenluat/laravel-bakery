@extends('layout.homes')

@section('homes')
    <!--START PAGE BANNER SECTION -->
    <div class="page-banner-section section mb-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-banner-content text-center">
                        <h1>Product Page</h1>
                        <p>
                         <span><a href="{{route('index')}}">HOME</a></span>
                         <span class="ative">PRODUCT PAGE</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-banner-social">
            <p> Share this page:</p>
            <div class="social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>
     <!-- END PAGE BANNER SECTION -->

<style>
    .price-start::after{
        content: "-";
    }
    .price-end,.price-start{
     display: flex;
    }
    .price-end{
        padding-left: 10px;
    }
    .sortby-icons{
        margin-top: 8px;
    margin-left: 4px;
    }
    .sortby-icons a{
        border: 1px solid #e2e0dc;
    padding: 11px;
    margin-left: 5px;
    }
    .sortby-left{
        float: right;

    }
    .sortby-content{
    float: right;
    display: flex;
  }
  .select-menu{
      width: 200px;
      padding-left: 10px; 
  }
</style>
     <!-- PAGE SECTION START -->
     <div class="page-section section pb-30">
        <div class="container">
            <div class="row">
                <!-- Isotop Product Filter -->
                <div class="isotope-product-filter col-8">
                    <a href="{{route('product')}}" class="active" data-filter="*">all</a>
                    <a href="#">
                            Products Found
                        <span>{{count($s_product)}}</span>
                    </a>
                </div>
                <!-- Product Filter Toggle -->
                <div class="col-4">
                    <button class="product-filter-toggle">filter</button>
                </div>
            </div>

            <!-- Product Filter Wrapper -->
            <div class="row">
                <div class="col-12">
                    <div class="product-filter-wrapper">
                        <div class="row">
                            <!-- Product Filter -->
                            <div class="product-filter col-md-3 col-sm-6 co-12 mb-30">
                                <h5>Sort by</h5>
                                <ul class="sort-by">
                                    <li><a href="#">Default</a></li>
                                    <li><a href="#">Popularity</a></li>
                                    <li><a href="#">Average rating</a></li>
                                    <li><a href="#">Newness</a></li>
                                    <li><a href="#">Price: Low to High</a></li>
                                    <li><a href="#">Price: High to Low</a></li>
                                </ul>
                            </div>
                            <!-- Product Filter -->
                            <div class="product-filter col-md-3 col-sm-6 co-12 mb-30">
                                <h5>product tags</h5>
                                <div class="product-tags">
                                    <a href="#"><span>New</span></a>
                                    <a href="#"><span>brand</span></a>
                                    <a href="#"><span>Lorem</span></a>
                                    <a href="#"><span>ipsum</span></a>
                                    <a href="#"><span>dolor</span></a>
                                    <a href="#"><span>sit</span></a>
                                    <a href="#"><span>amet</span></a>
                                </div>
                            </div>
                            <!-- Product Filter -->
                            <div class="product-filter col-md-3 col-sm-6 co-12 mb-30">
                                <h5>Filter by price</h5>
                                <div id="price-range"></div>
                                <form action="{{route('searchPricer')}}">
                                    <div class="price-values" style="display: flex">
                                        <span>Price:</span>
                                            <div class="price-start">
                                                <input type="text" name="price_amount_start" style="width: 30px;" class="price-amount-start">
                                            </div>
                                            <div class="price-end">
                                                <input type="text" name="price_amount_end" class="price-amount-end">
                                            </div>
                                                <button type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Product Filter -->
                            <div class="product-filter col-md-3 col-sm-6 co-12 mb-30">
                                <h5>Banner filters</h5>
                                <img src="{{url('public/bakery_cake')}}/img/banner/4.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row product-sort">
                <div class="col-lg-6 col-md-4 col-sm-12 col-12">
                   <h6>Showing 1-12 of 24 results</h6>
               </div>
               <div class="col-lg-6 col-md-8 col-sm-12 col-12">
                <div class="sortby-content">
                    <div class="sortby-left" >
                        <h6 class="text-right" style="">Sort by:</h6>
                    </div>
                    <form action="" id="form-sortby" method="GET">
                        <div class="select-menu" >
                            <select name="sortby" class="sortby"  style=" padding: 10px 20px;width: 100%;">
                            <option value="">Select</option>
                            <option value="df">Default</option>
                            <option value="a_z">From A->Z</option>
                            <option value="z_a">From Z->A</option>
                            <option value="asc">Price: Low To High</option>
                            <option value="dsce">Price: High To Low </option>
                            </select>
                        </div>
                    </form>
                    <div class="sortby-icons" >
                        <a href=""><i class="fa fa-th-list" aria-hidden="true"></i></a>
                        <a href=""><i class="fa fa-th" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="isotope-grid row">
            @foreach ($s_product as $pro)
                <!-- product-item product-item-2 start -->
                <div class="isotope-item cake-1 home-decor col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-50">
                    <div class="product-item product-item-2 text-center">
                        <!-- Product Image -->
                        <div class="product-img">
                            <!-- Image -->
                            <a class="image" href="{{route('product_type',['slug' => $pro->slug])}}"><img src="{{url('public/uploads/product')}}/{{$pro->image}}" alt=""/></a>
                            <!-- Action Button -->
                            <div class="action-btn-2">
                                <a href="{{route('cart.add',['id' => $pro->id])}}" title="Add to Cart" class=""><i class="fa fa-shopping-cart"></i></a>
                                <a href="{{route('product_type',['slug' => $pro->slug])}}" ><i class="fa fa-eye"></i></a>
                                <a class="wishlist " href="#" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                            </div>
                        </div>
                        <!-- Portfolio Info -->
                        <div class="product-info">
                            <!-- Title -->
                            <h5 class="title"><a href="{{route('product_type',['slug' => $pro->slug])}}">{{$pro->name}}</a></h5>
                            <!-- Price -->
                            <div class="price-ratting fix">
                                @if ($pro->sale_price > 0)
                                    <span class="price">
                                        <s style="padding-right: 10px">$ {{$pro->price}}</s>
                                        <span class="new">$ {{$pro->sale_price}}</span>
                                    </span>
                                @else
                                    <span class="price"><span class="new">$ {{$pro->price}}</span></span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            <!-- product-item product-item-2 end -->
            @endforeach
        </div>
        <!-- Pagination -->
        <div class="pagination-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul class="pagination justify-content-center">
                          <li class="page-item"><a class="page-link" href="#" style="border-radius: 0 "><i class="fa fa-angle-double-left"></i></a></li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item"><a class="page-link" href="#">4</a></li>
                          <li class="page-item"><a class="page-link" href="#" style="border-radius: 0 "><i class="fa fa-angle-double-right"></i></a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
    </div>
     </div>
    <!-- PAGE SECTION END -->
@endsection
@section('price-range')
    <script>
        $('#price-range').slider({
        range: true,
        min: 10,
        max: 150,
        values: [ 20,100 ],
        slide: function( event, ui ) {
            
            $('.price-amount-start').val( ui.values[ 0 ] );
            $('.price-amount-end').val(ui.values[ 1 ] );
            
        }
        });
        $('.price-amount-start').val($('#price-range').slider( 'values', 0 ) );
        $('.price-amount-end').val($('#price-range').slider('values', 1 ) );
    </script>
@endsection
@section('sort-by')
    <script>
        $(function () {
            $('.sortby').change(function(){
                $("#form-sortby").submit();
            });
        });
    </script>
@endsection