<?php 
    include ("conexion_DB/usuarios.php");
    session_start();
    $uss = new usuarios();
    $us = $_POST['usIngresar'];
    $pass = $_POST['passIngresar']; 
    $uss->validar_usuario($us, $pass);
?>