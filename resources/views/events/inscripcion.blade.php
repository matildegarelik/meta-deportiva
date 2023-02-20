@extends('layouts.admin')

@section('pagetitle','Detalle inscripción')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detalles de Inscricpión #{{$inscripcion->id}}
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home.admin')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.events')}}">Events</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.event',$inscripcion->event_id)}}">Event #{{$inscripcion->event_id}}</a></li>
            <li class="breadcrumb-item active">Inscripción {{$inscripcion->id}}</li>
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
                  <h3 class="card-title">Datos Participante</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body px-3">
                  <div class="form-group row">
                      <label class="col-sm-1 col-form-label">Nombre</label>
                      <div class="col-sm-5">
                          <input type="text" name="name" class="form-control" placeholder="Nombre..." value="{{$inscripcion->participante()->name}}" readonly>
                      </div>
                      <label class="col-sm-1 col-form-label">Apellido paterno</label>
                      <div class="col-sm-5">
                          <input type="text" name="father_last_name" class="form-control" placeholder="Apellido paterno..." value="{{$inscripcion->participante()->father_last_name}}" readonly>       
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-1 col-form-label">Apellido materno</label>
                      <div class="col-sm-5">
                          <input type="text" name="mother_last_name" class="form-control" placeholder="Apellido materno..." value="{{$inscripcion->participante()->mother_last_name}}" readonly>
                      </div>
                      <label class="col-sm-1 col-form-label">Género</label>
                      <div class="col-sm-5">
                          <select name="gender" class="form-control selectpicker dropdown" disabled>
                              <option value="1" @if($inscripcion->participante()->gender=='1') selected @endif>Masculino</option>
                              <option value="2" @if($inscripcion->participante()->gender=='2') selected @endif>Femenino</option>
                          </select>
                      </div>
                      
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-1 col-form-label">N° de teléfono</label>
                      <div class="col-sm-5">
                          <input type="text" name="phone_number" class="form-control" value="{{$inscripcion->participante()->phone_number}}" readonly>
                      </div>
                    <label class="col-sm-1 col-form-label">Fecha nacimiento</label>
                      <div class="col-sm-5">
                          <input type="date" name="date_of_birth" class="form-control"  value="{{$inscripcion->participante()->date_of_birth}}" readonly>       
                      </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Domicilio</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body px-3">
                  <div class="form-group row">
                      <label class="col-sm-1 col-form-label">Calle y número</label>
                      <div class="col-sm-7">
                          <input type="text" name="street_number" class="form-control" value="{{$inscripcion->participante()->street_number}}"  readonly>
                      </div>
                      <label class="col-sm-1 col-form-label">Código Postal</label>
                      <div class="col-sm-3">
                          <input type="text" name="zipcode" class="form-control"  value="{{$inscripcion->participante()->zipcode}}"  readonly>       
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-1 col-form-label">Área</label>
                      <div class="col-sm-5">
                          <input type="text" name="area" class="form-control" placeholder="Área..." value="{{$inscripcion->participante()->area}}" readonly>
                      </div>
                  
                      <label class="col-sm-1 col-form-label">Ciudad</label>
                      <div class="col-sm-5">
                          <input type="text" name="city" class="form-control" placeholder="Ciudad..." value="{{$inscripcion->participante()->city}}" readonly>       
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-1 col-form-label">Estado</label>
                      <div class="col-sm-5">
                          <input type="text" name="state" class="form-control" placeholder="estado..." value="{{$inscripcion->participante()->state}}" readonly>
                      </div>
                      <label class="col-sm-1 col-form-label">País</label>
                      <div class="col-sm-5">
                          <input type="text" name="country" class="form-control" placeholder="País..." value="{{$inscripcion->participante()->country}}" readonly>       
                      </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Contacto de emergencia</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body px-3">
                  <div class="form-group row">
                    <label class="col-sm-1 col-form-label">Nombre</label>
                    <div class="col-sm-3">
                        <input type="text" name="ec_name" class="form-control" placeholder="nombre..." value="{{$inscripcion->participante()->ec_name}}" readonly>
                    </div>
                    <label class="col-sm-1 col-form-label">N° de teléfono</label>
                    <div class="col-sm-3">
                        <input type="text" name="ec_phone" class="form-control" placeholder="número..." value="{{$inscripcion->participante()->ec_phone}}" readonly>       
                    </div>
                    <label class="col-sm-1 col-form-label">Relación</label>
                    <div class="col-sm-3">
                        <input type="text" name="ec_relationship" class="form-control" placeholder="relación..." value="{{$inscripcion->participante()->ec_relationship}}" readonly>       
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- Categoría -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Categoría</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body px-3">
                  <p>Categoría: <b>{{$inscripcion->category->name}}</b></p>
                </div>
              </div>

              <!-- Preguntas adicionales -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Preguntas adicionales</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body px-3">
                  @foreach($inscripcion->answers as $answer)
                  <p>@if($answer->question->type==3)Opción seleccionada: @else {{$answer->question->content}}@endif <b>{{$answer->answer}}</b></p>
                  @endforeach
                </div>
              </div>

              @if($inscripcion->cupon_id)
              <!-- Cupon -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Cupon</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body px-3">
                  <p>Código: <b>{{$inscripcion->cupon->code}}</b></p>
                  <p>Descuento <b>{{$inscripcion->cupon->discount_amount}}</b></p>
                </div>
              </div>
              @endif

              
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
