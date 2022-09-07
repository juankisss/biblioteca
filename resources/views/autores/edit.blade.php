<!-- modal large -->
<div class="modal fade" id="EditModal" tabindex="-100" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"><i class="zmdi zmdi-account-calendar"></i> Modificar Autor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('autores.update',0) }}" enctype="multipart/form-data" class="form-edit">
                @csrf  
                {{ method_field('PUT') }}
                <div class="modal-body">
                    @include('partials.error')
                    @include('autores.form')
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="AUT_ID">
                    <button type="submit" class="au-btn--blue btn-submit au-btn au-btn-icon"><i class="fa fa-save"> Guardar</i></button>
                    <button class="au-btn au-btn-icon btn-secondary" data-dismiss="modal" aria-label="Close"><i class="fa fa-undo"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>