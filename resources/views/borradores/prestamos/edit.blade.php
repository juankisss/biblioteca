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
            {!! Form::open(['route' => 'usuarios.store', 'enctype' => 'multipart/form-data']) !!}
            <div class="modal-body">
                @include('partials.error')
                @include('prestamos.form')
            </div>
            <div class="modal-footer">
                {!! Form::button('<i class="fa fa-save"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-primary btn-submit', 'onclick' => 'btn_submit(this)']) !!}
                <button class="pull-right au-btn au-btn-icon btn-secondary au-btn--small" data-dismiss="modal" aria-label="Close"><i class="fa fa-list"></i>Cancelar</button>
                <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar</button>-->
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!-- end modal large -->