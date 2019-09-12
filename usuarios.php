<?php 
	include '../conectar.php';

	$conectar = new Conectar();
	$pdo = $conectar->conexion();
	
	$request_method = $_SERVER['REQUEST_METHOD'];
	switch ($request_method) {
		case 'GET':
		//mostrar uno o todos los usuarios
			if(isset($_REQUEST['id']))
	 			{
	 			$usuarios = mostrarUsuario($pdo);
				print_r($usuarios);}	 		
			else{
	 			$usuarios = mostrarUsuarios($pdo);
				print_r($usuarios);}
			break;
		case 'POST':
			insertarUsuario($pdo);
			break;
		case 'PUT':
			actualizarUsuario($pdo);
			break;
		case 'del':
			eliminarUsuario($pdo);
			break;
		default:
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}
	function mostrarUsuarios($pdo){
		$stmt = $pdo->prepare("SELECT * FROM usuarios");
		$stmt->execute();
		$datos = Array();
		while($result= $stmt->fetch(PDO::FETCH_ASSOC)){
			$datos[] = $result;	
		}
		return json_encode($datos);
	}

	function mostrarUsuario($pdo){
		$id=$_REQUEST['id'];
		$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id='$id'");
		$stmt->execute();
		$datos = Array();
		while($result= $stmt->fetch(PDO::FETCH_ASSOC)){
			$datos[] = $result;	
		}
		return json_encode($datos);
	}
	
	function insertarUsuario($pdo){
		$stmt = $pdo->prepare("INSERT INTO usuarios(nombre, edad) VALUES (?,?)");
		$stmt->execute(array($_REQUEST['nombre'],$_REQUEST['edad']));
	}

	function eliminarUsuario($pdo){
		$datos =json_decode(file_get_contents("php://input"),true);
		$stmt = $pdo->prepare("DELETE FROM usuarios WHERE id=".$datos['idEliminar']);
		$stmt->execute();
	}

	function actualizarUsuario($pdo){
		$datos =json_decode(file_get_contents("php://input"),true);
		$stmt = $pdo->prepare("UPDATE usuarios SET nombre=?, edad=? WHERE id=".$datos['idActualizar']);
		$stmt->execute(array($datos['nombreActualizar'],$datos['edadActualizar']));
	}
	
	$pdo=null;
?>