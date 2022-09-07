<!-- modal large -->
<div class="modal fade" id="Login" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"><i class="fa fa-user"></i> Login de Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('page.store') }}" enctype="multipart/form-data">
                @csrf 
                <div class="modal-body">
                    @include('partials.error')
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="usuario">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control USU_CODIGO" name="USU_CODIGO" id="codigo" required>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="usuario">Contraseña <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="USU_CLAVE" id="codigo" required>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="usuario">Tipo</label>
                            <select name="LET_ID" class="form-control" required>
                                <option value="1">Estudiante</option>
                                <option value="2">Docente</option>
                                <option value="3">Externo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="USU_TIPO" value="3">
                    <input type="hidden" name="opt" value="2">
                    <button type="submit" class="au-btn--green btn-submit au-btn au-btn-icon"><i class="fa fa-unlock-alt"></i> Ingresar</button>
                    <button class="au-btn au-btn-icon btn-secondary" data-dismiss="modal" aria-label="Close"><i class="fa fa-undo"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal large -->