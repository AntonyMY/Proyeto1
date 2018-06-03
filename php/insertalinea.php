<?php
    include 'funciones.php';

    $Nombre = $_POST["nombre"];
    $Descripcion =  $_POST["descripcion"];

    $cn = ConectaBD();
    $query = "INSERT INTO linea(nombre,descripcion) VALUES (?,?)"; 
    $ps = $cn->prepare($query);
    $ps->bind_param("ss",$Nombre,$Descripcion);
    $ps->execute();   
    $cn->close();
    header('Location: ./linea.php');


