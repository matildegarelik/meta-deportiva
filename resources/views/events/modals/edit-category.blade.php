<div class="modal fade" id="edit-category-modal" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Editar modalidad #<span id="id-cat"></span></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="{{ route('admin.event.update_category') }}">
            <div class="modal-body">
                @csrf
                <input type="hidden" name="id" >
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" >
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Precio</label>
                    <div class="col-sm-10">
                      <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Price" >
                    </div>
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group row">
                    <label for="availability" class="col-sm-2 col-form-label">Capacidad</label>
                    <div class="col-sm-10">
                      <input type="number" step="1" class="form-control @error('availability') is-invalid @enderror" name="availability" placeholder="Availability">
                    </div>
                    @error('availability')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="age_from" class="col-sm-2 col-form-label">Edad desde</label>
                    <div class="col-sm-4">
                      <input type="number" step="1" class="form-control @error('age_from') is-invalid @enderror" name="age_from" placeholder="from">
                    </div>
                    <label for="age_to" class="col-sm-2 col-form-label">Edad hasta</label>
                    <div class="col-sm-4">
                      <input type="number" step="1" class="form-control @error('age_to') is-invalid @enderror" name="age_to" placeholder="to">
                    </div>
                    @error('age_to')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="gender" class="col-sm-2 col-form-label">Género</label>
                    <div class="col-sm-10">
                      <select name="gender" class="form-control">
                        <option value="0">Todos</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                      </select>
                    </div>
                </div>
        
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->