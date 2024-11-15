<?php
require_once "../../function/autoload.php";
$fileData = $_FILES["imagen"] ?? FALSE;

// try {
//     $usuario = new Usuario();

//     if( !empty($fileData["tmp_name"]) ){
//         if( !empty($_POST["imagen_original"]) ){
//             (new Imagen())->borrarImagen("../../img/directores/".$_POST["imagen_original"]);
//         }
//         $imagenNueva = (new Imagen())->subirImagen("../../img/directores", $fileData);
//         $usuario->reemplazarImagen($imagenNueva, $_POST["id"]);
//     }
//     $usuario->edit($_POST["nombre"],$_POST["biografia"], $_POST["id"]);
//     header("Location: ../../index.php?seccion=perfil.php");
// } catch (Exception $e) {
//     echo $e->getMessage();
//     die("No pude editar el director");
// }



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto_perfil'])) {
    $imagen = new Imagen();
    $directorio = "../../img"; // Carpeta donde se guardarán las imágenes subidas

    try {
        // Subir la imagen
        $rutaImagen = $imagen->subirImagen($directorio, $_FILES['foto_perfil']);
        $rutaCompleta = "$directorio/$rutaImagen";

        // Actualizar la ruta de la imagen en la base de datos
        $conexion = Conexion::getConexion();
        $query = "UPDATE usuarios SET foto_perfil = :foto_perfil WHERE id = :id";
        $stmt = $conexion->prepare($query);
        $stmt->execute([
            'foto_perfil' => $rutaCompleta,
            'id' => $_SESSION["login"]["id"]
        ]);

        // Actualizar la sesión con la nueva ruta de la imagen
        $_SESSION["login"]["foto_perfil"] = $rutaCompleta;

        // Redirigir de vuelta al perfil
        header("Location: ../../index.php?sec=perfil");
        exit;

    } catch (Exception $e) {
        echo $e->getMessage();
        die("No pude editar el director");
    }
}

?>