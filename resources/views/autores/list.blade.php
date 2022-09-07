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
                            <i class="zmdi zmdi-account-calendar"></i>Administración de Autores<button class="pull-right au-btn au-btn-icon au-btn--blue au-btn--small bg-dark" data-toggle="modal" data-target="#fModal"><i class="zmdi zmdi-plus"></i>Adicionar Autor</button></h3>
                        <hr>
                        <div class="table-responsive content">
                            <table class="table tabla-datos table-hover table-responsive table-bordered list" id="table1"  data-get="{{ url('/autores') }}">
                                <thead class="">
                                    <tr>
                                        <th width="3%">ID</th>
                                        <th>Nombre</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Lugar Nacimiento</th>
                                        <!--<th>Biografía</th>-->
                                        <!--<th>e-Mail</th>-->
                                        <!--<th>Imagen</th>-->
                                        <th width="4%"></th>
                                        <th width="4%"></th>
                                    </tr>
                                </thead>
                                <tbody id="itemContainer">
                                    @php $c=1 @endphp
                                    @foreach($autores as $a)
                                    <tr>
                                        <td>{{ $c++ }}</td>
                                        <td>{{ $a->AUT_NOMBRE }}</td>
                                        <td>{{ $a->AUT_FECHAN }}</td>
                                        <td>{{ $a->AUT_LUGARN }}</td>
                                        <!--<td>{{ $a->AUT_BIOGRAFIA }}</td>-->
                                        <!--<td>{{ $a->AUT_EMAIL }}</td>-->
                                        <!--<td><img src="{{ asset('fotos/autor_')}}{{$a->AUT_ID}}/{{$a->AUT_IMAGEN}}" width="200"></td>-->
                                        <td class="text-center"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#EditModal" title="Modificar" onClick="modificar('{{$a->AUT_ID}}')"><i class="fa fa-edit"></i></a></td>
                                        <td class="text-center"><a href="#" class="btn btn-danger" title="Borrar" onClick="eliminar('{{ $a->AUT_ID }}', '{{ $a->AUT_NOMBRE }}')"><i class="fa fa-trash"></i></a>
                                        <form action="{{ route('autores.destroy', $a->AUT_ID) }}" method="POST" class="form-delete{{ $a->AUT_ID }}">
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
@include('autores.create')
@include('autores.edit')
@endsection