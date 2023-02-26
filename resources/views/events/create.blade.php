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
                                  @foreach($organizations as $organization)
                                  <optgroup label="{{$organization->name}}">
                                      @foreach($organization->organizers as $organizer)
                                      <option value="{{$organizer->id}}" {{old ('organizer') == $organizer->id ? 'selected' : ''}}>{{$organizer->user->name}}</option>
                                      @endforeach
                                  </optgroup>
                                  @endforeach
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
                                  @foreach($clasifications as $clasification)
                                  <option value="{{$clasification->id}}" {{old ('clasification') == $clasification->id ? 'selected' : ''}}>{{$clasification->id}}- {{$clasification->name}}</option>
                                  @endforeach
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
                                <textarea class="form-control ckeditor @error('description') is-invalid @enderror" rows="10" name="description" id="editor">
                                  {{old('description')}}
                                </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
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
                        <!--</div>
                        <div class="row">-->
                            <div class="form-group col-sm">
                                <label for="location">MAPA</label>
                                <input type="text" class="form-control" name="coordenadas" disabled value="A IMPLEMENTAR">
                                <div id="map"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="website">Sitio web</label>
                                <input type="text" class="form-control" name="website" value="{{old('website')}}">
                            </div>
                            <div class="form-group col-sm">
                                <label for="type">Link externo</label>
                                <input type="text" class="form-control" name="external_link" value="{{old('external_link')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="fb_page">Página de Facebook</label>
                                <input type="text" class="form-control" name="fb_page" value="{{old('fb_page')}}">
                            </div>
                            <div class="form-group col-sm">
                                <label for="ig_page">Página de Instagram</label>
                                <input type="text" class="form-control" name="ig_page" value="{{old('ig_page')}}">
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

$('#start_date').datetimepicker({ icons: { time: 'far fa-clock' } });
$('#end_date').datetimepicker({ icons: { time: 'far fa-clock' } });

</script>
@endsection