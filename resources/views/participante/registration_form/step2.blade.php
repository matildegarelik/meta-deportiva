<div class="section-order-details-event-info">
    <!--<a href="{{route('participante.profile')}}" class="btn btn-block btn-success">Actualizar</a><hr>-->
    <div class="seat-details mt-5">
        <h3>Información personal</h3>
        <div class="seat-details-info">
            <div class="form-group row">
                <label class="col-sm-1 col-form-label">Nombre</label>
                <div class="col-sm-5">
                    <input type="text" name="name" class="form-control" readonly value="{{$participante->name}}">
                </div>
                <label class="col-sm-1 col-form-label">Apellido paterno</label>
                <div class="col-sm-5">
                    <input type="text" name="father_last_name" class="form-control" readonly value="{{$participante->father_last_name}}">       
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-1 col-form-label">Apellido materno</label>
                <div class="col-sm-5">
                    <input type="text" name="mother_last_name" class="form-control" readonly value="{{$participante->mother_last_name}}">
                </div>
                <label class="col-sm-1 col-form-label">Género</label>
                <div class="col-sm-5">
                    <select name="gender" class="form-control selectpicker dropdown" disabled>
                        <option value="1" @if($participante->gender=='1') selected @endif>Masculino</option>
                        <option value="2" @if($participante->gender=='2') selected @endif>Femenino</option>
                    </select>
                </div>
                
            </div>
            <div class="form-group row">
                <label class="col-sm-1 col-form-label">N° de teléfono</label>
                <div class="col-sm-5">
                    <input type="text" name="phone_number" readonly class="form-control" value="{{$participante->phone_number}}">
                </div>
                <label class="col-sm-1 col-form-label">Fecha nacimiento</label>
                <div class="col-sm-5">
                    <input type="date" name="date_of_birth" class="form-control" readonly value="{{$participante->date_of_birth}}">       
                </div>
            </div>
        </div>
    </div>
    <div class="seat-details mt-5">
        <h3>Domicilio</h3>
        <div class="seat-details-info">
            <div class="form-group row">
                <label class="col-sm-1 col-form-label">Calle y número</label>
                <div class="col-sm-7">
                    <input type="text" name="street_number" class="form-control" readonly value="{{$participante->street_number}}">
                </div>
                <label class="col-sm-1 col-form-label">Código Postal</label>
                <div class="col-sm-3">
                    <input type="text" name="zipcode" class="form-control" readonly value="{{$participante->zipcode}}">       
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-1 col-form-label">Área</label>
                <div class="col-sm-5">
                    <input type="text" name="area" class="form-control" readonly value="{{$participante->area}}">
                </div>
            
                <label class="col-sm-1 col-form-label">Ciudad</label>
                <div class="col-sm-5">
                    <input type="text" name="city" class="form-control" readonly value="{{$participante->city}}">       
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-1 col-form-label">Estado</label>
                <div class="col-sm-5">
                    <input type="text" name="state" class="form-control" readonly value="{{$participante->state}}">
                </div>
                <label class="col-sm-1 col-form-label">País</label>
                <div class="col-sm-5">
                    <input type="text" name="country" class="form-control" readonly value="{{$participante->country}}">       
                </div>
            </div>
        </div>
    </div>
    <div class="seat-details mt-5">
        <h3>Contacto de emergencia</h3>
        <div class="seat-details-info">
            <div class="form-group row">
                <label class="col-sm-1 col-form-label">Nombre</label>
                <div class="col-sm-3">
                    <input type="text" name="ec_name" class="form-control" readonly value="{{$participante->ec_name}}">
                </div>
                <label class="col-sm-1 col-form-label">N° de teléfono</label>
                <div class="col-sm-3">
                    <input type="text" name="ec_phone" class="form-control" readonly value="{{$participante->ec_phone}}">       
                </div>
                <label class="col-sm-1 col-form-label">Relación</label>
                <div class="col-sm-3">
                    <input type="text" name="ec_relationship" class="form-control" readonly value="{{$participante->ec_relationship}}">       
                </div>
            </div>
        </div>        
    </div>
</div>
