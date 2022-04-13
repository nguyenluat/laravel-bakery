
@extends('layout.homes')

@section('homes')

<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section" style="background-image: url(img/banner9.jpg)" >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-banner-content text-center">
                    <h1 class="fonesize">Product_detail Page</h1>
                    <p>
                        <span><a href="{{route('index')}}">HOME</a></span>
                        <span class="ative">PRODUCT_DETAIL PAGE</span>
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
<div class="product-details ">
    <div class="container">
        <div class="row">
                <div class="col-md-12 col-lg-7 col-12">
                    <div class="product-details-imgcollection-content">
                        <div class="product-details-tab mr-70">
                            <div class="product-details-large tab-content">
                                @if($imgLists!=null)
                                <?php $k=0; ?>
                                @foreach ($imgLists  as $item)                             
                                    <div class="tab-pane fade <?php if($k==0){ echo "active show";}  ?>" id="pro-details_{{$loop->index+1}}" role="tabpanel">
                                        <div class="easyzoom easyzoom--overlay">
                                            <a >
                                                <img src="{{(url('uploads'))}}/{{$item}}" alt="" style="max-width:600px;max-height:656px; width: auto;
                                                height: auto;">
                                            </a>
                                        </div>
                                    </div>
                                    <?php $k=9; ?>
                                
                                @endforeach
                                    @else
                                        <div class="tab-pane fade active show" id="pro-details_1" role="tabpanel">
                                        <div class="easyzoom easyzoom--overlay">
                                            <a >
                                                <img src="{{(url('uploads'))}}/{{$item}}" alt="" style="max-width:600px;max-height:656px; width: auto;
                                                height: auto;">
                                            </a>
                                        </div>
                                    </div>
                            </div>
                            
                                @endif
                                <?php $o=0; ?>
                            <div class="product-details-small nav mt-12" role=tablist>
                                @if($imgLists!=null)
                                    @foreach ($imgLists  as $item)
                                <a class="mr-12 <?php if($o==0){echo "active";} ?>" href="#pro-details_{{$loop->index+1}}"data-toggle="tab" role="tab" aria-selected="<?php if($o==0){echo "true";}else{echo "false";} ?>">
                                    <img src="{{(url('uploads'))}}/{{$item}}" alt="" style="width:141px; height:135px; object-fit: cover;">
                                </a>
                                <?php $o=60; ?>
                                @endforeach
                                @else
                                    <a class="mr-12 active" href="#pro-details_1"data-toggle="tab" role="tab" aria-selected="true">
                                    <img src="{{(url('img'))}}/{{$item}}" alt="" style="width:141px; height:135px; object-fit: cover;">
                                </a>
                                @endif
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5 col-12">
                    <div class="product-details-content">
                        <h3>{{$prodetail->name}}</h3>
                        <div class="rating-number">
                            <div class="quick-view-rating">
                                <i class="pe-7s-star red-star"></i>
                                <i class="pe-7s-star red-star"></i>
                                <i class="pe-7s-star"></i>
                                <i class="pe-7s-star"></i>
                                <i class="pe-7s-star"></i>
                            </div>
                            <div class="quick-view-number">
                                <span>2 Ratting (S)</span>
                            </div>
                        </div>
                        <div class="details-price">
                            <span>${{number_format($prodetail->price)}}</span>
                        </div>
                        <p>{!!$prodetail->description!!}</p>
                        <div class="quickview-plus-minus">
                            <form action="{{url('viewcart')}}" method="POST" style="display: contents">
                                @csrf
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="quantity" value="1" id="quantityProduct">
                                </div>
                                <div class="quickview-btn-cart">
                                    <button type="button" class="btn-hover-black"  style="background-color: #000;
                                    color: #fff;
                                    display: inline-block;
                                    font-weight: 600;
                                    letter-spacing: 0.08px;
                                    line-height: 1;
                                    padding: 17px 35px;
                                    position: relative;
                                    text-transform: uppercase;
                                    z-index: 5;" onclick="addProductToCart({{$prodetail->id}})">add to cart</button>
                                </div>
                            </form>
                            <div class="quickview-btn-wishlist">
                                <a class="btn-hover" href="#"><i class="pe-7s-like"></i></a>
                            </div>
                        </div>
                        <div class="product-details-cati-tag mt-35">
                            <ul>
                                <li class="categories-title">Categories Product:</li>
                                <li><a href="#">Cake</a></li>
                                <li><a href="#">bake</a></li>
                                <li><a href="#">Breads</a></li>
                                <li><a href="#">food</a></li>
                                <li><a href="#">Pastry</a></li>
                            </ul>
                        </div>
                        <div class="product-details-cati-tag mtb-10">
                            <ul>
                                    <li><a href="#">Cake news</a></li>
                                    <li><a href="#">bake big</a></li>
                                    <li><a href="#">Breads smail</a></li>
                                    <li><a href="#">food full</a></li>
                                    <li><a href="#">Pastry</a></li>
                            </ul>
                        </div>
                        <div class="product-share">
                            <ul>
                                <li class="categories-title">Share :</li>
                                <li>
                                    <a href="#">
                                        <i class="icofont icofont-social-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icofont icofont-social-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icofont icofont-social-pinterest"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icofont icofont-social-flikr"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                 </div>
                
        </div>
    </div>
