<!DOCTYPE html>
<html lang="en"><head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@if(isset($title)){{ $title }}@else Biblioteca (L.E.C.) @endif</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('css/font-face.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset('vendor/animsition/animsition.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/wow/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet">
    
    <link href="{{ asset('vendor/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    
    @if(isset($link))
    <!-- JQuery DataTable Css -->
    <!--<link href="{{ asset('vendor/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">-->
    <link href="{{ asset('vendor/jquery-datatable1.12/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/jquery-datatable1.12/buttons.dataTables.min.css') }}" rel="stylesheet">
    @endif
    
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">


    <style type="text/css">
	.select2-container .select2-selection--single {
		height: auto;
	}
	.select2-container .select2-selection--single .select2-selection__rendered {
		/*padding-left: 8px;
		padding-right: 20px;*/
		padding:5px 20px 5px 10px;
	}
	</style>
    <script language="javascript">
		function hora(){
			var fecha = new Date()
			var hora = fecha.getHours()
			var minuto = fecha.getMinutes()
			var segundo = fecha.getSeconds()
			if (hora < 10) {hora = "0" + hora}
			if (minuto < 10) {minuto = "0" + minuto}
			if (segundo < 10) {segundo = "0" + segundo}
			var horita = hora + ":" + minuto + ":" + segundo
			document.getElementById('hora').firstChild.nodeValue = horita
			tiempo = setTimeout('hora()',1000)
		}
		function MostrarHora(){
			document.write('<span id="hora">')
			document.write ('000000</span>')
			hora()
		}
	</script>
</head>
@php $segment = Request::segment(1); $segment1 = Request::segment(2); @endphp
<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{ url('images/logo.png') }}" alt="CoolAdmin" class="img-responsive" style="max-height:60px" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="@if($segment=='' or $segment=='inicio') active @endif">
                            <a href="{{ url('/') }}">
                                <i class="fas fa-home"></i>Inicio</a>
                        </li>
                        <li class="@if($segment=='prestamos') active @endif">
                            <a href="{{ url('prestamos') }}">
                                <i class="fas fa-folder"></i>Prestamos</a>
                        </li>
                        <li class="@if($segment=='reservas') active @endif">
                            <a href="{{ url('reservas') }}">
                                <i class="fas fa-calendar-alt"></i>Reservas</a>
                        </li>
                        <!--<li class="">
                            <a href="{{url('/devoluciones')}}">
                                <i class="fas fa-share-square"></i>Devoluciones</a>
                        </li>-->
                        <li class="@if($segment=='lectores') active @endif">
                            <a href="{{url('/lectores')}}">
                                <i class="fas fa-users"></i>Lectores</a>
                        </li>
                        <!--<li class="">
                            <a href="{{url('/adquisiciones')}}">
                                <i class="fas fa-table"></i>Adquisiciones</a>
                        </li>-->
                        <li class="@if($segment=='materialbibliografico') active @endif">
                            <a href="{{url('/materialbibliografico')}}"><i class="fas fa-book"></i> Material Bibliografico</a>
                        </li>
                        <li class="has-sub @if($segment=='autores' or $segment=='editoriales' or $segment=='categorias' or $segment=='secciones') active @endif">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-list"></i>Contenidos <i class="fas fa-angle-down"></i></a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li class="@if($segment=='autores') active @endif">
                                    <a href="{{url('/autores')}}">Autores</a>
                                </li>
                                <li class="@if($segment=='editoriales') active @endif">
                                    <a href="{{url('/editoriales')}}">Editoriales</a>
                                </li>
                                <li class="@if($segment=='categorias') active @endif">
                                    <a href="{{url('/categorias')}}">Categorias</a>
                                </li>
                                <li class="@if($segment=='secciones') active @endif">
                                    <a href="{{url('/secciones')}}">Secciones</a>
                                </li>
                            </ul>
                        </li>
                        @if(Session::get('tipo')==1)
                        <li class="has-sub @if($segment=='usuarios' or $segment=='personal' or $segment=='lectortipo') active @endif">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Administración <i class="fas fa-angle-down"></i></a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li class="@if($segment=='usuarios') active @endif">
                                    <a href="{{ url('usuarios') }}">Usuarios</a>
                                </li>
                                <li class="@if($segment=='personal') active @endif">
                                    <a href="{{url('/personal')}}">Personal</a>
                                </li>
                                <li class="@if($segment=='lectortipo') active @endif">
                                    <a href="{{ url('lectortipo') }}">Tipo/Lector</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(Session::get('tipo')==1)
                        <li class="has-sub @if($segment=='contenidos_del' or $segment=='personal_del') active @endif">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-trash"></i>Bajas <i class="fas fa-angle-down"></i></a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li class="@if($segment=='contenidos_del') active @endif">
                                    <a href="{{ url('contenidos_del') }}">Libros</a>
                                </li>
                                <li class="@if($segment=='personal_del') active @endif">
                                    <a href="{{url('personal_del')}}">Personal</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(Session::get('tipo')==1)
                        <li class="has-sub @if($segment=='reportes') active @endif">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-file"></i>Reportes <i class="fas fa-angle-down"></i></a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list"> 
                                <li class="@if($segment1=='prestamos') active @endif">
                                    <a href="{{ url('reportes/prestamos')}}">Prestamos</a>
                                </li>
                                <li class="@if($segment1=='reservas') active @endif">
                                    <a href="{{ url('reportes/reservas') }}">Reservas</a>
                                </li>
                                <li class="@if($segment1=='contenidos') active @endif">
                                    <a href="{{ url('reportes/contenidos') }}">Material Bibliografico</a>
                                </li>
                                <li class="@if($segment1=='lectores') active @endif">
                                    <a href="{{ url('reportes/lectores') }}">Lectores</a>
                                </li>
                                <li class="@if($segment1=='personal') active @endif">
                                    <a href="{{ url('reportes/personal') }}">Personal</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <!--<div class="logo">
                <a href="#">
                    <img src="{{ url('images/logo.png') }}" alt="" class="img-responsive" />
                </a>
            </div>-->
            <div class="menu-sidebar__content js-scrollbar1 menu_fnd" style="background-image: url({{ url('images/atencion.png') }}); background-position:bottom; background-repeat:no-repeat;">
                <nav class="navbar-sidebar">
                    <div align="center"><img src="{{ url('images/logo.png') }}" alt="" class="img-responsive" style="max-width:100px" /><hr></div>
                    <ul class="list-unstyled navbar__list">
                        <li class="@if($segment=='' or $segment=='inicio') active @endif">
                            <a href="{{ url('/') }}">
                                <i class="fas fa-home"></i>Inicio</a>
                        </li>
                        <li class="@if($segment=='prestamos') active @endif">
                            <a href="{{ url('prestamos') }}">
                                <i class="fas fa-folder"></i>Prestamos</a>
                        </li>
                        <li class="@if($segment=='reservas') active @endif">
                            <a href="{{ url('reservas') }}">
                                <i class="fas fa-calendar-alt"></i>Reservas</a>
                        </li>
                        <!--<li class="">
                            <a href="{{url('/devoluciones')}}">
                                <i class="fas fa-share-square"></i>Devoluciones</a>
                        </li>-->
                        <li class="@if($segment=='lectores') active @endif">
                            <a href="{{url('/lectores')}}">
                                <i class="fas fa-users"></i>Lectores</a>
                        </li>
                        <!--<li class="">
                            <a href="{{url('/adquisiciones')}}">
                                <i class="fas fa-table"></i>Adquisiciones</a>
                        </li>-->
                        <li class="@if($segment=='materialbibliografico') active @endif">
                            <a href="{{url('/materialbibliografico')}}"><i class="fas fa-book"></i> Libros</a>
                        </li>
                        <li class="has-sub @if($segment=='autores' or $segment=='editoriales' or $segment=='categorias' or $segment=='secciones') active @endif">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-list"></i>Formularios (Libro) <i class="fas fa-angle-down"></i></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="@if($segment=='autores') active @endif">
                                    <a href="{{url('/autores')}}">Autores</a>
                                </li>
                                <li class="@if($segment=='editoriales') active @endif">
                                    <a href="{{url('/editoriales')}}">Editoriales</a>
                                </li>
                                <li class="@if($segment=='categorias') active @endif">
                                    <a href="{{url('/categorias')}}">Categorias</a>
                                </li>
                                <li class="@if($segment=='secciones') active @endif">
                                    <a href="{{url('/secciones')}}">Secciones</a>
                                </li>
                            </ul>
                        </li>
                        @if(Session::get('tipo')==1)
                        <li class="has-sub @if($segment=='usuarios' or $segment=='personal' or $segment=='lectortipo') active @endif">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Administración <i class="fas fa-angle-down"></i></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="@if($segment=='usuarios') active @endif">
                                    <a href="{{ url('usuarios') }}">Usuarios</a>
                                </li>
                                <li class="@if($segment=='personal') active @endif">
                                    <a href="{{url('/personal')}}">Personal</a>
                                </li>
                                <li class="@if($segment=='lectortipo') active @endif">
                                    <a href="{{ url('lectortipo') }}">Tipo/Lector</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(Session::get('tipo')==1)
                        <li class="has-sub @if($segment=='contenidos_del' or $segment=='personal_del') active @endif">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-trash"></i>Bajas <i class="fas fa-angle-down"></i></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="@if($segment=='contenidos_del') active @endif">
                                    <a href="{{ url('contenidos_del') }}">Libros</a>
                                </li>
                                <li class="@if($segment=='personal_del') active @endif">
                                    <a href="{{url('personal_del')}}">Personal</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(Session::get('tipo')==1)
                        <li class="has-sub @if($segment=='reportes') active @endif">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-file"></i>Reportes <i class="fas fa-angle-down"></i></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list"> 
                                <li class="@if($segment1=='prestamos') active @endif">
                                    <a href="{{ url('reportes/prestamos')}}">Prestamos</a>
                                </li>
                                <li class="@if($segment1=='reservas') active @endif">
                                    <a href="{{ url('reportes/reservas') }}">Reservas</a>
                                </li>
                                <li class="@if($segment1=='contenidos') active @endif">
                                    <a href="{{ url('reportes/contenidos') }}">Material Bibliografico</a>
                                </li>
                                <li class="@if($segment1=='lectores') active @endif">
                                    <a href="{{ url('reportes/lectores') }}">Lectores</a>
                                </li>
                                <li class="@if($segment1=='personal') active @endif">
                                    <a href="{{ url('reportes/personal') }}">Personal</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <!--<li class="">
                            <a href="#">
                                <i class="fas fa-bar-chart-o"></i>Estadisticas</a>
                        </li>-->
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop" style="background-color:#333; color:FFF;">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <!--<form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>-->
                            <div class="form-header"><h5 style="color:#CCC">SISTEMA DE INFORMACION BIBLIOTECARIA WEB<!--SISTEMA DE PLANIFICACIÓN DE RECURSOS EMPRESARIALES--></h5></div><div align="center" style="color:#FFF; font-size:20px; letter-spacing:3px;"><script language="JavaScript" type="text/javascript">MostrarHora();</script></div>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <!--<div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>-->
                                    @php use App\Http\Controllers\PrestamosController; @endphp
                                    @php
                                        $foo = new PrestamosController();
                                        $pendientes = $foo->get_pendientes();
                                    @endphp
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        @if(count($pendientes)>0)<span class="quantity">{{count($pendientes)}}</span>@endif
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>Se tienen {{count($pendientes)}} Prestamos no Devueltos</p>
                                            </div>
                                            @foreach($pendientes as $exp)
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>{{$exp->LECTOR}}</p>
                                                    <span class="date">{{$exp->PRE_FECHA." ".$exp->PRE_FECHAD}}</span>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="notifi__footer">
                                                <a href="{{url('prestamos')}}">Todos los Prestamos</a>
                                            </div>
                                        </div>
                                    </div>
                                    @php use App\Http\Controllers\ReservasController; @endphp
                                    @php
                                        $foo = new ReservasController();
                                        $expirados = $foo->get_expirados();
                                    @endphp
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-calendar"></i>
                                        @if(count($expirados)>0)<span class="quantity">{{count($expirados)}}</span>@endif
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>Se tienen {{count($expirados)}} Reservas Expiradas</p>
                                            </div>
                                            @foreach($expirados as $exp)
                                            <div class="notifi__item" onClick="expirados('{{$exp->RES_ID}}')">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>{{$exp->LEC_NOMBRES.' '.$exp->LEC_APELLIDOS}}</p>
                                                    <span class="date">{{$exp->RES_FECHAR}}</span>
                                                </div>
                                            </div>
                                            <!--<div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Marco Antonio Apaza</p>
                                                    <span class="date">20-12-2020, 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Antonio Arrieta</p>
                                                    <span class="date">20-12-2020, 06:50</span>
                                                </div>
                                            </div>-->
                                            @endforeach
                                            <div class="notifi__footer">
                                                <a href="{{url('reservas')}}">Todas las Reservas</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            @if(Session::get('foto')=='') 
                                                <img src="{{ asset('images/silueta.jpg') }}" alt="logo" />
                                            @else
                                                <img src="{{ asset('fotos/'.Session::get('foto')) }}" alt="logo" />
                                            @endif
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn user_name" href="#" style="color:#EEE">{{ Session::get('nombre') }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        @if(Session::get('foto')=='') 
                                                        	<img src="{{ asset('images/silueta.jpg') }}" alt="logo" />
                                                        @else
                                                        	<img src="{{ asset('fotos/'.Session::get('foto')) }}" alt="logo" />
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#" title="Pefil de Usuario" onClick="perfil('{{ Session::get('pid') }}','{{ url('/personal') }}')">{{ Session::get('nombre') }}</a>
                                                    </h5>
                                                    <span class="email">{{ Session::get('email') }}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#" title="Pefil de Usuario" onClick="perfil('{{ Session::get('pid') }}','{{ url('/personal') }}')">
                                                        <i class="zmdi zmdi-account"></i>Mi cuenta</a>
                                                </div>
                                                <!--<div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>-->
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="#" onClick="salir('{{ Session::get('nombre') }}')"><i class="zmdi zmdi-power"></i>Cerrar Sesión</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
<!-- modal large -->
<div class="modal fade" id="expirada" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"><i class="fa fa-calendar"></i> Reserva Expirada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('reservas.store') }}" enctype="multipart/form-data">
                @csrf 
                <div class="modal-body">
                    @include('partials.error')
                        <div class="row">
                            <div class="col-sm-6">
                            	<!--<img src="{{ asset('images/logo_fnd.png')}}" class="img-responsive img-thumbnail cimg">-->
                                <b>Desde:</b> <span class="txtr_fecha"></span><br>
                                <b>ISBN:</b> <span class="txtr_isbn"></span><br>
                                <b>Titulo:</b> <span class="txtr_titulo"></span><br>
                                <b>Editorial:</b> <span class="txtr_editorial"></span>
                            </div>
                            <div class="col-sm-6">
                            	<!--<img src="{{ asset('images/logo_fnd.png')}}" class="img-responsive img-thumbnail cimg">-->
                                <b>Hasta:</b> <span class="txtr_fecha1"></span><br>
                                <b>Codigo:</b> <span class="txtr_codigo"></span><br>
                                <b>Autor:</b> <span class="txtr_autor"></span><br>
                                <b>Edición:</b> <span class="txtr_edicion"></span>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label>Acciones</label><br>
                                <label><input type="radio" name="RES_ESTADO" value="3" required> Cancelar</label>&nbsp;&nbsp;
        						<label><input type="radio" name="RES_ESTADO" value="4" required> Eliminar</label>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Observaciones</label>
                                <textarea name="RES_OBS" class="form-control"></textarea>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="cancelar" class="RES_IDR">
                    <button type="submit" class="au-btn--green btn-submit au-btn au-btn-icon"><i class="fa fa-calendar-alt"></i> Guardar</button>
                    <button class="au-btn au-btn-icon btn-secondary" data-dismiss="modal" aria-label="Close"><i class="fa fa-undo"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal large -->
