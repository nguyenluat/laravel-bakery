@extends('layout.homes')

@section('homes')
<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section" style="background-image: url(img/banner9.jpg)" >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-banner-content text-center">
                    <h1 class="fonesize">About Page</h1>
                    <p>
                        <span><a href="{{route('index')}}">HOME</a></span>
                        <span class="ative">ABOUT PAGE</span>
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
                            <h2 class="text-center" style="padding-bottom:30px">Login</h2>
                           <form id="sigupform" method="POST" name="form" >
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
                                   @if(Session::has('message'))
                                   <div class="alert alert-success text-center" role="alert">
                                       {{Session::get('message')}}
                                   </div>
                               @endif
                                @csrf
                                <div class="row">
                                <div class="col-12 mb-20">
                            <label for="">Username or email <span class="required">*</span></label>
                            <input type="email" class="form-control" name="email">
                            @error('email')
                                <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
                            @enderror
                                </div>
                                <div class="col-12 mb-20">
                            <label for="">Passwords <span class="required">*</span></label>
                            <input name="password" type="password">
                            @error('password')
                                <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
                            @enderror
                                </div>

                                   <div class="button-box">
                                    <div class="login-toggle-btn">
                                        <input type="checkbox">
                                        <label>Remember me</label>
                                    </div>
                                    <button value="login"  type="submit" name="login"  class="default-btn floatright">Login</button>
                                    <a href="{{route('customer.register')}}">Register Now!</a>
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
<!-- register-area end -->

@endsection
