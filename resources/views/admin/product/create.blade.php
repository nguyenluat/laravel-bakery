@extends('layout.dashboard')

@section('main')
  <!-- Content Header (Page header) -->
  <div class="content-header">
<div class="product-table pt-5">
    <div class="container">
        <h2>Product Create</h2>        
        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group @error('name') has error @enderror ">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Enter Name" value="{{old('name')}}">
            @error('name')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>
          <div class="form-group @error('upload') has error @enderror ">
            <label for="">Image</label>
            <input type="file" name="upload" id="" class="form-control" value="{{old('image')}}">
            @error('upload')
                <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div> 
          <div class="form-group @error('upload') has error @enderror ">
            <label for="">List Image</label>
            <input type="file" name="listimage[]" id="file-input" class="form-control" value="{{old('image')}}" multiple>
            @error('photos')
                <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div> 
          <div class="form-group @error('price') has error @enderror ">
            <label for="">Price</label>
            <input type="text" name="price" id="" class="form-control" value="{{old('price')}}">
            @error('price')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>   
          <div class="form-group @error('sale_price') has error @enderror ">
            <label for="">sale_Price</label>
            <input type="text" name="sale_price" id="" class="form-control" value="{{old('sale_price')}}">
            @error('sale_price')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>   
          <div class="form-group @error('description') has error @enderror">
            <label for="">Description</label>
            
            <textarea class="textarea" name="description" id="" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('description')}}</textarea>

            @error('description')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="">Category_id</label>
            <select name="category_id" class="form-control">
                <option value="">Chọn</option>
                @foreach ($cats as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
            @error('category_id')
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
          <a class="btn btn-primary ml-1" href="{{route('product.index')}}">Back</a>
        </form>        
      </div>
      </div>
</div>
@endsection