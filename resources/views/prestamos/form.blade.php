<div class="row">
    <div class="form-group col-sm-12 ">
        <label>Ejemplar</label>
        <select name="EJE_ID" class="js-example-basic-multiple CON_ID SELECT2 sel_con" required>
            <option value="">--Seleccione un Contenido--</option>
            @foreach($contenidos as $e)
                <option value="{{$e->EJE_ID}}">{{ 'Codigo: '.$e->EJE_CODIGO.' - ISBN: '.$e->CON_ISBN.' - Titulo: '.$e->CON_TITULO.' - Autor: '.$e->AUT_NOMBRE}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-12 pdetalle" style="display:none">
    	<div class="cdet alert">
        	<div class="row">
            <div class="col-sm-2" style="padding-right:2px"><img src="{{ asset('images/logo_fnd.png')}}" class="img-responsive img-thumbnail cimg"></div>
            <div class="col-sm-10">
            	<button type="button" class="close" title="Cerrar" onClick="con_close('pdetalle')"><span aria-hidden="true">×</span></button>
                <b>Estado:</b> <span class="badge badge-pill cest"></span>&nbsp;&nbsp;&nbsp;<b>ISBN:</b> <span class="txt_isbn"></span>&nbsp;&nbsp;&nbsp;<b>Codigo:</b> <span class="txt_codigo"></span><br>
                <b>Titulo:</b> <span class="txt_titulo"></span><br>
                <b>Autor:</b> <span class="txt_autor"></span><br>
                <b>Editorial:</b> <span class="txt_editorial"></span>&nbsp;&nbsp;&nbsp;<b>Edición:</b> <span class="txt_edicion"></span><br>
                <b>Categoría:</b> <span class="txt_categoria"></span>&nbsp;&nbsp;&nbsp;<b>Sección:</b> <span class="txt_seccion"></span>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        <label>Lector:</label>&nbsp;
        @php $cont=0 @endphp
        @foreach($tipo as $tip) @php $cont++ @endphp
        	<label><input type="radio" name="TIL_ID" value="{{$tip->LET_ID}}" @if($cont==1) checked @endif class="tipo" dir="{{$tip->LET_TIEMPOM}}" onChange="lectorp('{{$tip->LET_ID}}')"> {{$tip->LET_NOMBRE}}</label>
        @endforeach
        <select name="USL_ID" class="js-example-basic-multiple USL_ID SELECT2 sel_lec" required>
            <option value="">--Seleccione un Contenido--</option>
            @foreach($lectores as $e)
                <option value="{{$e->LEC_ID}}">Nombre: {{$e->LEC_NOMBRES}} {{$e->LEC_APELLIDOS}} - CI: {{$e->LEC_CI}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-12 plector" style="display:none">
    	<div class="clec alert">
        	<div class="row">
                <div class="col-sm-12">
                    <button type="button" class="close" title="Cerrar" onClick="con_close('plector')"><span aria-hidden="true">×</span></button>
                    <b>Usuario</b> <span class="badge badge-pill lest"></span> para realizar prestamos&nbsp;&nbsp;<em><span class="tlec"></span></em>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-4">
        <label>Tiempo</label><br>
        <label><input type="radio" name="tipop" value="1" class="tipop" id="tipop1" checked onChange="tiempop(1)"> Jornada</label>&nbsp;
        <label><input type="radio" name="tipop" value="2" class="tipop" id="tipop2" onChange="tiempop(2)"> Extenso</label>
    </div>
    <div class="form-group col-sm-8 fpjornada">
        <label>Fecha</label>
        <input type="text" name="PRE_FECHA" class="form-control PRE_FECHA fech" required readonly value="{{date('Y-m-d H:i')}}">
    </div>
    <div class="form-group col-sm-4 fpextenso" style="display:none">
        <label>Fecha</label>
        <input type="text" name="PRE_FECHA" class="form-control PRE_FECHA fechd" required readonly value="{{date('Y-m-d H:i')}}">
    </div>
    <div class="form-group col-sm-4 fpextenso" style="display:none">
        <label>Hasta</label>
        <input type="text" name="PRE_FECHAD" class="form-control PRE_FECHAD fechap fechad fechh" required readonly>
    </div>
    <div class="col-sm-12 preservas" style="display:none">
    	<div class="cres alert alert-warning">
        	<div class="row">
            <div class="col-sm-12">
            	<button type="button" class="close" title="Cerrar" onClick="con_close('preservas')"><span aria-hidden="true">×</span></button>
                <span class="badge badge-pill rest"></span> <b>Reservas</b> Programadas
                <div class="vue-lists">
                <ul class="dres">
                	<!--<li>2022-01-01 al 2022-03-03 - Marco AntoniomApaza</li>
                    <li>2022-01-01 al 2022-03-03 - dfs dsf sdf sd</li>
                    <li>2022-01-01 al 2022-03-03 - sd fsdf sdf sdf</li>-->
                </ul>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!--<div class="row">
    <div class="form-group col-sm-6">
        <label>Fecha Devolución</label>
        <input type="date" name="PRE_FECHAD" class="form-control PRE_FECHAD" required>
    </div>
    <div class="form-group col-sm-6">
        <label>Hora Devolución</label>
        <input type="time" name="PRE_HORAD" class="form-control PRE_HORAD">
    </div>
</div>-->
<div class="row">
    <div class="form-group col-sm-12">
        <label>Observaciones</label>
        <textarea type="text" name="PRE_OBS" class="form-control PRE_OBS"></textarea>
    </div>
</div>
<!--<input type="hidden" name="EJE_ID" class="EJE_ID">-->
<input type="hidden" name="" class="con_est" value="0">
<input type="hidden" name="" class="usu_est">
<input type="hidden" name="" class="fec_est">
<input type="hidden" name="PRE_FECHA" class="form-control PRE_FECHA" required value="{{ date('Y-m-d')}}">
<input type="hidden" name="PRE_HORA" class="form-control PRE_HORA" required value="{{ date('H:i')}}">
<input type="hidden" name="USP_ID" class="form-control USP_ID" required value="{{Session::get('pid')}}">