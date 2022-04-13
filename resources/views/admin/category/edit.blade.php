@extends('layout.dashboard')

@section('main')
  <!-- Content Header (Page header) -->
  <div class="content-header">
<div class="category-table pt-5">
    <div class="container">
        <h2>Category Edit</h2>        
        <form action="{{route('category.update',$model->id)}}" method="POST" enctype="multipart/form-data">
          @csrf @method('PUT')
          <div>
            <input type="hidden" name="id" value="{{$model->id}}">
          <div class="form-group @error('name') has error @enderror ">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Enter Name" value="{{$model->name}}">
            @error('name')
              <small style="color: red; padding-top: 5px" class="help-block">{{$message}}</small>
            @enderror
          </div>  
          <div class="form-group @error('description') has error @enderror">
            <label for="">Description</label>
            <textarea class="form-control" name="description" id="" rows="2">{{$model->description}}</textarea>
            @error('description')
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
          <a class="btn btn-primary ml-1" href="{{route('category.index')}}">Back</a>
          </div>
        </form>        
      </div>
      </div>
</div>
@endsection