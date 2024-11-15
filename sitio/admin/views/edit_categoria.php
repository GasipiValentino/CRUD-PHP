<?php
    $id = $_GET['id'] ?? false;
    $categoria = (new Categoria())->catalogoCategoria($id);
?>

<div class="row my-5 container mx-auto">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Editar Categoría</h1>
        <div class="row mb-5 d-flex align-items-center">
            <!-- Enviamos los datos del formulario nuevo por post al action de edit -->
            <form class="row g-3" action="acciones/edit_categoria_acc.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $categoria->getId() ?>">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" type="text" name="nombre" value="<?= $categoria->getNombre() ?>">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Descripción</label>
                    <textarea class="form-control" name="descripcion" rows="3"><?= $categoria->getDescripcion(); ?></textarea>
                </div>  
                
                <button class="btn btn-primary" type="submit">Editar</button>
            </form>
        </div>
    </div>
</div>