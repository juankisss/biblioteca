<!-- modal large -->
<div class="modal fade" id="fModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"><i class="zmdi zmdi-account-calendar"></i> Adicionar Usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{url('usuarios.store')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    @include('partials.error')
                    @include('usuarios.form')
                </div>
                <div class="modal-footer">
                    <button type="submit" onClick="btn_submit(this)" class="btn btn-primary btn-submit"><i class="fa fa-save"></i> Guardar</button>
                    <button class="pull-right au-btn au-btn-icon btn-secondary au-btn--small" onClick="document.location.href='{{ url('usuarios') }}'"><i class="fa fa-list"></i>Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal large -->