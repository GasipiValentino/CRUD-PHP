<?php
$directores = (new Director())->catalogoCompleto();
$categorias = (new Categoria())->catalogoCompleto();
$pelicula = (new Pelicula())->catalogoPorId($_GET["id"]);
?>

<div class="row my-5 container mx-auto">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Edición de Películas</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="acciones/edit_pelicula_acc.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $pelicula->getId() ?>">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" type="text" name="nombre" value="<?= $pelicula->getNombre() ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Categoria</label>
                    <select class="form-select" name="categoria_id" id="categoria_id">
                        <!-- <option value="" selected disabled>Elija una opcion</option> -->
                        <?php foreach ($categorias as $categoria) { ?>
                        <option <?=$categoria->getId() == $pelicula->getCategoria_id() ? "selected" : "" ?> value="<?= $categoria->getId() ?>"><?= $categoria->getNombre() ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Categorías Secundarias</label>
                    <?php foreach ($categorias as $categoria) { 
                        $catsec_seleccionada = explode(",",$pelicula->getCategoriasSecundarias());    
                    ?>
                    <div>
                        <input type="checkbox" name="categorias_secundarias[]"
                            id="personaje_secundario<?= $categoria->getId() ?>"
                            <?= in_array( $categoria->getId(), $catsec_seleccionada) ? "checked" : ""  ?>
                            value="<?= $categoria->getId() ?>"
                            >
                        <label for="personaje_secundario<?= $categoria->getId() ?>">
                            <?= $categoria->getNombre() ?>
                        </label>
                    </div>
                    <?php } ?>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Director</label>
                    <select class="form-select" name="director_id" id="director_id">
                        <!-- <option value="" selected disabled>Elija una opcion</option> -->
                        <?php foreach ($directores as $director) { ?>
                        <option <?=$director->getId() == $pelicula->getDirector_id() ? "selected" : "" ?> value="<?= $director->getId() ?>"><?= $director->getNombre() ?></option>
                        <?php } ?>
                    </select>
                </div>


                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Portada Actual</label>
                    <img class="img-fluid rounded shadow-sm d-block" src="../img/<?= $pelicula->getImagen() ?>" alt="">
                    <input class="form-control" type="hidden" name="portada_original" value="<?= $pelicula->getImagen() ?>">
                </div>     

                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Reemplazar Portada</label>
                    <input class="form-control" type="file" name="portada">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Sinopsis</label>
                    <textarea class="form-control" name="sinopsis" id="sinopsis" rows="7"><?=$pelicula->getSinopsis()?></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Trailer Actual</label>
                    <iframe class="d-none d-md-block" width="560" height="315" src="<?= $pelicula->getTrailer(); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>     

                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Trailer</label>
                    <input class="form-control" type="text" name="trailer">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Precio</label>
                    <input class="form-control" type="number" name="precio" value="<?= $pelicula->getPrecio() ?>">
                </div>
                
                <button class="btn btn-primary" type="submit">Editar</button>
            </form>
        </div>
    </div>
</div>
