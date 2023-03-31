<div class="modal fade" id="add-page-modal" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Nueva Página Extra</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="{{ route('admin.new_page') }}" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('nombre') is-invalid @enderror" required name="nombre" placeholder="Nombre" >
                    </div>
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Mostrar en menu</label>
                    <div class="col-sm-10">
                      <input type="checkbox" class="form-control" name="menu" >
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="name">Contenido</label>
                    <textarea class="form-control ckeditor @error('content') is-invalid @enderror" rows="10" name="content" id="editor">
                        {{old('content')}}
                    </textarea>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="name">Imagen</label>
                    <input type="file" name="image">
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