@extends('layout.dashboard')

@section('main')
  <!-- Content Header (Page header) -->
  <div class="content-header">
<div class="category-table" style="padding-top: 30px;">
    <div class="container">
        <h2>Category Home</h2>
        <div class="table-search pb-3">
            <form class="form-inline" method="POST" action="">
                <div class="form-group">
                    <input name="key" class="form-control" placeholder="Data Import">
                </div>
                <button type="submit" class="btn btn-primary ml-3 mr-3">Submit</button>
            <a href="{{route('category.create')}}" class="btn btn-success">Add New</a>
            </form>
        </div>           
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Description</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($cats as $model)
              <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$model->name}}</td>
              <td>{{$model->description}}</td>
              <td>{{$model->status}}</td>
              <td>
              <form action="{{route('category.destroy', $model->id)}}" method="POST">
                  @csrf @method('DELETE') 
                  <a class="btn btn-primary" href="{{route('category.edit',$model->id)}}">Edit</a>
                  <button class="btn btn-danger">Delete</button>
              </form>
              </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      </div>
</div>
@endsection