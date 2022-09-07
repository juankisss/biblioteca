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
                            <i class="zmdi zmdi-account-calendar"></i>Administración de Categorías<button class="pull-right au-btn au-btn-icon au-btn--blue au-btn--small bg-dark" data-toggle="modal" data-target="#fModal"><i class="zmdi zmdi-plus"></i>Adicionar Categoría</button></h3>
                        <hr>
                        <div class="table-responsive content">
                            <table class="table tabla-datos table-hover table-responsive table-bordered list" id="table1"  data-get="{{ url('/categorias') }}">
                                <thead class="">
                                    <tr>
                                        <th width="3%">ID</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <!--<th>Resumen</th>
                                        <th>Imágen</th>-->
                                        <th width="4%"></th>
                                        <th width="4%"></th>
                                    </tr>
                                </thead>
                                <tbody id="itemContainer">
                                    @foreach($categoria as $c)
                                    <tr>
                                        <td>{{ $c->CAT_ID }}</td>
                                        <td>{{ $c->CAT_NOMBRE }}</td>
                                        <td>{{ $c->CAT_DESC }}</td>
                                        <!--<td>{{ $c->CAT_RESUMEN }}</td>
                                        <td><img src="{{ asset('images/categoria_')}}{{$c->CAT_ID}}/{{$c->CAT_IMG}}" width="200"></td>-->
                                        <td class="text-center"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#EditModal" title="Modificar" onClick="modificar('{{$c->CAT_ID}}')"><i class="fa fa-edit"></i></a></td>
                                        <td class="text-center"><a href="#" class="btn btn-danger" title="Borrar" onClick="eliminar('{{ $c->CAT_ID }}', '{{ $c->CAT_NOMBRE }}')"><i class="fa fa-trash"></i></a>
                                        <form action="{{ route('categorias.destroy', $c->CAT_ID) }}" method="POST" class="form-delete{{ $c->CAT_ID }}">
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
@include('categorias.create')
@include('categorias.edit')
@endsection