@extends('layout.homes')

@section('homes')
<div class="breadcrumb-area pt-205 pb-210" style="background-image: url(assets/img/bg/breadcrumb.jpg)">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>Reset Password Page</h2>
            <ul>
                <li><a href="#">home</a></li>
                <li> Reset Password PAGE</li>
            </ul>
        </div>
    </div>
</div>

<div class="register-area ptb-100">
    <div class="container-fluid">
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
        <div class="row">
        <div class="col-md-12 col-12 col-lg-12 col-xl-6 ml-auto mr-auto">
            <div class="login">
                <div class="login-form-container">
                    <div class="login-form">
                        <h2 class="text-center" style="padding-bottom:30px">New Password</h2>
                            <form id="sigupform" method="POST" name="form" action="{{route('customer.newpassword')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-20">
                                <label for="">New Password <span class="required">*</span></label>
                                <input type="password" class="form-control" name="password" >
                                @error('password')
                                    <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
                                @enderror
                                <input type="text" name="token" value="{{ $info }}" hidden="">
                            </div>
                            <div class="col-12 mb-20">
                                <label for="">ConFirm Password <span class="required">*</span></label>
                                <input type="password" class="form-control" name="confirm_password" >
                                @error('confirm_password')
                                    <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-12 mb-20">
                                <button value="Update" name="register" type="submit" class="default-btn floatright">Register</button>
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
