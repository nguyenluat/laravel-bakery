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
    <div class = "table-responsive">
    <h2> Order History </h2>
    <p> These Are All Orders You Ordered !! </p>
    <table class = "table table-hover text-center">
        <thead>
        <tr>
            <th> STT </th>
            <th> Set Date </th>
            <th> Order Status </th>
            <th> View </th>
        </tr>
      </thead>
      <tbody>
          @php
              $i = 1;
          @endphp

        @foreach ($orders as $model)
        <tr>
            <td>{{$i++}}</td>
            <td>
                {{$model->created_at}}
            </td>
            <td>
                @if ( $model->status == 1)
                <a href=""style="cursor: no-drop;color: #fff;
                background-color: #55a3f4;
                border-color: #55a3f4;
                padding: 5px 20px;
                " class="btn-status-one" style="cursor: no-drop" > <span class="spinner-grow spinner-grow-sm" style="margin-right: 5px;"></span> Delivered</a>
                @elseif ( $model->status == 0)
                <a href="" class="btn-status-two" 
                style="cursor: no-drop;color: #fff;
                background-color: #55a3f4;
                border-color: #55a3f4;
                padding: 5px 20px;
                " > 
                <span class="spinner-border spinner-border-sm" style="margin-right: 5px;" ></span>Waiting for progressing</a>
                @else
                <a href=""style="cursor: no-drop;color: #fff;
                background-color: #55a3f4;
                border-color: #55a3f4;
                padding: 5px 20px;
                " class="btn-status-one" style="cursor: no-drop" > <span class="spinner-grow spinner-grow-sm" style="margin-right: 5px;"></span>Cancelled</a>

                @endif
            </td>
            <td >
                <a href="{{route('checkout.historyView',$model->id)}}"><i class="fa fa-eye"></i></a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
<!-- PAGE SECTION END --> 
@endsection