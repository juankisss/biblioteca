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
                            <i class="zmdi zmdi-account-calendar"></i>Administración de Material Bibliografico<button class="pull-right au-btn au-btn-icon au-btn--blue au-btn--small bg-dark" data-toggle="modal" data-target="#fModal"><i class="zmdi zmdi-plus"></i>Adicionar Registro</button></h3>
                        <hr>
                        <div class="table-responsive content">
                            <table class="table tabla-datos table-hover table-responsive table-bordered list" id="table1"  data-get="{{ url('/materialbibliografico') }}">
                                <thead class="">
                                    <tr>
                                        <th width="3%">ID</th>
                                        <th>Categoría</th>
                                        <th>Autor</th>
                                        <th>Editorial</th>
                                        <th>Sección</th>
                                        <th>ISBN</th>
                                        <th>Título</th>
                                        <!--<th>Subtítulo</th>
                                        <th>Descripción</th>
                                        <th>Resumen</th>-->
                                        <th>Edición</th>
                                        <!--<th>Año de Pub.</th>
                                        <th>Idioma</th>
                                        <th>Páginas</th>
                                        <th>Imágen</th>-->
                                        <!--<th>Tipo</th>-->
                                        <th width="4%"></th>
                                        <th width="4%"></th>
                                        <th width="4%"></th>
                                    </tr>
                                </thead>
                                <tbody id="itemContainer">
                                    @php $c=1 @endphp
                                    @foreach($biblios as $b)
                                    <tr>
                                        <td>{{ $c++ }}</td>
                                        <td>{{ $b->CAT_NOMBRE }}</td>
                                        <td>{{ $b->AUT_NOMBRE }}</td>
                                        <td>{{ $b->EDI_NOMBRE }}</td>
                                        <td>{{ $b->SEC_NOMBRE }}</td>
                                        <td>{{ $b->CON_ISBN }}</td>
                                        <td>{{ $b->CON_TITULO }}</td>
                                        <!--<td>{{ $b->CON_SUBTITULO }}</td>
                                        <td>{{ $b->CON_DESC }}</td>
                                        <td>{{ $b->CON_RESUMEN }}</td>-->
                                        <td>{{ $b->CON_EDICION }}</td>
                                        <!--<td>{{ $b->CON_ANIOP }}</td>
                                        <td>{{ $b->CON_LENGUAJE }}</td>
                                        <td>{{ $b->CON_NPAGS }}</td>
                                        <td><img src="{{ asset('images/biblios_')}}{{$b->CON_ID}}/{{$b->CON_IMAGEN}}" width="200"></td>-->
                                        <!--<td>{{ $b->CON_TIPO }}</td>  -->  
                                        <td class="text-center"><a href="{{ url('/ejemplaresc/'.$b->CON_ID) }}" class="btn btn-primary au-btn--blue" title="Ejemplares"><i class="fa fa-book"></i></a></td>                                       
                                        <td class="text-center"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#EditModal" title="Modificar" onClick="modificar('{{$b->CON_ID}}')"><i class="fa fa-edit"></i></a></td>
                                        <td class="text-center"><a href="#" class="btn btn-danger" title="Borrar" onClick="eliminar('{{ $b->CON_ID }}', '{{ $b->CON_TITULO }}')"><i class="fa fa-trash"></i></a>
                                        <form action="{{ route('materialbibliografico.destroy', $b->CON_ID) }}" method="POST" class="form-delete{{ $b->CON_ID }}">
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
@include('bibliograficos.create')
@include('bibliograficos.edit')
@endsection