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
                            <i class="zmdi zmdi-account-calendar"></i>Administración de Editoriales<button class="pull-right au-btn au-btn-icon au-btn--blue au-btn--small bg-dark" data-toggle="modal" data-target="#fModal"><i class="zmdi zmdi-plus"></i>Adicionar Editorial</button></h3>
                        <hr>
                        <div class="table-responsive content">
                            <table class="table tabla-datos table-hover table-responsive table-bordered list" id="table1"  data-get="{{ url('/editoriales') }}">
                                <thead class="">
                                    <tr>
                                        <th width="3%">ID</th>
                                        <th>Nombre</th>
                                        <th>País</th>
                                        <th>Ciudad</th>
                                        <!--<th>Dirección</th>-->
                                        <th>Teléfonos</th>
                                        <th width="4%"></th>
                                        <th width="4%"></th>
                                    </tr>
                                </thead>
                                <tbody id="itemContainer">
                                    @foreach($editoriales as $e)
                                    <tr>
                                        <td>{{ $e->EDI_ID }}</td>
                                        <td>{{ $e->EDI_NOMBRE }}</td>
                                        <td>{{ $e->EDI_PAIS }}</td>
                                        <td>{{ $e->EDI_CIUDAD }}</td>
                                        <!--<td>{{ $e->EDI_DIRECCION }}</td>-->
                                        <td>{{ $e->EDI_TELEFONOS }}</td>
                                        <td class="text-center"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#EditModal" title="Modificar" onClick="modificar('{{$e->EDI_ID}}')"><i class="fa fa-edit"></i></a></td>
                                        <td class="text-center"><a href="#" class="btn btn-danger" title="Borrar" onClick="eliminar('{{ $e->EDI_ID }}', '{{ $e->EDI_NOMBRE }}')"><i class="fa fa-trash"></i></a>
                                        <form action="{{ route('editoriales.destroy', $e->EDI_ID) }}" method="POST" class="form-delete{{ $e->EDI_ID }}">
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
@include('editoriales.create')
@include('editoriales.edit')
@endsection