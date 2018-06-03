<?php
    include 'funciones.php';

    $idlinea = $_GET["id"];    

    $cn = ConectaBD();
    $query = "DELETE FROM linea WHERE idlinea=?"; 
    $ps = $cn->prepare($query);
    $ps->bind_param("i",$idlinea);
    $ps->execute();   
    $cn->close();
    header('Location: ./linea.php');
