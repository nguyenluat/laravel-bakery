@extends('layout.homes')

@section('homes')
<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section" style="background-image: url(img/banner9.jpg)" >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-banner-content text-center">
                    <h1 class="fonesize">Information Page</h1>
                    <p>
                        <span><a href="{{route('index')}}">HOME</a></span>
                        <span class="ative">Information PAGE</span>
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

<div class="register-area ptb-100" style="background-image: url(img/admin.jpg)">
    <div class="container-fluid">
            
        <div class="row">
        <div class="col-md-12 col-12 col-lg-12 col-xl-6 ml-auto mr-auto" style="background:#fff">
            <div class="login">
                <div class="login-form-container">
                    <div class="login-form">
                        <h2 class="text-center" style="padding-bottom:30px">Information</h2>
                                <form method="POST" name="form" action="{{route('customer.updateInfo',Auth::guard('cus')->user()->id)}}" enctype="multipart/form-data">
                                        @if(Session::has('message'))
                                        <div class="alert alert-success text-center" role="alert">
                                            {{Session::get('message')}}
                                        </div>
                                    @endif
                                 @csrf 
                                 <div class="row">
                                  <input type="hidden" name="id" value="{{Auth::guard('cus')->user()->id}}">
                                   <div class="col-12 mb-20">
                                  <label for="">Username <span class="required">*</span></label>
                                  <input class="form-control" name="name" value="{{Auth::guard('cus')->user()->name}}">
                              </div>
                               <div class="col-12 mb-20">
                                 <label for="">Email <span class="required">*</span></label>
                                 <input type="email" class="form-control"  name="email" value="{{Auth::guard('cus')->user()->email}}" >
                               </div>
                               <div class="col-12 mb-20">
                                  <label for="">Phone<span class="required">*</span></label>
                                  <input class="form-control"  name="phone"  value="{{Auth::guard('cus')->user()->phone}}">
                               </div>
                               <div class="col-12 mb-20">
                                   <label for="">Address<span class="required">*</span></label>
                                   <input class="form-control"  name="address"  value="{{Auth::guard('cus')->user()->address}}">
                                    </div>
                               <div class="col-12 mb-20 form-update-info" >
                                   <input value="Update"  class="inline" type="submit" style="background:#007bff">
                                   <a href="{{route('customer.profile')}}">Not Now!</a>
                              </div>
                                </div>
                             </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
