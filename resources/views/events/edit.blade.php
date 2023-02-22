@extends('layouts.admin')

@section('pagetitle','Editar evento')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Editar evento #{{$event->id}}
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home.admin')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.events')}}">Eventos</a></li>
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
                </div>
                <!-- /.card-header -->
                <div class="card-body px-3">
                    <form method="POST" action="{{ route('admin.event.update') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$event->id}}">
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" value="{{$event->name}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="name">Organizador</label>
                                <select class="form-control select2bs4" name="organizer">
                                    @foreach($organizations as $organization)
                                    <optgroup label="{{$organization->name}}">
                                        @foreach($organization->organizers as $organizer)
                                        <option value="{{$organizer->id}}" @if($event->organizer_id==$organizer->id) selected @endif>{{$organizer->user->name}}</option>
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="type">Tipo</label>
                                <input type="text" class="form-control" name="type"  value="{{$event->type}}">
                            </div>
                            <div class="form-group col-sm">
                                <label for="casification">Clasificación</label>
                                <select class="form-control" name="clasification">
                                @foreach($clasifications as $clasification)
                                  <option value="{{$clasification->id}}" @if($event->clasification_id==$clasification->id) selected @endif>{{$clasification->id}}- {{$clasification->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-check col-sm">
                                <input type="checkbox" class="form-check-input mt-4" name="featured" @if($event->featured_event) checked @endif>
                                <label class="form-check-label ml-5 mt-4" for="featured">Featured event?</label>
                                <input type="checkbox" class="form-check-input mt-4" name="published" @if($event->published) checked @endif>
                                <label class="form-check-label ml-5 mt-4" for="published">Published event?</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="start_date">Fecha inicio</label>
                                <input type="text" class="form-control" name="start_date"  value="{{$event->start_date}}">
                            </div>
                            <div class="form-group col-sm">
                                <label for="end_date">Fecha fin</label>
                                <input type="text" class="form-control" name="end_date"  value="{{$event->end_date}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="name">Descripción</label>
                                <textarea class="form-control" id="editor" rows="5" name="description">{{$event->description}}</textarea>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="location">Ubicación</label>
                                <input type="text" class="form-control" name="location"  value="{{$event->location}}">
                            </div>
                            <div class="form-group col-sm">
                                <label for="main_image">Imagen principal</label>
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
                                <label for="website">Sitio web</label>
                                <input type="text" class="form-control" name="website"  value="{{$event->website}}">
                            </div>
                            <div class="form-group col-sm">
                                <label for="type">Link externo</label>
                                <input type="text" class="form-control" name="external_link"  value="{{$event->external_link}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="fb_page">Página de Facebook</label>
                                <input type="text" class="form-control" name="fb_page"  value="{{$event->fb_page}}">
                            </div>
                            <div class="form-group col-sm">
                                <label for="ig_page">Página de Instagram</label>
                                <input type="text" class="form-control" name="ig_page"  value="{{$event->ig_page}}">
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

const urlParams = new URLSearchParams(window.location.search);
if(urlParams.get('msg') && urlParams.get('msg')!='')
    toastr.error(urlParams.get('msg'))
</script>

@endsection