<!-- modal large -->
<div class="modal fade" id="PerfilModal" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"><i class="zmdi zmdi-account-calendar"></i> Perfil de Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('personal.update',0) }}" enctype="multipart/form-data" class="form-edit">
                @csrf  
                {{ method_field('PUT') }}
                <div class="modal-body">
                    @include('partials.error')
                    <div class="form-row">
                        <div class="col-sm-6">  
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label>Nombres</label>
                                    <input type="text" name="PER_NOMBRES" class="form-control PER_NOMBRES" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label>Apellidos</label>
                                    <input type="text" name="PER_APELLIDOS" class="form-control PER_APELLIDOS" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label>CI</label>
                                    <input type="text" name="PER_CI" class="form-control PER_CI" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label>Genero</label>
                                    <select name="PER_GENERO" class="form-control PER_GENERO">
                                        <option value="1">Masculino</option>
                                        <option value="2">Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label>Fecha de Nacimiento</label>
                                    <input type="text" name="PER_FECHAN" class="form-control fechan PER_FECHAN" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label>Rol</label>
                                    <input type="text" name="PER_ROL" class="form-control PER_ROL">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6"> 
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label>E-Mail</label>
                                    <input type="email" name="PER_EMAIL" class="form-control PER_EMAIL">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label>Celular</label>
                                    <input type="number" name="PER_CELULAR" class="form-control PER_CELULAR">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label>Dirección</label>
                                    <input type="text" name="PER_DIRECCION" class="form-control PER_DIRECCION">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label>Cargo</label>
                                    <input type="text" name="PER_CARGO" class="form-control PER_CARGO">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label>Foto:</label>&nbsp;<span class="fileinput-preview"></span>
                                    <input type="file" name="file" class="form-control">
                                    <input type="hidden" name="PER_FOTO" class="PER_FOTO IMG">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="PER_ID">
                    <button type="submit" class="au-btn--blue btn-submit au-btn au-btn-icon"><i class="fa fa-save"></i> Guardar</button>
                    <button class="au-btn au-btn-icon btn-secondary" data-dismiss="modal" aria-label="Close"><i class="fa fa-undo"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal large -->
    @yield('contenido')   

            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>

    <!-- Bootstrap JS-->
    <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS -->
    <script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>

    <script src="{{ asset('vendor/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatable/dataTables.bootstrap4.min.js') }}"></script>
	
    @if(isset($link))
    <!-- Jquery DataTable Plugin Js -->
    <!--<script src="{{ asset('vendor/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendor/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendor/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>-->
    
    <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="{{ asset('vendor/jquery-datatable1.12/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-datatable1.12/vfs_fonts.js') }}"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>-->
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

    <script src="{{ asset('js/tables/jquery-datatable.js') }}"></script>
    @endif

    <script src="{{ asset('js/bootstrap-select.js') }}"></script>
	
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('js/main.js') }}"></script>
        <script>
