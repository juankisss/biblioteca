<!DOCTYPE html>
<html>
<head>
	<title>Catalogo Bibliografico</title>
	<meta name="viewport" content="initial-scale=1.0">

    <!-- Fontfaces CSS-->
    <link href="{{ asset('css/font-face.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    
    <link href="{{ asset('vendor/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    
	<meta charset="utf-8">
    <style type="text/css">
	body{
		font-size:15px;
		background-color: black;
		background: url('{{ asset("images/fnd1.png") }}');
		background-position:bottom center;
        background-size: cover;
		background-attachment:fixed;
	}
	body:before {
		content: "";
		width: 100%;
		height: 100%;
		/*background-color: black;
		position: absolute;
		opacity: 0.8;
		z-index: -10000;*/
     }
	.container{
		/*background-color:#FFF;*/
		background-color: rgba(255,255,255,0.9); /* En este caso sería color de fondo blanco con 50% de transparencia.*/
		padding:50px;
	}
	</style>
</head>
<body>
	<div class="container">
    	<div class="row">
        	
            <div class="col-sm-10" align="left">
            	<h3 style="color:#232849" class="m-t-10 m-b-20"><strong>Catálogo Bibliográfico</strong></h3>
                <p>Acá encontrará información sobre material bibliográfico que se encuentra en nuestra biblioteca, donde podra realizar la reserva de los mismos. Para lo cual debe Iniciar sesion o Registrarse con los datos respectivos para este entendido, a continuación.</p>
            </div>
            <div class="col-sm-2" align="right"><img src="{{ url('images/logo.png') }}" class="img-responsive" style="max-width:100px"></div>
        </div><hr>
        <!--<div class="row"><div class="col-sm-12"><h3 align="center" style="color:#232849"><strong>Catálogo Bibliográfico</strong></h3></div></div>
        <div class="row">
        	<div class="col-sm-12" align="left"><p>Acá encontrará información sobre material bibliográfico que se encuentra en nuestra biblioteca, donde podra realizar la reserva de los mismos. Para lo cual debe Iniciar sesion o Registrarse con los datos respectivos para este entendido, a continuación.</p><hr></div>
        </div>-->
        <div class="row m-t-20">
            <div class="col-sm-12" align="center">
                @include('partials.success')
                @include('partials.danger')
            </div>
        	@if(Session::get('login')==1)
                <div class="col-sm-6 m-t-10" align="center">
                	<b>Usuario:</b> {{ Session::get('nombre') }}  - <b>Email:</b> {{ Session::get('email') }}
                </div>
                <div class="col-sm-6" align="center">
                	<form method="POST" action="{{ route('page.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="opt" value="3">
                        <button type="submit" class="au-btn au-btn-icon btn-danger au-btn--large"><i class="fa fa-close"></i> Cerrar Sesión</button>
                    </form>
                </div>
            @else
                <div class="col-sm-6" align="center">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--large" data-toggle="modal" data-target="#Registro"><i class="fa fa-check"></i> Registrarse</button>
                </div>
                <div class="col-sm-6" align="center">
                    <button class="au-btn au-btn-icon au-btn--blue au-btn--large" data-toggle="modal" data-target="#Login"><i class="fa fa-unlock-alt"></i> Iniciar Sesión</button>
                </div>
            @endif
        </div><hr>
                        <div class="table-responsive content">
                            <table class="table tabla-datos table-hover table-responsive table-bordered list" id="table1"  data-get="{{ url('/page') }}">
                                <thead class="">
                                    <tr>
                                        <th width="3%">#</th>
                                        <th>Portada</th>
                                        <th>Contenido</th>
                                        <th>Categoría</th>
                                        <th>Autor</th>
                                        <!--<th>Editorial</th>-->
                                        <!--<th>Sección</th>-->
                                        <!--<th>ISBN</th>
                                        <th>Título</th>-->
                                        <!--<th>Subtítulo</th>
                                        <th>Descripción</th>
                                        <th>Resumen</th>-->
                                        <!--<th>Edición</th>-->
                                        <!--<th>Año de Pub.</th>
                                        <th>Idioma</th>
                                        <th>Páginas</th>
                                        <th>Imágen</th>-->
                                        <!--<th>Tipo</th>-->
                                        <th width="10%"></th>
                                    </tr>
                                </thead>
                                <tbody id="itemContainer">
                                    @php $c=1 @endphp
                                    @php use App\Http\Controllers\CatalogoController; @endphp
                                    @foreach($biblios as $b)
                                        @php
                                            $foo = new CatalogoController();
                                            $eje = $foo->get_ejemplares($b->CON_ID);
                                        @endphp
                                    <tr>
                                        <td>{{ $c++ }}</td>
                                        <td>
                                        @if($b->CON_IMAGEN=='')
                                        	<img src="{{ asset('images/logo_fnd.png')}}" width="100" class="img-responsive img-thumbnail">
                                        @else
                                        	<img src="{{ asset('fotos/'.$b->CON_IMAGEN)}}" width="100" class="img-responsive img-thumbnail">
                                        @endif
                                        </td>
                                        <td>
                                        	<b>Titulo:</b> {{ $b->CON_TITULO }}<br>
                                            <b>ISBN:</b> {{ $b->CON_ISBN }}<br>
                                            <b>Edición:</b> {{ $b->CON_EDICION }}<br>
                                            <b>Editorial:</b> {{ $b->EDI_NOMBRE }}
                                        </td>
                                        <td>{{ $b->CAT_NOMBRE }}</td>
                                        <td>{{ $b->AUT_NOMBRE }}</td>
                                        <!--<td>{{ $b->EDI_NOMBRE }}</td>-->
                                        <!--<td>{{ $b->SEC_NOMBRE }}</td>-->
                                        <!--<td>{{ $b->CON_ISBN }}</td>
                                        <td>{{ $b->CON_TITULO }}</td>-->
                                        <!--<td>{{ $b->CON_SUBTITULO }}</td>
                                        <td>{{ $b->CON_DESC }}</td>
                                        <td>{{ $b->CON_RESUMEN }}</td>-->
                                        <!--<td>{{ $b->CON_EDICION }}</td>-->
                                        <!--<td>{{ $b->CON_ANIOP }}</td>
                                        <td>{{ $b->CON_LENGUAJE }}</td>
                                        <td>{{ $b->CON_NPAGS }}</td>
                                        <td><img src="{{ asset('images/biblios_')}}{{$b->CON_ID}}/{{$b->CON_IMAGEN}}" width="200"></td>-->
                                        <!--<td>{{ $b->CON_TIPO }}</td>  -->  
                                        <td class="text-center">
                                        	<a href="#" class="btn btn-success au-btn--yellow m-b-10" title="Ver detalle de Contenido" data-toggle="modal" data-target="#Detalle" onClick="detalle('{{ $b->CON_ID }}')">&nbsp;<i class="fa fa-search"></i> Detalle&nbsp;</a>
                                            @if($eje)
                                            	<a href="#" class="btn btn-warning au-btn--yellow" title="Reservar Ejemplar" data-toggle="modal" onClick="detalle('{{ $b->CON_ID }}'), verifica('{{ Session::get('login') }}','{{ $eje->EJE_ID }}')"><i class="fa fa-calendar-alt"></i> Reservar</a>
                                            @else
                                            	<div class="alert alert-warning"><i class="fa fa-warning"></i>&nbsp;En&nbsp;Uso</div>
                                            @endif
                                        </td>                                       
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
    </div>
