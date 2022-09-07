    
    <div class="row">
        <div class="form-group col-sm-12">
            <label>Codigo</label>
            <input type="text" name="EJE_CODIGO" class="form-control EJE_CODIGO" required>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-12">
            <label>Detalle</label>
            <textarea name="EJE_DETALLE" class="form-control EJE_DETALLE"></textarea>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-sm-12">
            <label>Observaciones</label>
            <textarea name="EJE_OBS" class="form-control EJE_OBS"></textarea>
        </div>
    </div>
    <input type="hidden" name="CON_ID" class="form-control CON_ID" required value="{{ $contenido->CON_ID }}">
