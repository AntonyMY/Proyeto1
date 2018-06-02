<?php
    //conexion
    require_once 'db_connect.php';
    //sesion
    session_start();

    //Datos
    $id  = $_SESSION['id_usuario'];
    $sql = "Select * from usuario";
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
                    <a id="logo-container" href="#" class="brand-logo">Materialize</a>
                    <!--ul>li*3>a[href="#"]>{Menu $}-->
                </div>
            </nav>
        </div>
    </header>
    <h1>Registro <?php echo $_SESSION['id_usuario']; ?></h1>
    <a href="salir.php">Salir</a>


    <!--Scripts-->
    <!--Compiled and minified JavaScript-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
     <!--JavaScript at end of body for optimized loading-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script src="js/init.js"></script>  
</body>
</html>