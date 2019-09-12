<?php

class Conectar{

	private $server;
	private $db;
	private $charset;
	private $usuario;
	private $password;

	public function __construct(){
		$this->server = "localhost";
		$this->db = "apiejemplo";
		$this->charset = "utf8";
		$this->usuario = "root";
		$this->password = "";
	}

	public function conexion(){
		return new PDO("mysql:host={$this->server};dbname={$this->db};charset={$this->charset}", $this->usuario, $this->password);
		
	}

}

?>