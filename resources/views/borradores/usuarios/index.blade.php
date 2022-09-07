@extends('template')

@section('contenido')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-lg-12">
                    <!-- USER DATA-->
                    <div class="user-data m-b-30">
                        <h3 class="title-3 m-b-30">
                            <i class="zmdi zmdi-account-calendar"></i>Administración de Usuarios<button class="pull-right au-btn au-btn-icon au-btn--blue au-btn--small" data-toggle="modal" data-target="#fModal"><i class="zmdi zmdi-plus"></i>Adicionar Registro</button></h3>
                        <hr>
                        <div class="table-responsive content">
    <table class="table tabla-datos table-hover table-responsive table-bordered" id="table1">
        <thead class="">
            <tr>
                <!--<th width="3%">ID</th>-->
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th width="4%"></th>
                <th width="4%"></th>
            </tr>
        </thead>
        <tbody id="itemContainer">
            @for($i=1;$i<=10;$i++)
            <tr>
                <td>Juan Perez</td>
                <td>juan</td>
                <td>Administrador</td>
                <td>Activo</td>
                <td class="text-center"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#fModal" title="Modificar"><i class="fa fa-edit"></i></a></td>
				<td class="text-center"><a href="#" class="btn btn-danger" title="Borrar"><i class="fa fa-trash"></i></a></td>
            </tr>
            @endfor
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
@include('usuarios.create')


