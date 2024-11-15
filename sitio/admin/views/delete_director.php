<?php
$id = $_GET['id'] ?? false;
$director = (new Director())->catalogoDirector($id);
?>

<div class="row my-5 g-3 container mx-auto">
    <h1 class="text-center mb-5 fw-bold">Desea Eliminar Director?</h1>
    <div class="col-12 col-md-6">
        <img class="img-fluid rounded shadow-sm d-block mx-auto mb-3 w-50"
            src="../img/directores/<?= $director->getImagen() ?>" alt="">
    </div>
    <div class="col-12 col-md-6">
        <h2 class="fs-6">Nombre:</h2>
        <p><?= $director->getNombre() ?></p>
        <h2 class="fs-6">Biografia:</h2>
        <p><?= $director->getBiografia() ?></p>
        <a class="d-block btn btn-sm btn-danger mt-4" href="acciones/delete_director_acc.php?id=<?= $director->getId() ?>">Eliminar</a>
        <a class="d-block btn btn-sm btn-warning mt-4" href="index.php?secccion=principal">Cancelar</a>
    </div>

</div>