@extends('layout.dashboard')

@section('main')
  <!-- Content Header (Page header) -->
  <div class="content-header">
<div class="Banner-table pt-5">
    <div class="container">
        <h2>banner Create</h2>        
        <form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group @error('upload') has error @enderror ">
            <label for="">Image</label>
            <input type="file" name="upload" id="" class="form-control" value="{{old('image')}}">
            @error('upload')
                <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>   
          <div class="form-group @error('title') has error @enderror ">
            <label for="">Title</label>
            <input type="text" name="title" id="" class="form-control" placeholder="Enter Title" value="{{old('title')}}">
            @error('title')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>
          <div class="form-group @error('content') has error @enderror ">
              <label for="">Content</label>
              <input type="text" name="content" id="" class="form-control" placeholder="Enter Title" value="{{old('content')}}">
              @error('content')
                <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
              @enderror
            </div>
          <div class="form-group @error('link') has error @enderror ">
            <label for="">Link</label>
            <input type="text" name="link" id="" class="form-control" placeholder="Enter Link" value="{{old('link')}}">
            @error('link')
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
          <a class="btn btn-primary ml-1" href="{{route('banner.index')}}">Back</a>
        </form>        
      </div>
    </div>
    </div>
@endsection