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
                            <i class="zmdi zmdi-account-calendar"></i>Administración de Secciones<button class="pull-right au-btn au-btn-icon au-btn--blue au-btn--small bg-dark" data-toggle="modal" data-target="#fModal"><i class="zmdi zmdi-plus"></i>Adicionar secciones</button></h3>
                        <hr>
                        <div class="table-responsive content">
                            <table class="table tabla-datos table-hover table-responsive table-bordered list" id="table1"  data-get="{{ url('/secciones') }}">
                                <thead class="">
                                    <tr>
                                        <th width="3%">ID</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Referencia</th>
                                        <th width="4%"></th>
                                        <th width="4%"></th>
                                    </tr>
                                </thead>
                                <tbody id="itemContainer">
                                    @foreach($secciones as $s)
                                    <tr>
                                        <td>{{ $s->SEC_ID }}</td>
                                        <td>{{ $s->SEC_NOMBRE }}</td>
                                        <td>{{ $s->SEC_DESC }}</td>
                                        <td>{{ $s->SEC_REFERENCIA }}</td>
                                        <td class="text-center"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#EditModal" title="Modificar" onClick="modificar('{{ $s->SEC_ID }}')"><i class="fa fa-edit"></i></a></td>
                                        <td class="text-center"><a href="#" class="btn btn-danger" title="Borrar" onClick="eliminar('{{ $s->SEC_ID }}', '{{ $s->SEC_NOMBRE }}')"><i class="fa fa-trash"></i></a>
                                        <form action="{{ route('secciones.destroy', $s->SEC_ID) }}" method="post" class="form-delete{{ $s->SEC_ID }}">
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
@include('secciones.create')
@include('secciones.edit')
@endsection