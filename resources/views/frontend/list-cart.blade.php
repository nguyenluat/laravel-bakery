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
                        <a href="#"><img src="{{(url('uploads'))}}/{{$item['productInfo']->image}}" alt="" style="width:85px; height:100px"></a>
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
                    <input class="button" name="update_cart" value="Update cart" type="submit">
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
                    <li>Total Quantity<span>{{Session::get("Cart")->totalQuanty}}</span></li>
                    <li>Total Price<span>${{number_format(Session::get("Cart")->totalPrice)}}</span></li>
                </ul>
            <a href="{{route('checkout')}}">Proceed to checkout</a>
              
            </div>
        </div>
        @endif
    </div>