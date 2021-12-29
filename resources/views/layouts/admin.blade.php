
<form action="{{ route('task.add') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <label for="numero_id" class="col-4 col-form-label">Usuario Id</label>
                                
        <div class="col-6 mb-3">
            <input id="numero_id" type="number" class="form-control" name="user_id">
        </div>
                                
        <label for="zona" class="col-4 col-form-label">Zona</label>

        <div class="col-6 mb-3">
            <input id="zona" type="text" class="form-control" name="zona">
        </div>
                                
        <label for="numero" class="col-4 col-form-label">Numero</label>

        <div class="col-6 mb-3">
            <input id="numero" type="number" class="form-control" name="numero">
        </div>

        <label for="calle" class="col-4 col-form-label">Calle</label>

        <div class="col-6 mb-3">
            <input id="calle" type="text" class="form-control" name="calle">
        </div>

        <label for="descripcion_problema" class="col-4 col-form-label">Descripcion</label>

        <div class="col-6 mb-3">
            <input id="descripcion_problema" type="text" class="form-control" name="descripcion_problema">
        </div>
        
        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-success col-4" value="Guardar">
        </div>
    </div>
</form>
