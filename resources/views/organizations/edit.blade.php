@extends('layouts.admin')

@section('pagetitle','Organization details')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Editar organización #{{$organization->id}}
          </h1>
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
                </div>
                <!-- /.card-header -->
                <div class="card-body px-3">
                    <form method="POST" action="{{ route('admin.organization.update') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$organization->id}}">
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" value="{{$organization->name}}">
                            </div>
                            <div class="form-group col-sm">
                              <label for="name">Contacto principal</label>
                              <select class="form-control" name="contacto_principal">
                                @foreach($organization->organizers as $organizador)
                                <option value="{{$organizador->user_id}}" @if($organization->user->id==$organizador->user_id) selected @endif>{{$organizador->user->name}}</option>
                                @endforeach
                              </select>
                          </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="website">Sitio web</label>
                                <input type="text" class="form-control" name="website" value="{{$organization->website}}">
                            </div>
                            <div class="form-group col-sm">
                                <label for="fb_page">Página de Facebook</label>
                                <input type="text" class="form-control" name="fb_page" value="{{$organization->fb_page}}">
                            </div>
                            <div class="form-group col-sm">
                                <label for="ig_page">Página de Instagram</label>
                                <input type="text" class="form-control" name="ig_page" value="{{$organization->ig_page}}">
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