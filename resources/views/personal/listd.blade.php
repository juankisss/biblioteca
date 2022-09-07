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
                            <i class="zmdi zmdi-account-calendar"></i>Administración de Personal Eliminado<!--<button class="pull-right au-btn au-btn-icon au-btn--blue au-btn--small" data-toggle="modal" data-target="#fModal"><i class="zmdi zmdi-plus"></i>Adicionar Personal</button>--></h3>
                        <hr>
                        <div class="table-responsive content">
                            <table class="table tabla-datos table-hover table-responsive table-bordered list" id="table1"  data-get="{{ url('/personal') }}">
                                <thead class="">
                                    <tr>
                                        <th width="3%">ID</th>
                                        <th>Nombre</th>
                                        <th>C.I.</th>
                                        <th>e-Mail</th>
                                        <th>Celular</th>
                                        <!--<th>Dirección</th>
                                        <th>Foto</th>-->
                                        <th>Cargo</th>
                                        <!--<th>Estado</th>-->
                                        <th width="4%"></th>
                                    </tr>
                                </thead>
                                <tbody id="itemContainer">
                                    @php $c=1; @endphp
                                    @foreach($personal as $p)
                                    <tr>
                                        <td>{{ $c++ }}</td>
                                        <td>{{ $p->PER_NOMBRES.' '.$p->PER_APELLIDOS }}</td>
                                        <td>{{ $p->PER_CI }}</td>
                                        <td>{{ $p->PER_EMAIL }}</td>
                                        <td>{{ $p->PER_CELULAR }}</td>
                                        <td>{{ $p->PER_DIRECCION }}</td>
                                        <!--<td><img src="{{ asset('fotos/personal_')}}{{$p->PER_ID}}/{{$p->PER_FOTO}}" width="200"></td>-->
                                        <td>{{ $p->PER_CARGO }}</td>
                                            <!--@if($p->PER_ESTADO == 1)
                                                <td>Activo</td>
                                            @else
                                                <td>Inactivo</td>
                                            @endif-->
                                        <!--<td class="text-center"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#EditModal" title="Modificar" onClick="modificar('{{ $p->PER_ID }}')"><i class="fa fa-edit"></i></a></td>-->
                                        <td class="text-center"><a href="#" class="btn btn-info" title="Habilitar" onClick="habilitar('{{ $p->PER_ID }}', '{{ $p->PER_NOMBRES." ".$p->PER_APELLIDOS }}')"><i class="fa fa-refresh"></i></a>
                                        <form action="{{ route('personal.store') }}" method="post" class="form-habilitar{{ $p->PER_ID }}">
                                            @csrf 
                                            <input type="hidden" name="active" value="{{ $p->PER_ID }}">
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