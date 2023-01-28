@extends('layouts.admin')

@section('pagetitle','Create organization')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Crear organización</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home.admin')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.organizations')}}">Organizations</a></li>
            <li class="breadcrumb-item active">Create</li>
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
                  <h3 class="card-title">Nueva organización</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body px-3">
                    <form method="POST" action="{{ route('admin.organization.create') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" name="website">
                            </div>
                            <div class="form-group col-sm">
                                <label for="fb_page">Facebook page</label>
                                <input type="text" class="form-control" name="fb_page">
                            </div>
                            <div class="form-group col-sm">
                                <label for="ig_page">Instagram page</label>
                                <input type="text" class="form-control" name="ig_page">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
              
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