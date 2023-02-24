<div class="modal fade" id="edit-question-modal" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Editar pregunta #<span id="id-quest"></span></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="{{ route('admin.event.update_question') }}">
            <div class="modal-body">
                @csrf
                <input type="hidden" name="id" >
                <div class="form-group row">
                    <label for="type" class="col-sm-2 col-form-label">Tipo</label>
                    <div class="col-sm-10">
                      <select name="type" class="form-control" id="tipo-edit">
                        <option value="1">OPEN FIELD</option>
                        <option value="2">YES/NO</option>
                        <option value="3">SELECT ONE OPTION</option>
                      </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="content" class="col-sm-2 col-form-label">Contenido</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" placeholder="Content" >
                    </div>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row" style="display:none" id="options-edit">
                    <label for="options" class="col-sm-2 col-form-label">Opciones</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('options') is-invalid @enderror" name="options" placeholder="Opcion 1, opcion2, ..." >
                      <span class="text-muted">*Ingresar opciones separadas por una coma</span>
                    </div>
                   
                    @error('options')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="required" class="col-sm-2 col-form-label">Requerida</label>
                    <div class="col-sm-4">
                      <select name="required" class="form-control">
                            <option value="0">NO</option>
                            <option value="1">SI</option>
                        </select>
                    </div>
                    <label for="order" class="col-sm-2 col-form-label">Orden</label>
                    <div class="col-sm-4">
                      <input type="number" step="1" class="form-control @error('order') is-invalid @enderror" name="order" placeholder="Order">
                    </div>
                    @error('order')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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