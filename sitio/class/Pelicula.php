<?php

class Pelicula{
    protected $id;
    protected $img;
    protected $nombre;
    // protected $director_id;
    protected $director;
    // protected $categoria_id;
    protected $categoria;
    protected $sinopsis;
    protected $precio;
    protected $trailer;
    protected $categorias_secundarias_ids;
    protected $categorias_secundarias;

    protected static $valores = ["id", "img", "nombre", "sinopsis", "precio", "trailer"]; //AL ser static deja de pertenecer a esta instancia y pertenece a la clase comic. No le pertenece solo al objeto sino que tambien a la clase

    public function mapear($comicArrayAsociativo) : self
    {
        $pelicula = new self();
        foreach (self::$valores as $valor) {
            $pelicula->{$valor} = $comicArrayAsociativo[$valor];
        }

        $pelicula->director = (new Director())->catalogoDirector
        ($comicArrayAsociativo["director_id"]);

        $pelicula->categoria = (new Categoria())->catalogoCategoria
        ($comicArrayAsociativo["categoria_id"]);

        $CSids = explode(",", $comicArrayAsociativo["categorias_secundarias"]);
        $categoriasSecundariasArray = [];

        foreach ($CSids as $CSid) {
            $categoriasSecundariasArray []= (new Categoria())->catalogoCategoria(intval($CSid));
        }

        $pelicula->categorias_secundarias = $categoriasSecundariasArray;
        $pelicula->categorias_secundarias_ids = $comicArrayAsociativo["categorias_secundarias"];

        return $pelicula;
    }

    public function catalogoCompleto(){
        $catalogo = [];
        $conexion = Conexion::getConexion();
        $query = 'SELECT peliculas.*, GROUP_CONCAT(pelicula_categoria.id_categoria) AS
                 categorias_secundarias FROM peliculas
                 LEFT JOIN pelicula_categoria ON peliculas.id = pelicula_categoria.id_pelicula
                --  JOIN categoria ON pelicula_categoria.id_categoria = categoria.id
                 GROUP BY peliculas.id';

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        while($pelicula = $PDOStatement->fetch()){
            $catalogo[] = $this->mapear($pelicula);
        }

        return $catalogo;
} 

    // Catalogo_x_id
    public function catalogoPorId($id){
        $peliculas = $this->catalogoCompleto();
        
        foreach ($peliculas as $producto) {
            if($producto->id == $id){
                return $producto;
            }
        }
        return[];
    }

    // Catalogo_x_personaje
    public function catalogoCategoria(int $categoria_id) :array
    {
        $categorias = [];
        $conexion = ( new Conexion() )->getConexion();
        $query = "SELECT peliculas.*, GROUP_CONCAT(pelicula_categoria.id_categoria) AS
                 categorias_secundarias FROM peliculas
                 LEFT JOIN pelicula_categoria ON peliculas.id = pelicula_categoria.id_pelicula
                --  JOIN categoria ON pelicula_categoria.id_categoria = categoria.id
                 WHERE categoria_id = $categoria_id GROUP BY peliculas.id ";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        while($pelicula = $PDOStatement->fetch()){
            $categorias[] = $this->mapear($pelicula);
        }

