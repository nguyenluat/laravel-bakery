<!doctype html>
<html class="no-js" lang="en">

<head>

    <meta charset="utf-8">
    <base href="{{asset('')}}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bake</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- all css here -->
    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/icofont.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/easyzoom.css">
    <link rel="stylesheet" href="assets/css/bundle.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    {{-- <meta property="fb:app_id" content="1035256920224448"/> --}}
</head>

<body>
   
<!-- header start -->
<header>
    <div class="header-bottom wrapper-padding-2 res-header-sm">
        <div class="header-top-wrapper theme-bg-2">
            <div class="container">
                <div class="header-top">
                    <div class="header-info">
                        <span>Contact us - 093567888  or  <a href="#">bakery@gmail.com</a></span>
                    </div>
                    <div class="book-login-register">
                        <ul>

                            @if(Auth::guard('cus')->check())
                           
                                <li><a href="{{route('customer.profile')}}"><i class="fa fa-user"></i> {{ Auth::guard('cus')->user()->name}}</a></li>
                                <li><a href="{{route('customer.logout')}}">Logout <i class="fa fa-sign-out"></i>
                                  </a></li>
                                @else
                                <li>
                                    <a href="{{route('customer.login')}}"><i class="ti-user"></i>login</a>
                                </li>
                            <li>
                                <a href="{{route('customer.register')}}"><i class="ti-settings"></i>register</a>
                            </li>
                            
                            @endif
                            <li><a href="#"><i class="ti-heart"></i>wishlist</a></li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="header-bottom-wrapper">
                <div class="logo-2 ptb-50">
                    <a href="{{route('index')}}">
                        <img src="assets/img/logo/logo-0.png" alt="">
                    </a>
                </div>
                <div class="menu-style-2 handicraft-menu menu-hover">
                    <nav>
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('about')}}">About</a></li>
                            <li><a href="{{route('product')}}">Shop</a></li>
                            <li><a href="{{route('gallery')}}">Gallery</a></li>
                            <li><a href="{{route('blog')}}">blog</a></li>
                            <li><a href="{{route('contact')}}">contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="handicraft-search-cart">
                    <div class="handicraft-search">
                        <button class="search-toggle">
                                    <i class="pe-7s-search s-open"></i>
                                    <i class="pe-7s-close s-close"></i>
                                </button>
                        <div class="handicraft-content">
                            <form action="{{route('searchpro')}}" method="GET">
                                <input placeholder="Search" name="key" type="text">
                            </form>
                        </div>
                    </div>
                    <div class="header-cart-4">
                    <a class="icon-cart" href="{{url('viewcart')}}">
                            <i class="ti-shopping-cart"></i>
                            @if(Session::has("Cart") != null)
                            <span class="handicraft-count" id="total-quanty-show"> {{Session::get("Cart")->total_quantity()}} </span>
                            @else
                            <span class="handicraft-count" id="total-quanty-show"> 0 </span>
                            @endif
                        </a>
                        <ul class="cart-dropdown">
                            <div id="change-item-cart">
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
                                    <i class="ti-trash" data-id="{{$item['productInfo']->id}}" ></i>
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
                            </div>
                            <li class="cart-btn-wrapper">
                            <a class="cart-btn btn-hover" href="{{url('viewcart')}}">view cart</a>
                            <a class="cart-btn btn-hover" href="{{url('checkout/index')}}">checkout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mobile-menu-area handicraft-menu d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                                <li><a href="{{route('index')}}">Home</a></li>
                                <li><a href="{{route('about')}}">About</a></li>
                                <li><a href="{{route('product')}}">Shop</a></li>
                                <li><a href="{{route('gallery')}}">Gallery</a></li>
                                <li><a href="{{route('blog')}}">blog</a></li>
                                <li><a href="{{route('contact')}}">contact</a></li>
                        </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->



 @yield('homes')

