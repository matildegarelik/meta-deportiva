@extends('layouts.admin')

@section('pagetitle','Crear evento')

@section('content')
<!-- Content Header (Page header) -->
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
      </div><!-- /.row -->

      <!-- Main content -->
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
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-sm">
                              <label for="name">Organizador</label>
                              <select class="form-control select2bs4" name="organizer">
                                <option value="">Select...</option>
                                  @foreach($organizations as $organization)
                                  <optgroup label="{{$organization->name}}">
                                      @foreach($organization->organizers as $organizer)
                                      <option value="{{$organizer->id}}">{{$organizer->user->name}}</option>
                                      @endforeach
                                  </optgroup>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="type">Tipo</label>
                                <select class="form-control" name="type">
                                  <option>Publico</option>
                                  <option>Privado</option>
                                </select>
                            </div>
                            <div class="form-group col-sm">
                                <label for="casification">Clasificación</label>
                                <select class="form-control" name="clasification">
                                  @foreach($clasifications as $clasification)
                                  <option value="{{$clasification->id}}">{{$clasification->id}}- {{$clasification->name}}</option>
                                  @endforeach
                                </select>
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
                                <input type="date" class="form-control" name="start_date">
                            </div>
                            <div class="form-group col-sm">
                                <label for="end_date">Fecha fin</label>
                                <input type="date" class="form-control" name="end_date">
                            </div>
                            <div class="form-group col-sm">
                              <label for="main_image">Imagen principal</label>
                              <!--<div class="input-group">
                                  <div class="custom-file">
                                      <input type="file" class="custom-file-input" name="main_image" accept="image/png, image/jpeg">
                                      <label class="custom-file-label" for="exampleInputFile">Choose file..</label>
                                  </div>
                                  <div class="input-group-append">
                                      <span class="input-group-text">Upload</span>
                                  </div>
                              </div>-->
                              <input type="file" name="main_image" accept="image/png, image/jpeg">
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="name">Descripción</label>
                                <textarea class="form-control ckeditor" rows="10" name="description" id="editor"></textarea>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="location">Ubicación</label>
                                <input type="text" class="form-control" name="location">
                            </div>
                            <div class="form-group col-sm">
                                <label for="location">MAPA</label>
                                <input type="text" class="form-control" name="coordenadas" disabled value="A IMPLEMENTAR">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="website">Sitio web</label>
                                <input type="text" class="form-control" name="website">
                            </div>
                            <div class="form-group col-sm">
                                <label for="type">Link externo</label>
                                <input type="text" class="form-control" name="external_link">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="fb_page">Página de Facebook</label>
                                <input type="text" class="form-control" name="fb_page">
                            </div>
                            <div class="form-group col-sm">
                                <label for="ig_page">Página de Instagram</label>
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

@section('js')
<script type="text/javascript">
$('.select2bs4').select2({
    theme: 'bootstrap4'
  })
$('#editor').ckeditor()
</script>
@endsection