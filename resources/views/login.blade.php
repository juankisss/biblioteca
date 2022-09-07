@include('header')
<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5" style="background: url({{ url('images/fnd.png') }}) bottom center no-repeat; background-size:contain;">
            <div class="container"  >
                <div class="login-wrap " >
                    <div class="login-content" style="border:outset"  >
                        <div class="login-logo">
                            <a href="#" >
                                <img src="images/logo.png" alt="Luis Espinal">
                            </a>
                        </div>
                        <div>@include('partials.danger')</div>
                        <div class="login-form">
                            <form action="{{ url('login') }}" method="POST" class="logInForm">
                            {{Session::put('login', '0')}}
		 						 {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input class="au-input au-input--full" type="text" name="USU_CODIGO" placeholder="Cuenta de Usuario">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input class="au-input au-input--full" type="password" name="USU_CLAVE" placeholder="Contraseña de usuario">
                                </div>
                                <!--<div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>-->
                                <button class="au-btn au-btn--block au-btn--blue m-b-20 bg-dark" type="submit">Iniciar sesión</button>
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
@include('footer')
<style type="text/css">
.login-content{
	max-width:450px;
    text-align: center;
}
</style>