//Validaion
function vNuE(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 1234567890";
    especiales = [8, 37, 39];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}
function vNum(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 1234567890";
    especiales = [8, 37, 39, 44];
	//especiales = [8, 37, 39, 46];
    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}
function vLet(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}
function limpia() {
    var val = document.getElementById("miInput").value;
    var tam = val.length;
    for(i = 0; i < tam; i++) {
        if(!isNaN(val[i]))
            document.getElementById("miInput").value = '';
    }
}
//*************************//
     $('#fModal').on('hidden.bs.modal', function () { //alert("");
            //$(this).find('form').trigger('reset');
			//$(this).find('form')[0].reset();
     });
	 $('#fModal').on('show.bs.modal', function () { //alert("");
            $(this).find('form').trigger('reset');
			//$(".js-example-basic-multiple").select2("val", "");
			$(".js-example-basic-multiple").val("").trigger('change.select2');
			//$(".js-example-basic-multiple").select2();
			//$(this).find('form')[0].reset();
			$(".cardn").hide();
			//$("#fModal").removeAttr("tabindex");
     });
	$(document).ready(function() {
		$('#table1').DataTable();
		$('#table2').DataTable( {
			"paging":   false,
			"ordering": false,
			"info":     false
		});
	});
	$(function () { 
		$('#divMiCalendario').datetimepicker(); 
		/*$('.date').datetimepicker({
			format: 'YYYY-MM-DD',
			locale: 'es'
		}); */
		$('.fechan').datetimepicker({
			format: 'YYYY-MM-DD',
			ignoreReadonly: true,
			locale: 'es',
			maxDate: '<?php echo date("Y-m-d",strtotime(date("Y-m-d")."- 6 year")); ?>',
			icons: {
				time: 'fa fa-clock-o',
				date: 'fa fa-calendar',
				up: 'fa fa-chevron-up',
				down: 'fa fa-chevron-down',
				previous: 'fa fa-chevron-left',
				next: 'fa fa-chevron-right',
				today: 'fa fa-check',
				clear: 'fa fa-trash',
				close: 'fa fa-times'
			}
		}); 
		<?php if(isset($fechasr)){ ?>
		var disabledDate = <?php echo $fechasr; ?>;
		<?php }else{ ?>
		var disabledDate = [];
		<?php } ?> 
		$('.fecha').datetimepicker({
			format: 'YYYY-MM-DD',
			ignoreReadonly: true,
			locale: 'es',
			disabledDates: disabledDate,
			icons: {
				time: 'fa fa-clock-o',
				date: 'fa fa-calendar',
				up: 'fa fa-chevron-up',
				down: 'fa fa-chevron-down',
				previous: 'fa fa-chevron-left',
				next: 'fa fa-chevron-right',
				today: 'fa fa-check',
				clear: 'fa fa-trash',
				close: 'fa fa-times'
			}
		}); 
		$('.fechap').datetimepicker({
			format: 'YYYY-MM-DD HH:mm',
			ignoreReadonly: true,
			locale: 'es',
			minDate: '<?php echo date("Y-m-d"); ?>',/*daysOfWeekDisabled: [0,6],disabledDates: disabledDate,*/
			icons: {
				time: 'fa fa-clock-o',
				date: 'fa fa-calendar',
				up: 'fa fa-chevron-up',
				down: 'fa fa-chevron-down',
				previous: 'fa fa-chevron-left',
				next: 'fa fa-chevron-right',
				today: 'fa fa-check',
				clear: 'fa fa-trash',
				close: 'fa fa-times'
			}
		});
		var fmr = new Date();
		fmr.setDate(fmr.getDate() + 1);
		$('.fechar').datetimepicker({
			format: 'YYYY-MM-DD',
			ignoreReadonly: true,
			locale: 'es',
			minDate: '<?php echo date("Y-m-d"); ?>',/*daysOfWeekDisabled: [0,6],disabledDates: disabledDate,*/
			maxDate: fmr,
			icons: {
				time: 'fa fa-clock-o',
				date: 'fa fa-calendar',
				up: 'fa fa-chevron-up',
				down: 'fa fa-chevron-down',
				previous: 'fa fa-chevron-left',
				next: 'fa fa-chevron-right',
				today: 'fa fa-check',
				clear: 'fa fa-trash',
				close: 'fa fa-times'
			}
		});
		$('.fechad').datetimepicker({ useCurrent: false });
		$('.hora').datetimepicker({
			//format: 'LT'
			format: 'HH:mm',
			ignoreReadonly: true,
			icons: {
				time: 'fa fa-clock-o',
				date: 'fa fa-calendar',
				up: 'fa fa-chevron-up',
				down: 'fa fa-chevron-down',
				previous: 'fa fa-chevron-left',
				next: 'fa fa-chevron-right',
				today: 'fa fa-check',
				clear: 'fa fa-trash',
				close: 'fa fa-times'
			}
		}); 
		//$('.hora').show();
	}); 
	/*$(".cot_total").keyup(function(){
		val = 0;
		$(".cot_total").each(function(){
			if($(this).val()!=''){
				val += parseFloat($(this).val());
			}
		});
		$("#total").val(val);
	});*/
		$(".fecha1").on("dp.change", function (e) { //alert($(this).val());
			$('.fecha2').datetimepicker('minDate', $(this).val());
			if($(".tipo").val()<3){
				var fecha = new Date($(this).val());
				var dias = parseInt($(".tipo:checked").attr("dir")); //alert(dias);
				fecha.setDate(fecha.getDate() + dias); //alert(fecha);
				//console.info(fecha);
				$('.fecha2').datetimepicker('maxDate', fecha);
			}else{
				//$('.fecha2').datetimepicker('maxDate', "2023-12-01");
				//$('.fecha2').data("DateTimePicker").disable();
			}
		});
		$(".fecha2").on("dp.change", function (e) {
			if($(".tipo").val()<3){
				//$('.fecha1').datetimepicker('maxDate', $(this).val());
			}else{
				//$('.fecha1').val($(this).val());
			}
		});
		$(".tipo").click(function(){
			//$('.fechar').data("DateTimePicker").clear(); 
			/*$('.fecha1').data("DateTimePicker").clear(); 
			$('.fecha2').data("DateTimePicker").clear();*/
			//$('.fecha2').attr("readonly",true);
		});
		
