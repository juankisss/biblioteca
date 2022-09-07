
@extends('template')
@section('contenido')
            <!-- MAIN CONTENT-->
            <div class="main-content" style="background-image:url('images/fnd.png'); background-size: auto;">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
						@include('partials.success')
						<div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-book"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{ $ccontenidos }}</h2>
                                                <span>Libros</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-accounts"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{ $clectores }}</h2>
                                                <span>Lectores</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{ $cpersonal }}</h2>
                                                <span>Personal</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{ $creservas }}</h2>
                                                <span>Reservas</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                        	<div class="col-sm-4">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Prestamos de hoy</h3>
                                        <canvas id="team-chart1"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Devoluciones de hoy</h3>
                                        <canvas id="team-chart2"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Total de Prestamos</h3>
                                        <canvas id="team-chart3"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">PRESTAMOS RECIENTES</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>fecha</th>
                                                <th>Hora</th>
                                                <th>Lector</th>
                                                <th class="text-right">Observacion</th>
                                                <th class="text-right">Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for($i=1;$i<=10;$i++)
                                            <tr>
                                                <td>5/07/2022</td>
                                                <td>20:30</td>
                                                <td>Juan Perez Arteaga</td>
                                                <td class="text-right"></td>
                                                <td class="text-right">Devuelto</td>
                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>-->
                        @include('partials.footer-cont')
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
@endsection