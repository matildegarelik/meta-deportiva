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
                              <span class="text-muted">*El tamaño debe ser de 1539px x 322px</span>
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
                            <div class="form-group col-sm-6">
                                <label for="location">Ubicación</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{old('location')}}">
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="location">Lat.</label>
                                <input type="text" class="form-control" name="lat" readonly id="lat" value="{{ old('lat') }}">
                            </div>
                            <div class="form-group col-sm-3">
                              <label for="location">Long.</label>
                              <input type="text" class="form-control" name="long" readonly id="long" value="{{ old('long') }}">
                          </div>
                          @error('lat')
                              <span class="invalid-feedback" role="alert">
                                  <strong>Es necesario seleccionar un lugar en el mapa</strong>
                              </span>
                          @enderror
                        </div>
                        <div class="row">
                          <input id="pac-input" class="controls" type="text" placeholder="Search Box" style="width:80%; height: 30px; margin-top:15px" />
                              <div id="map" style="width: 100%; height: 400px"></div>
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
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1ftWVTDrIHJfgbBUHeyEJmDbovqpozD4&callback=initAutocomplete&libraries=places&v=weekly"
    defer
></script>
<script type="text/javascript">
$('.select2bs4').select2({
    theme: 'bootstrap4'
  })
//$('#editor').ckeditor()

$('form input').keydown(function (e) {
    if (e.keyCode == 13) {
        e.preventDefault();
        return false;
    }
});

$('#start_date').datetimepicker({ icons: { time: 'far fa-clock' } });
$('#end_date').datetimepicker({ icons: { time: 'far fa-clock' } });

$('#start_date').on('change.datetimepicker',function(e,od){
  if(e.date){
    $('input[name="end_date"]').val(($('input[name="start_date"]').val()))
  }
})

function initAutocomplete() {
  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -33.8688, lng: 151.2195 },
    zoom: 13,
    mapTypeId: "roadmap",
  });
  // Create the search box and link it to the UI element.
  const input = document.getElementById("pac-input");
  const searchBox = new google.maps.places.SearchBox(input);

  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  // Bias the SearchBox results towards current map's viewport.
  map.addListener("bounds_changed", () => {
    searchBox.setBounds(map.getBounds());
  });

  new google.maps.Marker({
    map,
    //icon,
    //title:,
    draggable:true,
    position: { lat: -33.8688, lng: 151.2195 },
  })

  let markers = [];

  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener("places_changed", () => {
    const places = searchBox.getPlaces();
    
    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach((marker) => {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    const bounds = new google.maps.LatLngBounds();

    places.forEach((place) => {
      if (!place.geometry || !place.geometry.location) {
        console.log("Returned place contains no geometry");
        return;
      }

      document.getElementById('lat').value = place.geometry.location.lat();
      document.getElementById('long').value = place.geometry.location.lng();
      $('input[name="location"]').val($('#pac-input').val());
      //console.log($('#pac-input').val())

      // Create a marker for each place.
      markers.push(
        new google.maps.Marker({
          map,
          //icon,
          title: place.name,
          position: place.geometry.location,
          draggable:true
        })
      );
      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });
}
window.initAutocomplete = initAutocomplete;
</script>
@endsection