function expirados(rid){
	$("#expirada").modal("show");
	$.ajax({
		url: "{{ url('/get_reserva') }}/" + rid,
		type: 'get',
		success: function(data){//alert(data['EJE_ID']);
			$(".RES_IDR").val(data['RES_ID']);
			$(".txtr_fecha").html(data['RES_FECHAR']);
			$(".txtr_fecha1").html(data['RES_HORAR']);
			$(".txtr_isbn").html(data['CON_ISBN']);
			$(".txtr_codigo").html(data['EJE_CODIGO']);
			$(".txtr_titulo").html(data['CON_TITULO']);
			$(".txtr_autor").html(data['AUT_NOMBRE']);
			$(".txtr_editorial").html(data['EDI_NOMBRE']);
			$(".txtr_seccion").html(data['SEC_NOMBRE']);
			$(".txtr_edicion").html(data['CON_EDICION']);
			$(".txtr_categoria").html(data['CAT_NOMBRE']);
		}
	});	
}
function act_form(con){
	var dt = '{{date("Y-m-d")." ".date("H:i")}}';
	$(".PRE_FECHA").val(dt); //alert('{{date("Y-m-d")." ".date("H:i")}}');
	$('.fechad').datetimepicker('minDate', dt);
}
function tiempop(tip){
	if(tip==1){
		$(".fpjornada").show();
		$(".fpextenso").hide();
	}else{
		$(".fpjornada").hide();
		$(".fpextenso").show();
		var fecha = new Date($(".PRE_FECHA").val());
		var dias = parseInt($(".tipo:checked").attr("dir"));
		fecha.setDate(fecha.getDate() + (dias-1));
		$('.fechad').datetimepicker('maxDate', fecha);
	}
}
/*$(".tipop:checked").change(function(){
	if($(this).val()==1){
		$(".fpjornada").show();
		$(".fpextenso").hide();
	}else{
		$(".fpjornada").hide();
		$(".fpextenso").show();
	}
});*/
function lectorp(tip){
	$.ajax({
		url: "{{ url('/lectores_tipo') }}/" + tip,
		type: 'get',
		success: function(data){//alert(data['EJE_ID']);
			var cad = '<option value="">--Seleccione un Contenido--</option>';
			for(var i=0;i<data.length;i++){ 
				cad += "<option value='"+data[i]["LEC_ID"]+"'>Nombre: "+data[i]["LEC_NOMBRES"]+" "+data[i]["LEC_APELLIDOS"]+" - CI: "+data[i]["LEC_CI"]+"</option>"; 
			} 
			$('.USL_ID').html('');
			$('.USL_ID').append(cad);
			$('.USL_ID').select2();
		}
	});
	if(tip==1 | tip==2){
		$("#tipop2").attr("disabled",false);
		/*var fecha = new Date($(this).val());
		var dias = parseInt($(".tipo:checked").attr("dir"));
		fecha.setDate(fecha.getDate() + dias);
		$('.fechad').datetimepicker('maxDate', fecha);*/
		//$("#tipop1").prop("checked",true);
	}else if(tip==3){
		$("#tipop2").attr("disabled",true);
	}
	$("#tipop1").prop("checked",true);
	tiempop(1);
}
		
