<?php
$id = $_GET['id'] ?? false;
$pelicula = (new Pelicula())->catalogoPorId($id);
?>

<div class="row my-5 g-3 container mx-auto">
    <h1 class="text-center mb-5 fw-bold">Desea Eliminar la Película?</h1>
    <div class="col-12 col-mb-6">
        <img class="img-fluid rounded shadow-sm d-block mx-auto mb-3"
            src="../img/<?= $pelicula->getImagen() ?>" alt="">
    </div>
    <div class="col-12 col-md-6">
        <a class="d-block btn btn-sm btn-danger mt-4" href="acciones/delete_pelicula_acc.php?id=<?= $pelicula->getId() ?>">Eliminar</a>
    </div>
    <div class="col-12 col-md-6">
        <a class="d-block btn btn-sm btn-warning mt-4" href="index.php?seccion=principal">Cancelar</a>
    </div>

</div>
