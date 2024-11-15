<?php
    require_once "function/autoload.php";

$miCarrito = new Carrito();

if ($miCarrito->finalizarCompra()) {
    echo '<div class="row my-5 container mx-auto">
            <div class="col">
                <h1 class="text-center mb-5 fw-bold">Tu compra se realizó correctamente</h1>
                <div class="row mb-5 d-flex flex-column align-items-center">
                    <a href="index.php" class="btn btn-primary w-25 mb-4">Volver al inicio</a>
                </div>
            </div>
          </div>';
} else {
    echo '<div class="row my-5 container mx-auto">
            <div class="col">
                <h1 class="text-center mb-5 fw-bold">Hubo un problema al realizar tu compra</h1>
                <div class="row mb-5 d-flex flex-column align-items-center">
                    <a href="index.php?sec=carrito" class="btn btn-danger w-25 mb-4">Volver al carrito</a>
                </div>
            </div>
          </div>';
        }

// $id = $_GET['id'] ?? FALSE;
?>

