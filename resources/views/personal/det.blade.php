<!-- modal large -->
<div class="modal fade" id="DetModal" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"><i class="zmdi zmdi-account-calendar"></i> Datos de Personal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('personal.store') }}" enctype="multipart/form-data">
                @csrf  
                <div class="modal-body">
                    @include('partials.error')
                    <div class="row">
                        <div class="col-sm-4 img-preview IMG PER_FOTO_R" style="padding-right:2px"><img src="{{ asset('images/logo_fnd.png')}}" class="img-responsive img-thumbnail cimg"></div>
                        <div class="col-sm-8">
                            <b>Nombre:</b> <span class="PER_NOMBRES_R"></span>&nbsp;<span class="PER_APELLIDOS_R"></span><br>
                            <b>C.I.:</b> <span class="PER_CI_R"></span><br>
                            <b>Fecha/Nacimiento:</b> <span class="PER_FECHAN_R"></span><br>
                            <b>Email:</b> <span class="PER_EMAIL_R"></span><br>
                            <b>Celular:</b> <span class="PER_CELULAR_R"></span><br>
                            
                            <b>Dirección:</b> <span class="PER_DIRECCION_R"></span><br>
                        </div>
                        <!--<div class="col-sm-12 txt_resumen"></div>-->
                    </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="submit" class="au-btn--blue btn-submit au-btn au-btn-icon"><i class="fa fa-save"></i> Guardar</button>-->
                    <button class="au-btn au-btn-icon btn-secondary" data-dismiss="modal" aria-label="Close"><i class="fa fa-undo"></i> Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal large -->