<?php

session_start();

function autoloadClass($nombreDeLaClase){
    $archivoDeLaClase = __DIR__."/../class/$nombreDeLaClase.php";

    if( file_exists($archivoDeLaClase) ){
        require_once $archivoDeLaClase;
    }
}



spl_autoload_register("autoloadClass");

# autoload registra cualquier número de autocargadores, posibilitando que las clases e interfaces sean cargadas automáticamente si no están definidas actualmente. Al registrar autocargadores, a PHP se le da una última oportunidad de cargar las clases o interfaces antes de que falle por un error.