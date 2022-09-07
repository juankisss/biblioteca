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

    <script src="{{ asset('js/bootstrap-select.js') }}"></script>

    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('js/main.js') }}"></script>
        <script>

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
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
		$(document).ready(function() {
			$('#table1').DataTable();
			$('#table2').DataTable( {
				"paging":   false,
				"ordering": false,
				"info":     false
			});
			$(function () {
				$('#divMiCalendario').datetimepicker();
				$('.date').datetimepicker({
					format: 'YYYY-MM-DD',
					locale: 'es'
				});
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
				$('.fecha').datetimepicker({
					format: 'YYYY-MM-DD',
					ignoreReadonly: true,
					locale: 'es',
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
				//$('.hora').show();
			});
			$(".cot_total").keyup(function(){
				val = 0;
				$(".cot_total").each(function(){
					if($(this).val()!=''){
						val += parseFloat($(this).val());
					}
				});
				$("#total").val(val);
			});
		});
		$(".fecha1").on("dp.change", function (e) { //alert($(this).val());
			$('.fecha2').datetimepicker('minDate', $(this).val());
		});
		$(".fecha2").on("dp.change", function (e) {
			$('.fecha1').datetimepicker('maxDate', $(this).val());
		});
	  </script>

</body>

</html>
<!-- end document-->