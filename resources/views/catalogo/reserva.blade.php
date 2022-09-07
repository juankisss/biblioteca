<!-- modal large -->
<div class="modal fade" id="Reserva" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"><i class="fa fa-calendar-alt"></i> Reservar Libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('page.store') }}" enctype="multipart/form-data" id="form-reservau">
                @csrf 
                <div class="modal-body">
                    @include('partials.error')
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <b>ISBN:</b> <span class="CON_ISBN_R"></span>
                            <b>Edición:</b> <span class="CON_EDICION_R"></span>
                        </div>
                        <div class="form-group col-sm-8" align="left">
                            <b>Titulo:</b> <span class="CON_TITULO_R"></span><br>
                            <b>Subtitulo:</b> <span class="CON_SUBTITULO_R"></span>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Fecha</label>
                            <input type="text" name="RES_FECHAR" class="form-control RES_FECHAR fecha" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Hora</label>
                            <input type="text" name="RES_HORAR" class="form-control RES_HORAR hora" required>
                        </div>
                        <!--<div class="form-group col-sm-4">
                            <label>Fecha Devolución</label>
                            <input type="text" name="RES_FECHAD" class="form-control RES_FECHAD" readonly>
                        </div>-->
                        <div class="col-sm-12 preservas cardn" style="display:none">
                            <div class="cres alert alert-warning">
                                <div class="row">
                                <div class="col-sm-12">
                                    <button type="button" class="close" title="Cerrar" onClick="con_close('preservas')"><span aria-hidden="true">×</span></button>
                                    <span class="badge badge-pill rest"></span> <b>Reservas</b> Programadas
                                    <div class="vue-lists">
                                    <ul class="dres"></ul>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="RES_FECHA" class="form-control RES_FECHA" required value="{{ date('Y-m-d')}}">
                    <input type="hidden" name="USP_ID" class="form-control USP_ID" required value="0">
                    <input type="hidden" name="USL_ID" class="form-control USL_ID" required value="{{ Session::get('lid') }}">
                    <input type="hidden" name="EJE_ID" id="EID" class="form-control" required>
                    <input type="hidden" name="valid" id="valid" class="form-control" value="0">
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="opt" value="4">
                    <button type="button" class="au-btn--green btn-submit au-btn au-btn-icon" onClick="valid_form()"><i class="fa fa-calendar-check"></i> Reservar</button>
                    <!--<button type="submit" class="au-btn--green btn-submit au-btn au-btn-icon" onClick="envia_mensaje()"><i class="fa fa-calendar-check"></i> Reservar</button>-->
                    <button class="au-btn au-btn-icon btn-secondary" data-dismiss="modal" aria-label="Close"><i class="fa fa-undo"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal large -->