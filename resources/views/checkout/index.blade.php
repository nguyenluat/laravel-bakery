
@extends('layout.homes')

@section('homes')

   <!-- header end -->
<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section" style="background-image: url(img/banner9.jpg)" >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-banner-content text-center">
                    <h1 class="fonesize">Checkout Page</h1>
                    <p>
                        <span><a href="{{route('index')}}">HOME</a></span>
                        <span class="ative">CHECKOUT PAGE</span>
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
<!-- checkout-area start -->
<div class="checkout-area ptb-100">
    <div class="container">
        <div class="row">
        @if (Session::has('success'))
                    <div class="container alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{Session::get('success')}}</strong>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="container alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong></strong>{{Session::get('error')}}
                    </div>
                @endif
        
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <form action="{{route('checkout.store')}}" method="POST">

                    @csrf
                    <div class="checkbox-form">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label for="name"> Name <span class="required">*</span></label>
                                    <input id="name" name="name" type="text" placeholder="Your Name"
                                    value="{{Auth::guard('cus')->user()->name}}" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label for="email">Email Address <span class="required">*</span></label>
                                    <input id="email" name="email" type="email" placeholder="Your Email" value="{{Auth::guard('cus')->user()->email}}"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label for="phone">Phone <span class="required">*</span></label>
                                    <input id="phone" name="phone" type="text" placeholder="Your Email" value="{{Auth::guard('cus')->user()->phone}}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input type="text" name="address" placeholder="Street address" value="{{Auth::guard('cus')->user()->address}}" />
                                </div>
                            </div>
                            
                        </div>
                        <div class="different-address">
                          
                            <div class="order-notes">
                                <div class="checkout-form-list mrg-nn">
                                    <label>Order Notes</label>
                                    <textarea id="checkout-mess" name="description" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                            <h3 class="pt-30">Payment Method</h3>
                          <div class="row">
                            <div class="col-12 mb-30">
                                <label for="d_country">Select payment method <span class="required">*</span></label>
                                <select id="d_country" name="payment_id">
                                  <option value="">Select a method</option>
                                  @foreach ($payments as $item)
                                      <option value="{{$item->id}}">{{$item->name}}</option>
                                      @endforeach
                                </select>
                                @error('payment_id')
                                <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
                                @enderror
                          </div>
                        </div>
                          <h3 class="pt-30">Delivery Method</h3>
                          <div class="row">
                            <div class="col-12 mb-30">
                                <label for="d_country">Select shiping method <span class="required">*</span></label>
                                <select id="d_country" name="ship_id">
                                  <option value="">Select a method</option>
                                  @foreach ($ships as $item)
                                      <option value="{{$item->id}}">{{$item->name}}</option>
                                      @endforeach
                                </select> 
                                @error('ship_id')
                                <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
                                @enderror
                          </div>
                      </div>
                      <div class="order-button-payment">
                            <input type="submit" value="Place order" />
                        </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="your-order">
                    <h3>Your order</h3>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(Session::has("Cart") != null)
                                @foreach(Session::get("Cart")->products as $item)
                                <tr class="cart_item">
                                    <td class="product-name">
                                        {{$item['productInfo']->name}} <strong class="product-quantity">X {{$item['quanty']}}</strong>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">${{number_format($item['productInfo']->price)}}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Cart Subtotal</th>
                                    <td><span class="amount">${{number_format(Session::get("Cart")->totalPrice)}}</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">${{number_format(Session::get("Cart")->totalPrice)}}</span></strong>
                                    </td>
                                </tr>
                                @endif
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div class="panel-group" id="faq">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><a data-toggle="collapse" aria-expanded="true" data-parent="#faq" href="#payment-1">Direct Bank Transfer.</a></h5>
                                    </div>
                                    <div id="payment-1" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><a class="collapsed" data-toggle="collapse" aria-expanded="false" data-parent="#faq" href="#payment-2">Cheque Payment</a></h5>
                                    </div>
                                    <div id="payment-2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><a class="collapsed" data-toggle="collapse" aria-expanded="false" data-parent="#faq" href="#payment-3">PayPal</a></h5>
                                    </div>
                                    <div id="payment-3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- checkout-area end -->
    
@endsection