<div class="row">
    <div class="form-group col-sm-6">
        <label>Fecha</label>
        <input type="date" name="ADQ_FECHA" class="form-control ADQ_FECHA" value="{{ date('Y-m-d')}}">
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        <label>Ejemplar</label>
        <select name="EJE_ID" class="form-control EJE_ID" required>
            @foreach($ejemplares as $e)
                <option value="{{$e->CON_ID}}">{{$e->CON_TITULO}} - {{$e->CON_SUBTITULO}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        <label>Observaciones</label>
        <textarea type="text" name="ADQ_OBS" class="form-control ADQ_OBS"></textarea>
    </div>
</div>
<input type="hidden" name="ADQ_CANTIDAD" class="form-control ADQ_CANTIDAD" value="1">
<input type="hidden" name="USU_ID" class="form-control USU_ID" value="1">