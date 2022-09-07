@extends('template')

@section('contenido')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            @include('partials.success')
            <div class="row">
                <div class="col-lg-12">
                    <!-- USER DATA-->
                    <div class="user-data m-b-30">
                        <h3 class="title-3 m-b-30">
                            <i class="zmdi zmdi-file"></i>{{$title}}<!--<button class="pull-right au-btn au-btn-icon btn-secondary au-btn--small"><i class="zmdi zmdi-print"></i>Actualizar Reporte</button>--></h3>
                        <hr>
                        <div class="table-responsive content">
                            @if($con=='personal')
                            	@php $reporte = 'rep_'.$con; @endphp
                            @elseif($con=='lectores')
                            <div class="row">
                            	<div class="form-group col-sm-6">
                                    <label>Genero</label>
                                    <select name="LEC_GENERO" id="genero" class="form-control" onChange="reportes('lectores')">
                                        <option value="-1">--Todos--</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Femenino</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                	<label>Tipo</label>
                                    <select name="LET_ID" id="tipol" class="form-control" onChange="reportes('lectores')">
                                        <option value="-1">--Todos--</option>
                                        @foreach($lectortipos as $lt)
                                            <option value="{{$lt->LET_ID}}">{{$lt->LET_NOMBRE}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @php $reporte = 'rep_'.$con.'/-1/-1'; @endphp
                            @elseif($con=='contenidos')
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>Categoría</label>
                                    <select name="CAT_NOMBRE" class="js-example-basic-multiple sel_rep" id="categoria">
                                        <option value="-1">--Seleccione un Contenido--</option>
                                        @foreach($categorias as $s)
                                            <option value="{{ $s->CAT_ID}}">{{ $s->CAT_NOMBRE}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Sección</label>
                                    <select name="SEC_NOMBRE" class="js-example-basic-multiple sel_rep" id="seccion">
                                        <option value="-1">--Seleccione un Contenido--</option>
                                        @foreach($secciones as $s)
                                            <option value="{{ $s->SEC_ID}}">{{ $s->SEC_NOMBRE}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>Autor</label>
                                    <select name="AUT_NOMBRE" class="js-example-basic-multiple sel_rep" id="autor">
                                        <option value="-1">--Seleccione un Contenido--</option>
                                        @foreach($autores as $s)
                                            <option value="{{ $s->AUT_ID}}">{{ $s->AUT_NOMBRE}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Editorial</label>
                                    <select name="EDI_NOMBRE" class="js-example-basic-multiple sel_rep" id="editorial">
                                        <option value="-1">--Seleccione un Contenido--</option>
                                        @foreach($editoriales as $s)
                                            <option value="{{ $s->EDI_ID}}">{{ $s->EDI_NOMBRE}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @php $reporte = 'rep_'.$con.'/-1/-1/-1/-1'; @endphp
                            @elseif($con=='reservas' or $con=='prestamos')
                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <label>Desde</label>
                                    <input type="date" name="desde" id="desde" class="form-control" onChange="reportes('{{$con}}')">
                                </div>
                                <div class="col-sm-3">
                                    <label>Hasta</label>
                                    <input type="date" name="hasta" id="hasta" class="form-control" onChange="reportes('{{$con}}')">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Ejemplar</label>
                                    <select name="EJE_ID" id="ejemplar" class="js-example-basic-multiple sel_rep" required>
                                        <option value="-1">--Seleccione un Contenido--</option>
                                        @foreach($ejemplares as $e)
                                            <option value="{{$e->EJE_ID}}">{{ 'Cod:'.$e->EJE_CODIGO.' - ISBN:'.$e->CON_ISBN.' - Titulo:'.$e->CON_TITULO.' - Autor:'.$e->AUT_NOMBRE}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <label>Personal</label>
                                    <select name="personal" id="personal" class="js-example-basic-multiple sel_rep">
                                        <option value="-1">--Todos--</option>
                                        @foreach($personal as $e)
                                            <option value="{{$e->PER_ID}}">Nombre: {{$e->PER_NOMBRES}} {{$e->PER_APELLIDOS}} - CI: {{$e->PER_CI}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label>Lector</label>
                                    <select name="lector" id="lector" class="js-example-basic-multiple sel_rep">
                                        <option value="-1">--Todos--</option>
                                        @foreach($lectores as $e)
                                            <option value="{{$e->LEC_ID}}">Nombre: {{$e->LEC_NOMBRES}} {{$e->LEC_APELLIDOS}} - CI: {{$e->LEC_CI}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label>Estado</label>
                                    <select name="estado" id="estado" class="form-control" onChange="reportes('{{$con}}')">
                                        <option value="-1">--Todos--</option>
                                        @if($con=='reservas')
                                        <option value="1">Realizada</option>
                                        <option value="2">Concretada</option>
                                        <option value="3">Incumplida</option>
                                        @else
                                        <option value="1">Prestado</option>
                                        <option value="2">Devuelto</option>
                                        <option value="3">Devuelto a destiempo</option>
                                        <option value="4">No Devuelto</option>
                                        @endif
                                        <!--<option value="1">Reservado</option>
                                        <option value="2">Prestado</option>
                                        <option value="3">Devuelto</option>-->
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label>Tipo</label>
                                    <select name="estado" id="tipol" class="form-control" onChange="reportes('{{$con}}')">
                                        <option value="-1">--Todos--</option>
                                        <option value="1">Estudiante</option>
                                        <option value="2">Docente</option>
                                        <option value="3">Externo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-3">
                                    <label>Categoría</label>
                                    <select name="CAT_NOMBRE" id="categoria" class="js-example-basic-multiple sel_rep" required>
                                        <option value="-1">--Todos--</option>
                                        @foreach($categorias as $s)
                                            <option value="{{$s->CAT_ID}}">{{$s->CAT_NOMBRE}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Sección</label>
                                    <select name="SEC_NOMBRE" id="seccion" class="js-example-basic-multiple sel_rep">
                                        <option value="-1">--Todos--</option>
                                        @foreach($secciones as $s)
                                            <option value="{{$s->SEC_ID}}">{{$s->SEC_NOMBRE}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Autor</label>
                                    <select name="AUT_NOMBRE" id="autor" class="js-example-basic-multiple sel_rep" required>
                                        <option value="-1">--Todos--</option>
                                        @foreach($autores as $s)
                                            <option value="{{$s->AUT_ID}}">{{$s->AUT_NOMBRE}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Editorial</label>
                                    <select name="EDI_NOMBRE" id="editorial" class="js-example-basic-multiple sel_rep">
                                        <option value="-1">--Todos--</option>
                                        @foreach($editoriales as $s)
                                            <option value="{{$s->EDI_ID}}">{{$s->EDI_NOMBRE}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @php $reporte = 'rep_'.$con.'/-1/-1/-1/-1/-1/-1/-1/-1/-1/-1/-1'; @endphp
                            @endif
                            <input type="hidden" id="tipoc" value="{{$con}}">
                            <iframe id="some_id" class="some_pdf" src="{{ asset($reporte) }}" width="100%" height="620" scrollbar="yes" marginwidth="0" marginheight="0" hspace="0" align="middle" frameborder="0" scrolling="yes" style="width:100%; border:0; overflow:auto;" onload="resizeIframe(this)"></iframe>
                        </div>
                    </div>
                    <!-- END USER DATA-->
                </div>
                
            </div>
            
            
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2022</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



