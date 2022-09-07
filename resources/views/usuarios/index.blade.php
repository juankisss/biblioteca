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
                            <i class="zmdi zmdi-account-calendar"></i>Administración de Usuarios<button class="pull-right au-btn au-btn-icon au-btn--blue au-btn--small" data-toggle="modal" data-target="#fModal"><i class="zmdi zmdi-plus"></i>Adicionar Registro</button></h3>
                        <hr>
                        <div class="table-responsive content">
                            <table class="table tabla-datos table-hover table-responsive table-bordered list" id="table1" data-get="{{ url('/usuarios') }}">
                                <thead class="">
                                    <tr>
                                        <th width="3%">#</th>
                                        <th>Usuario</th>
                                        <th>Nombre</th>
                                        <th>C.I.</th>
                                        <th>Tipo</th>
                                        <!--<th>Estado</th>-->
                                        <th width="4%"></th>
                                        <th width="4%"></th>
                                    </tr>
                                </thead>
                                <tbody id="itemContainer">
                                    @php $c = 1; @endphp
                                    @foreach($usuarios as $u)
                                    <tr>
                                        <td>{{$c++}}</td>
                                        <td>{{$u->USU_CODIGO}}</td>
                                        <td>{{$u->nombre}}</td>
                                        <td>{{$u->CI}}</td>
                                        <td>
                                        @if($u->USU_TIPO == 1)
                                            Administrador
                                        @elseif($u->USU_TIPO == 2)
                                            Bibliotecario
                                        @elseif($u->USU_TIPO == 3)
                                            Lector
                                        @else
                                            
                                        @endif
                                        </td>
                                        <!--@if($u->USU_ESTADO == 1)
                                            <td>Activo</td>
                                        @else
                                            <td>Inactivo</td>
                                        @endif-->
                                        <td class="text-center">@if($u->USU_TIPO <3)<a href="#" class="btn btn-success" data-toggle="modal" data-target="#EditModal" title="Modificar" onClick="modificar('{{ $u->USU_ID }}')"><i class="fa fa-edit"></i></a>@endif</td>
                                        <td class="text-center">@if(Session::get('uid')!=$u->USU_ID)<a href="#" class="btn btn-danger" title="Borrar" onClick="eliminar('{{ $u->USU_ID }}', '{{ $u->USU_CODIGO }}')"><i class="fa fa-trash"></i></a>
                                        <form action="{{ route('usuarios.destroy', $u->USU_ID) }}" method="post" class="form-delete{{ $u->USU_ID }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>@endif
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
@include('usuarios.create')
@include('usuarios.edit')
@endsection