function resizeIframe(obj) {
	//obj.style.height = (obj.contentWindow.document.documentElement.scrollHeight+100) + 'px';
}
$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
		placeholder: "Seleccione un Contenido",
		allowClear: true
	});
	$('.js-example1').select2();
});
$('.sel_rep').on('select2:select', function (e) {
    reportes($("#tipoc").val());
	//alert($(this).val());
});
$('.sel_con').on('select2:select', function (e) { //alert("{{ url('/ejemplar') }}/" + $(this).val());
	$.ajax({
		url: "{{ url('/ejemplar') }}/" + $(this).val(),
		type: 'get',
		success: function(data){//alert(data['EJE_ID']);
			$(".txt_isbn").html(data['CON_ISBN']);
			$(".txt_codigo").html(data['EJE_CODIGO']);
			$(".txt_titulo").html(data['CON_TITULO']);
			$(".txt_autor").html(data['AUT_NOMBRE']);
			$(".txt_editorial").html(data['EDI_NOMBRE']);
			$(".txt_seccion").html(data['SEC_NOMBRE']);
			$(".txt_edicion").html(data['CON_EDICION']);
			$(".txt_categoria").html(data['CAT_NOMBRE']);
			if(data['CON_IMAGEN']!=''){
				$(".cimg").attr("src","{{ asset('fotos')}}/"+data['CON_IMAGEN']);
			}else{
				$(".cimg").attr("src","{{ asset('images/logo_fnd.png')}}");
			}
			if(data['EJE_ESTADO']==1){ //alert(data['CON_ISBN']);
				//alert("contenido");		
				//$(".EJE_ID").val(data['EJE_ID']);
				$(".con_est").val(1);
				$(".cest").html('Disponible');
				$(".cdet").removeClass("alert-danger"); $(".cest").removeClass("badge-danger");
				$(".cdet").addClass("alert-success"); $(".cest").addClass("badge-success");
				$.ajax({
					url: "{{ url('/ejemplar_reservas') }}/" + data['EJE_ID'],
					type: 'get',
					success: function(data){ //alert(data.length);
						//parse.console(data);
						if(data.length==0){
							$(".fec_est").val(1);
							$(".rest").html('No se tienen');
							$(".cres").removeClass("alert-warning"); $(".rest").removeClass("badge-warning");
							$(".cres").addClass("alert-success"); $(".rest").addClass("badge-success");
							$(".dres").html('');
						}else{
							$(".fec_est").val('');
							$(".rest").html('Se tienen');	
							$(".cres").removeClass("alert-success"); $(".rest").removeClass("badge-success");
							$(".cres").addClass("alert-warning"); $(".rest").addClass("badge-warning");
							$('.dres').html('');
							for(var i=0;i<data.length;i++){ 
								//if(data[i]["RES_HASTAF"]!=null){
									cad = "<li>Fecha: "+data[i]["RES_FECHAR"]+" "+data[i]["RES_HORAR"]+" - Lector: "+data[i]["LECTOR"]+"</option>"; 
								/*}else{
									cad = "<li>Fecha: "+data[i]["RES_FECHAR"]+" - Lector: "+data[i]["LECTOR"]+"</option>"; 
								}*/
								$('.dres').append(cad);
							} 
						}
						$(".preservas").show("slow");
					}
				});
			}else{
				//alert("nulo");
				//$(".EJE_ID").val('');
				$(".con_est").val(0);
				$(".cest").html('No Disponible');	
				$(".cdet").removeClass("alert-success"); $(".cest").removeClass("badge-success");
				$(".cdet").addClass("alert-danger"); $(".cest").addClass("badge-danger");
				$(".preservas").hide("slow");
			}
			$(".pdetalle").show("slow");
		}
	});
	//$(".js-example-basic-multiple").select2();
});
function sel_con(){
	var eid = $(".EJE_ID").val();
	var fec = $(".RES_FECHAR").val();
	$.ajax({
		url: "{{ url('/ejemplar') }}/" + eid,
		type: 'get',
		success: function(data){//alert(data['EJE_ID']);
			$(".txt_isbn").html(data['CON_ISBN']);
			$(".txt_codigo").html(data['EJE_CODIGO']);
			$(".txt_titulo").html(data['CON_TITULO']);
			$(".txt_autor").html(data['AUT_NOMBRE']);
			$(".txt_editorial").html(data['EDI_NOMBRE']);
			$(".txt_seccion").html(data['SEC_NOMBRE']);
			$(".txt_edicion").html(data['CON_EDICION']);
			$(".txt_categoria").html(data['CAT_NOMBRE']);
			if(data['CON_IMAGEN']!=''){
				$(".cimg").attr("src","{{ asset('fotos')}}/"+data['CON_IMAGEN']);
			}else{
				$(".cimg").attr("src","{{ asset('images/logo_fnd.png')}}");
			}
			/*if(data['EJE_ESTADO']==1){ 
				$(".con_est").val(1);
				$(".cest").html('Disponible');
				$(".cdet").removeClass("alert-danger"); $(".cest").removeClass("badge-danger");
				$(".cdet").addClass("alert-success"); $(".cest").addClass("badge-success");*/
			$.ajax({
				url: "{{ url('/ejemplar_reservasf') }}/" + data['EJE_ID'] + '/' + fec,
				type: 'get',
				success: function(data1){ //alert(data.length);
					//parse.console(data);
					if(data1.length==0){
						$(".fec_est").val(1);
						$(".rest").html('No se tienen');
						$(".cres").removeClass("alert-warning"); $(".rest").removeClass("badge-warning");
						$(".cres").addClass("alert-success"); $(".rest").addClass("badge-success");
						$(".dres").html('');
					}else{
						$(".fec_est").val('');
						$(".rest").html('Se tienen');	
						$(".cres").removeClass("alert-success"); $(".rest").removeClass("badge-success");
						$(".cres").addClass("alert-warning"); $(".rest").addClass("badge-warning");
						$('.dres').html(''); 
					}
					$(".preservas").show("slow");
				}
			});
			$.ajax({
				url: "{{ url('/ejemplar_prestamo') }}/" + data['EJE_ID'] + '/' + fec,
				type: 'get',
				success: function(data2){ //alert(data2);
					//parse.console(data);
					if(data2==''){						
						$(".con_est").val(1);
						$(".cest").html('Disponible');
						$(".cdet").removeClass("alert-danger"); $(".cest").removeClass("badge-danger");
						$(".cdet").addClass("alert-success"); $(".cest").addClass("badge-success");
					}else{
						$(".con_est").val(0);
						$(".cest").html('No Disponible');	
						$(".cdet").removeClass("alert-success"); $(".cest").removeClass("badge-success");
						$(".cdet").addClass("alert-danger"); $(".cest").addClass("badge-danger");
						//$(".preservas").hide("slow");
					}
				}
			});
			/*}else{
				$(".con_est").val(0);
				$(".cest").html('No Disponible');	
				$(".cdet").removeClass("alert-success"); $(".cest").removeClass("badge-success");
				$(".cdet").addClass("alert-danger"); $(".cest").addClass("badge-danger");
				$(".preservas").hide("slow");
			}*/
			$(".pdetalle").show("slow");
		}
	});
}
$(".fechar").on("dp.change", function (e) {
	sel_con();
});
$('.sel_lec').on('select2:select', function (e) { //alert("{{ url('/ejemplar') }}/" + $(this).val());
	$.ajax({
		url: "{{ url('/lector_prestamo') }}/" + $(this).val(),
		type: 'get',
		success: function(data){//alert($(".tipo:checked").val());
			if($(".tipo:checked").val()==2 | data==0){ //alert(data['CON_ISBN']);
				//alert("contenido");		
				$(".usu_est").val(1);
				$(".lest").html('Habilitado');
				$(".clec").removeClass("alert-danger"); $(".lest").removeClass("badge-danger");
				$(".clec").addClass("alert-success"); $(".lest").addClass("badge-success");
				$(".tlec").html('');
			}else{
				//alert("nulo");
				$(".usu_est").val('');
				$(".lest").html('Inhabilitado');	
				$(".clec").removeClass("alert-success"); $(".lest").removeClass("badge-success");
				$(".clec").addClass("alert-danger"); $(".lest").addClass("badge-danger");
				$(".tlec").html('"Tiene un Prestamo pendiente"');
			}
			$(".plector").show("slow");
		}
	});
});
function reservas(rid,eid){
	//var eid = $(".EJE_ID").val(); 
	//alert(eid);
	$.ajax({
		url: "{{ url('/ejemplar_reservasp') }}/" + eid + "/" + rid,
		type: 'get',
		success: function(data){ //alert(data.length);
			//parse.console(data);
			if(data.length==0){
				$(".fec_est").val(1);
				$(".restp").html('No se tienen');
				$(".cresp").removeClass("alert-warning"); $(".restp").removeClass("badge-warning");
				$(".cresp").addClass("alert-success"); $(".restp").addClass("badge-success");
				$(".dresp").html('');
			}else{
				$(".fec_est").val('');
				$(".restp").html('Se tienen');	
				$(".cresp").removeClass("alert-success"); $(".restp").removeClass("badge-success");
				$(".cresp").addClass("alert-warning"); $(".restp").addClass("badge-warning");
				$('.dresp').html('');
				for(var i=0;i<data.length;i++){ 
					//if(data[i]["RES_HASTAF"]!=null){
						cad = "<li>Fecha: "+data[i]["RES_FECHAR"]+" "+data[i]["RES_HORAR"]+" - Lector: "+data[i]["LECTOR"]+"</option>"; 
					/*}else{
						cad = "<li>Fecha: "+data[i]["RES_FECHAR"]+" - Lector: "+data[i]["LECTOR"]+"</option>"; 
					}*/
					$('.dresp').append(cad);
				} 
			}
			$(".preservasp").show("slow");
		}
	});
}
function con_close(con){
	$("."+con).hide("slow");	
}
function valid_form(con){ //alert($(".con_est").val());
	if(con=='prestamos'){
		var ve = $(".EJE_ID").val();
		var vu = $(".usu_est").val();
		var vr = $(".fec_est").val(); //alert(ve);
		var vc = $(".con_est").val(); //alert(vc);
		if(ve==''){
			swal({    
				title: "Ejemplar No Seleccionado",   
				text: "Seleccione un Ejemplar para Realizar el proceso...",     
				timer: 8000,   
				type: "warning",
				confirmButtonText: "Aceptar",   
				showConfirmButton: true
			});				
		}else if(vc==0){
			swal({    
				title: "Ejemplar No Disponible",   
				text: "No se tienen Ejemplares Disponible para el Contenido "+$(".txt_titulo").html()+"...",     
				timer: 8000,   
				type: "warning",
				confirmButtonText: "Aceptar",   
				showConfirmButton: true
			});
		}else{
			if(vu==''){
				swal({    
					title: "Usuario Inhabilitado",   
					text: "No se puede realizar la acción, Se tiene prestamos pendientes, para el usuario "+$(".sel_lec").select2('val')+"...",     
					timer: 8000,   
					type: "warning",
					confirmButtonText: "Aceptar",   
					showConfirmButton: true
				});		
			}else{
				var tip = $(".tipop:checked").val();
				var id = $(".EJE_ID").val();
				if(tip==1){
					var fed = $(".fech").val();
					var feh = '-1';
				}else if(tip==2){ 
					var fed = $(".fechd").val();
					var feh = $(".fechh").val();
				}//alert("{{ url('/rev_reservas') }}/" + id + '/' + fed + '/' + feh);
				$.ajax({
					url: "{{ url('rev_reservas') }}/" + id + '/' + fed + '/' + feh,
					type: 'get',
					success: function(data){//alert(data.length);
						if(data!=''){
							swal({    
								title: "Fecha no disponible",   
								text: "No se puede registrar el prestamo en la fecha ingresada, revise los mismos y vuelva a intentarlo...",     
								timer: 8000,   
								type: "warning",
								confirmButtonText: "Aceptar",   
								showConfirmButton: true
							});	
						}else{
							$("#form-"+con).submit();
						}
					}
				});
			}
		}
	}else if(con=='reservas'){
		var ve = $(".EJE_ID").val();
		var vu = $(".usu_est").val();
		var vr = $(".fec_est").val(); //alert(ve);
		var cont = 1;
		var vc = $(".con_est").val();
		if(ve==''){
			swal({    
				title: "Ejemplar No Seleccionado",   
				text: "Seleccione un Ejemplar para Realizar el proceso...",     
				timer: 8000,   
				type: "warning",
				confirmButtonText: "Aceptar",   
				showConfirmButton: true
			});				
		}else if(vc==0){
			swal({    
				title: "Ejemplar No Disponible",   
				text: "No se tienen Ejemplares Disponible para el Contenido "+$(".txt_titulo").html()+"...",     
				timer: 8000,   
				type: "warning",
				confirmButtonText: "Aceptar",   
				showConfirmButton: true
			});			
		}else{
			if(vu==''){
				swal({    
					title: "Usuario Inhabilitado",   
					text: "No se puede realizar la acción, Se tiene prestamos pendientes, para el usuario "+$(".sel_lec").select2('val')+"...",     
					timer: 8000,   
					type: "warning",
					confirmButtonText: "Aceptar",   
					showConfirmButton: true
				});		
			}else{
				if($(".fechar").val()=='' | $(".hora").val()==''){
					swal({    
						title: "datos Incompletos",   
						text: "selecione una fecha y hora de la reserva...",     
						timer: 8000,   
						type: "warning",
						confirmButtonText: "Aceptar",   
						showConfirmButton: true
					});		
				}else{
					var id = $(".EJE_ID").val();
					var fed = $(".fechar").val();
					var feh = '-1';
					//alert("{{ url('/rev_reservas') }}/" + id + '/' + fed + '/' + feh);
					$.ajax({
						url: "{{ url('rev_reservas') }}/" + id + '/' + fed + '/' + feh,
						type: 'get',
						success: function(data){//alert(data.length);
							if(data!=''){
								swal({    
									title: "Fecha no disponible",   
									text: "No se puede registrar el prestamo en la fecha ingresada, revise los mismos y vuelva a intentarlo...",     
									timer: 8000,   
									type: "warning",
									confirmButtonText: "Aceptar",   
									showConfirmButton: true
								});	
							}else{//alert("form");
								$("#form-"+con).submit();
							}
						}
					});	
				}
			}
		}
	}
}
function valid_formp(){ //alert($(".con_est").val());
	if($(".fechar").val()=='' | $(".hora").val()==''){
		swal({    
			title: "datos Incompletos",   
			text: "selecione una fecha y hora de la reserva...",     
			timer: 8000,   
			type: "warning",
			confirmButtonText: "Aceptar",   
			showConfirmButton: true
		});		
	}else{
		var id = $(".EJE_ID").val();
		var fed = $(".fechar").val();
		var feh = '-1';
		//alert("{{ url('/rev_reservas') }}/" + id + '/' + fed + '/' + feh);
		$.ajax({
			url: "{{ url('rev_reservas') }}/" + id + '/' + fed + '/' + feh,
			type: 'get',
			success: function(data){//alert(data.length);
				if(data!=''){
					swal({    
						title: "Fecha no disponible",   
						text: "No se puede registrar el prestamo en la fecha ingresada, revise los mismos y vuelva a intentarlo...",     
						timer: 8000,   
						type: "warning",
						confirmButtonText: "Aceptar",   
						showConfirmButton: true
					});	
				}else{//alert("form");
					$("#form-reservasp").submit();
				}
			}
		});	
	}
}

	var dir_fotos = '{{ asset("fotos") }}';
	function modificar(id,con=0){ //alert($('table.list').data('get') + '/' + id);
		//$('form.form-edit').clearForm();
		//$('form.form-datos').reset();
		var fila = $(this).parent().parent();
		//var dir_fotos = "{{ url('/fotos/') }}";
		//var name = $('table.list').data('name');
		//fila.addClass('seleccionado');
		//$('form.form-edit').attr('action', $('table.list').data('get')+"/"+id);
		if(con!=0){
			var enl = con;
		}else{
			var enl = $('table.list').data('get');
		}
		$.ajax({
			url: enl + '/' + id,
			type: 'get',
			success: function(data){//alert(data);
				console.log(data);
				var i;
				$('div.fileinput-preview').html('');
				for (i in data) { //alert(data[i]);
					//console.log($('.' + i));
					if ($('.' + i).hasClass('SELECT2') == true) { //alert("select2");
						//console.log('es un select');
						$('.' + i).val(data[i]).trigger('change.select2');
					} else if($('.' + i).hasClass('SELECT') == true) {
						//console.log('es un select');
						$('select.' + i + ' option').each(function () {
							//console.log($(this).val());
							$(this).prop('selected', false);
							if ($(this).val() == data[i]) {
								$(this).prop('selected', 'selected');
							}
						});
					} else if($('.' + i).hasClass('OPTION') == true) {
							console.log('es un option');
							$('select.' + i + ' option').each(function () {
								//console.log($(this).val());
								$(this).prop('selected', false);
								if ($(this).val() == data[i]) {
									$(this).prop('selected', 'selected');
								}
							});                     
					} else if($('.' + i).hasClass('IMG') == true && data[i] != null) { 
						$('input.' + i).val(data[i]); //alert(dir_fotos + data[i]);
						//$('img#foto-previa').attr('src', dir_fotos + "/" + data[i]);
						//$('div.fileinput-preview').html('<img src="' + dir_fotos + "/" + data[i] + '" width="50">');
						$('span.fileinput-preview').html('<a href="' + dir_fotos + "/" + data[i] + '" target="_blank">'+data[i]+'</a>');
					} else if($('.' + i).hasClass('RADIO') == true) {
						//console.log('hay un radio');
						$('.' + i).each(function(){
							if ($(this).val() == data[i]) {
								$(this).prop('checked', true);
							} else {
								$(this).prop('checked', false);
							}
						});
					} else if($('.' + i).hasClass('CHECKED') == true) {
						console.log("es un checkeddddd");
						// $('input.' + i).val(data[i]);
						if ($('.' + i).val() == data[i]){
						   $('.' + i).prop('checked', !this.checked);
						}else{
							$('.' + i).removeAttr("cheked", !this.checked);
						}
					} else { //alert(data[i]);
						$('.' + i).val(data[i]);
					}
				}
			}
		});
	}	

