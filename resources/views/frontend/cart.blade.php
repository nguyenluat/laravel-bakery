@if(Session::has("Cart") != null)

       @foreach (Session::get("Cart")->products as $item)
           
        <li class="single-product-cart spc_item_{{$item['productInfo']->id}}">
            <div class="cart-img">
                <a href="#"><img src="{{(url('uploads'))}}/{{$item['productInfo']->image}}" alt="" style="width:85px; height:100px"></a>
            </div>
            <div class="cart-title">
                <h5><a href="#">{{$item['productInfo']->name}}</a></h5>
                <h6><a href="#"></a></h6>
            <span>{{number_format($item['productInfo']->price) }}$ x {{$item['quanty']}}</span>
            </div>
            <div class="cart-delete">
                <i class="ti-trash" data-id="{{$item['productInfo']->id}}"></i>
            </div>
        </li>
        @endforeach
        <li class="cart-space">
        <div class="cart-sub">
            <h4>Subtotal</h4>
        </div>
        <div class="cart-price">
            <h4>${{number_format(Session::get("Cart")->totalPrice)}}</h4>
         </div>
        </li>

    @endif