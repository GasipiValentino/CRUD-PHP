<?php

class Director{
    protected $id;
    protected $nombre;
    protected $biografia;
    protected $imagen;

    public function catalogoCompleto(): array
    {
        $catalogo = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM director";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo = $PDOStatement->fetchAll();

        return $catalogo;
    }

    public function catalogoDirector(int $id) :? self
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM director WHERE id = $id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();
        $resultado = $PDOStatement->fetch();
    
        return $resultado ? $resultado : null;
    }

    public function reemplazarImagen($imagen, $id){
        $conexion = Conexion::getConexion();
        $query = "UPDATE director SET imagen = :imagen WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "imagen" => htmlspecialchars($imagen),
            "id" => htmlspecialchars($id)
        ]);
    }

    public function edit($nombre, $biografia, $id){
        $conexion = Conexion::getConexion();
        $query = "UPDATE director SET nombre= :nombre, biografia= :biografia WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "nombre" => htmlspecialchars($nombre),
            "biografia" => htmlspecialchars($biografia),
            "id" => htmlspecialchars($id)
        ]);
    }

    public function delete(){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM director WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(["id" => htmlspecialchars($this->id)]);
    }

    public function add($nombre, $biografia, $imagen): void
    {
        try {
            $conexion = Conexion::getConexion();
            $query = "INSERT INTO director VALUES (null, :nombre, :biografia, :imagen )";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                "nombre" => htmlspecialchars($nombre),
                "biografia" => htmlspecialchars($biografia),
                "imagen" => htmlspecialchars($imagen)
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }



    // Getters y setters
     
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

     
    public function getBiografia()
    {
        return $this->biografia;
    }

    public function setBiografia($biografia): self
    {
        $this->biografia = $biografia;

        return $this;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }
}