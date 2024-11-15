<?php
$id = $_GET['id'] ?? false;
$categoria = (new Categoria())->catalogoCategoria($id);
?>

<div class="row my-5 g-3 container mx-auto">
    <h1 class="text-center mb-5 fw-bold">Desea Eliminar la Categoría?</h1>

    <div>
        <h2 class="fs-6">Nombre:</h2>
        <p><?= $categoria->getNombre() ?></p>
        <h2 class="fs-6">Descripción:</h2>
        <p><?= $categoria->getDescripcion() ?></p>
        <a class="d-block btn btn-sm btn-danger mt-4" href="acciones/delete_categoria_acc.php?id=<?= $categoria->getId() ?>">Eliminar</a>
        <a class="d-block btn btn-sm btn-warning mt-4" href="index.php?secccion=principal">Cancelar</a>
    </div>

</div>