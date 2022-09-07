<!-- modal large -->
<div class="modal fade" id="Detalle" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"><i class="fa fa-book"></i> Detalle de Libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('usuarios.store') }}" enctype="multipart/form-data">
                @csrf 
                <div class="modal-body">
                    @include('partials.error')
                    <div class="row">
                        <div class="col-sm-4" style="padding-right:2px"><img src="{{ asset('images/logo_fnd.png')}}" class="img-responsive img-thumbnail cimg"></div>
                        <div class="col-sm-8">
                            <b>ISBN:</b> <span class="txt_isbn"></span><br>
                            <b>Titulo:</b> <span class="txt_titulo"></span><br>
                            <b>Subtitulo:</b> <span class="txt_subtitulo"></span><br>
                            <b>Autor:</b> <span class="txt_autor"></span><br>
                            <b>Editorial:</b> <span class="txt_editorial"></span><br>
                            <b>Edición:</b> <span class="txt_edicion"></span><br>
                            <b>Categoría:</b> <span class="txt_categoria"></span><br>
                            <!--<b>Sección:</b> <span class="txt_seccion"></span>-->
                        </div>
                        <div class="col-sm-12 txt_resumen"></div>
                    </div>
                </div>
                <!--<div class="modal-footer">
                    <button type="button" class="au-btn--green btn-submit au-btn au-btn-icon" data-dismiss="modal" aria-label="Close" onClick="verifica('{{ Session::get('login') }}')"><i class="fa fa-calendar-alt"></i> Reservar</button>
                    <button class="au-btn au-btn-icon btn-secondary" data-dismiss="modal" aria-label="Close"><i class="fa fa-undo"></i> Cancelar</button>
                </div>-->
            </form>
        </div>
    </div>
</div>
<!-- end modal large -->