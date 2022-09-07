<!--<div class="row">
    <div class="form-group col-sm-12">
        <label>Prestamo</label>
        <select name="PRE_ID" class="form-control PRE_ID" required>
            @foreach($prestamos as $p)
                <option value="{{$p->PRE_ID}}">{{$p->PRE_ID}}</option>
            @endforeach
        </select>
    </div>
</div>-->
<div class="row">
    <div class="form-group col-sm-6">
        <label>Fecha</label>
        <input type="date" name="DEV_FECHA" class="form-control DEV_FECHA" required value="{{ date('Y-m-d')}}">
    </div>
    <div class="form-group col-sm-6">
        <label>Hora</label>
        <input type="time" name="DEV_HORA" class="form-control DEV_HORA" required value="{{ date('H:i')}}">
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        <label>Observaciones</label>
        <textarea type="text" name="DEV_OBS" class="form-control DEV_OBS" ></textarea>
    </div>
</div>
<input type="hidden" name="PRE_ID" class="form-control PRE_ID" required>