<?php
$categorias = (new Categoria())->catalogoCompleto();
$directores = (new Director())->catalogoCompleto();
?>

<div class="row my-5 container mx-auto">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion de Películas</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="acciones/add_pelicula_acc.php" method="post" enctype="multipart/form-data">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Titulo</label>
                    <input class="form-control" type="text" name="nombre">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Categoría Principal</label>
                    <select class="form-select" name="categoria_id" id="categoria_id">
                        <option value="" selected disabled>Elija una opción</option>
                        <?php foreach ($categorias as $categoria) { ?>
                        <option value="<?= $categoria->getId() ?>"><?= $categoria->getNombre() ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Categorías Secundaria</label>
                    <?php foreach ($categorias as $categoria) { ?>
                    <div>
                        <input type="checkbox" name="categorias_secundarias[]"
                            id="categoria_secundaria<?= $categoria->getId() ?>"
                            value="<?= $categoria->getId() ?>"
                            >
                        <label for="categoria_secundaria<?= $categoria->getId() ?>">
                            <?= $categoria->getNombre() ?>
                        </label>
                    </div>
                    <?php } ?>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Director</label>
                    <select class="form-select" name="director_id" id="director_id">
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($directores as $director) { ?>
                        <option value="<?= $director->getId() ?>"><?= $director->getNombre() ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Portada</label>
                    <input class="form-control" type="file" name="portada">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Sinopsis</label>
                    <textarea class="form-control" name="sinopsis" id="sinopsis" rows="7"></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Trailer</label>
                    <input class="form-control" type="text" name="trailer">
                </div>


                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Precio</label>
                    <input class="form-control" type="number" name="precio">
                </div>

                
                <button class="btn btn-primary" type="submit">Cargar</button>
            </form>
        </div>
    </div>
</div>



