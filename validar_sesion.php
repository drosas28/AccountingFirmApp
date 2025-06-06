<?php 
    session_start();
    $id = $_SESSION['id'];
    $nombre = $_SESSION['nombre'];
    if(!isset($id)){
        header("location: index.php");
    }
?>