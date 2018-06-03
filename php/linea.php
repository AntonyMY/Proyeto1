<?php
    //conexion
    require_once 'db_connect.php';
    //sesion
    session_start();

    //Datos
    $id  = $_SESSION['id_usuario'];
    $id  = $_SESSION['des_usuario'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Listado de Lineas</title>

        <link href="../js/alert/css/alertify.css" rel="stylesheet" type="text/css"/>
        <link href="../js/alert/css/themes/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="../js/alert/alertify.js" type="text/javascript"></script>

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
        <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
                
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <script type="text/javascript">
            alertify.defaults.transition = "slide";
            alertify.defaults.theme.ok = "btn btn-primary";
            alertify.defaults.theme.cancel = "btn btn-danger";
            alertify.defaults.theme.input = "form-control";
        </script>

        <script>
            function NuevaLinea() {
                document.location = "newlinea.php?valor=registrar";
            }
        </script>
    </head>
    <body>
        <header>
            <div class="container-header">
                <nav class="light-blue lighten-1" role="navigation">
                    <div class="nav-wrapper container">
                        <a id="logo-container" href="#" class="brand-logo">COMERCIALIZA</a>
                        <!--ul>li*3>a[href="#"]>{Menu $}   pull-s1 m6 pull-m3 l4 pull-l4-->
                        
                        <ul class="right hide-on-med-and-down">
                            <li><i class="material-icons prefix">account_circle</i></li>
                            <li><a href="#"><?php echo $_SESSION['des_usuario']; ?></a></li>
                            <li><i class="material-icons prefix">exit_to_app</i></li>
                            <li><a href="salir.php">Salir</a></li>
                        </ul>
            
                    </div>
                </nav>
            </div>
        </header><br>

        <div  class="valign-wrapper row login-box">
            <div  class="col card hoverable s10 pull-s1">
                <div id="botonera" class="container-fluid">
                    <button type="button" class="btn green" onclick="NuevaLinea()">Nueva Linea</button>
                </div>

                <h3 class="light">Líneas</h3>

                <div id="divlinea" >

                    <table id="tablalinea" class="responsive-table"> <!--class="responsive-table"-->
                        <thead>
                            <tr>
                                <th>CÓDIGO</th>
                                <th>NOMBRE</th>
                                <th>DESCRIPCIÓN</th>
                                <th>ACCIONES</th>
                            </tr>                    
                        </thead>
                        <tbody id="registros">
                            <?php
                                include 'funciones.php';           
                                $rs = ListarLinea();
                                
                                if($rs->num_rows > 0){
                            ?>
                            <tr>
                                <?php
                                    while($fila = $rs->fetch_assoc())
                                {?>
                                <td> <?php echo $fila["idlinea"] ?> </td>
                                <td> <?php echo $fila["nombre"] ?> </td>
                                <td> <?php echo $fila["descripcion"] ?> </td>

                                <td align="center">
                                    <a href="newlinea.php?valor=actualiza&id=<?php echo $fila["idlinea"];?>" class="btn-floating orange">
                                        <i class="material-icons">edit</i>
                                    </a>&nbsp &nbsp &nbsp
                                    <a href="elimina.php?id=<?php echo $fila["idlinea"];?>" class="btn-floating pink accent-3">
                                        <i class="material-icons">delete</i>
                                    </a>
                                </td>
                            </tr> 
                            <?php
                                }
                            }
                            ?>            
                        </tbody>
                        <ul class="pagination">
                            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                            <li class="active"><a href="#!">1</a></li>
                            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                        </ul>
                    </table>
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
