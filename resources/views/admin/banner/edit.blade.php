@extends('layout.dashboard')

@section('main')
  <!-- Content Header (Page header) -->
  <div class="content-header">
<div class="banner-table pt-5">
    <div class="container">
        <h2>Banner Edit</h2>        
        <form action="{{route('banner.update',$model->id)}}" method="POST" enctype="multipart/form-data">
          @csrf @method('PUT')
          <div class="form-group @error('upload') has error @enderror ">
            <label for="">Image</label>
            <input type="file" name="upload" id="" class="form-control" value="{{$model->image}}">
            @error('upload')
                <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>
          <div>
            <input type="hidden" name="id" value="{{$model->id}}">
          <div class="form-group @error('title') has error @enderror ">
            <label for="">Title</label>
            <input type="text" name="title" id="" class="form-control" placeholder="Enter Title" value="{{$model->title}}">
            @error('title')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>
          <div>
            <input type="hidden" name="id" value="{{$model->id}}">
          <div class="form-group @error('link') has error @enderror ">
            <label for="">Link</label>
            <input type="text" name="link" id="" class="form-control" placeholder="Enter Link" value="{{$model->link}}">
            @error('link')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>
          <div class="form-group @error('content') has error @enderror ">
              <label for="">Content</label>
              <input type="text" name="content" id="" class="form-control" placeholder="Enter Link" value="{{$model->content}}">
              @error('content')
                <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
              @enderror
            </div>
          <div class="form-group">
            <label for="">Status</label>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="status" id="" value="1" <?php  if($model->status==1) {echo 'checked';}  ?>>
                Show
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="status" id="" value="0" <?php  if($model->status==0) {echo 'checked';}  ?>>
                 Hide
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a class="btn btn-primary ml-1" href="{{route('banner.index')}}">Back</a>
          </div>
        </form>        
      </div>
</div>
</div>
@endsection