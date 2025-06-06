<?php 
    include ("conexion_DB/administrador.php");
    session_start();
    $uss = new administrador();
    $us = $_POST['usAdmin'];
    $pass = $_POST['passAdmin']; 
    $uss->validar_admin($us, $pass);
?>