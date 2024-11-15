<div class="row my-5 container mx-auto">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Agregar Categoría</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="acciones/add_categoria_acc.php" method="post" enctype="multipart/form-data">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" type="text" name="nombre">
                </div>       
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Descripción</label>
                    <textarea class="form-control" name="descripcion" rows="3"></textarea>
                </div>  
                
                <button class="btn btn-primary" type="submit">Cargar</button>
            </form>
        </div>
    </div>
</div>