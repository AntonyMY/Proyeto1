<?php
    function ConectaBD(){
        $Servidor  = 'localhost';
        $Usuario   = 'root';
        $Password  = '';
        $BaseDatos = 'bdtrabajo';
        
        $Cn = new mysqli($Servidor,$Usuario,$Password,$BaseDatos);
        if($Cn->connect_errno){
            //var_dump(Cn);
            echo "La conexion fallo " . $Cn->connect_error;
            exit();
        } 
        
        return $Cn;
    }
    
    function ListarLinea(){
        $cn = ConectaBD();
        $query = "SELECT * FROM linea"; 
        $result = $cn->query($query);
        $cn->close(); 
        return $result;
    }
?>

