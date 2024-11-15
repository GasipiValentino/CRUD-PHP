<?php

$miCarrito = new Carrito();
$items = ($miCarrito)->getCarrito();

?>

<div class="my-2 container">
    <h1 class="mb-5">Carrito de Compras</h1>
    <?= (new Alerta())->get_alertas() ?>
    <?php if( count($items) ){ ?>
    <form action="admin/acciones/update_carrito_acc.php" method="get">
        <div class="table-header">
            <div class="row">
                <div class="col-2">Portada</div>
                <div class="col-3">Nombre</div>
                <div class="col-2">Cantidad</div>
                <div class="col-2">C/U</div>
                <div class="col-2">Subtotal</div>
                <div class="col-1 mx-auto p-0">Acciones</div>
            </div>
        </div>
        <div class="table-body">
                <?php foreach( $items as $key => $item ) {?>
                    <div class="row table-row">
                    <div class="col-2">
                        <img class="img-fluid rounded shadow-sm w-75" src="img/<?php echo $item["portada"]; ?>" alt="<?php echo $item["producto"]; ?>">
                    </div>

                    <div class="col-3 align-middle">
                        <p class="h5"><?php echo $item["producto"]; ?></p>
                    </div>

                    <div class="col-2 align-middle">
                        <input type="number" value="<?php echo $item["cantidad"]; ?>" name="c[<?= $key ?>]" class="form-control">
                    </div>

                    <div class="col-2 align-middle pe-0">
                        <p class="h5"><?php echo $item["precio"]; ?></p>
                    </div>

                    <div class="col-2 align-middle pe-0">
                        <p class="h5"><?=  $item["precio"] * $item["cantidad"]; ?></p>
                    </div>

                    <div class="col-1 align-middle ps-0">
                        <a class="btn btn-danger" href="admin/acciones/remove_item_acc.php?id=<?= $key ?>">Eliminar</a>
                    </div>
                </div>
                <?php } ?> 
            </div>
            <div class="d-flex justify-content-end table-total">
            <h2 class="h5 py-3 fs-2 me-2">Total: </h2>
            <p class="h5 py-3 fs-2">$<?= $miCarrito->getTotal() ?></p>
        </div>

        <div  class="d-flex gap-2 mt-4">
            <input type="submit" value="Actualizar cantidades" class="btn btn-primary">
            <a class="btn btn-dark " href="index.php?sec=productos">Seguir Comprando</a>
            <a class="btn btn-danger "  href="admin/acciones/vaciar_carrito_acc.php">Vaciar Carrito</a>
            <a class="btn btn-success "  href="index.php?sec=finalizar_compra">Finalizar Compra</a>
        </div>
    </form>
    <?php }else{ ?>
        <p>No hay productos en el carrito</p>
        <a class="btn btn-warning w-25" href="index.php?sec=productos">Comprar</a>
    <?php } ?>
</div>