<!-- footer -->
<footer class="footer-area fruits-footer">
    <div class="food-footer-bottom pt-80 pb-70 black-bg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="footer-widget">
                        <div class="food-about">
                            <a href="#"><img src="assets/img/logo/footer.png" alt=""></a>

                            <div class="food-about-info">
                                <p>Fresh Fruits Online Shop.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="footer-widget mt-50">
                        <h3 class="footer-widget-title-6">Contacts</h3>
                        <div class="food-info-wrapper">
                            <div class="food-address">
                                <div class="food-info-icon">
                                    <i class="pe-7s-map-marker"></i>
                                </div>
                                <div class="food-info-content">
                                    <p>238-Hoang quoc viet-Cau giay-Ha Noi</p>
                                </div>
                            </div>
                            <div class="food-address">
                                <div class="food-info-icon">
                                    <i class="pe-7s-call"></i>
                                </div>
                                <div class="food-info-content">
                                    <p>+093567888 </p>
                                </div>
                            </div>
                            <div class="food-address">
                                <div class="food-info-icon">
                                    <i class="pe-7s-chat"></i>
                                </div>
                                <div class="food-info-content">
                                    <p><a href="#">bakery@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="footer-widget mt-50">
                        <h3 class="footer-widget-title-6">Information</h3>
                        <div class="food-widget-content">
                            <ul>
                                <li>
                                    <a href="{{route('about')}}"><img src="assets/img/icon-img/41.png" alt=""> About</a>
                                </li>
                                <li>
                                    <a href="{{route('contact')}}"><img src="assets/img/icon-img/41.png" alt="">Contact</a>
                                </li>
                                <li>
                                <a href="{{route('gallery')}}"><img src="assets/img/icon-img/41.png" alt="">Gallery</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="footer-widget food-widget mt-50">
                        <h3 class="footer-widget-title-6">Google map</h3>
                        <div class="food-widget-content">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.657475611048!2d105.78126221473262!3d21.04638699255271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab32dd484c53%3A0x4201b89c8bdfd968!2zMjM4IEhvw6BuZyBRdeG7kWMgVmnhu4d0LCBD4buVIE5odeG6vywgQ-G6p3UgR2nhuqV5LCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1595911957624!5m2!1svi!2s" width="270px" height="210px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="food-copyright black-bg-6 ptb-30">
        <div class="container text-center">
            <p>Copyright © <a href=""> Bakery</a> 2020 . All Right Reserved.</p>
        </div>
    </div>
</footer>





<!-- all js here -->
<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
<script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/ajax-mail.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMlLa3XrAmtemtf97Z2YpXwPLlimRK7Pk"></script>
<script src="assets/js/min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/alertify.min.js"></script>
<link rel="stylesheet" href="assets/css/new/alertify.min.css">
<link rel="stylesheet" href="assets/css/new/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/new/default.min.css">
<link rel="stylesheet" href="assets/css/new/semantic.min.css">

<script>
   function AddCart(id){
        console.log(id);
        $.ajax({
            url: 'Add-Cart/'+id,
            type: 'GET',
        }).done(function(response){  
        //     $("#change-item-cart").empty();
        // $("#change-item-cart").html(response);       
            RenderCart(response);
            alertify.success('Added to cart successfully');
        });
    }
</script>
<script>
    function RenderCart(response){
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        //$("#total-quanty-show").text($("#total-quanty-cart").val());
    }
</script>


<script>
        $("#change-item-cart").on("click",".cart-delete i", function(){  
            console.log($(this).data("id"));
            tag='.spc_item_'+$(this).data("id");
            $(tag).remove();
            DeleteItemCart($(this).data("id"));
            });
        
</script>

<script>
     function DeleteItemCart(id){
        $.ajax({
            url: 'Delete-Item-Cart/'+id,
            type: 'GET',
        }).done(function(response){  
            RenderListCart(response);       
            alertify.success('Delete to cart successfully');
        });
    }
</script>
<script>


   // viewcart
    function DeleteItemviewCart(id){
        $.ajax({
            url: 'Delete-Item-viewCart/'+id,
            type: 'GET',
        }).done(function(response){  
            RenderListCart(response);       
            alertify.success('Delete to viewcart successfully');
           
        });
    }
    function RenderListCart(response){
        $("#list-cart").empty();
        $("#list-cart").html(response);
    }
</script>
<script>
        function SaveItemviewCart(id){
            
            $("#quanty-item-"+id).val();
            
            $.ajax({
                url: 'Save-Item-viewCart/'+id+'/'+$("#quanty-item-"+id).val(),
                type: 'GET',
            }).done(function(response){  
                RenderListCart(response);       
                alertify.success('Update to viewcart successfully');
                location.reload();
            });
        
        }
        
</script>
{{-- search --}}
<script type="text/javascript">
    $('#search').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
    type : 'get',
    url : '{{URL::to('search')}}',
    data:{'search':$value},
    success:function(data){
    $('tbody').html(data);
    }
    });
    })
</script>
<script type="text/javascript">
$   .ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@yield('myScript')


</body>

</html>