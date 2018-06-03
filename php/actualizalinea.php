<?php
    include 'funciones.php';

    $idlinea = $_GET["id"];    
    $Nombre = $_POST["nombre"];
    $Descripcion = $_POST["descripcion"];

    $cn = ConectaBD();
    $query = "UPDATE linea SET nombre=?,descripcion=? where idlinea=?"; 
    $ps = $cn->prepare($query);
    $ps->bind_param("ssi",$Nombre,$Descripcion,$idlinea);
    $ps->execute();   
    $cn->close();
    header('Location: ./linea.php');