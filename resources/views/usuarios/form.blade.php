<div class="row">
    <div class="form-group col-sm-6">
        <label for="usuario">Usuario<span class="text-danger">*</span></label>
        <input type="text" class="form-control USU_CODIGO" name="USU_CODIGO" id="codigo" required>
	</div>
    <div class="form-group col-sm-6">
        <label for="usuario">Contraseña<span class="text-danger">*</span></label>
        <input type="password" class="form-control USU_CLAVE" name="USU_CLAVE" id="codigo" required>
        <input type="hidden" class="form-control USU_CLAVE" name="CLAVE">
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        <label>Personal<span class="text-danger">*</span></label>
        <select name="PER_ID" class="form-control PER_ID" required>
            <option value="">--Seleccione un Personal--</option>
            @foreach($personal as $s)
                <option value="{{ $s->PER_ID }}">{{ $s->PER_NOMBRES.' '.$s->PER_APELLIDOS }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        <label for="usuario">Tipo<span class="text-danger">*</span></label>
        <select name="USU_TIPO" class="form-control USU_TIPO" required>
        	<option value="1">Administrador</option>
            <option value="2">Bibliotecario</option>
            <!--<option value="3">Lector</option>-->
        </select>
    </div>
</div>
<!--<div class="row">
    <div class="form-group col-sm-12">
        <label>Estado</label>
        <select name="USU_ESTADO" class="form-control USU_ESTADO" required>
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
        </select>
    </div>
</div>-->
