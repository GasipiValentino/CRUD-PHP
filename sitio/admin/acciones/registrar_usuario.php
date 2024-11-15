<?php
require_once "../../function/autoload.php";

$usuario = $_POST["usuario"];
$pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);

try {
    $usuarioAnterior = (new Usuario())->usuario_x_usuario($usuario);
    if($usuarioAnterior){
        //mensaje al usuario
    }else{
        (new Usuario())->insert($usuario, $pass);        
    }
    header("Location: ../../index.php?sec=login");
} catch (Exception $e) {
    echo $e->getMessage();
}

?>