@extends('layout.homes')

@section('homes')
    <!-- PAGE BANNER SECTION -->

    <div class="page-banner-section section mb-100">
        <div class="page-banner-section section" style="background-image: url(img/banner9.jpg)" >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-banner-content text-center">
                    <h1 class="fonesize">History Order Page</h1>
                    <p>
                        <span><a href="{{route('index')}}">HOME</a></span>
                        <span class="ative">HISTORY ORDER PAGE</span>
                    </p>
                </div>
            </div>

        </div>
    </div>
    <div class="page-banner-social">
    <p class="fonesize"> Share this page:</p>
    <div class="social">
        <a ><i class="fa fa-facebook"></i></a>
        <a ><i class="fa fa-twitter"></i></a>
        <a ><i class="fa fa-instagram"></i></a>
    </div>
</div>
</div>
</div>
<!-- END PAGE BANNER SECTION -->

<!-- PAGE SECTION START -->
<div class="container">
    <div style="    margin: 50px;"> 
    <div class="table-responsive">
    <h2> Detailed Order History </h2>
    <p> These Are All Orders You Ordered !! </p>
    <table class = "table table-hover text-center">
        <thead>
        <tr>
            <th> STT </th>
            <th> Product Name </th>
            <th> Quantity </th>
            <th> Product Price </th>
            <th> Total </th>
        </tr>
      </thead>
      <tbody>
          @php
              $i = 1;
              $total = 0;
          @endphp
          @foreach ($orderdetail as $model)
          @php
                $subtotal = $model->quantity*$model->totalamount;
                $total+=$subtotal ;
                
            @endphp
            <tr>
                <td>{{$i++}}</td>
                <td>{{$model->product->name}}</td>
                <td>{{$model->quantity}}</td>
                <td>{{$model->totalamount}}</td>
                <td>{{$subtotal}}</td>
            </tr>
          @endforeach
      </tbody>
    </table>
    </div>
    <div class="total">
        
            <div class="row">
                <div class="col-6">
                    <h5 class="text-center" >Totals: $ {{$total}}</h5>
                </div>
                <div class="col-6">
                    @foreach ($order as $ord)
                    @if ($ord->status == 1)
                    <a class="btn btn-success" style="cursor: no-drop" disabled href="#" style="float:left;margin-right: 24px" >Delivered</a>
                    @elseif ($ord->status == 0)
                    <form action="{{route('order.update',$ord->id)}}" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="status" value="2"> 
                        <button type="submit" class="btn btn-danger" style="float:left;margin-right: 24px" >Cancel order</button>
                    </form>
                    @else 
                    <a class="" style="cursor: no-drop" disabled href="#" >Canceled</a>
                    @endif
                    @endforeach
                    <a class="btn btn-primary" href="{{route('checkout.historyOder')}}" >Back</a>
                </div>
            </div>
    </div>
</div>
  </div>
<!-- PAGE SECTION END --> 
@endsection