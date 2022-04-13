@extends('layout.dashboard')

@section('main')
  <!-- Content Header (Page header) -->
  <div class="content-header">
<div class="order-detail-table pt-5">
    <div class="container">
        <h2>Order Detail Create</h2>        
        <form action="{{route('order-detail.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group @error('name') has error @enderror ">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Enter Name" value="{{old('name')}}">
            @error('name')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>

          <div class="form-group @error('phone') has error @enderror ">
            <label for="">Phone</label>
            <input type="text" name="phone" id="" class="form-control" placeholder="Enter Phone" value="{{old('phone')}}">
            @error('phone')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>

          <div class="form-group @error('email') has error @enderror ">
            <label for="">Email</label>
            <input type="text" name="email" id="" class="form-control" placeholder="Enter Email" value="{{old('email')}}">
            @error('email')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>

          <div class="form-group @error('address') has error @enderror ">
            <label for="">Address</label>
            <input type="text" name="address" id="" class="form-control" placeholder="Enter Address" value="{{old('address')}}">
            @error('address')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>

          <div class="form-group @error('upload') has error @enderror ">
            <label for="">Image</label>
            <input type="file" name="upload" id="" class="form-control" placeholder="Enter Image" value="{{old('upload')}}">
            @error('upload')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>
          
          <div class="form-group @error('price') has error @enderror ">
            <label for="">Total Amount</label>
            <input type="text" name="price" id="" class="form-control" value="{{old('price')}}">
            @error('price')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>   
          <div class="form-group @error('description') has error @enderror">
            <label for="">Description</label>
            <textarea class="form-control" name="description" id="" rows="2">{{old('description')}}</textarea>
            @error('description')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>

          <div class="form-group">
            <label for="">Product</label>
            <select name="product_id" class="form-control">
                <option value="">Chọn</option>
                @foreach ($product as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('product_id')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>

          <div class="form-group">
            <label for="">Order</label>
            <select name="order_id" class="form-control">
                <option value="">Chọn</option>
                @foreach ($order as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('order_id')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>

          <div class="form-group">
            <label for="">Discount</label>
            <select name="discount_id" class="form-control">
                <option value="">Chọn</option>
                @foreach ($discount as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('discount_id')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>

          <div class="form-group">
            <label for="">Payment</label>
            <select name="payment_id" class="form-control">
                <option value="">Chọn</option>
                @foreach ($payment as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('payment_id')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>

          <div class="form-group">
            <label for="">Shipping</label>
            <select name="ship_id" class="form-control">
                <option value="">Chọn</option>
                @foreach ($shipping as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('ship_id')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>

          <div class="form-group">
            <label for="">Status</label>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="status" id="" value="1" checked>
                Show
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="status" id="" value="0" >
                 Hide
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a class="btn btn-primary ml-1" href="{{route('order-detail.index')}}">Back</a>
        </form>        
      </div>
      </div>
</div>
@endsection