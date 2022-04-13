@extends('layout.dashboard')

@section('main')
  <!-- Content Header (Page header) -->
  <div class="content-header">
<div class="customer-table pt-5">
    <div class="container">
        <h2>Customer Create</h2>        
        <form action="{{route('admincustomer.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group @error('name') has error @enderror ">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Enter Name" value="{{old('name')}}">
            @error('name')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>
          <div class="form-group @error('name') has error @enderror ">
            <label for="">Email</label>
            <input type="text" name="email" id="" class="form-control" placeholder="Enter Email" value="{{old('email')}}">
            @error('email')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>
          <div class="form-group @error('name') has error @enderror ">
            <label for="">Phone</label>
            <input type="text" name="phone" id="" class="form-control" placeholder="Enter Phone" value="{{old('phone')}}">
            @error('phone')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>  
          <div class="form-group @error('name') has error @enderror ">
            <label for="">Address</label>
            <input type="text" name="address" id="" class="form-control" placeholder="Enter Address" value="{{old('address')}}">
            @error('address')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>  
          <div class="form-group @error('name') has error @enderror ">
            <label for="">Password</label>
            <input type="password" name="password" id="" class="form-control" placeholder="Enter Password" >
            @error('password')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>  
          <div class="form-group @error('name') has error @enderror ">
            <label for="">Confirm Password</label>
            <input type="password" name="confirm_password" id="" class="form-control" placeholder="Enter Confirm Password">
            @error('confirm_password')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>      
          
          <button type="submit" class="btn btn-primary">Submit</button>
          <a class="btn btn-primary ml-1" href="{{route('category.index')}}">Back</a>
        </form>        
      </div>
</div>
</div>
@endsection