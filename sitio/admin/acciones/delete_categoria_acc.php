<?php
require_once "../../function/autoload.php";

$id = $_GET["id"] ?? false;
$categoria = (new Categoria())->catalogoCategoria($id);
try {
    $categoria->delete();
    (new Alerta())->add_alerta("Se pudo eliminar la categoría", "success");
} catch (Exception $e) {
    echo $e->getMessage();
    (new Alerta())->add_alerta("No se pudo eliminar la categoría", "danger");
    die("No se pudo eliminar la categoría :(");
}


header("Location: ../index.php?seccion=admin_categoria");