
<?php 
    require_once "function/autoload.php";
    // print_r($_GET['sec']);
    $view = isset($_GET['sec']) ? $_GET['sec'] : 'home'; //isset pregunta si el valor que le estoy pasando entre parentesis existe. Con esta linea le estas diciendo que si existe, te mande al que se elije y sino, al $view ser igual a home, la redireccion va a ser 'views/home.php'
    $vista = 'error404';

    $seccionesValidas = [
        'envios' => [
            'titulo' => 'Envíos'
        ],
        'filtros' => [
            'titulo' => 'Filtros de Productos'
        ],
        'home' => [
            'titulo' => 'FilmLens'
        ],
        'productos' => [
            'titulo' => 'Peliculas'
        ],
        'peliculas' => [
            'titulo' => 'Pelicula'
        ],
        'quienes_somos' => [
            'titulo' => 'Nosotros'
        ],
        'procesar' => [
            'titulo' => 'Formulario Enviado'
        ],
        'login' => [
            'titulo' => 'Iniciar sesion'
        ],
        'registro' => [
            'titulo' => 'Registrate'
        ],
        'carrito' => [
            'titulo' => 'Carrito'
        ],
        'logout' => [
            'titulo' => 'Cerrar sesion'
        ],
        'finalizar_compra' => [
            'titulo' => 'Compra Finalizada'
        ],
        'perfil' => [
            'titulo' => 'Tu Perfil'
        ],
        'edit_foto' => [
            'titulo' => 'editar foto'
        ]
    ];


    if (array_key_exists($view, $seccionesValidas)) {
        $vista = $view;
    }else{
        $vista = 'error404';
}
    /*
    echo "<pre>";
    print_r($_SESSION["login"]);
    echo "</pre>";
    */

include_once 'class/Pelicula.php'

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= isset($seccionesValidas[$vista]['titulo']) ? $seccionesValidas[$vista]['titulo'] : 'Error 404'?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/styles.css">

    <link rel="stylesheet" href="css/footer.css">
    
    <link rel="stylesheet" href="css/login.css">

    <link rel="stylesheet" href="css/tablas_perfil.css">
    <link rel="stylesheet" href="css/tarjeta_perfil.css">
</head>
<body>
<?php include_once 'includes/nav.php';

file_exists("views/$vista.php") 
                ? include "views/$vista.php" 
                : include "views/error404.php";


include_once 'includes/footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>