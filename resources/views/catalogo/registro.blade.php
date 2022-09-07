<!-- modal large -->
<div class="modal fade" id="Registro" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"><i class="fa fa-user"></i> Registro de Usuario</h5>
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
                            Ingrese los datos, para registrarse como usuario, los campos marcados (<span class="text-danger">*</span>) son obligatorios.
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Nombres <span class="text-danger">*</span></label>
                            <input type="text" name="LEC_NOMBRES" class="form-control LEC_NOMBRES" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Apellidos <span class="text-danger">*</span></label>
                            <input type="text" name="LEC_APELLIDOS" class="form-control LEC_APELLIDOS" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label>e-Mail <span class="text-danger">*</span></label>
                            <input type="email" name="LEC_EMAIL" class="form-control LEC_EMAIL" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Género <span class="text-danger">*</span></label>
                            <select name="LEC_GENERO" class="form-control LEC_GENERO" required>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="usuario">Contraseña <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="USU_CLAVE" id="codigo" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>CI</label>
                            <input type="text" name="LEC_CI" class="form-control LEC_CI">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Celular</label>
                            <input type="text" name="LEC_CELULAR" class="form-control LEC_CELULAR">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label>Dirección</label>
                            <textarea type="text" name="LEC_DIRECCION" class="form-control LEC_DIRECCION"></textarea>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="LET_ID" value="2">
                    <input type="hidden" name="opt" value="1">
                    <button type="submit" class="au-btn--green btn-submit au-btn au-btn-icon"><i class="fa fa-unlock-alt"></i> Registrar</button>
                    <button class="au-btn au-btn-icon btn-secondary" data-dismiss="modal" aria-label="Close"><i class="fa fa-undo"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal large -->