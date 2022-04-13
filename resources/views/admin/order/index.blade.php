@extends('layout.dashboard')


@section('main')
  <div class="order-table ">
    <div class="container">
        <h2>Order Home</h2>
        <div class="table-search pb-3">
            <form class="form-inline" method="POST" action="">
                <div class="form-group">
                    <input name="key" class="form-control" placeholder="Data Import">
                </div>
                <button type="submit" class="btn btn-primary ml-3 mr-3">Submit</button>
            <a href="{{route('order.create')}}" class="btn btn-success">Add New</a>
            </form>
        </div>           
        <table class="table table-dark table-hover">
          <thead>
            <tr class="text-center">
              <th>STT</th>
              <th>ID</th>
              <th>Name</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @php
                  $i = 1;
              @endphp
              @foreach ($orders as $model)
              <tr class="text-center">
              <td>{{$i++}}</td>
              <td>{{$model->id}}</td>
              <td>{{$model->name}}</td>
              <td>{{$model->address}}</td>
              <td>{{$model->phone}}</td>
              <td>
                @if ( $model->status == 1)
                <a href="" class="btn btn-xs btn-success " style="cursor: no-drop" >Đã xử lý</a>
                @elseif ( $model->status == 0)
                <a href="" class="btn btn-xs btn-info " style="cursor: no-drop" > <span class="spinner-border spinner-border-sm"></span> Chờ xử lý</a>
                @else
                <a href="" class="btn btn-xs btn-danger " style="cursor: no-drop" >Đã Hủy</a>
                @endif
              </td>
              <td>
              <form action="{{route('order.destroy', $model->id)}}" method="POST">
                  @csrf @method('DELETE') 
                  <a class="btn btn-xs btn-primary js_order_item" href="{{route('order.view',$model->id)}}"><i class="fa fa-eye"></i></a>
                  <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
              </form>
              </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
</div>


<!-- The Modal -->
<div class="modal" id="myModalOrder">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

@endsection

@section('script')
    <script>
      $(function(){
        $(".js_order_item").click(function(event){
          event.preventDefault();
          let $this = $(this);
          let url = $this.attr(href);
          $("#myModalOrder").modal('show');
          console.log(url);
        });
      })
    </script>
@endsection