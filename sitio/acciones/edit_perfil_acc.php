<?php

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
require_once "../function/autoload.php";

$fileData = $_FILES["foto_perfil"] ?? FALSE;

try {
    $pelicula = new Pelicula();

    if( !empty($fileData["tmp_name"]) ){
        if( !empty($_POST["portada_original"]) ){
            (new Imagen())->borrarImagen("../../img/".$_POST["portada_original"]);
        }
        $imagenNueva = (new Imagen())->subirImagen("../../img/", $fileData);
        $pelicula->reemplazarImagen($imagenNueva, $_POST["id"]);
    }
    (new Usuario())->edit(
        $_POST["foto_perfil"],
    );

    (new Alerta())->add_alerta("Se pudo editar la película", "success");
    header("Location: index.php?seccion=perfil.php");
} catch (Exception $e) {
  echo $e->getMessage();
    (new Alerta())->add_alerta("No se pudo editar la película", "danger");
    die("No se pudo editar la película");
}