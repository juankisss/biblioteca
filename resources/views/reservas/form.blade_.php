<div class="row">
    <div class="form-group col-sm-12">
        <label>Ejemplar</label>
        <select name="EJE_ID" class="js-example-basic-multiple EJE_ID SELECT" required>
            <option value="">--Seleccione un Contenido--</option>
            @foreach($ejemplares as $e)
                <option value="{{$e->EJE_ID}}">{{ 'Cod:'.$e->EJE_CODIGO.' - ISBN:'.$e->CON_ISBN.' - Titulo:'.$e->CON_TITULO.' - Autor:'.$e->AUT_NOMBRE}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        <label>Lector</label>&nbsp;
        @php $cont=0 @endphp
        @foreach($tipo as $tip) @php $cont++ @endphp
        <label><input type="radio" name="TIL_ID" value="{{$tip->LET_ID}}" @if($cont==1) checked @endif class="tipo" dir="{{$tip->LET_TIEMPOM}}"> {{$tip->LET_NOMBRE}}</label>
        <!--<label><input type="radio" name="TIL_ID" value="2" class="tipo"> Docente</label>
        <label><input type="radio" name="TIL_ID" value="3" class="tipo"> Externo</label>-->
        @endforeach
        <select name="USL_ID" class="js-example-basic-multiple USL_ID SELECT" required>
            @foreach($lectores as $e)
                <option value="{{$e->LEC_ID}}">Nombre: {{$e->LEC_NOMBRES}} {{$e->LEC_APELLIDOS}} - CI: {{$e->LEC_CI}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-3">
        <label>Desde/Fecha</label>
        <input type="text" name="RES_DESDEF" class="form-control RES_DESDEF fechar fecha1" required>
    </div>
    <div class="form-group col-sm-3">
        <label>Desde/Hora</label>
        <input type="time" name="RES_DESDEH" class="form-control RES_DESDEH" required>
    </div>
    <div class="form-group col-sm-3">
        <label>Hasta/Fecha</label>
        <input type="text" name="RES_HASTAF" class="form-control RES_HASTAF fechar fecha2" required>
    </div>
    <div class="form-group col-sm-3">
        <label>Hasta/Hora</label>
        <input type="time" name="RES_HASTAH" class="form-control RES_HASTAH" required>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        <label>Observaciones</label>
        <textarea type="text" name="RES_OBS" class="form-control RES_OBS"></textarea>
    </div>
</div>
<input type="hidden" name="RES_FECHA" class="form-control RES_FECHA" required value="{{ date('Y-m-d')}}">
<input type="hidden" name="USP_ID" class="form-control USP_ID" required value="1">