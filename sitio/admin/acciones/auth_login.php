<?php
require_once "../../function/autoload.php";

$usuario = $_POST["usuario"];
$pass = $_POST["pass"];

$login = (new Autenticacion())->log_in($usuario, $pass);

if( $login ){
    if($_SESSION["login"]["roles"] != "usuario" ){
        (new Alerta())->add_alerta("Bienvenido administrador", "success");
        header("Location: ../index.php");
    }else{
        header("Location: ../../index.php");
    }
}else{
    (new Alerta())->add_alerta("Usuario o Contraseña incorrecto", "danger");
    (new Autenticacion())->log_out();
    header("Location: ../index.php?sec=login");
}




// print_r($datosLogin);

