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
                            <i class="zmdi zmdi-account-calendar"></i>Administración de Adquisiciones<button class="pull-right au-btn au-btn-icon au-btn--blue au-btn--small" data-toggle="modal" data-target="#fModal"><i class="zmdi zmdi-plus"></i>Nueva Adquisición</button></h3>
                        <hr>
                        <div class="table-responsive content">
                            <table class="table tabla-datos table-hover table-responsive table-bordered list" id="table1"  data-get="{{ url('/adquisiciones') }}">
                                <thead class="">
                                    <tr>
                                        <th width="3%">ID</th>
                                        <th>Ejemplar</th>
                                        <th>Usuario</th>
                                        <th>Cantidad</th>
                                        <th>Fecha</th>
                                        <th>Observaciones</th>
                                        <th width="4%"></th>
                                        <th width="4%"></th>
                                    </tr>
                                </thead>
                                <tbody id="itemContainer">
                                    @foreach($adquisiciones as $a)
                                    <tr>
                                        <td>{{ $a->ADQ_ID }}</td>
                                        <td>{{ $a->CON_TITULO }}</td>
                                        <td>{{ $a->USU_CODIGO }}</td>
                                        <td>{{ $a->ADQ_CANTIDAD }} Ejemplar</td>
                                        <td>{{ $a->ADQ_FECHA }}</td>
                                        <td>{{ $a->ADQ_OBS }}</td>
                                        <td class="text-center"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#EditModal" title="Modificar" onClick="modificar('{{$a->ADQ_ID}}')"><i class="fa fa-edit"></i></a></td>
                                        <td class="text-center"><a href="#" class="btn btn-danger" title="Borrar" onClick="eliminar('{{ $a->ADQ_ID }}', '{{ $a->ADQ_ID }}')"><i class="fa fa-trash"></i></a>
                                        <form action="{{ route('adquisiciones.destroy', $a->ADQ_ID) }}" method="POST" class="form-delete{{ $a->ADQ_ID }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        </td>
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
@include('adquisiciones.create')
@include('adquisiciones.edit')
@endsection