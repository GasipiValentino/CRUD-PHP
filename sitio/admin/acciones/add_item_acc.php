<?php
require_once "../../function/autoload.php";

$id = $_GET['id'] ?? FALSE;

if($id && isset($_SESSION["login"])){
    (new Carrito())->add_item($id);

        (new Alerta())->add_alerta("Se pudo agregar la película al carrito", "success");
        header("Location: ../../index.php?sec=carrito ");
}

    if($id && !isset($_SESSION["login"])){
        header("Location: ../../index.php?sec=productos");
        (new Alerta())->add_alerta("No se agregó al carrito. <a href='index.php?sec=login' class='alert-link'>Iniciá sesión o registrate</a>", "warning");
    }


?>