<?php
    //Conexion
    //es idéntica a require excepto que PHP verificará si el archivo ya ha sido incluido y si es así, no se incluye (require) de nuevo.
    require_once 'php/db_connect.php';

    //Sesiones
    //crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST, o pasado mediante una cookie.
    session_start();

    //boton ingresar
    if(isset($_POST['btningresar'])): //comprobar si una variable esta definida
        $error = array();
        $login = mysqli_escape_string($connect, $_POST['usuario']);
        $passw = mysqli_escape_string($connect, $_POST['password']);
    endif;

    if(empty($login) or empty($passw)):
        $error[] = "<br><li class='light' align='center'>Ingrese el Usuario/Contraseña</li>";
    else:
        $sql = "select login from usuario where login = '$login'";
        $resultado = mysqli_query($connect,$sql);

        if(mysqli_num_rows($resultado) > 0):
            $passw = md5($passw);
            $sql = "select idusuario,nombre, login from usuario where login = '$login' and password='$passw' ";
            $resultado = mysqli_query($connect, $sql);

            if(mysqli_num_rows($resultado) == 1):
                //$datos = mysqli_fecth_array($resultado);
                $datos =  $resultado->fetch_assoc();
                $_SESSION['conectado']   = true;
                $_SESSION['id_usuario']  = $datos['idusuario'];
                $_SESSION['des_usuario'] = $datos['nombre'];
                /*while($datos= $resultado->fectch_assoc()){
                    echo $
                }*/
                header('Location: php/linea.php');
            else:
                $error[]="<li>Contraseña Ingresada es incorrecta</li>";
            endif;


        else:
            $error[]="<li> Usuario no Existe </li>";
        endif;

    endif;
?>
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
                    <a id="logo-container" href="#" class="brand-logo">COMERCIALIZA</a>
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
    </header><!--class="section no-pad-bot    class="col s12 m4 offset-m4""-->

    <?php
        if(!empty($error)):
            foreach($error as $erro):
                echo $erro;
            endforeach;
        endif;
    ?>
    <div class="row">
        <div  class="valign-wrapper row login-box">
            <div  class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                <div class="card-content">

                    <div class="input-field">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" type="text" class="validate" name="usuario">
                        <label for="icon_prefix" >Usuario</label>
                    </div><br>

                    <div class="input-field">
                        <i class="material-icons prefix">textsms</i>
                        <input type="password" id = "password" class="validate" name="password">
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

                    <div class="card-action right-align" >
                        <button type="submit" class="btn-large green waves-effect waves-dark" name="btningresar">Login
                            <i class="material-icons right">send</i>
                        </button>
                        <!--<input type="submit" class="btn-large green waves-effect waves-light" value="Login">-->
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