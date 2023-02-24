@extends('layouts.app')

@section('pagetitle','Mi perfil')

@section('css')

<style>
.tickets label {
    margin: 10px 0 0px !important;
}
.tickets {
    border-bottom: 1px solid #cecece;
}
h2{
    margin: 0;
    font-size: 18px;
    color: #b3b3b3;
    text-align: center;
    text-transform: uppercase;
    border: none;
    padding: 0;
    margin-top:30px;
}
hr{
    margin-top:3px;
}
.col-form-label{
    text-align: right;
}
.profile-picture{
    text-align: center;
    margin-bottom:20px;
    
    
}
.profile-picture img{
    border-radius:75px;
    height: 150px;
    width: 150px;
}
</style>
@endsection

@section('content')

<section class="section-featured-header all-sports-events">
    <div class="container">
        <div class="section-content">
            <h1>Mi perfil</h1>
        </div>
    </div>
</section>

<section class="section-page-header">
    <div class="container">
        <h1 class="entry-title">Datos personales</h1>
    </div>
</section>

<section class="section-page-content">
    <div class="container">
        <div class="row">
            <div class="profile-picture">
                @if($participante->profile_picture)
                    <img src="{{asset('images/usuarios/'.$participante->profile_picture)}}">
                @elseif($participante->gender=='2')
                    <img src="{{asset('assets/admin-lte/dist/img/avatar3.png')}}" />
                @else
                    <img src="{{asset('assets/admin-lte/dist/img/avatar5.png')}}" />
                @endif
            </div>            
            <div class="ticket-price">
                <div class="tickets">
                    <form method="POST" action="{{route('participante.save_profile')}}" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="btn btn-block btn-success">Actualizar</button><hr>
                        <div class="form-group row">
                            <label class="col-md-1 col-form-label">Foto de perfil</label>
                            <div class="col-md-2">
                                <input type="file" name="profile_picture" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label">Nombre</label>
                            <div class="col-sm-5">
                                <input type="text" name="name" class="form-control" placeholder="Nombre..." value="{{$participante->name}}">
                            </div>
                            <label class="col-sm-1 col-form-label">Apellido paterno</label>
                            <div class="col-sm-5">
                                <input type="text" name="father_last_name" class="form-control" placeholder="Apellido paterno..." value="{{$participante->father_last_name}}">       
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label">Apellido materno</label>
                            <div class="col-sm-5">
                                <input type="text" name="mother_last_name" class="form-control" placeholder="Apellido materno..." value="{{$participante->mother_last_name}}">
                            </div>
                            <label class="col-sm-1 col-form-label">Género</label>
                            <div class="col-sm-5">
                                <select name="gender" class="form-control selectpicker dropdown">
                                    <option value="1" @if($participante->gender=='1') selected @endif>Masculino</option>
                                    <option value="2" @if($participante->gender=='2') selected @endif>Femenino</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label">N° de teléfono</label>
                            <div class="col-sm-5">
                                <input type="text" name="phone_number" class="form-control" value="{{$participante->phone_number}}">
                            </div>
                           <label class="col-sm-1 col-form-label">Fecha nacimiento</label>
                            <div class="col-sm-5">
                                <input type="date" name="date_of_birth" class="form-control"  value="{{$participante->date_of_birth}}">       
                            </div>
                        </div>
                        <h2>Domicilio</h2><hr>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label">Calle y número</label>
                            <div class="col-sm-7">
                                <input type="text" name="street_number" class="form-control" value="{{$participante->street_number}}">
                            </div>
                            <label class="col-sm-1 col-form-label">Código Postal</label>
                            <div class="col-sm-3">
                                <input type="text" name="zipcode" class="form-control"  value="{{$participante->zipcode}}">       
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label">Área</label>
                            <div class="col-sm-5">
                                <input type="text" name="area" class="form-control" placeholder="Área..." value="{{$participante->area}}">
                            </div>
                        
                            <label class="col-sm-1 col-form-label">Ciudad</label>
                            <div class="col-sm-5">
                                <input type="text" name="city" class="form-control" placeholder="Ciudad..." value="{{$participante->city}}">       
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label">Estado</label>
                            <div class="col-sm-5">
                                <input type="text" name="state" class="form-control" placeholder="estado..." value="{{$participante->state}}">
                            </div>
                            <label class="col-sm-1 col-form-label">País</label>
                            <div class="col-sm-5">
                                <input type="text" name="country" class="form-control" placeholder="País..." value="{{$participante->country}}">       
                            </div>
                        </div>
                        <h2>Contacto de emergencia</h2><hr>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label">Nombre</label>
                            <div class="col-sm-3">
                                <input type="text" name="ec_name" class="form-control" placeholder="nombre..." value="{{$participante->ec_name}}">
                            </div>
                            <label class="col-sm-1 col-form-label">N° de teléfono</label>
                            <div class="col-sm-3">
                                <input type="text" name="ec_phone" class="form-control" placeholder="número..." value="{{$participante->ec_phone}}">       
                            </div>
                            <label class="col-sm-1 col-form-label">Relación</label>
                            <div class="col-sm-3">
                                <input type="text" name="ec_relationship" class="form-control" placeholder="relación..." value="{{$participante->ec_relationship}}">       
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection