<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    {!!Html::style('css/font-face.css')!!}
    {!!Html::style('vendor/font-awesome-4.7/css/font-awesome.min.css')!!}
    {!!Html::style('vendor/font-awesome-5/css/fontawesome-all.min.css')!!}
    {!!Html::style('vendor/mdi-font/css/material-design-iconic-font.min.css')!!}

    <!-- Bootstrap CSS-->
    {!!Html::style('vendor/bootstrap-4.1/bootstrap.min.css')!!}

    <!-- Vendor CSS-->
    {!!Html::style('vendor/animsition/animsition.min.css')!!}
    {!!Html::style('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')!!}
    {!!Html::style('vendor/wow/animate.css')!!}
    {!!Html::style('vendor/css-hamburgers/hamburgers.min.css')!!}
    {!!Html::style('vendor/slick/slick.css')!!}
    {!!Html::style('vendor/select2/select2.min.css')!!}
    {!!Html::style('vendor/perfect-scrollbar/perfect-scrollbar.css')!!}

    <!-- Main CSS-->
    {!!Html::style('css/theme.css')!!}

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5" style="background: url({{ url('images/fnd.png') }}) bottom center no-repeat; background-size:contain;">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/logo.png" alt="Boliviadent">
                            </a>
                        </div>
                        <div>@include('partials.danger')</div>
                        <div class="login-form">
                            <form action="{{ 'login' }}" method="post" class="logInForm">
                            {{Session::put('login', '0')}}
		 						 {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input class="au-input au-input--full" type="text" name="usuario" placeholder="Cuenta de Usuario">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input class="au-input au-input--full" type="password" name="clave" placeholder="Contraseña de usuario">
                                </div>
                                <!--<div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>-->
                                <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit">Iniciar sesión</button>
                                <!--<div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                    </div>
                                </div>-->
                            </form>
                            <div class="register-link">
                                <p>@include('partials.footer')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    {!!Html::script('vendor/jquery-3.2.1.min.js')!!}
    <!-- Bootstrap JS-->
    {!!Html::script('vendor/bootstrap-4.1/popper.min.js')!!}
    {!!Html::script('vendor/bootstrap-4.1/bootstrap.min.js')!!}
    <!-- Vendor JS       -->
	{!!Html::script('vendor/slick/slick.min.js')!!}
    {!!Html::script('vendor/wow/wow.min.js')!!}
    {!!Html::script('vendor/animsition/animsition.min.js')!!}
    {!!Html::script('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')!!}
    {!!Html::script('vendor/counter-up/jquery.waypoints.min.js')!!}
    {!!Html::script('vendor/counter-up/jquery.counterup.min.js')!!}
    {!!Html::script('vendor/circle-progress/circle-progress.min.js')!!}
    {!!Html::script('vendor/perfect-scrollbar/perfect-scrollbar.js')!!}
    {!!Html::script('vendor/chartjs/Chart.bundle.min.js')!!}
    {!!Html::script('vendor/select2/select2.min.js')!!}
    <!-- Main JS-->
    {!!Html::script('js/main.js')!!}

</body>

</html>
<!-- end document-->
<style type="text/css">
.login-content{
	max-width:400px;
}
</style>