        return $categorias;
    }

    public function catalogoCompletoOrdenado($orden) {
        $catalogo = [];
        $conexion = Conexion::getConexion();
        $query = 'SELECT peliculas.*, GROUP_CONCAT(pelicula_categoria.id_categoria) AS
                 categorias_secundarias FROM peliculas
                 LEFT JOIN pelicula_categoria ON peliculas.id = pelicula_categoria.id_pelicula
                 GROUP BY peliculas.id
                 ORDER BY precio ' . ($orden === 'desc' ? 'DESC' : 'ASC');

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        while($pelicula = $PDOStatement->fetch()) {
            $catalogo[] = $this->mapear($pelicula);
        }

        return $catalogo;
    }


    public function categoriaMayuscula($Categoria){
        $categoriaConMayuscula = ucfirst($Categoria);
        return $categoriaConMayuscula;
    }

    public function directorMayuscula($director){
        $directorConMayuscula = ucfirst($director);
        return $directorConMayuscula;
    }

    public function nombreMayuscula($nombre){
        $nombreConMayuscula = ucwords($nombre);
        return $nombreConMayuscula;
    }

    
    public function recortarDescripcion($texto){
            $arrayTexto = explode(" ", $texto);//al devolver un array indexado, sus claves son numericas y sirve para acortar la descripcion
            $textoAcortado  = [];
            foreach ($arrayTexto as $key => $value) {
                if ($key < 20) {
                    $textoAcortado []= $value;
                }else{
                    break;
                }
            }
            return implode(" ", $textoAcortado).'...';
    }

    public function add($nombre, $categoria_id, $director_id, $trailer, $sinopsis, $portada, $precio): int
    {
            try {
                $conexion = Conexion::getConexion();
                $query = "INSERT INTO `peliculas` (`id`, `nombre`, `categoria_id`, `director_id`, `trailer`, `sinopsis`, `img`, `precio`) VALUES (NULL, :nombre, :categoria_id, :director_id, :trailer, :sinopsis, :portada, :precio)";
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute([
                    'nombre' => htmlspecialchars($nombre),
                    'categoria_id' => htmlspecialchars($categoria_id),
                    'director_id' => htmlspecialchars($director_id),
                    'trailer' => htmlspecialchars($trailer),
                    'sinopsis' => htmlspecialchars($sinopsis),
                    'portada' => htmlspecialchars($portada),
                    'precio' => htmlspecialchars($precio),
                ]);
                return $conexion->lastInsertId();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
    }

    public function delete(){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM peliculas WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "id" => htmlspecialchars($this->id)
        ]);
    }

    public function edit($nombre, $categoria_id, $director_id, $trailer, $sinopsis, $precio, $id){
        $conexion = Conexion::getConexion();
        $query = "UPDATE `peliculas` SET `nombre` = :nombre, `categoria_id` = :categoria_id, `director_id` = :director_id, `trailer` = :trailer, `sinopsis` = :sinopsis, `precio` = :precio WHERE `peliculas`.`id` = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre' => htmlspecialchars($nombre),
            'categoria_id' => htmlspecialchars($categoria_id),
            'trailer' => htmlspecialchars($trailer),
            'sinopsis' => htmlspecialchars($sinopsis),
            'director_id' => htmlspecialchars($director_id),
            'precio' => htmlspecialchars($precio),
            "id" => htmlspecialchars($id)
        ]);
    }

    public function reemplazarImagen($portada, $id){
        $conexion = Conexion::getConexion();
        $query = "UPDATE peliculas SET img=:portada WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "portada" => $portada,
            "id" => $id
        ]);
    }

    public function add_categorias_secundarias($id_pelicula, $id_categoria){
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO `pelicula_categoria` (`id`, `id_pelicula`, `id_categoria`) VALUES (NULL, :id_pelicula, :id_categoria)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "id_pelicula" => $id_pelicula,
            "id_categoria" => $id_categoria
        ]);
    }

    public function delete_categorias_secundarias($id){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM pelicula_categoria WHERE id_pelicula = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "id" => $id,
        ]);
    }





        //Get - Sirven para obtener el valor del atributo
        //Set - Sirven para cambiar el valor del atributo
 
    public function getId()
    {
        return $this->id;
    }

    public function getImagen()
    {
        return $this->img;
    }
 
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDirector_id()
    {
        // $director = (new Director())->catalogodirector($this->director_id);
        return $this->director->getNombre();
    }
 
    public function getCategoria_id()
    {
        // $categoria = (new Categoria())->catalogoCategoria($this->categoria_id);
        return $this->categoria->getNombre();
    }
 
    public function getSinopsis()
    {
        return $this->sinopsis;
    }

    public function getPrecio()
    {
        return $this->precio;
    }
    public function getTrailer()
    {
        return $this->trailer;
    }


    public function getCategoriasSecundarias()
    {
        return $this->categorias_secundarias_ids;
    }
    public function setCategoriasSecundarias($categorias_secundarias)
    {
        $this->categorias_secundarias = $categorias_secundarias;

        return $this;
    }
    }