<div class="modal fade" id="add-sponsor-modal" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Nuevo sponsor</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="{{ route('admin.event.new_sponsor') }}" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <input type="hidden" name="event" value="{{$id}}"/>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" required class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nombre" >
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Imagen</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                        <span class="text-muted">*El tamaño debe ser de 200px x 40px</span>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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