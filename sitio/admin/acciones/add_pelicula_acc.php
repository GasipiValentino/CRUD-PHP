<?php
require_once "../../function/autoload.php";

$categorias_secundarias = $_POST["categorias_secundarias"];
try {
    $imagen = ( new Imagen() )->subirImagen("../../img/", $_FILES["portada"]);
    $id_pelicula = (new Pelicula())->add(
        $_POST["nombre"],
        $_POST["categoria_id"],  
        $_POST["director_id"],
        $_POST["trailer"],
        $_POST["sinopsis"],
        $imagen,
        $_POST["precio"]
    );

    foreach ($categorias_secundarias as $id_categorias_secundarias) {
        (new Pelicula())->add_categorias_secundarias($id_pelicula, $id_categorias_secundarias);
    }
    (new Alerta())->add_alerta("Se pudo agregar la película", "success");
    header("Location: ../index.php?seccion=admin_pelicula");
} catch (\Exception $e) {
    echo $e->getMessage();
    (new Alerta())->add_alerta("No se pudo agregar la película", "danger");
    die("No se pudo cargar la película :(");
}