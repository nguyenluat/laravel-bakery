@extends('layout.dashboard')

@section('main')
  <!-- Content Header (Page header) -->
  <div class="content-header">
<div class="order-table pt-5">
    <div class="container">
        <h2>Order Create</h2>        
        <form action="{{route('order.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group @error('name') has error @enderror ">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Enter Name" value="{{old('name')}}">
            @error('name')
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
            <label for="">Customer</label>
            <select name="customer_id" class="form-control">
                <option value="">Chọn</option>
                @foreach ($cus as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('customer_id')
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
          <a class="btn btn-primary ml-1" href="{{route('order.index')}}">Back</a>
        </form>        
      </div>
</div>
</div>
@endsection