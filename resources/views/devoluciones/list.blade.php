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
                            <i class="zmdi zmdi-account-calendar"></i>Administración de Devoluciones<button class="pull-right au-btn au-btn-icon au-btn--blue au-btn--small" data-toggle="modal" data-target="#fModal"><i class="zmdi zmdi-plus"></i>Nueva Devolución</button></h3>
                        <hr>
                        <div class="table-responsive content">
                            <table class="table tabla-datos table-hover table-responsive table-bordered" id="table1">
                                <thead class="">
                                    <tr>
                                        <th>ID</th>
                                        <th>Prestamo</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Observaciones</th>
                                        <th width="4%"></th>
                                        <th width="4%"></th>
                                    </tr>
                                </thead>
                                <tbody id="itemContainer">
                                    @foreach($devoluciones as $d)
                                        <tr>
                                            <td>{{$d->DEV_ID}}</td>
                                            <td>{{$d->PRE_ID}}</td>
                                            <td>{{$d->DEV_FECHA}}</td>
                                            <td>{{$d->DEV_HORA}}</td>
                                            <td>{{$d->DEV_OBS}}</td>
                                            <td class="text-center"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#EditModal" title="Modificar" onClick="modificar('{{ $d->DEV_ID }}')"><i class="fa fa-edit"></i></a></td>
                                            <td class="text-center"><a href="#" class="btn btn-danger" title="Borrar" onClick="eliminar('{{ $d->DEV_ID }}', '{{ $d->PRE_ID }}')"><i class="fa fa-trash"></i></a>
                                            <form action="{{ route('devoluciones.destroy', $d->DEV_ID) }}" method="post" class="form-delete{{ $d->DEV_ID }}">
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
@endsection
@include('devoluciones.create')