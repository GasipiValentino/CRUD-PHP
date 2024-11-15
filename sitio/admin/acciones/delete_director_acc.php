<?php
require_once "../../function/autoload.php";

$id = $_GET["id"] ?? false;
$director = (new Director())->catalogoDirector($id);
try {
    (new Imagen())->borrarImagen("../../img/directores/".$director->getImagen());
    $director->delete();
    (new Alerta())->add_alerta("Se pudo eliminar el director", "success");
} catch (Exception $e) {
    echo $e->getMessage();
    (new Alerta())->add_alerta("No se pudo eliminar el director", "danger");
    die("No se pudo eliminar :(");
}


header("Location: ../index.php?seccion=admin_director");