
<?= (new Alerta())->get_alertas() ?>
<div class="d-flex justify-content-center position-relative mb-4 mt-4">
    <h2 class="text-primary-emphasis m-0">Peliculas</h2>
    <div class="dropdownn position-absolute">
        <button class="dropbtn">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 5H21V7H3V5ZM7 11H17V13H7V11ZM11 17H13V19H11V17Z" fill="currentColor"/>
            </svg>
        </button>
        <div class="dropdown-content">
            <a href="index.php?sec=productos&orden=asc">Precio: Menor a Mayor</a>
            <a href="index.php?sec=productos&orden=desc">Precio: Mayor a Menor</a>
        </div>
    </div>
</div>




<section class="d-flex flex-wrap gap-4 justify-content-center m-5 mt-3 peliculas mx-auto">
<?php
    $orden = isset($_GET['orden']) ? $_GET['orden'] : 'asc';
    $productos = (new Pelicula())->catalogoCompletoOrdenado($orden);

    foreach ($productos as $producto) {
        $categoriaConMayuscula = (new Pelicula())->categoriaMayuscula($producto->getCategoria_id());
        $directorConMayuscula = (new Pelicula())->directorMayuscula($producto->getDirector_id());
        $nombreConMayuscula = (new Pelicula())->nombreMayuscula(($producto->getNombre()));
        $recortarDescripcion = (new Pelicula())->recortarDescripcion(($producto->getSinopsis()));
        ?>
            <div class="card" style="width: 15rem;">
                <div class="contenedor-img"><img src="img/<?= $producto->getImagen() ?>" class="card-img-top" alt="<?= $producto->getNombre() ?>"></div>
                <div class="card-body">
                    <h5 class="mb-2 text-primary-emphasis fs-6"><?= $nombreConMayuscula; ?></h5>
                    <h4 class="mb-2 text-secondary fs-6"><?= $categoriaConMayuscula; ?> - <?= $directorConMayuscula; ?></h5>
                    <p class="card-text text-dark-emphasis descripcion"><?= $recortarDescripcion; ?></p>
                    <p class="card-text precio fs-4"><span class="fw-medium me-1">US$</span><?= $producto->getPrecio(); ?></p>
                    <a href="index.php?sec=peliculas&id=<?= $producto->getId() ?>" class="btn btn-primary">Ver Detalles</a>
                </div>
            </div>
        <?php
    }
?>
</section>