</body>
</html>
@include('catalogo.login')
@include('catalogo.registro')
@include('catalogo.detalle')
@include('catalogo.reserva')
<!-- Jquery JS-->
<script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>

<!-- Bootstrap JS-->
<script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>

<script src="{{ asset('vendor/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatable/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('js/sweetalert.min.js') }}"></script>

    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>

<!-- Main JS-->
<script src="{{ asset('js/main.js') }}"></script>
<script language="javascript">
$(document).ready(function() {
	$('#table1').DataTable();
	$('#table2').DataTable( {
		"paging":   false,
		"ordering": false,
		"info":     false
	});
});
	var fmr = new Date();
	fmr.setDate(fmr.getDate() + 1);
	$('.fecha').datetimepicker({
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
function envia_mensaje(){ //alert("{{ url('/twilio-php-main/index.php?id=123') }}");
	$.ajax({
		url: "{{ url('/twilio-php-main/index.php') }}",
		type: 'get',
		success: function(data){//alert(data);
			
		}
	});
}
function detalle(id){ //alert("{{ url('/ejemplar') }}/" + id);
	$.ajax({
		url: "{{ url('/detalle_cont') }}/" + id,
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
			$(".txt_resumen").html(data['CON_RESUMEN']);
			$(".txt_subtitulo").html(data['CON_SUBTITULO']);
			if(data['CON_IMAGEN']!=''){
				$(".cimg").attr("src","{{ asset('fotos')}}/"+data['CON_IMAGEN']);
			}else{
				$(".cimg").attr("src","{{ asset('images/logo_fnd.png')}}");
			}
		}
	});
	$.ajax({
		url: $('table.list').data('get') + '/' + id,
		type: 'get',
		success: function(data){//alert(data);
			console.log(data);
			var i;
			$('div.fileinput-preview').html('');
			for (i in data) { //alert(data[i]);
				//console.log($('.' + i));
				$('.' + i).html(data[i]);
				$('.' + i + '_R').html(data[i]);
				//$('div.fileinput-preview').html('<img src="' + dir_fotos + "/" + data[i] + '" class="wd-200">');
			}
		}
	});
}	
function verifica(ini,eid){
	if(ini==1){
		var lid = "{{ Session::get('lid') }}"; //alert(lid);
		$.ajax({
			url: "{{ url('/lector_prestamo') }}/" + lid,
			type: 'get',
			success: function(data){//alert($(".tipo:checked").val());
				if(data==0){ //alert(data['CON_ISBN']);
					$.ajax({
						url: "{{ url('/lector_reserva') }}/" + lid,
						type: 'get',
						success: function(data){//alert($(".tipo:checked").val());
							if(data==0){ //alert(data['CON_ISBN']);
								$("#Reserva").modal("show");
								$("#EID").val(eid);
							}else{
								if("{{ Session::get('tip') }}"==2){
									$("#Reserva").modal("show");
									$("#EID").val(eid);
								}else{
									swal({    
										title: "Usuario Inhabilitado",   
										text: "Tienen Reservas pendientes...",     
										timer: 8000,   
										type: "warning",
										confirmButtonText: "Aceptar",   
										showConfirmButton: true
									});
								}
							}
						}
					});
				}else{
					if("{{ Session::get('tip') }}"==2){
						$("#Reserva").modal("show");
						$("#EID").val(eid);
					}else{
						swal({    
							title: "Usuario Inhabilitado",   
							text: "Tienen un Prestamo pendiente...",     
							timer: 8000,   
							type: "warning",
							confirmButtonText: "Aceptar",   
							showConfirmButton: true
						});
					}
				}
			}
		});
	}else{
		//alert("Debe Iniciar Sesión o Registrarse para realizar una reserva...");
		swal({    
			title: "Acceso Restringido",   
			text: "Debe Iniciar Sesión o Registrarse para realizar una reserva...",     
			timer: 8000,   
			type: "warning",
			confirmButtonText: "Aceptar",   
			showConfirmButton: true
		});	
	}
}
$(".fecha").on("dp.change", function (e) {
	res_fecha();
});
function res_fecha(){ //alert(6);
	var eid = $(".EJE_ID").val();
	var fec = $(".RES_FECHAR").val(); //alert("{{ url('/ejemplar_reservasf') }}/" + eid + '/' + fec);
	$.ajax({
		url: "{{ url('/ejemplar_reservasf') }}/" + eid + '/' + fec,
		type: 'get',
		success: function(data1){ //alert(data1.length);
			//parse.console(data);
			if(data1.length==0){
				$("#valid").val(1);
				$(".rest").html('No se tienen');
				$(".cres").removeClass("alert-warning"); $(".rest").removeClass("badge-warning");
				$(".cres").addClass("alert-success"); $(".rest").addClass("badge-success");
				$(".dres").html('');
			}else{
				$("#valid").val(0);
				$(".rest").html('Se tienen');	
				$(".cres").removeClass("alert-success"); $(".rest").removeClass("badge-success");
				$(".cres").addClass("alert-warning"); $(".rest").addClass("badge-warning");
				$('.dres').html(''); 
			}
			$(".preservas").show("slow");
		}
	});
}
function valid_form(){
	var v = $("#valid").val();
	if(v==1){
		$("#form-reservau").submit();
	}else{
		//alert("Debe Iniciar Sesión o Registrarse para realizar una reserva...");
		swal({    
			title: "fecha no valida",   
			text: "Se tienen Reservas programadas en la fecha seleccionada...",     
			timer: 8000,   
			type: "warning",
			confirmButtonText: "Aceptar",   
			showConfirmButton: true
		});	
	}	
}
</script>