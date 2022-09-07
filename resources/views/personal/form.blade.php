<div class="form-row">
    <div class="col-sm-6">  
        <div class="row">
            <div class="form-group col-sm-12">
                <label>Nombres</label>
                <input type="text" name="PER_NOMBRES" class="form-control PER_NOMBRES" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12">
                <label>Apellidos</label>
                <input type="text" name="PER_APELLIDOS" class="form-control PER_APELLIDOS" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12">
                <label>CI</label>
                <input type="text" name="PER_CI" class="form-control PER_CI" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12">
                <label>Genero</label>
                <select name="PER_GENERO" class="form-control PER_GENERO">
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12">
                <label>Fecha de Nacimiento</label>
                <input type="text" name="PER_FECHAN" class="form-control fechan PER_FECHAN" required>
            </div>
        </div>
        <!--<div class="row">
            <div class="form-group col-sm-12">
                <label>Rol</label>
                <input type="text" name="PER_ROL" class="form-control PER_ROL">
            </div>
        </div>-->
    </div>
    <div class="col-sm-6"> 
        <div class="row">
            <div class="form-group col-sm-12">
                <label>E-Mail</label>
                <input type="email" name="PER_EMAIL" class="form-control PER_EMAIL">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12">
                <label>Celular</label>
                <input type="number" name="PER_CELULAR" class="form-control PER_CELULAR">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12">
                <label>Dirección</label>
                <input type="text" name="PER_DIRECCION" class="form-control PER_DIRECCION">
            </div>
        </div>
        <!--<div class="row">
            <div class="form-group col-sm-12">
                <label>Cargo</label>
                <input type="text" name="PER_CARGO" class="form-control PER_CARGO">
            </div>
        </div>-->
        <!--<div class="row">
            <div class="form-group col-sm-12">
                <label>Estado</label>
                <select name="PER_ESTADO" class="form-control PER_ESTADO" required>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
            </div>
        </div>-->
        <div class="row">
            <div class="form-group col-sm-12">
                <label>Foto:</label>&nbsp;<span class="fileinput-preview"></span>
                <input type="file" name="file" class="form-control">
                <input type="hidden" name="PER_FOTO" class="PER_FOTO IMG">
            </div>
        </div>
    </div>
</div>