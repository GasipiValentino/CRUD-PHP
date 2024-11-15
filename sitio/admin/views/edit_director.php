<?php
    $id = $_GET['id'] ?? false;
    $director = (new Director())->catalogoDirector($id);
?>

<div class="row my-5 container-edit-directores container mx-auto">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Editar Director</h1>
        <div class="row mb-5 d-flex align-items-center">
            <!-- Enviamos los datos del formulario nuevo por post al action de edit -->
            <form class="row g-3" action="acciones/edit_director_acc.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $director->getId() ?>">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" type="text" name="nombre" value="<?= $director->getNombre() ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Imagen Actual</label>
                    <img class="img-fluid rounded shadow-sm d-block" src="../img/directores/<?= $director->getImagen() ?>" alt="">
                    <input class="form-control" type="hidden" name="imagen_original" value="<?= $director->getImagen() ?>">
                </div>       
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Reemplazar Imagen</label>
                    <input class="form-control" type="file" name="imagen">
                </div>     
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Biografia</label>
                    <textarea class="form-control" name="biografia" rows="3"><?= $director->getBiografia(); ?></textarea>
                </div>  
                
                <button class="btn btn-primary" type="submit">Editar</button>
            </form>
        </div>
    </div>
</div>