<?php

class Categoria{
    protected $id;
    protected $nombre;
    protected $descripcion;

    public function catalogoCompleto(): array
    {
        $catalogo = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM categoria";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo = $PDOStatement->fetchAll();

        return $catalogo;
    }

    public function catalogoCategoria(int $id) :? self
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM categoria WHERE id = $id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();
        $resultado = $PDOStatement->fetch();
    
        return $resultado ? $resultado : null;
    }

    public function getNombrePorId($id)
    {
    $conexion = Conexion::getConexion();
    $query = "SELECT nombre FROM categoria WHERE id = :id";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(['id' => $id]);
    $resultado = $PDOStatement->fetch();
    
    return $resultado ? $resultado['nombre'] : null;
    }

    public function edit($nombre, $descripcion, $id){
        $conexion = Conexion::getConexion();
        $query = "UPDATE categoria SET nombre= :nombre, descripcion= :descripcion WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "nombre" => htmlspecialchars($nombre),
            "descripcion" => htmlspecialchars($descripcion),
            "id" => htmlspecialchars($id)
        ]);
    }

    public function delete(){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM categoria WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(["id" => htmlspecialchars($this->id)]);
    }

    public function add($nombre, $biografia): void
    {
        try {
            $conexion = Conexion::getConexion();
            $query = "INSERT INTO categoria VALUES (null, :nombre, :biografia)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                "nombre" => htmlspecialchars($nombre),
                "biografia" => htmlspecialchars($biografia),
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }




    // Getters y Setters
     
    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

     
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

     
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}