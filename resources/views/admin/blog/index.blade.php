@extends('layout.dashboard')

@section('main')
  <!-- Content Header (Page header) -->
  <div class="content-header">
<div class="category-table">
    <div class="container">
        <h2>Blog Home</h2>
        <div class="table-search pb-3">
            <form class="form-inline" method="POST" action="">
                <div class="form-group">
                    <input name="key" class="form-control" placeholder="Data Import">
                </div>
                <button type="submit" class="btn btn-primary ml-3 mr-3">Submit</button>
            <a href="{{route('blog.create')}}" class="btn btn-success">Add New</a>
            </form>
        </div>           
        <table class="table table-bordered">
          <thead>
            <tr class="text-center">
              <th>ID</th>
              <th>Name</th>
              <th>Image</th>
              <th>Content</th>
              
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($blogs as $model)
              <tr class="text-center">
              <td>{{$loop->index+1}}</td>
              <td>{{$model->name}}</td>
              <td><img style="width: 100px; height: 100px;" src="{{(url('uploads'))}}/{{$model->image}}" alt="User Image"></td>
              <td>{{$model->content}}</td>
              {{-- <td>{!!$model->description!!}</td> --}}
              <td>{{$model->status}}</td>
              <td>
              <form action="{{route('blog.destroy', $model->id)}}" method="POST">
                  @csrf @method('DELETE') 
                  <a class="btn btn-primary" href="{{route('blog.edit',$model->id)}}">Edit</a>
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