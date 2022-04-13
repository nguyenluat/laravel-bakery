
@extends('layout.homes')

@section('homes')

<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section" style="background-image: url(img/banner9.jpg)" >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-banner-content text-center">
                    <h1 class="fonesize">Viewcart Page</h1>
                    <p>
                        <span><a href="{{route('index')}}">HOME</a></span>
                        <span class="ative">VIEWCART PAGE</span>
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
<div class="cart-main-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="cart-heading">Cart</h1>
                <form action="#">
                    <div class="col-lg-12" id="list-cart">
                            <div class="table-content table-responsive" >
                                <table>
                                    <thead>
                                        <tr>
                                            
                                            <th>images</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Update</th>
                                            <th>remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(Session::has("Cart") != null)
                                        @foreach(Session::get("Cart")->products as $item)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a><img src="{{(url('uploads'))}}/{{$item['productInfo']->image}}" alt="" style="width:85px; height:100px"></a>
                                            </td>
                                            <td class="product-name"><a href="#">{{$item['productInfo']->name}}</a></td>
                                            <td class="product-price-cart"><span class="amount">${{number_format($item['productInfo']->price)}}</span></td>
                                            <td class="product-quantity">
                                                <input id="quanty-item-{{$item['productInfo']->id}}" value="{{$item['quanty']}}" type="number" min="1">
                                            </td>
                                            <td class="product-subtotal">${{number_format($item['price'])}}</td>
                                            <td class="product-upload">
                                            <i  onclick="SaveItemviewCart({{$item['productInfo']->id}});" class="pe-7s-refresh-2" ></i>
                                            </td>
                                            <td class="product-remove">
                                            <i class="pe-7s-close" onclick="DeleteItemviewCart({{$item['productInfo']->id}});"></i>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                        @endif
                                    
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                @if(Session::has("Cart") != null)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="coupon-all">
                                        <div class="coupon">
                                            <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                            <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                        </div>
                                        <div class="coupon2">
                                            <input class="button" href="{{url('frontend.cart')}}" method="POST" name="update_cart update-all" value="Update cart" type="submit">
                                        </div>
                                    </div>
                                </div>
                                {{-- @endif --}}
                            </div>
                            <div class="row">
                                    {{-- @if(Session::has("Cart") != null) --}}
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Cart totals</h2>
                                        
                                        <ul>
                                            <li>Total Quantity<span>{{Session::get("Cart")->total_quantity()}}</span></li>
                                            <li>Total Price<span>${{number_format(Session::get("Cart")->total_price())}}</span></li>
                                        </ul>
                                    <a href="{{route('checkout.index')}}">Proceed to checkout</a>
                                      
                                    </div>
                                </div>
                                @endif
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    
@endsection

