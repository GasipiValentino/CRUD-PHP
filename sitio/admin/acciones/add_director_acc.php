
<?php
    require_once "../../function/autoload.php";
    try {
        $imagen = ( new Imagen() )->subirImagen("../../img/directores", $_FILES["imagen"]);
        ( new Director() )->add(
            $_POST["nombre"],
            $_POST["biografia"],
            $imagen
        );
        (new Alerta())->add_alerta("Se pudo agregar director", "success");
        header("Location: ../index.php?seccion=admin_director");
    } catch (\Exception $e) {
        echo $e->getMessage();
        (new Alerta())->add_alerta("No se pudo agregar director", "danger");
        die("No pude cargar el director :(");
    }
