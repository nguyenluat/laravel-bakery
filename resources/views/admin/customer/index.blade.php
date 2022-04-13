@extends('layout.dashboard')

@section('main')
  <!-- Content Header (Page header) -->
  <div class="content-header">
<div class="customer-table pt-5">
    <div class="container">
        <h2>Customer Home</h2>
        <div class="table-search pb-3">
            <form class="form-inline" method="POST" action="">
                <div class="form-group">
                    <input name="key" class="form-control" placeholder="Data Import">
                </div>
                <button type="submit" class="btn btn-primary ml-3 mr-3">Submit</button>
            <a href="{{route('admincustomer.create')}}" class="btn btn-success">Add New</a>
            </form>
        </div>           
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($customer as $model)
              <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$model->name}}</td>
              <td>{{$model->email}}</td>
              <td>{{$model->phone}}</td>
              <td>{{$model->address}}</td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
</div>
</div>
@endsection