@extends('layout.dashboard')

@section('main')
  <!-- Content Header (Page header) -->
  <div class="content-header">
<div class="blog-table pt-5">
    <div class="container">
        <h2>Blog Create</h2>        
        <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
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
            <input type="file" name="upload" id="" class="form-control" >
            @error('upload')
                <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div> 
          <div class="form-group @error('content') has error @enderror ">
            <label for="">Content</label>
            <input type="text" name="content" id="" class="form-control" value="{{old('content')}}">
            @error('content')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>   
          <div class="form-group @error('description') has error @enderror">
            <label for="">Description</label> 
            <textarea class="textarea" name="description" placeholder="Place some text here" style="width: 100%; height: 200px; ">{{old('description')}}</textarea>
             @error('description')
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
          <a class="btn btn-primary ml-1" href="{{route('blog.index')}}">Back</a>
        </form>        
      </div>
</div>
</div>
@endsection