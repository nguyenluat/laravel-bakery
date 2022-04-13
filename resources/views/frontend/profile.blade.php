@extends('layout.homes')

@section('homes')
<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section" style="background-image: url(img/banner9.jpg)" >
  <div class="container">
      <div class="row">
          <div class="col-12">
              <div class="page-banner-content text-center">
                  <h1 class="fonesize">USE Page</h1>
                  <p>
                      <span><a href="{{route('index')}}">HOME</a></span>
                      <span class="ative">USE PAGE</span>
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

<div class="register-area ptb-100">
    <div class="container-fluid">
    <!-- START ERROR SECTION -->
    
<!-- END ERROR SECTION -->

         
<div class="container">
    <div class="row">
      <div class="col-md-6 img">
        <img src="{{url('assets')}}/img/author/2.png"  alt="" class="img-rounded">
      </div>
      <div class="col-md-6 details">
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
        <blockquote>
          <h1 class="">Information</h1>
            @if(Auth::guard('cus')->check())
            <p>User Name: {{Auth::guard('cus')->user()->name}}</p>
            <p>Email: {{Auth::guard('cus')->user()->email}}</p>
            <p>Phone: {{Auth::guard('cus')->user()->phone}}</p>
            <p>Address: {{Auth::guard('cus')->user()->address}}</p>
            @endif   
          <div class="info-use">
              <a style="background: #242424;text-align: center;color: #FFF; float: left;" class="nav-link" 
              href="{{route('customer.updateInfo',Auth::guard('cus')->user()->id)}}">
              update <i class="fa fa-pencil-square-o"></i>
              </a>
              <a style="background: #242424;text-align: center;color: #FFF; float: left;margin: 0px 30px;" class="nav-link" 
              href="{{route('customer.updatePass',Auth::guard('cus')->user()->id)}}">
              password <i class="fa fa-pencil-square-o"></i>
              </a>
              <a style="background: #242424;text-align: center;color: #FFF   ;  float: left;" class="nav-link" 
              href="{{route('checkout.historyOder')}}">
              history<i class="fa fa-pencil-square-o"></i>
              </a>
            </a>
          </div> 
      </div>
    </div>
  </div>
</div>
</div>

@endsection
