<?php
require_once "../../function/autoload.php";

$id = $_GET["id"] ?? false;
$pelicula = (new Pelicula())->catalogoPorId($id);
try {
    if( $pelicula->getImagen() != "" ){
        (new Imagen())->borrarImagen("../../img/".$pelicula->getImagen());
    }
    $pelicula->delete_categorias_secundarias($id);
    $pelicula->delete();
    (new Alerta())->add_alerta("Se pudo eliminar la película", "success");
} catch (Exception $e) {
    echo $e->getMessage();
    (new Alerta())->add_alerta("No se pudo eliminar la película", "danger");
    die("No se pudo eliminar la Película :(");
}

header("Location: ../index.php?seccion=admin_pelicula");

