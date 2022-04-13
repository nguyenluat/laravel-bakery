@extends('layout.homes')

@section('homes')
<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section" style="background-image: url(img/banner9.jpg)" >
  <div class="container">
      <div class="row">
          <div class="col-12">
              <div class="page-banner-content text-center">
                  <h1 class="fonesize">Update PassWord </h1>
                  <p>
                      <span><a href="{{route('index')}}">HOME</a></span>
                      <span class="ative">UPDATEPASS PAGE</span>
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
        <div class="col-md-12 col-12 col-lg-12 col-xl-6 ml-auto mr-auto" style="background:#fff" >
            <div class="login">
                <div class="login-form-container">
                    <div class="login-form">
                        <h2 class="text-center" style="padding-bottom:30px">Information</h2>
                             <form method="POST" name="form" action="{{route('customer.updatePass',Auth::guard('cus')->user()->id)}}" enctype="multipart/form-data">
                             @csrf 
                             <div class="row">
                             <div class="col-12">             
                             <label for="current-password" class="control-label">Current Password</label>
                            <div class="form-group">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                             <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Password">
                             @error('current-password')
                               <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
                             @enderror
                           </div>
                         <label for="password" class="control-label">New Password</label>
                           <div class="form-group">
                             <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                             @error('password')
                               <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
                             @enderror
                           </div>
                           <label for="password_confirmation" class="control-label">Re-enter Password</label>
                             <div class="form-group">
                               <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
                               @error('password_confirmation')
                                 <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
                               @enderror
                             </div>
                           </div>
                         </div>
                           <div class=" form-group form-update-info">
                             <button value="Update" type="submit" class="btn btn-primary floatright">UpdatePass</button>
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
