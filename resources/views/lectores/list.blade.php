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
                            <i class="zmdi zmdi-account-calendar"></i>Administración de Lectores<button class="pull-right au-btn au-btn-icon au-btn--blue au-btn--small bg-dark" data-toggle="modal" data-target="#fModal"><i class="zmdi zmdi-plus"></i>Nuevo Lector</button>
                        </h3>
                        <hr>
                        <div class="table-responsive content">
                            <table class="table tabla-datos table-hover table-responsive table-bordered list" id="table1" data-get="{{ url('/lectores') }}">
                                <thead class="">
                                    <tr>
                                        <th width="3%">ID</th>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>CI</th>
                                        <th>e-Mail</th>
                                        <th>Celular</th>
                                        <!--<th>Dirección</th>-->
                                        <th width="4%"></th>
                                        <th width="4%"></th>
                                    </tr>
                                </thead>
                                <tbody id="itemContainer">
                                    @php $c = 1; @endphp
                                    @foreach($lectores as $l)
                                    <tr>
                                        <td>{{ $c++ }}</td>
                                        <td>{{ $l->LEC_NOMBRES.' '.$l->LEC_APELLIDOS }}</td>
                                        <td>{{ $l->LET_NOMBRE }}</td>
                                        <td>{{ $l->LEC_CI }}</td>
                                        <td>{{ $l->LEC_EMAIL }} </td>
                                        <td>{{ $l->LEC_CELULAR }}</td>
                                        <!--<td>{{ $l->LEC_DIRECCION }}</td>-->
                                        <td class="text-center"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#EditModal" title="Modificar" onClick="modificar('{{$l->LEC_ID}}')"><i class="fa fa-edit"></i></a></td>
                                        <td class="text-center"><a href="#" class="btn btn-danger" title="Borrar" onClick="eliminar('{{ $l->LEC_ID }}', '{{ $l->LEC_NOMBRES.' '.$l->LEC_APELLIDOS }}')"><i class="fa fa-trash"></i></a>
                                        <form action="{{ route('lectores.destroy', $l->LEC_ID) }}" method="POST" class="form-delete{{ $l->LEC_ID }}">
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
@include('lectores.create')
@include('lectores.edit')
@endsection