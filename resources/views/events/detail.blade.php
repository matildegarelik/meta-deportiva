@extends('layouts.admin')

@section('pagetitle','Event details')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detalles de evento #{{$event->id}}
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home.admin')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.events')}}">Events</a></li>
            <li class="breadcrumb-item active">{{$event->id}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->

      <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Datos evento</h3>
                  <a href="{{ route('admin.event.edit',['id'=>$event->id]) }}" class="btn btn-info pull-right">Editar</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body px-3">
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$event->name}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" name="type"  value="{{$event->type}}" readonly>
                        </div>
                        <div class="form-group col-sm">
                            <label for="casification">Casification</label>
                            <input type="text" class="form-control" name="casification"  value="{{$event->clasification}}" readonly>
                        </div>
                        <div class="form-check col-sm">
                            <input type="checkbox" class="form-check-input mt-4" name="featured">
                            <label class="form-check-label ml-5 mt-4" for="featured">Featured event?</label>
                            </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="start_date">Start date</label>
                            <input type="text" class="form-control" name="start_date"  value="{{$event->start_date}}" readonly>
                        </div>
                        <div class="form-group col-sm">
                            <label for="end_date">End date</label>
                            <input type="text" class="form-control" name="end_date"  value="{{$event->end_date}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="name">Description</label>
                            <textarea class="form-control" rows="5" name="description" readonly>{{$event->description}}</textarea>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location"  value="{{$event->location}}" readonly>
                        </div>
                        <div class="form-group col-sm">
                            <label for="main_image">Main image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file..</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" name="website"  value="{{$event->website}}" readonly>
                        </div>
                        <div class="form-group col-sm">
                            <label for="type">External link</label>
                            <input type="text" class="form-control" name="external_link"  value="{{$event->external_link}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="fb_page">Facebook page</label>
                            <input type="text" class="form-control" name="fb_page"  value="{{$event->fb_page}}" readonly>
                        </div>
                        <div class="form-group col-sm">
                            <label for="ig_page">Instagram page</label>
                            <input type="text" class="form-control" name="ig_page"  value="{{$event->ig_page}}" readonly>
                        </div>
                    </div>
                    
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- INSCRIPTOS -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Inscriptos</h3>
                </div>
                <div class="card-body">
                  <div class="card-body">
                   
                    <table id="inscriptos-table" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($inscriptos as $inscripto)
                          <tr>
                              <td>{{$inscripto->user_id}}</td>
                              <td>{{$inscripto->name}}</td>
                              <td>{{$inscripto->email}}</td>
                              <td>
                                <a href="{{ route('admin.event', ['id'=>$inscripto->event_id]) }}"><i class="fas fa-eye ml-1"></i></a>
                                <i class="fas fa-trash ml-1"></i>
                              </td>
                          </tr>
                          @endforeach
                          
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
  
              <!-- CATEGORIES -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Categorias</h3>
                </div>
                <div class="card-body">
                  <div class="card-body">
                   
                    <table id="categories-table" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Availability</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($categories as $category)
                          <tr>
                              <td>{{$category->id}}</td>
                              <td>{{$category->name}}</td>
                              <td>${{$category->price}}</td>
                              <td>{{$category->availability}}</td>
                          </tr>
                          @endforeach
                          
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- CUPONES -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Cupones</h3>
                </div>
                <div class="card-body">
                  <div class="card-body">
                   
                    <table id="coupons-table" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Availability</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($categories as $category)
                          <tr>
                              <td>{{$category->id}}</td>
                              <td>{{$category->name}}</td>
                              <td>${{$category->price}}</td>
                              <td>{{$category->availability}}</td>
                          </tr>
                          @endforeach
                          
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- PREGUNTAS -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Preguntas</h3>
                </div>
                <div class="card-body">
                  <div class="card-body">
                   
                    <table id="questions-table" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Availability</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($categories as $category)
                          <tr>
                              <td>{{$category->id}}</td>
                              <td>{{$category->name}}</td>
                              <td>${{$category->price}}</td>
                              <td>{{$category->availability}}</td>
                          </tr>
                          @endforeach
                          
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

@endsection

@section('js')
<script>
    $(function () {
      $('#inscriptos-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "buttons": ["copy", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#inscriptos-table_wrapper .col-md-6:eq(0)');

      $('#categories-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "buttons": ["copy", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#categories-table_wrapper .col-md-6:eq(0)');

      $('#coupons-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "buttons": ["copy", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#coupons-table_wrapper .col-md-6:eq(0)');

      $('#questions-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "buttons": ["copy", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#questions-table_wrapper .col-md-6:eq(0)');

    });
  </script>
@endsection