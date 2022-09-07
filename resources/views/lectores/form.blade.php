<div class="row">
    <div class="form-group col-sm-6">
        <label>Nombres</label>
        <input type="text" name="LEC_NOMBRES" class="form-control LEC_NOMBRES" required>
    </div>
    <div class="form-group col-sm-6">
        <label>Apellidos</label>
        <input type="text" name="LEC_APELLIDOS" class="form-control LEC_APELLIDOS" required>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        <label>Tipo</label>
        <select name="LET_ID" class="form-control LET_ID" required>
            @foreach($lectortipos as $lt)
                <option value="{{$lt->LET_ID}}">{{$lt->LET_NOMBRE}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        <label>CI</label>
        <input type="text" name="LEC_CI" class="form-control LEC_CI" >
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        <label>Género</label>
        <select name="LEC_GENERO" class="form-control LEC_GENERO">
            <option value="1">Masculino</option>
            <option value="2">Femenino</option>
        </select>
    </div>
    <div class="form-group col-sm-6">
        <label>e-Mail</label>
        <input type="email" name="LEC_EMAIL" class="form-control LEC_EMAIL" required>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        <label>Celular</label>
        <input type="number" name="LEC_CELULAR" class="form-control LEC_CELULAR" required>
    </div>
    <div class="form-group col-sm-6">
        <label for="usuario">Contraseña</label>
        <input type="password" class="form-control USU_CLAVE" name="USU_CLAVE" required>
        <input type="hidden" class="form-control USU_CLAVE" name="CLAVE">
        <input type="hidden" class="form-control USU_ID" name="USU_ID">
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        <label>Dirección</label>
        <textarea type="text" name="LEC_DIRECCION" class="form-control LEC_DIRECCION"></textarea>
    </div>
</div>