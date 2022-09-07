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
                            <i class="zmdi zmdi-account-calendar"></i>Administración de Tipo de Lector<!--<button class="pull-right au-btn au-btn-icon au-btn--blue au-btn--small" data-toggle="modal" data-target="#fModal"><i class="zmdi zmdi-plus"></i>Adicionar Registro</button>--></h3>
                        <hr>
                        <div class="table-responsive content">
                            <h4 class="title-5 m-b-20 text-center" >tipos de lectores en la Biblioteca</h4>
                            <table class="table tabla-datos table-hover table-responsive table-bordered list"  data-get="{{ url('/lectortipo') }}">
                                <thead class="">
                                    <tr>
                                        <th width="3%">#</th>
                                        <th>Nombre</th>
                                        <th>Detalle</th>
                                        <th>Tiempo Maximo</th>
                                        <th width="4%"></th>
                                        <!--<th width="4%"></th>-->
                                    </tr>
                                </thead>
                                <tbody id="itemContainer">
                                    @php $c = 1; @endphp
                                    @foreach($registros as $registro)
                                    <tr>
                                        <td>{{ $c++ }}</td>
                                        <td>{{ $registro->LET_NOMBRE }}</td>
                                        <td>{{ $registro->LET_DETALLE }}</td>
                                        <td>{{ $registro->LET_TIEMPOM }} dias</td>
                                        <td class="text-center"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#EditModal" title="Modificar" onClick="modificar('{{ $registro->LET_ID }}')"><i class="fa fa-edit"></i></a></td>
                                        <!--<td class="text-center"><a href="#" class="btn btn-danger" title="Borrar" onClick="eliminar('{{ $registro->LET_ID }}', '{{ $registro->LET_NOMBRE }}')"><i class="fa fa-trash"></i></a>
                                        <form action="{{ route('lectortipo.destroy', $registro->LET_ID) }}" method="post" class="form-delete{{ $registro->LET_ID }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                        </form>
                                        </td>-->
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
@include('tipol.create')
@include('tipol.edit')
@endsection



