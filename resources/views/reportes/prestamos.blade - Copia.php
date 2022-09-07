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
                            <i class="zmdi zmdi-file"></i>Reporte de Prestamos</h3>
                        <hr>
                        <div class="table-responsive content">
                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <label>Desde</label>
                                    <input type="date" name="desde" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label>Hasta</label>
                                    <input type="date" name="hasta" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label>Estado</label>
                                    <select name="estado" class="form-control">
                                        <option value="">--Todos--</option>
                                        <option value="1">Reservado</option>
                                        <option value="2">Prestado</option>
                                        <option value="3">Devuelto</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label>Tipo</label>
                                    <select name="estado" class="form-control">
                                        <option value="">--Todos--</option>
                                        <option value="1">Estudiante</option>
                                        <option value="2">Docente</option>
                                        <option value="3">Externo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Personal</label>
                                    <select name="personal" class="js-example-basic-multiple">
                                        <option value="">--Todos--</option>
                                        @foreach($personal as $e)
                                            <option value="{{$e->PER_ID}}">Nombre: {{$e->PER_NOMBRES}} {{$e->PER_APELLIDOS}} - CI: {{$e->PER_CI}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Lector</label>
                                    <select name="lector" class="js-example-basic-multiple">
                                        <option value="">--Todos--</option>
                                        @foreach($lectores as $e)
                                            <option value="{{$e->LEC_ID}}">Nombre: {{$e->LEC_NOMBRES}} {{$e->LEC_APELLIDOS}} - CI: {{$e->LEC_CI}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-3">
                                    <label>Categoría</label>
                                    <select name="CAT_NOMBRE" class="form-control CAT_ID SELECT" required>
                                        <option value="">--Todos--</option>
                                        @foreach($categorias as $s)
                                            <option value="{{$s->CAT_ID}}">{{$s->CAT_NOMBRE}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Sección</label>
                                    <select name="SEC_NOMBRE" class="form-control SEC_ID SELECT">
                                        <option value="">--Todos--</option>
                                        @foreach($secciones as $s)
                                            <option value="{{$s->SEC_ID}}">{{$s->SEC_NOMBRE}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Autor</label>
                                    <select name="AUT_NOMBRE" class="form-control AUT_ID SELECT" required>
                                        <option value="">--Todos--</option>
                                        @foreach($autores as $s)
                                            <option value="{{$s->AUT_ID}}">{{$s->AUT_NOMBRE}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Editorial</label>
                                    <select name="EDI_NOMBRE" class="form-control EDI_ID SELECT">
                                        <option value="">--Todos--</option>
                                        @foreach($editoriales as $s)
                                            <option value="{{$s->EDI_ID}}">{{$s->EDI_NOMBRE}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable_report" data-get="{{ url('/lectortipo') }}">
                                <thead class="">
                                    <tr>
                                        <th width="3%">ID</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Ejemplar</th>
                                        <!--<th>Personal</th>-->
                                        <th>Lector</th>
                                        <th>Devolución</th>
                                        <!--<th>Observaciones</th>-->
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody id="itemContainer">
                                    @php $c=1; @endphp
                                    @foreach($registros as $p)
                                    <tr>
                                        <td>{{ $c++ }}</td>
                                        <td>{{ $p->PRE_FECHA }}</td>
                                        <td>{{ $p->PRE_HORA }}</td>
                                        <td>{{ $p->EJE_ID }}</td>
                                        <td>{{ $p->USL_ID }}</td>
                                        <td>{{ $p->PRE_FECHAD.' '.$p->PRE_HORAD }}</td>
                                        <!--<td>{{ $p->PRE_OBS }}</td>-->
                                            @if($p->PRE_ESTADO == 1)
                                                <td>En Proceso</td>
                                            @else
                                                <td>Devuelto</td>
                                            @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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



