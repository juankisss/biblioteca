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
                            <i class="zmdi zmdi-account-calendar"></i>Administración de Reservas<button class="pull-right au-btn au-btn-icon au-btn--blue au-btn--small bg-dark" data-toggle="modal" data-target="#fModal"><i class="zmdi zmdi-plus"></i>Nueva Reserva</button></h3>
                        <hr>
                        <div class="table-responsive content">
                            <table class="table tabla-datos table-hover table-responsive table-bordered list" id="table1"  data-get="{{ url('/reservas') }}">
                                <thead class="">
                                    <tr>
                                        <th width="3%">ID</th>
                                        <th>Ejemplar</th>
                                        <th>Lector</th>
                                        <th>Fecha</th>
                                        <th>Reserva</th>
                                        <th>Observaciones</th>
                                        <th>Estado</th>
                                        <th width="4%"></th>
                                        <!--<th width="4%"></th>-->
                                        <th width="4%"></th>
                                    </tr>
                                </thead>
                                <tbody id="itemContainer">
                                    @php $c=1 @endphp
                                    @foreach($registros as $s)
                                    @php //date_default_timezone_set('America/La_Paz');
                                    	$sop = '';
                                        if($s->RES_ESTADO==2){
                                        	$sop = 'alert-success';
                                        }if($s->RES_ESTADO==3){
                                        	$sop = 'alert-warning';
                                        }if($s->RES_ESTADO==1){
                                        	if($s->RES_FECHAR<date("Y-m-d")){ 
                                            	$sop = 'alert-danger'; 
                                            }else{
                                            	$sop = 'alert-info';
                                            }
                                        }  
                                    @endphp
                                    <tr class="{{$sop}}">
                                        <td>{{ $c++ }}</td>
                                        <td>{{ $s->CON_TITULO }}</td>
                                        <td>{{ $s->USL_ID }} ({{ $s->LET_NOMBRE }})</td>
                                        <td>{{ $s->RES_FECHA }}</td>
                                        <td>{{ $s->RES_FECHAR." ".$s->RES_HORAR }}</td>
                                        <td>{{ $s->RES_OBS }}</td>
                                            @if($s->RES_ESTADO == 1)
                                                <td>Programada</td>
                                            @elseif($s->RES_ESTADO == 2)
                                                <td>Concretada</td>
                                            @else
                                                <td>Cancelada</td>
                                            @endif
                                        <td class="text-center">@if($s->RES_ESTADO==1)<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#RegModal" title="Registrar Prestamo" onClick="modificar('{{ $s->RES_ID }}'),reservas('{{ $s->RES_ID }}','{{ $s->EJE_ID }}')"><i class="fa fa-upload"></i></a>@endif</td>
                                        <!--<td class="text-center">@if($s->RES_ESTADO==1)<a href="#" class="btn btn-success" data-toggle="modal" data-target="#EditModal" title="Modificar" onClick="modificar('{{ $s->RES_ID }}')"><i class="fa fa-edit"></i></a>@endif</td>-->
                                        <td class="text-center">@if($s->RES_ESTADO==1)<a href="#" class="btn btn-danger" title="Borrar" onClick="eliminar('{{ $s->RES_ID }}', '{{ $s->USP_ID }}')"><i class="fa fa-trash"></i></a>@endif
                                        <form action="{{ route('reservas.destroy', $s->RES_ID) }}" method="post" class="form-delete{{ $s->RES_ID }}">
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
@include('reservas.create')
@include('reservas.edit')
@include('reservas.reg')
@endsection
