<div class="modal fade" id="edit-inscripcion-modal" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Editar inscripcion #<span id="id-insc"></span></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="{{ route('admin.event.update_inscripcion') }}">
            <div class="modal-body">
                @csrf
                <input type="hidden" name="id" >
                
                <div class="form-group row">
                    <label for="gender" class="col-sm-2 col-form-label">Estado</label>
                    <div class="col-sm-10">
                      <select name="estado" class="form-control">
                        <option>Pendiente</option>
                        <option>Confirmado</option>
                        <option>Cancelado</option>
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