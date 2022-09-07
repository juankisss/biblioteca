<div class="row">
    <div class="form-group col-sm-6">
        <label>Categoría</label>
        <select name="CAT_NOMBRE" class="js-example-basic-multiple CAT_ID SELECT2" required>
            <option value="">--Seleccione un Contenido--</option>
            @foreach($categorias as $s)
                <option value="{{ $s->CAT_ID}}">{{ $s->CAT_NOMBRE}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        <label>Sección</label>
        <select name="SEC_NOMBRE" class="js-example-basic-multiple SEC_ID SELECT2" required>
            <option value="">--Seleccione un Contenido--</option>
            @foreach($secciones as $s)
                <option value="{{ $s->SEC_ID}}">{{ $s->SEC_NOMBRE}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        <label>Autor</label>
        <select name="AUT_NOMBRE" class="js-example-basic-multiple AUT_ID SELECT2" required>
            <option value="">--Seleccione un Contenido--</option>
            @foreach($autores as $s)
                <option value="{{ $s->AUT_ID}}">{{ $s->AUT_NOMBRE}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        <label>Editorial</label>
        <select name="EDI_NOMBRE" class="js-example-basic-multiple EDI_ID SELECT2" required>
            <option value="">--Seleccione un Contenido--</option>
            @foreach($editoriales as $s)
                <option value="{{ $s->EDI_ID}}">{{ $s->EDI_NOMBRE}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        <label>ISBN</label>
        <input type="text" name="CON_ISBN" class="form-control CON_ISBN" required>
    </div>
    <div class="form-group col-sm-6">
        <label>Título</label>
        <input type="text" name="CON_TITULO" class="form-control CON_TITULO" required>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        <label>Subtítulo</label>
        <input type="text" name="CON_SUBTITULO" class="form-control CON_SUBTITULO">
    </div>
    <div class="form-group col-sm-6">
        <label>Edición</label>
        <input type="text" name="CON_EDICION" class="form-control CON_EDICION">
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        <label>Descripción</label>
        <textarea type="text" name="CON_DESC" class="form-control CON_DESC"></textarea>
    </div>
    <div class="form-group col-sm-6">
        <label>Resumen</label>
        <textarea type="text" name="CON_RESUMEN" class="form-control CON_RESUMEN"></textarea>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-4">
        <label>Año de publicación</label>
        <input type="number" name="CON_ANIOP" class="form-control CON_ANIOP">
    </div>
    <div class="form-group col-sm-4">
        <label>Idioma</label>
        <input type="text" name="CON_LENGUAJE" class="form-control CON_LENGUAJE">
    </div>
    <div class="form-group col-sm-4">
        <label>Número de páginas</label>
        <input type="number" name="CON_NPAGS" class="form-control CON_NPAGS">
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        <label>Tipo</label>
        <!--<input type="text" name="CON_TIPO" class="form-control CON_TIPO">-->
        <select name="CON_TIPO" class="form-control CON_TIPO SELECT">
        	<option value="1">Libros</option>
            <option value="2">Revistas</option>
            <option value="3">Cuentos</option>
        </select>
    </div>
    <div class="form-group col-sm-6">
        <label>Imagen: </label>&nbsp;<span class="fileinput-preview"></span>
        <input type="file" name="file" class="form-control">
        <input type="hidden" name="CON_IMAGEN" class="CON_IMAGEN IMG">
    </div>
</div>