<?php
require_once "../../function/autoload.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuarioId = $_POST['usuario_id'];
    $nuevoRol = $_POST['rol'];

    $usuario = new Usuario();
    $usuario->actualizarRol($usuarioId, $nuevoRol);

    // Redirigir de nuevo a la página de usuarios o mostrar un mensaje de éxito.
    (new Alerta())->add_alerta("Se pudo cambiar el rol al usuario", "success");
    header('Location:../index.php?seccion=usuarios');
}
?>
