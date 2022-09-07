    
    <div class="row">
        <div class="form-group col-sm-8">
            <label for="direccion">Personal</label>
            <select class="form-control" name="PER_ID" id="personal" required>
                <option value="1">Personal1</option>
                <option value="2">Personal2</option>
            </select>
        </div>
        <div class="form-group col-sm-4">
            <label for="estado">Estado</label>
            <select class="form-control" name="USU_ESTADO" id="estado" required>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6">
            <label for="usuario">Usuario<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                @if(isset($usuario))
                    <textarea class="form-control'" name="USU_CODIGO" data-id="1" id="codigo" cols="30" rows="10" readonly></textarea>
                @else
                    <textarea class="form-control'" name="USU_CODIGO" data-id="1" id="codigo" cols="30" rows="10" onKeyUp="codigou(this.value)" required ></textarea>
                @endif
                    <input type="hidden" class="form-control" id="codigo" value="0">
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label for="">Contraseña <span class="text-danger">*</span></label>
            <input class="form-control" type="password" data-id="1" name="USU_CLAVE" id="clave" required>
        </div>
    </div>
