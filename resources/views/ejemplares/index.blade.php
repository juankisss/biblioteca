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
                            <i class="zmdi zmdi-account-calendar"></i>Administración de Ejemplares<button class="pull-right au-btn au-btn-icon btn-secondary au-btn--small bg-dark" style="margin-left:5px" onClick="document.location.href= '{{ url("materialbibliografico") }}'"><i class="fa fa-undo"></i>Volver Registros</button><button class="pull-right au-btn au-btn-icon au-btn--blue au-btn--small bg-success" data-toggle="modal" data-target="#fModal"><i class="zmdi zmdi-plus"></i>Adicionar Registro</button></h3>
                        <hr>
                        <div class="table-responsive content">
                            
                            <div class="row" >
                                <div class="col-sm-2">
                                	<img src="{{ asset('fotos/'.$contenido->CON_IMAGEN) }}" class="img-responsive img-thumbnail ">
                                </div>
                                <div class="col-sm-10">
                                    <div class="row m-b-30">
                                        <div class="col-sm-4"><b>ISBN: </b> {{ $contenido->CON_ISBN }}</div>
                                        <div class="col-sm-4"><b>Titulo: </b> {{ $contenido->CON_TITULO }}</div>
                                        <div class="col-sm-4"><b>Categoria: </b> {{ $contenido->CAT_NOMBRE }}</div>
                                    </div>
                                    <div class="row m-b-30">
                                        <div class="col-sm-4"><b>Autor: </b> {{ $contenido->AUT_NOMBRE }}</div>
                                        <div class="col-sm-4"><b>Editorial: </b> {{ $contenido->EDI_NOMBRE }}</div>
                                        <div class="col-sm-4"><b>Sección: </b> {{ $contenido->SEC_NOMBRE }}</div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table class="table tabla-datos table-hover table-responsive table-bordered list" id="table1"  data-get="{{ url('/ejemplares') }}">
                                <thead class="">
                                    <tr>
                                        <th width="3%">#</th>
                                        <th>Codigo</th>
                                        <th>Detalle</th>
                                        <th>Observaciones</th>
                                        <th width="4%"></th>
                                        <th width="4%"></th>
                                    </tr>
                                </thead>
                                <tbody id="itemContainer">
                                    @php $c = 1; @endphp
                                    @foreach($ejemplares as $registro)
                                    <tr>
                                        <td>{{ $c++ }}</td>
                                        <td>{{ $registro->EJE_CODIGO }}</td>
                                        <td>{{ $registro->EJE_DETALLE }}</td>
                                        <td>{{ $registro->EJE_OBS }}</td>
                                        <td class="text-center"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#EditModal" title="Modificar" onClick="modificar('{{ $registro->EJE_ID }}')"><i class="fa fa-edit"></i></a></td>
                                        <td class="text-center"><a href="#" class="btn btn-danger" title="Borrar" onClick="eliminar('{{ $registro->EJE_ID }}', '{{ $registro->EJE_CODIGO }}')"><i class="fa fa-trash"></i></a>
                                        <form action="{{ route('ejemplares.destroy', $registro->EJE_ID) }}" method="post" class="form-delete{{ $registro->EJE_ID }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <!--<input type="hidden" name="_method" value="DELETE">-->

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
@include('ejemplares.create')
@include('ejemplares.edit')
@endsection



