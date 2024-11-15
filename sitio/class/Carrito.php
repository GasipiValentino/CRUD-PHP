<?php
class Carrito{
    /**Agregar producto */

    public function add_item(int $id_pelicula, int $cantidad = 1) {
        $itemData = (new Pelicula())->catalogoPorId($id_pelicula);
        if ($itemData) {
            if (isset($_SESSION["carrito"][$id_pelicula])) {
                $_SESSION["carrito"][$id_pelicula]["cantidad"] += $cantidad;
            } else {
                $_SESSION["carrito"][$id_pelicula] = [
                    "producto" => $itemData->getNombre(),
                    "portada" => $itemData->getImagen(),
                    "precio" => $itemData->getPrecio(),
                    "cantidad" => $cantidad
                ];
            }
        }
    }

    /**Mostrar productos */

    public function getCarrito(){
        if( !empty($_SESSION["carrito"]) ){
            return $_SESSION["carrito"];
        }
        return [];
    }

    
    /**Devolver el precio total */
    public function getTotal(){
        $total = 0;
        if( !empty($_SESSION["carrito"]) ){
            foreach( $_SESSION["carrito"] as $item ){
                $total += $item["precio"] * $item["cantidad"];
            }
        }
        return $total;
    }
    /**Vaciar carrito */
    public function vaciarCarrito(){
        $_SESSION["carrito"] = [];
    }
    /**Modificar Cantidad*/

    public function actualizarCantidades(array $cantidades){
        if( !empty($cantidades) ){
            foreach( $cantidades as $id => $cantidad ){
                if( isset( $_SESSION["carrito"][$id] ) ){
                    $_SESSION["carrito"][$id]["cantidad"] = $cantidad; 
                }
            }
        }
    }

    /**Eliminar item individual Cantidad*/
    public function removeItem(int $id){
        if( isset( $_SESSION["carrito"][$id] ) ){
            unset($_SESSION["carrito"][$id]);
            (new Alerta())->add_alerta("Producto eliminado", "success");
        }else{
            (new Alerta())->add_alerta("No se ha eliminado el producto", "danger");
        }
    }


    public function insert(int $id_pelicula, int $id_usuario, int $cantidad) {
        try {
            $conexion = Conexion::getConexion();
            
            // Obtener el precio de la película
            $pelicula = (new Pelicula())->catalogoPorId($id_pelicula);  // Suponiendo que esto obtiene los datos de la película.
            $total = $pelicula->getPrecio() * $cantidad;  // Total por la cantidad de productos
    
            // Verificar si el producto ya existe en el carrito
            $query = "SELECT * FROM carrito WHERE id_usuario = :id_usuario AND id_pelicula = :id_pelicula";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                "id_usuario" => $id_usuario,
                "id_pelicula" => $id_pelicula,
            ]);
            $item = $PDOStatement->fetch();
    
            if ($item) {
                // Si ya existe, actualizamos la cantidad y el total
                $queryUpdate = "UPDATE carrito SET cantidad = cantidad + :cantidad, total = total + :total WHERE id_usuario = :id_usuario AND id_pelicula = :id_pelicula";
                $PDOStatement = $conexion->prepare($queryUpdate);
                $PDOStatement->execute([
                    "cantidad" => $cantidad,
                    "total" => $total,
                    "id_usuario" => $id_usuario,
                    "id_pelicula" => $id_pelicula,
                ]);
            } else {
                // Si no existe, insertamos un nuevo item en el carrito
                $queryInsert = "INSERT INTO carrito (id_usuario, id_pelicula, cantidad, total) VALUES (:id_usuario, :id_pelicula, :cantidad, :total)";
                $PDOStatement = $conexion->prepare($queryInsert);
                $PDOStatement->execute([
                    "id_usuario" => $id_usuario,
                    "id_pelicula" => $id_pelicula,
                    "cantidad" => $cantidad,
                    "total" => $total,
                ]);
            }
    
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    



    public function getHistorialCompras(int $id_usuario) {
        try {
            $conexion = Conexion::getConexion();
            $query = "
                SELECT dc.id_detalle, p.nombre, dc.cantidad, 
                       (dc.cantidad * p.precio) AS total, p.img
                FROM carrito c
                INNER JOIN detalles_compras dc ON c.id_compra = dc.id_compra
                INNER JOIN peliculas p ON dc.id_pelicula = p.id
                WHERE c.id_usuario = :id_usuario
                ORDER BY c.fecha_compra DESC
            ";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute(['id_usuario' => $id_usuario]);
            return $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
            return [];
        }
    }
    
    
    
    



    public function finalizarCompra() {
        if (isset($_SESSION["carrito"]) && isset($_SESSION["login"])) {
            $id_usuario = $_SESSION["login"]["id"];
            $total = $this->getTotal();
    
            try {
                $conexion = Conexion::getConexion();
                
                // Primero insertamos el registro de la compra en la tabla `carrito`
                $queryCompra = "INSERT INTO carrito (id_usuario, total) VALUES (:id_usuario, :total)";
                $PDOStatement = $conexion->prepare($queryCompra);
                $PDOStatement->execute([
                    'id_usuario' => $id_usuario,
                    'total' => $total,
                ]);
    
                // Obtenemos el id de la compra recién insertada
                $id_compra = $conexion->lastInsertId();
    
                // Ahora insertamos los detalles de la compra en `detalles_compras`
                foreach ($_SESSION["carrito"] as $id_pelicula => $producto) {
                    $queryDetalle = "INSERT INTO detalles_compras (id_compra, id_pelicula, cantidad) VALUES (:id_compra, :id_pelicula, :cantidad)";
                    $PDOStatement = $conexion->prepare($queryDetalle);
                    $PDOStatement->execute([
                        'id_compra' => $id_compra,
                        'id_pelicula' => $id_pelicula,
                        'cantidad' => $producto['cantidad'],
                    ]);
                }
    
                // Vaciar el carrito después de finalizar la compra
                $this->vaciarCarrito();
                return true;
    
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    }
    


}
    
?>