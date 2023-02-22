<div class="modal fade" id="add-cupon-modal" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Nuevo cupón</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="{{ route('admin.event.new_cupon') }}">
            <div class="modal-body">
                @csrf
                <input type="hidden" name="event" value="{{$id}}"/>

                <div class="form-group row">
                    <label for="code" class="col-sm-2 col-form-label">Código</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" placeholder="Code" >
                    </div>
                    @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="discount_amount" class="col-sm-2 col-form-label">Descuento</label>
                    <div class="col-sm-4">
                      <input type="number" step="0.01" class="form-control @error('discount_amount') is-invalid @enderror" name="discount_amount" placeholder="discount">
                    </div>
                    <label for="percentage" class="col-sm-2 col-form-label">Porcentaje</label>
                    <div class="col-sm-4">
                      <input type="number" step="1" class="form-control @error('percentage') is-invalid @enderror" name="percentage" placeholder="percentage">
                    </div>
                    @error('percentage')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="valid_from" class="col-sm-2 col-form-label">Válido desde</label>
                    <div class="col-sm-4">
                      <input type="date" class="form-control @error('valid_from') is-invalid @enderror" name="valid_from">
                    </div>
                    <label for="valid_to" class="col-sm-2 col-form-label">Válido hasta</label>
                    <div class="col-sm-4">
                      <input type="date" class="form-control @error('valid_to') is-invalid @enderror" name="valid_to">
                    </div>
                    @error('valid_to')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="usage_limit" class="col-sm-2 col-form-label">Límite de uso</label>
                    <div class="col-sm-10">
                      <input type="number" step="1" class="form-control @error('usage_limit') is-invalid @enderror" name="usage_limit" placeholder="Limit">
                    </div>
                    @error('usage_limit')
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