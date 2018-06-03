<?php
    //conexion
    require_once 'db_connect.php';
    //sesion
    session_start();

    //Datos
    $id  = $_SESSION['id_usuario'];
    $id  = $_SESSION['des_usuario'];
    //$sql = "Select * from usuario";
?>
<?php
    include 'funciones.php';
    $cn = ConectaBD();

    $Nombre = $Descripcion = $accion = "";

    $accion = $_GET['valor'];

    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        $id =  trim($_GET["id"]);
        
        $sql = "SELECT * FROM linea WHERE idlinea = ?";
        if($stmt = $cn->prepare($sql)){
            $stmt->bind_param("i", $param_id);
            $param_id = $id;
        
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows == 1){
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $Nombre = $row["nombre"];
                    $Descripcion = $row["descripcion"];
                } else{
                    exit();
                }
            } else{
                echo "Error al ejecutar la Consulta!!!";
            }
        }
        //$stmt->close();
        $cn->close();
    } 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Nueva Linea</title>
        <script src="../js/jquery-3.3.1.min.js" type="text/javascript"></script>        
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

        <script>
            $(document).ready(function () {
                $('#cancelarlinea').click(function () {
                    document.location = "linea.php";
                });
            });

            function insertar() {
                var nombre = document.forms["frmnewlinea"]["nombre"].value;
                var descri = document.forms["frmnewlinea"]["descripcion"].value;

                if (nombre == "") {
                    alert("El nombre debe ser completado");
                    return false;
                }else if (descri == "") {
                    alert("La descripcion debe ser completada");
                    return false;
                }else{
                    document.frmnewlinea.action = "insertalinea.php";
                    document.frmnewlinea.submit();
                }                
            }
            
            function actualizar(id){
                var nombre = document.forms["frmnewlinea"]["nombre"].value;
                var descri = document.forms["frmnewlinea"]["descripcion"].value;

                if (nombre == "") {
                    alert("El nombre debe ser completado");
                    return false;
                }else if (descri == "") {
                    alert("La descripcion debe ser completada");
                    return false;
                }else{                
                    document.frmnewlinea.action = "actualizalinea.php?id="+id;
                }
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
                            <li><a href="login.php"><?php echo $_SESSION['des_usuario']; ?></a></li>
                            <li><i class="material-icons prefix">exit_to_app</i></li>
                            <li><a href="salir.php">Salir</a></li>
                        </ul>
            
                    </div>
                </nav>
            </div>
        </header><br>

        <div  class="valign-wrapper row login-box">
            <div  class="col card hoverable s10 pull-s1">
                <form class="form-horizontal" method="post" name="frmnewlinea">
                    <div id="contenido" class="card-content">
                        <div class="input-field">
                            <input id="icon_prefix" type="text" class="validate" name="nombre" required="required" autocomplete="off"  value="<?php echo $Nombre; ?>">
                            <label for="icon_prefix">Ingrese Nombre</label>
                        </div>   

                        <div class="input-field">
                            <input type="text" class="form-control" name="descripcion" required="required" autocomplete="off" value="<?php echo $Descripcion; ?>">
                            <label for="icon_prefix">Ingrese Descripción</label>
                        </div>
                        <div class="form-group">

                        <?php
                            if ($accion=='actualiza') { ?>
                                <button type="submit" class="btn blue darken-3" name="actualizarlinea" onclick="actualizar(<?php echo $id ?>)">Actualizar</button>
                        <?php } else { ?>
                                <button type="submit" class="btn green" name="newlinea" onclick="insertar()">Registrar</button>    
                        <?php } ?>                
                            <input type="button" class="btn pink accent-3" name="cancelar" id="cancelarlinea" value="cancelar"></button>                
                        </div>
                    </div>
                </form> 
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
