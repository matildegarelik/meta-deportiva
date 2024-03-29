<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/toastr/toastr.min.css') }}">

        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/jqvmap/jqvmap.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/admin-lte/dist/css/adminlte.min.css') }}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/daterangepicker/daterangepicker.css') }}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/summernote/summernote-bs4.min.css') }}">
	  

		<!-- Custom styles for this template -->
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" >
		<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" >
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1ftWVTDrIHJfgbBUHeyEJmDbovqpozD4&callback=initMap&libraries=places&v=weekly"
            defer
        ></script>
        <!-- jQuery -->
        <script src="{{ asset('assets/admin-lte/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	</head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    
      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('assets/admin-lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
      </div>
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light"  style = "z-index: 1040 !important;">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="@if(Auth::user()->role=='admin') {{route('home.admin')}} @else {{route('home.organizador')}} @endif" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>
    
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Logout -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </li>
          <!-- Navbar Search -->
          <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>
    
          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Brad Diesel
                      <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      John Pierce
                      <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nora Silvester
                      <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4"  style = "z-index: 1040 !important;">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
          <!--<img src="{{ asset('assets/admin-lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
          <span class="brand-text font-weight-light">Meta Deportiva</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ asset('assets/admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{ Auth::user()->name }}</a>
              
            </div>
          </div>
    
          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              
              @if (Auth::user()->role=='admin')     
              <li class="nav-item">
                <a href="{{route('home.admin')}}" class="nav-link {{ Route::is('home.admin') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
                
              </li>
              <li class="nav-item {{ Route::is('admin.users') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Route::is('admin.users') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-user-alt"></i>
                  <p>
                    Usuarios
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{  route('admin.users') }}" class="nav-link {{ Route::is('admin.users') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listado</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Participantes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Organizadores</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item {{ str_contains(Request::segment(2),'events') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{  str_contains(Request::segment(2),'event') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-calendar-alt"></i>
                  <p>
                    Eventos
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('admin.events') }}" class="nav-link {{ Route::is('admin.events') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.event.new') }}" class="nav-link {{ Route::is('admin.event.new') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Crear</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Asignar</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item {{ str_contains(Request::segment(2),'organizations') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{  str_contains(Request::segment(2),'organiza') ? 'active' : '' }}">
                  <i class="nav-icon far fa-building"></i>
                  <p>
                    Organizaciones
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('admin.organizations') }}" class="nav-link {{ Route::is('admin.organizations') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.organization.new') }}" class="nav-link {{ Route::is('admin.organization.new') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Crear</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Organizadores</p>
                    </a>
                  </li>
                </ul>
              </li>
              @else

              <li class="nav-item">
                <a href="{{route('home.organizador')}}" class="nav-link {{ Route::is('home.organizador') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
                
              </li>
              <li class="nav-item">
                <a href="{{route('organizador.events')}}" class="nav-link {{ str_contains(Request::segment(2),'event') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-calendar-alt"></i>
                  <p>Mis eventos</p>
                </a>
                
              </li>
              @endif
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Crear evento</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('home.admin')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{route('admin.events')}}">Eventos</a></li>
                  <li class="breadcrumb-item active">Crear</li>
                </ol>
              </div><!-- /.col -->
            
            </div>
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Nuevo evento</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body px-3">
                        <form method="POST" action="{{ route('admin.event.create') }}" enctype="multipart/form-data">
                          @csrf
                          <div class="row">
                            <div class="form-group col-sm">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-sm">
                                <label for="name">Organizador</label>
                                <select class="form-control select2bs4 @error('organizer') is-invalid @enderror" name="organizer">
                                  <option value="">Select...</option>
                                    
                                </select>
                                @error('organizer')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-sm">
                                <label for="type">Tipo</label>
                                <select class="form-control @error('type') is-invalid @enderror" name="type">
                                  <option {{old ('type') == 'Publico' ? 'selected' : ''}}>Publico</option>
                                  <option {{old ('type') == 'Privado' ? 'selected' : ''}}>Privado</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm">
                                <label for="casification">Clasificación</label>
                                <select class="form-control @error('clasification') is-invalid @enderror" name="clasification">
                                </select>
                                @error('clasification')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check col-sm">
                                <input type="checkbox" class="form-check-input" name="featured">
                                <label class="form-check-label ml-5" for="featured">Featured event?</label>
                                <!--<input type="checkbox" class="form-check-input" name="published">
                                <label class="form-check-label ml-5" for="featured">Published?</label>-->
                              </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-sm">
                                <label for="start_date">Fecha inicio</label>
                                <div class="input-group date" id="start_date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input @error('start_date') is-invalid @enderror" data-target="#start_date" name="start_date"/>
                                    <div class="input-group-append" data-target="#start_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                @error('start_date')
                                    <span style="font-size: 80%;color: #dc3545;">
                                        <strong>{{ $message }}</strong>
                                    <span>
                                @enderror
                            </div>
                            <div class="form-group col-sm">
                                <label for="end_date">Fecha fin</label>
                                <div class="input-group date" id="end_date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input @error('end_date') is-invalid @enderror" data-target="#end_date" name="end_date"/>
                                    <div class="input-group-append" data-target="#end_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                @error('end_date')
                                    <span style="font-size: 80%;color: #dc3545;">
                                        <strong>{{ $message }}</strong>
                                    <span>
                                @enderror
                            </div>
                            <div class="form-group col-sm">
                              <label for="main_image">Imagen principal</label>
                              <input type="file" name="main_image" accept="image/png, image/jpeg">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-sm">
                                <label for="name">Descripción</label>
                                <textarea class="form-control ckeditor @error('description') is-invalid @enderror" rows="10" name="description" id="editor">
                                  {{old('description')}}
                                </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="row">
                              <div class="form-group col-sm">
                                  <label for="location">Ubicación</label>
                                  <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{old('location')}}">
                                  @error('location')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="form-group col-sm">
                                  <label for="location">MAPA</label>
                                  <input type="text" class="form-control" name="coordenadas" disabled value="A IMPLEMENTAR">
                                  <div id="map"></div>
                              </div>
                          </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- /.content-header -->
        <div id="map" style="width: 300px; height: 400px"></div>
      </div>
    </div>
            
    
        
<script>
var map;
var service;
var infowindow;

function createMarker(place) {

    new google.maps.Marker({
        position: place.geometry.location,
        map: map
    });
}

function initMap() {
    console.log(google)
  var sydney = new google.maps.LatLng(-33.867, 151.195);

  infowindow = new google.maps.InfoWindow();

  map = new google.maps.Map(
      document.getElementById('map'), {center: sydney, zoom: 15});

  var request = {
    query: 'Museum of Contemporary Art Australia',
    fields: ['name', 'geometry'],
  };

  var service = new google.maps.places.PlacesService(map);

  service.findPlaceFromQuery(request, function(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
      for (var i = 0; i < results.length; i++) {
        createMarker(results[i]);
      }
      map.setCenter(results[0].geometry.location);
    }
  });
}

window.initMap = initMap;

</script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/admin-lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('assets/admin-lte/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('assets/admin-lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- ChartJS -->
<script src="{{ asset('assets/admin-lte/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/admin-lte/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/admin-lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/admin-lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/admin-lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/admin-lte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin-lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin-lte/dist/js/adminlte.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin-lte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/admin-lte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/admin-lte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/admin-lte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- CK editor -->
<!--<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>-->

<script src="{{ asset('assets/admin-lte/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{ asset('../assets/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('../assets/ckeditor/adapters/jquery.js') }}"></script>

</body>
</html>