<?php
    require_once "../../function/autoload.php";
    try {
        ( new Categoria() )->add(
            $_POST["nombre"],
            $_POST["descripcion"],
        );
        (new Alerta())->add_alerta("Se pudo agregar la categoría", "success");
        header("Location: ../index.php?seccion=admin_categoria");
    } catch (\Exception $e) {
        echo $e->getMessage();
        (new Alerta())->add_alerta("No se pudo agregar la categoría", "danger");
        die("No se pudo cargar la categoría :(");
    }

