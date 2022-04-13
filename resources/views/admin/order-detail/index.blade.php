@extends('layout.dashboard')


@section('main')
  
<div class="order-detail-table ">
    <div class="container">
        <h2>Order-Detail Home</h2>
        <div class="table-search pb-3">
            <form class="form-inline" method="POST" action="">
                <div class="form-group">
                    <input name="key" class="form-control" placeholder="Data Import">
                </div>
                <button type="submit" class="btn btn-primary ml-3 mr-3">Submit</button>
            <a href="{{route('order-detail.create')}}" class="btn btn-success">Add New</a>
            <a href="{{route('order.index')}}" class="btn btn-success ml-3 mr-3">Back</a>
            </form>
        </div> 
        <h3>Khách Hàng Đặt Hàng</h3>          
        <table class="table table-dark table-hover">
          <thead>
            <tr class="text-center">
              <th>ID</th>
              <th>Name</th>
              <th>Address</th>
              <th>Phone</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($order as $model)
              <tr class="text-center">
              <td>{{$model->id}}</td>
              <td>{{$model->name}}</td>
              <td>{{$model->address}}</td>
              <td>{{$model->phone}}</td>
              </tr>
              @endforeach
          </tbody>
        </table>
        <h3>Chi Tiết Đơn Hàng</h3>          
        <table class="table table-dark table-hover">
          <thead>
            <tr class="text-center">
              <th>ID</th>
              <th>Product</th>
              <th>Kho</th>
              <th>Số Lượng</th>
              <th>Giá</th>
              <th>Tổng Tiền</th>
            </tr>
          </thead>
          <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($orderdetail as $model)
            @php
                $subtotal = $model->quantity*$model->totalamount;
                $total+=$subtotal ;
            @endphp
            <tr class="text-center">
            <td>{{$model->id}}</td>
            <td>{{$model->product->name}}</td>
            <td>{{$model->product->quantity}}</td>
            <td>
              {{$model->quantity}}
              <input type="hidden" name="order_product_quantity" class="" value="{{$model->quantity}}">
              <input type="hidden" name="order_product_id" class="" value="{{$model->product_id}}">
            </td>
            <td>$ {{$model->totalamount}}</td>
            <td>$ {{ $subtotal}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <h3>Tổng</h3>
        <table>
          <tbody>
            <tr>
            <td>
              @if ($model->code_discount != '')
              <h5 class="text-center" >Totals: $ {{$total}}</h5>
              <hr>
                @foreach ($discount as $item)
                    @if ($item->coupon_condition == 1)
                      <h5 class="p-2 text-center">Discount Giảm: {{$item->coupon_number}}%</h5>
                      <hr>
                      @php
                          $total_coupon = ($total*$item->coupon_number)/100;
                      @endphp
                      <h5 class="p-2 text-center">Totals: $ {{$total - $total_coupon}}</h5>
                      <hr>
                    @else
                      <hr>
                      <h5 class="p-2 text-center">Discount Giảm: {{$item->coupon_number}} $</h5>
                      <hr>
                      @php
                          $total_coupon = $total - $item->coupon_number;
                      @endphp
                      <h5 class="p-2 text-center">Totals: $ {{$total_coupon}}</h5>
                      <hr>
                    @endif
                @endforeach
              @else
                <h5 class="text-center" >Totals: $ {{$total}}</h5>
              @endif
              
            </td>
            </tr>
          </tbody>
        </table>
        <div class=" order_footer clearfix text-center" >
          @foreach ($order as $item)
            @if($item->status == 1)
            <form action="">
              @csrf
              <select name="" id="" class="form-control order_processing ">
                <option  value="">Chọn</option>
                <option id="{{$item->id}}" selected value="1">Đã Xử Lí </option>
                <option id="{{$item->id}}" value="0">Chưa xử Lí</option>
              </select>
            </form>
            @elseif ($item->status == 2)
            <select name="" id="" class="form-control order_processing ">
              <option  value="">Đơn Hàng Đã Bị Hủy</option>
            </select>
            @else
            <form action="GET">
              @csrf
              <select name="" id="order_processing" class="form-control  ">
                <option value=" ">Chọn</option>
                <option id="{{$item->id}}" value="1">Đã Xử Lí </option>
                <option id="{{$item->id}}"  value="0">Chưa xử Lí</option>
              </select>
            </form>
            @endif
          @endforeach
        </div>
      </div>
</div>
@endsection
@section('script-processingOder')
<script type="text/javascript">
    $('#order_processing').change(function(){
    
      var order_status = $(this).find('option:selected').val();
     
      var order_id = $(this).find('option:selected').attr('id');
     

      // Lay ra so luong
      
      $.ajax({
        url:"{{route('order.processing')}}",
          method:'GET',
          data:{
            order_status:order_status,order_id:order_id
          },
      success:function(data){
          if(data.code==1){
            alert('Xu ly thanh cong');
          }else{
             alert('chua xu ly');
          }
      }
      });

    });
</script>
@endsection