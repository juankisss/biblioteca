    
    <div class="row">
        <div class="form-group col-sm-12">
            {!! Form::label('direccion', 'Mtaerial Bibliografico') !!}
            {!! Form::select('PER_ID', [1 => 'Cod:2334 - ISBN: 3456 - Titulo: Biologia 1 - Autor: Andres Garcia - Categoria: Ciencias Naturales', '2' => 'Personal2'], null, ['class' => 'js-example-basic-multiple', 'id'=>'personal', 'placeholder' => '--Seleccionar--', 'required']) !!}
        </div>
        <!--<div class="form-group col-sm-5">
            {!! Form::label('estado', 'Tipo') !!}
            {!! Form::select('USU_TIPO', [1 => 'Administrador', '2' => 'Usuario'], null, ['class' => 'form-control']) !!}
        </div>-->
        <div class="form-group col-sm-12">
            {!! Form::label('estado', 'Usuario') !!}
            {!! Form::select('USU_ESTADO', [1 => 'Juan Carlos gutierrez - CI:344598 - Tipo: Estudiante', '0' => 'Juan Carlos gutierrez - CI:344598 - Tipo: Docente'], null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-6">
            {!! Html::decode(Form::label('usuario', 'Usuario <span class="text-danger">*</span>')) !!}
            <div class="input-group mb-3">
            @if(isset($usuario))
              {!! Form::text('USU_CODIGO', null, ['class' => 'form-control', 'data-id' => '1', 'id'=>'codigo', 'readonly']) !!}
            @else
              {!! Form::text('USU_CODIGO', null, ['class' => 'form-control', 'data-id' => '1', 'id'=>'codigo', 'required', 'onKeyUp' => "codigou(this.value)"]) !!}
            @endif
              {!! Form::hidden('codigo', 0, ['class' => 'form-control', 'id' => 'codigov']) !!}
              <!--<div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <span class="text-success caeb_valido"><i class="fa fa-check"></i> Valido</span>
                    <span class="text-danger caeb_novalido" style="display:none"><i class="fa fa-remove"></i> Registrado</span>
                </span>
              </div>-->
            </div>
        </div>
        <div class="form-group col-sm-6">
            {!! Html::decode(Form::label('password', 'Contraseña <span class="text-danger">*</span>')) !!}
            {!! Form::password('USU_CLAVE', ['class' => 'form-control', 'data-id' => '1', 'id' => 'clave', 'required']) !!}
        </div>
    </div>
