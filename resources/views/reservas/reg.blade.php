<!-- modal large -->
<div class="modal fade" id="RegModal" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"><i class="zmdi zmdi-account-calendar"></i> Registrar Prestamo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('prestamos.store') }}" enctype="multipart/form-data" id="form-reservasp">
                @csrf  
                <div class="modal-body">
                    @include('partials.error')
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
                        <div class="col-sm-12 preservasp" style="display:none">
                            <div class="cresp alert alert-warning">
                                <div class="row">
                                <div class="col-sm-12">
                                    <button type="button" class="close" title="Cerrar" onClick="con_close('preservasp')"><span aria-hidden="true">×</span></button>
                                    <span class="badge badge-pill restp"></span> <b>Reservas</b> Programadas
                                    <div class="vue-lists">
                                    <ul class="dresp">
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
                    <input type="hidden" name="EJE_ID" class="EJE_ID">
                    <input type="hidden" name="RES_ID" class="RES_ID">
                    <input type="hidden" name="USL_ID" class="USL_ID">
                    <input type="hidden" name="PRE_FECHA" class="form-control PRE_FECHA" required value="{{ date('Y-m-d')}}">
                    <input type="hidden" name="PRE_HORA" class="form-control PRE_HORA" required value="{{ date('H:i')}}">
                    <input type="hidden" name="USP_ID" class="form-control USP_ID" required value="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="au-btn--blue btn-submit au-btn au-btn-icon" onClick="valid_formp()"><i class="fa fa-save"></i> Guardar</button>
                    <button class="au-btn au-btn-icon btn-secondary" data-dismiss="modal" aria-label="Close"><i class="fa fa-undo"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal large -->