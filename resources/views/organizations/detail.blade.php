@extends('layouts.admin')

@section('pagetitle','Organization details')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detalles de organización #{{$organization->id}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home.admin')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.organizations')}}">Organizations</a></li>
            <li class="breadcrumb-item active">{{$organization->id}}</li>
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
                  <h3 class="card-title">Datos organización</h3>
                  <a href="{{ route('admin.organization.edit',['id'=>$organization->id]) }}" class="btn btn-info pull-right">Editar</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body px-3">
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$organization->name}}" readonly>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" name="website" value="{{$organization->website}}" readonly>
                        </div>
                        <div class="form-group col-sm">
                            <label for="fb_page">Facebook page</label>
                            <input type="text" class="form-control" name="fb_page" value="{{$organization->fb_page}}" readonly>
                        </div>
                        <div class="form-group col-sm">
                            <label for="ig_page">Instagram page</label>
                            <input type="text" class="form-control" name="ig_page" value="{{$organization->ig_page}}" readonly>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->


              <!-- CATEGORIES -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Organizadores</h3>
                </div>
                <div class="card-body">
                  <div class="card-body">
                   
                    <table id="organizadores-table" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($organizadores as $organizador)
                          <tr>
                              <td>{{$organizador->id}}</td>
                              <td>{{$organizador->name}}</td>
                              <td>${{$organizador->email}}</td>
                              <td></td>
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
        $('#organizadores-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "buttons": ["copy", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#organizadores-table_wrapper .col-md-6:eq(0)');
    })
</script>

@endsection