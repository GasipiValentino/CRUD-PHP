<?php
require_once "../../function/autoload.php";

if( !empty($_GET["c"]) ){
    (new Carrito())->actualizarCantidades($_GET["c"]);
    (new Alerta())->add_alerta("Carrito Actualizado", "success");
}else{
    (new Alerta())->add_alerta("No se pudo actualizar el carrito", "danger");
}

header("Location: ../../index.php?sec=carrito");

?>