</div>
<div class="product-description-review-area pb-90">
    <div class="container">
        <div class="product-description-review text-center">
            <div class="description-review-title nav" role=tablist>
                <a class="active" href="#pro-dec" data-toggle="tab" role="tab" aria-selected="true">
                        Description
                    </a>
                <a href="#pro-review" data-toggle="tab" role="tab" aria-selected="false">
                        Reviews 
                    </a>
            </div>
            <div class="description-review-text tab-content">
                <div class="tab-pane active show fade" id="pro-dec" role="tabpanel">
                    <p>{!!$prodetail->description!!}</p>
                </div>
                <div class="tab-pane fade" id="pro-review" role="tabpanel">
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=1035256920224448&autoLogAppEvents=1" nonce="VVLaFvzw"></script>
                    <div class="fb-comments" data-href="{{Request::url('product_detail') }}"     data-numposts="5" data-width=""></div>
            {{-- </div> --}}
        </div>
    </div>
</div>
</div>
<!-- product area start -->
<div class="product-area pb-95">
    <div class="container">
        <div class="section-title-3 text-center mb-50">
            <h2>Related products</h2>
        </div>
        <div class="product-style">
            <div class="related-product-active owl-carousel">
                @foreach ($product_related as $rela)
  
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="#">
                            <img src="{{(url('uploads'))}}/{{$rela->image}}" alt="" style="width: 312px;
                            height: 400px;">
                        </a>
                        <div class="product-action">
                            <a class="animate-left" title="Wishlist" href="#">
                                <i class="pe-7s-like"></i>
                            </a>
                            <a class="animate-top" title="Add To Cart" href="#">
                                <i class="pe-7s-cart"></i>
                            </a>
                            <a class="animate-right" title="Quick View" href="{{route('product_detail',$rela->id)}}">
                                <i class="pe-7s-look"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h4><a >{{$rela->name}}</a></h4>
                        <span>${{number_format($rela->price)}}</span>
                    </div>
                </div>
                  
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- product area end-->



    
@endsection

@section('myScript')
    <script >
        function addProductToCart(id){
            quantity=$('#quantityProduct').val();
            $.ajaxSetup({
            headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            $.ajax({
                type: "POST",
                url: "viewcartpost",
                data: {
                    'id':id,
                    'quantity':parseInt(quantity)
                }
            }).done(function(response){  
        //     $("#change-item-cart").empty();
        // $("#change-item-cart").html(response);       
            RenderCart(response);
            alertify.success('Added to cart successfully');
        });

        }
    </script>
@endsection