function detalle(id){ //alert("{{ url('/ejemplar') }}/" + id);
	$.ajax({
		url: $('table.list').data('get') + '/' + id,
		type: 'get',
		success: function(data){//alert(data);
			console.log(data);
			var i;
			$('div.fileinput-preview').html('');
			for (i in data) { //alert(data[i]);
				//console.log($('.' + i));
				//$('.' + i).html(data[i]);
			    if($('.' + i + '_R').hasClass('IMG') == true && data[i] != null) { 
					$('div.img-preview').html('<img src="' + dir_fotos + "/" + data[i] + '" class="wd-200">'); 
				}else{
					$('.' + i + '_R').html(data[i]);
				}
			}
		}
	});
}

	function eliminar(id,nom){
		swal({   
			title: "¿Seguro que desea eliminar el Registro?",   
			text: "Registro : " + nom,   
			type: "warning",   
			showCancelButton: true,
			cancelButtonText: "Cancelar",   
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Aceptar",   
			closeOnConfirm: true }, 
			function(){   
				$(".form-delete"+id).submit();
				/*$.ajax({
					url:""+con+".php?cont=eliminar_reg",
					data:{id:id},
					type:"POST",
					success:function(res){ //alert(res);
						if(res!=false){
							$($(val).parents().get(1)).remove();
							if(con=='compras'){
								compra_reg(id,'sventana');
							}else if(con=='ventas'){
								venta_reg(id,'sventana');
							}
							mensaje(4,'Registro Eliminado','Se Elimino el Registro Exitosamente!..');
						}else{
							alert("Error al borrar el Registro...");
						}
					}
				});
				swal({   
					title: "Registro Eliminado!...",   
					text: "Acabas de eliminar un Registro de "+con,   
					timer: 3000,
					type: "success"
				});*/
		});	
	}
	function perfil (pid,enl){
		$("#PerfilModal").modal("show");
		modificar(pid,enl);
	}
	function salir(nom){
		swal({   
			title: "¿Seguro que desea salir del Sistema?",   
			text: "Usuario : " + nom,   
			type: "warning",   
			showCancelButton: true,
			cancelButtonText: "Cancelar",   
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Aceptar",   
			closeOnConfirm: true }, 
			function(){   
				document.location.href = "{{ url('logout') }}";
		});	
	}
	function habilitar(id,nom){
		swal({   
			title: "¿Seguro que desea reinsertar el Registro?",   
			text: "Registro : " + nom,   
			type: "warning",   
			showCancelButton: true,
			cancelButtonText: "Cancelar",   
			confirmButtonColor: "#24D1C9",   
			confirmButtonText: "Aceptar",   
			closeOnConfirm: true }, 
			function(){   
				$(".form-habilitar"+id).submit();
		});	
	}
