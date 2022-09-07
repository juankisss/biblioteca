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
                            <i class="zmdi zmdi-file"></i>Reporte de Personal</h3>
                        <hr><input type="hidden" id="tipoc" value="personal">
                        <div class="table-responsive content">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable_report---" data-get="{{ url('/lectortipo') }}">
                                <thead class="">
                                    <tr>
                                        <th width="3%">ID</th>
                                        <th>Nombre</th>
                                        <th>C.I.</th>
                                        <th>e-Mail</th>
                                        <th>Celular</th>
                                        <th>Dirección</th>
                                        <!--<th>Foto</th>-->
                                        <th>Cargo</th>
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



