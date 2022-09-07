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
                            <i class="zmdi zmdi-account-calendar"></i>Administración de Prestamos<button class="pull-right au-btn au-btn-icon au-btn--blue au-btn--small bg-dark" data-toggle="modal" data-target="#fModal" onClick="act_form('prestamos')"><i class="zmdi zmdi-plus"></i>Adicionar Prestamos</button></h3>
                        <hr>
                        <div class="table-responsive content">
                            <table class="table tabla-datos table-hover table-responsive table-bordered list " id="table1"  data-get="{{ url('/prestamos') }}">
                                <thead class="" >
                                    <tr>
                                        <th width="3%">ID</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Ejemplar</th>
                                        <!--<th>Personal</th>-->
                                        <th>Lector</th>
                                        <th>Devolución</th>
                                        <!--<th>Observaciones</th>-->
                                        <th>Estado</th>
                                        <!--<th width="4%"></th>-->
                                        <th width="4%"></th>
                                        <th width="4%"></th>
                                    </tr>
                                </thead>
                                <tbody id="itemContainer">
                                    @php $c=1 @endphp
                                    @foreach($prestamos as $p)
                                    @php //date_default_timezone_set('America/La_Paz');
                                    	$sop = '';
                                        if($p->PRE_ESTADO==2){
                                        	$sop = 'alert-success';
                                        }if($p->PRE_ESTADO==3){
                                        	$sop = 'alert-warning';
                                        }if($p->PRE_ESTADO==1){
                                        	if($p->PRE_FECHAD<date("Y-m-d") & $p->PRE_FECHAD!=''){ 
                                            	$sop = 'alert-danger'; 
                                            }else{
                                            	$sop = 'alert-info';
                                            }
                                        }  
                                    @endphp
                                    <tr class="{{$sop}}">
                                        <td>{{ $c++ }}</td>
                                        <td>{{ $p->PRE_FECHA }}</td>
                                        <td>{{ $p->PRE_HORA }}</td>
                                        <td>{{ $p->EJE_ID }}</td>
                                        <td>{{ $p->USL_ID }}</td>
                                        <td>{{ $p->PRE_FECHAD.' '.$p->PRE_HORAD }}</td>
                                        <!--<td>{{ $p->PRE_OBS }}</td>-->
                                            @if($p->PRE_ESTADO == 1)
                                                <td class="btn btn-primary">Prestado</td>
                                            @elseif($p->PRE_ESTADO == 2)
                                                <td class="btn btn-success">Devuelto</td>
                                            @else
                                                <td class="btn btn-danger"> Devuelto a destiempo</td>
                                            @endif
                                        <td class="text-center">@if($p->PRE_ESTADO!=2)<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ModModal" title="Registro Devolucion" onClick="modificar('{{ $p->PRE_ID }}')"><i class="fa fa-share-square"></i></a>@endif</td>
                                        <!--<td class="text-center"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#EditModal" title="Modificar" onClick="modificar('{{ $p->PRE_ID }}')"><i class="fa fa-edit"></i></a></td>-->
                                        <td class="text-center"><a href="#" class="btn btn-danger" title="Borrar" onClick="eliminar('{{ $p->PRE_ID }}', '{{ $p->EJE_ID }}')"><i class="fa fa-trash"></i></a>
                                        <form action="{{ route('prestamos.destroy', $p->PRE_ID) }}" method="post" class="form-delete{{ $p->PRE_ID }}">
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
@include('prestamos.create')
@include('prestamos.edit')
@include('devoluciones.create')
@endsection