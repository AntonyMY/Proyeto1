<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Primera Página Web</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
            
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <header>
        <div class="container-header">
            <nav class="light-blue lighten-1" role="navigation">
                <div class="nav-wrapper container">
                    <a id="logo-container" href="#" class="brand-logo">Materialize</a>
                    <!--ul>li*3>a[href="#"]>{Menu $}-->
                    <ul class="right hide-on-med-and-down">
                        <li><a href="index.html">Inicio</a></li>
                        <li><a href="#">Servicios</a></li>
                        <li><a href="#">¿Quienes Somos?</a></li>
                        <li><a href="login.php">Login</a></li>
                    </ul>
            
                    <ul id="nav-mobile" class="sidenav">
                        <li><a href="index.html">Inicio</a></li>
                        <li><a href="#">Servicios</a></li>
                        <li><a href="#">¿Quienes Somos?</a></li>
                        <li><a href="login.php">Login</a></li>
                    </ul>
                    <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                </div>
            </nav>
        </div>
    </header><!--class="section no-pad-bot"-->

    <div class="row">
        <div class="col s12 m4 offset-m4">
            <div class="card">
                <form action="#">
                <div class="card-action pink accent-3 white-text">
                    <h4>Ingresar al Sistema</h4>
                </div>


                <div class="card-content">

                    <div class="input-field">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" type="text" class="validate">
                        <label for="icon_prefix" >Usuario</label>
                    </div><br>

                    <div class="input-field">
                        <i class="material-icons prefix">textsms</i>
                        <input type="password" id = "password" class="validate">
                        <label for="icon_prefix">Contraseña</label>
                    </div><br>

                    <div class="form-field">
                        <p>
                            <label>
                                <input type="checkbox" class="filled-in pink"/>
                                <span> Recordar Contraseña</span>
                            </label>
                        </p>
                    </div><br>

                    <div class="form-field" >
                        <button class="btn-large waves-effect waves-dark pink accent-3" id="btnlogin">Login
                            <i class="material-icons right">send</i>
                        </button>
                    </div><br>

                </div>
                </form>
            </div>
        </div>
    </div>

    <!--Scripts-->
    <!--Compiled and minified JavaScript-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
     <!--JavaScript at end of body for optimized loading-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script src="js/init.js"></script>  
</body>
</html>