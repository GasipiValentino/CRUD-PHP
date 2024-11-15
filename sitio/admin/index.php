
<?php 
    require_once '../function/autoload.php';

    $seccionesValidas = [
        'principal' => [
            'titulo' => 'Panel de Control'
        ],
        'admin_pelicula' => [
            'titulo' => 'Administración de Peliculas',
        ],
        'add_pelicula' => [
            'titulo' => 'Agregar Película',
        ],
        'edit_pelicula' => [
            'titulo' => 'Editar Pelicula',
        ],
        'delete_pelicula' => [
            'titulo' => 'Eliminar Película',
        ],
        'admin_director' => [
            'titulo' => 'Administración de Director',
        ],
        'add_director' => [
            'titulo' => 'Agregar Director',
        ],
        'edit_director' => [
            'titulo' => 'Editar Director',
        ],
        'delete_director' => [
            'titulo' => 'Eliminar Director',
        ],
        'admin_categoria' => [
            'titulo' => 'Administración de Categoría',
        ],
        'add_categoria' => [
            'titulo' => 'Agregar Categoría',
        ],
        'edit_categoria' => [
            'titulo' => 'Editar Categoría',
        ],
        'delete_categoria' => [
            'titulo' => 'Eliminar Categoría',
        ],
        'logout' => [
            'titulo' => 'Cerrar Sesión',
        ],
        'perfil' => [
            'titulo' => 'Tu Perfil',
        ],
        'usuarios' => [
            'titulo' => 'Usuarios',
        ]
    ];


    
    $seccion = $_GET['seccion'] ?? 'principal';
    (new Autenticacion())->verify();
    
    if (array_key_exists($seccion, $seccionesValidas)) {
        $vista = $seccion;
        $titulo = $seccionesValidas[$seccion]['titulo'];
    }else{
        $vista = 'error404';
        $titulo = 'Página no encontrada';
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ADMIN: <?= isset($seccionesValidas[$vista]['titulo']) ? $seccionesValidas[$vista]['titulo'] : 'Error 404'?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    

    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/tablas.css">
    <link rel="stylesheet" href="css/cartas.css">

    <link rel="stylesheet" href="../css/tablas_perfil.css">
    <link rel="stylesheet" href="../css/tarjeta_perfil.css">

</head>
<body>
    <header>
        <?php include_once 'includes/nav.php'; ?>
    </header>

    <?=(new Alerta())->get_alertas() ?>
    <?php
    require file_exists("views/$vista.php") ? "views/$vista.php" : "../views/error404.php";

    // include_once '../includes/footer.php' 
    include_once 'includes/footer.php'
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>