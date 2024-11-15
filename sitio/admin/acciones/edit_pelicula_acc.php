<?php

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
require_once "../../function/autoload.php";
$fileData = $_FILES["portada"] ?? FALSE;
$categorias_secundarias = $_POST["categorias_secundarias"];

try {
    $pelicula = new Pelicula();

    if( !empty($fileData["tmp_name"]) ){
        if( !empty($_POST["portada_original"]) ){
            (new Imagen())->borrarImagen("../../img/".$_POST["portada_original"]);
        }
        $imagenNueva = (new Imagen())->subirImagen("../../img/", $fileData);
        $pelicula->reemplazarImagen($imagenNueva, $_POST["id"]);
    }
    (new Pelicula())->edit(
        $_POST["nombre"],
        $_POST["categoria_id"],  
        $_POST["director_id"],
        $_POST["trailer"],
        $_POST["sinopsis"],
        $_POST["precio"],
        $_POST["id"]
    );

    (new Pelicula())->delete_categorias_secundarias($_POST["id"]);
    foreach ($categorias_secundarias as $id_categorias_secundarias) {
        (new Pelicula())->add_categorias_secundarias($_POST["id"], $id_categorias_secundarias);
    }
    
    (new Alerta())->add_alerta("Se pudo editar la película", "success");
    header("Location: ../index.php?seccion=admin_pelicula");
} catch (Exception $e) {
  echo $e->getMessage();
    (new Alerta())->add_alerta("No se pudo editar la película", "danger");
    die("No se pudo editar la película");
}

