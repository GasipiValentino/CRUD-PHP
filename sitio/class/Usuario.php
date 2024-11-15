<?php

class Usuario{
    protected $id;
    protected $usuario;
	protected $password;	
	protected $foto_perfil;
	protected $roles; 

    /**
     * Get the value of usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     */
    public function setUsuario($usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

	/**
	 * Get the value of usuario
	 */
	public function getNombreUsuario()
	{
		return $this->usuario;
	}

	/**
	 * Set the value of usuario
	 */
	public function setNombreUsuario($usuario): self
	{
		$this->usuario = $usuario;

		return $this;
	}

	/**
	 * Get the value of password
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Set the value of password
	 */
	public function setPassword($password): self
	{
		$this->password = $password;

		return $this;
	}

	/**
	 * Get the value of roles
	 */
	public function getRoles()
	{
		return $this->roles;
	}

	/**
	 * Set the value of roles
	 */
	public function setRoles($roles): self
	{
		$this->roles = $roles;

		return $this;
	}

	public function getId(){
		return $this->id;
	}
		/**
	 * Get the value of foto_perfil
	 */ 
	public function getFoto_perfil()
	{
		return $this->foto_perfil;
	}

	/**
	 * Set the value of foto_perfil
	 *
	 * @return  self
	 */ 
	public function setFoto_perfil($foto_perfil)
	{
		$this->foto_perfil = $foto_perfil;

		return $this;
	}

	// public function usuario_x_email(string $email){
	// 	$conexion = Conexion::getConexion();
	// 	$query = "SELECT * FROM usuarios WHERE email = :email";
	// 	$PDOStatement = $conexion->prepare($query);
	// 	$PDOStatement->setFetchMode(PDO::FETCH_CLASS,self::class);
	// 	$PDOStatement->execute([
	// 		"email" => $email
	// 	]);
	// 	$result = $PDOStatement->fetch();
	// 	return $result;
	// }

	public function usuario_x_usuario(string $usuario){
		$conexion = Conexion::getConexion();
		$query = "SELECT * FROM usuarios WHERE usuario = :usuario";
		$PDOStatement = $conexion->prepare($query);
		$PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
		$PDOStatement->execute([
			"usuario" => $usuario
		]);
		$result = $PDOStatement->fetch();
		return $result;
	}

	public static function getAllUsuarios() {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM usuarios";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();
        return $PDOStatement->fetchAll();
    }

	// public function insert(string $email, string $password){
	// 	$conexion = Conexion::getConexion();
	// 	$query = "INSERT INTO usuarios VALUES (NULL, '$email', '', '', '$password', 'usuario')";
	// 	$PDOStatement = $conexion->prepare($query);
	// 	$PDOStatement->execute();
	// }


	public function reemplazarImagen($imagen, $id){
        $conexion = Conexion::getConexion();
        $query = "UPDATE usuario SET imagen = :imagen WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "imagen" => htmlspecialchars($imagen),
            "id" => htmlspecialchars($id)
        ]);
    }


	



	public function insert(string $usuario, string $password, $foto_perfil){
		$conexion = Conexion::getConexion();
		$query = "INSERT INTO usuarios (usuario, password, foto_perfil, roles) VALUES (:usuario, :password, :foto_perfil 'usuario')";
		$PDOStatement = $conexion->prepare($query);
		$PDOStatement->execute([
			"usuario" => $usuario,
			"password" => $password,
			"foto_perfil" => $foto_perfil
		]);
	}

	public function actualizarRol($id, $roles) {
        $conexion = Conexion::getConexion();
        $query = "UPDATE `usuarios` SET `roles` = :roles WHERE `id` = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'roles' => htmlspecialchars($roles),
            'id' => htmlspecialchars($id)
        ]);
    }

    public function getAllRoles() {
		$conexionInstance = new Conexion();
		$conexion = $conexionInstance->getConexion();
		$query = "SELECT DISTINCT roles FROM usuarios ORDER BY roles ASC";
		$PDOStatement = $conexion->prepare($query);
		$PDOStatement->execute();
		return $PDOStatement->fetchAll(PDO::FETCH_COLUMN);
	}
	
	



	public function edit($usuario, $password, $foto_perfil, $id){
        $conexion = Conexion::getConexion();
        $query = "UPDATE `usuarios` SET `usuario` = :usuario, `password` = :password, `foto_perfil` = :foto_perfil, WHERE `usuarios`.`id` = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'usuario' => htmlspecialchars($usuario),
            'password' => htmlspecialchars($password),
            'foto_perfil' => htmlspecialchars($foto_perfil),
            "id" => htmlspecialchars($id)
        ]);
    }

}