function reportes(con){ //alert(con);
	if(con=='lectores'){
		var gen = $("#genero").val();
		var tip = $("#tipol").val();
		var reporte = "{{ url('rep_lectores') }}/"+gen+"/"+tip;
	}else if(con=='contenidos'){
		var cat = $("#categoria").val();
		var sec = $("#seccion").val();
		var aut = $("#autor").val();
		var edi = $("#editorial").val();
		var reporte = "{{ url('rep_contenidos') }}/"+cat+"/"+sec+"/"+aut+"/"+edi;
	}else if(con=='reservas' | con=='prestamos'){
		if($("#desde").val()==''){
			var fei = '-1';
		}else{
			var fei = $("#desde").val();
		}
		if($("#hasta").val()==''){
			var fef = '-1';
		}else{
			var fef = $("#hasta").val();
		}
		var eje = $("#ejemplar").val();
		var per = $("#personal").val();
		var lec = $("#lector").val();
		var tip = $("#tipol").val();
		var est = $("#estado").val();
		var cat = $("#categoria").val();
		var sec = $("#seccion").val();
		var aut = $("#autor").val();
		var edi = $("#editorial").val();
		var reporte = "{{ url('') }}/rep_"+con+"/"+fei+"/"+fef+"/"+eje+"/"+per+"/"+lec+"/"+est+"/"+tip+"/"+cat+"/"+sec+"/"+aut+"/"+edi;
	} //alert(reporte);
	$("#some_id").attr("src", reporte);
	//document.location.href = reporte;
	//$('#reporte').html('<iframe id="some_id" class="some_pdf" src="{{ asset("/") }}pdf_'+cont+'/'+cad+'" width="100%" height="600" scrollbar="yes" marginwidth="0" marginheight="0" hspace="0" align="middle" frameborder="0" scrolling="yes" style="width:100%; border:0;  height:600px; overflow:auto;"></iframe>');
}
/*Chart Inicio*/
<?php if(isset($gprestamos)){ for($i=1;$i<=3;$i++){ ?>
(function ($) {
  // USE STRICT
  "use strict";
  try {
    //Team chart
    var ctx = document.getElementById("team-chart<?=$i ?>");
	<?php if($i==1){ ?>
	var data = <?php echo $gprestamos ?>; var det = 'Dia / Horas';
	<?php }elseif($i==2){ ?>
	var data = <?php echo $gdevoluciones ?>; var det = 'Dia / Horas';
	<?php }elseif($i==3){ ?>
	var data = <?php echo $gtotalps ?>; var det = 'Semana / Dias';
	<?php } ?>
	var rango = new Array(); var cantidad = new Array();
	for(var i=0;i<data.length;i++){ rango[i] = data[i]["rango"]; cantidad[i] = data[i]["cant"]; }
    if (ctx) {
      ctx.height = 200;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: rango,
          type: 'line',
          defaultFontFamily: 'Poppins',
          datasets: [{
            data: cantidad,
            label: "Cantidad",
            backgroundColor: 'rgba(0,103,255,.15)',
            borderColor: 'rgba(0,103,255,0.5)',
            borderWidth: 3.5,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(0,103,255,0.5)',
          },]
        },
        options: {
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Poppins',
            bodyFontFamily: 'Poppins',
            cornerRadius: 3,
            intersect: false,
          },
          legend: {
            display: false,
            position: 'top',
            labels: {
              usePointStyle: true,
              fontFamily: 'Poppins',
            },


          },
          scales: {
            xAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: false
              },
              scaleLabel: {
                display: true,
                labelString: det
              },
              ticks: {
                fontFamily: "Poppins"
              }
            }],
            yAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: false
              },
              scaleLabel: {
                display: true,
                labelString: 'Cantidad',
                fontFamily: "Poppins"
              },
              ticks: {
                fontFamily: "Poppins"
              }
            }]
          },
          title: {
            display: false,
          }
        }
      });
    }
  } catch (error) {
    console.log(error);
  }
})(jQuery);
<?php }} ?>
	  </script>

</body>

</html>
<!-- end document-->
