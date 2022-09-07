<!-- modal large -->
<div class="modal fade" id="fModal" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"><i class="zmdi zmdi-account-calendar"></i> Adicionar Sección</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('secciones.store') }}" enctype="multipart/form-data">
                @csrf  
                <div class="modal-body">
                    @include('partials.error')
                    @include('secciones.form')
                </div>
                <div class="modal-footer">
                    <button type="submit" class="au-btn--blue btn-submit au-btn au-btn-icon bg-success"><i class="fa fa-save"> Guardar</i></button>
                    <button class="au-btn au-btn-icon btn-secondary" data-dismiss="modal" aria-label="Close"><i class="fa fa-undo"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal large -->