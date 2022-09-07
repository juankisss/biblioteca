@extends('template')

@section('contenido')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-lg-12">
                    <!-- USER DATA-->
                    <div class="user-data m-b-30">
                        <h3 class="title-3 m-b-30">
                            <i class="zmdi zmdi-account-calendar"></i>Modificar Usuario<button class="pull-right au-btn au-btn-icon btn-secondary au-btn--small" onClick="document.location.href='{{ url('usuarios') }}'"><i class="fa fa-list"></i>ver listado</button>
                        </h3><hr>
                        @include('partials.error')                          
                        {!! Form::model($usuario, ['route' => ['usuarios.update', $usuario->USU_ID], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                        <div class="content-body">
                            @include('usuarios.form')
                    	</div>
                        <hr>
                        <div class="content-footer">
                            {!! Form::button('<i class="fa fa-save"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- END USER DATA-->
                </div>
                
            </div> 
            @include('partials.footer-cont')
        </div>
    </div>
</div>
<!-- END MAIN -->

@endsection