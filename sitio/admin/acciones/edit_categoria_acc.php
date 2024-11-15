<?php
require_once "../../function/autoload.php";

try {
    $categoria = new Categoria();
    $categoria->edit($_POST["nombre"], $_POST["descripcion"], $_POST["id"]);
    (new Alerta())->add_alerta("Se pudo editar la categoría", "success");
    header("Location: ../index.php?seccion=admin_categoria");
} catch (Exception $e) {
    echo $e->getMessage();
    (new Alerta())->add_alerta("No se pudo editar la categoría", "danger");
    die("No pude editar la categoría");
}