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
    
    <!-- reporte Css -->
    <!-- JQuery DataTable Css -->
    <!--<link href="{{ asset('vendor/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">-->
    <link href="{{ asset('vendor/jquery-datatable1.12/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/jquery-datatable1.12/buttons.dataTables.min.css') }}" rel="stylesheet">
    <!-- reporte Css -->
    
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">

    <title>Reporte de Personal</title>
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
    <input type="hidden" id="tipoc" value="personal">
    <input type="hidden" id="user_name" value="{{ $usuario }}">
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
	
    <!-- reporte Css -->
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
    <!-- reporte Css -->

    <script src="{{ asset('js/bootstrap-select.js') }}"></script>
	
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('js/main.js') }}"></script>