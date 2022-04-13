<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <base href="{{asset('')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Adminpade</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="admin/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="admin/plugins/datatables.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin.index')}}" class="nav-link">HOME</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.logout')}}">
          Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
  <a href="{{route('admin.index')}}" class="brand-link">
      <img src="admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        

        <div class="info">
        <a href="#" class="d-block"></a>
        </div>

      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('admin.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>
                  Category
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('category.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Category Data</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('category.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Data</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-product-hunt"></i>
                  <p>
                    Product
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('product.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Product Data</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('product.create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Data</p>
                    </a>
                  </li>
                </ul>
              </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-picture-o"></i>
              <p>
                Gallery
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('gallery.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gallery Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('gallery.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Data</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-list-ol"></i>
                <p>
                  Banner
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('banner.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Banner Data</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('banner.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Data</p>
                  </a>
                </li>
              </ul>
            </li>
            
        
          <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-newspaper-o"></i>
                <p>
                  Blog
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('blog.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Blog Data</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('blog.create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p> Add Data</p>
                    </a>
                  </li>
              </ul>
          </li>
              <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-truck"></i>
                    <p>
                      Shipping
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('shipping.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Shipping Data</p>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('shipping.create')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p> Add Data</p>
                        </a>
                      </li>
                  </ul>
                </li> 
              <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-compress"></i>
                    <p>
                      Order
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('order.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p> Order Data</p>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('order.create')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p> Add Data</p>
                        </a>
                      </li>
                  </ul>
                </li>
                
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-user-o"></i>
                        <p>
                          Customer
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{route('admincustomer.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Customer Data</p>
                          </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admincustomer.create')}}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p> Add Data</p>
                            </a>
                          </li>
                      </ul>
                    </li>  
        <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                          <i class="nav-icon fa fa-credit-card"></i>
                          <p>
                            Payment
                            <i class="fas fa-angle-left right"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="{{route('payment.index')}}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Payment Data</p>
                            </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('payment.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Add Data</p>
                              </a>
                            </li>
                        </ul>
                      </li>  
                      
     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<div class="content-wrapper">
    <div class="container error">
        @if (Session::has('success'))
    <div class="container alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong></strong>{{Session::get('success')}}
      </div>
    @endif
    @if (Session::has('error'))
    <div class="container alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong></strong>{{Session::get('error')}}
      </div>
    @endif
    </div>


  @yield('main')


</div>




  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<!-- DataTables -->
<script src="admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="admin/plugins/moment/moment.min.js"></script>
<script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>
<script src="admin/plugins/datatables.min.js"></script>
@yield('script-processingOder')
<!-- page script -->
<script>
 $('#example1').DataTable({
   "pageLength":5,
   "lengthMenu":[5,10,20,50]
 })
</script>



</body>
</html>