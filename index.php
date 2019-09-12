<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		
		<title> Practica 7. Diseño de una API REST </title>
		
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/css.css">
	</head>
	<body>
		<header>
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>Practica 7. Diseño de una API REST</h1>
				</div>
			</div>
		</header>
		<main class="container">
			<div class="row">
				
				<div class="col-md-6">
					<h2 class="text-danger margen">Buscar usuario por ID</h2>
					<input type="text"  id="id" name="id" class="form-control margen" placeholder="Introduce el ID">
					<div class="text-danger margen" id="texto">
					</div>
					<button id="buscarUno" class="btn btn-danger margen">Mostrar usuario</button>
					<button id="buscarTodos" class="btn btn-danger margen">Mostrar todos los usuarios</button>
					
					<!-- <p class="mt-5"><a href="app/usuarios">Ver todos los usuarios</a></p> -->
				</div>
				<div class="col-md-6">
					<h2 class="text-danger margen">Alta de nuevo usuario</h2>
					<input type="text"  id="nombre" name="nombre" class="form-control margen " placeholder="Introduce el nombre">
					
					<input type="text"  id="edad" name="edad" class="form-control margen" placeholder="Introduce la edad">
					
					<button id="insertar" class="btn btn-danger margen">Alta usuario</button>
					
					
					<!-- <p class="mt-5"><a href="app/usuarios">Ver todos los usuarios</a></p> -->
				</div>
			</div>

			
			<div class="row">
				<div class="col-md-6">
					<h2 class="text-danger margen">Eliminar usuario por ID</h2>
					<input type="text"  id="idEliminar" name="idEliminar" class="form-control margen" placeholder="Introduce el ID">
					<div class="text-danger margen" id="texto2">
					</div>
					<button id="eliminar" class="btn btn-danger margen">Eliminar usuario</button>
					
					<!-- <p class="mt-5"><a href="app/usuarios">Ver todos los usuarios</a></p> -->
				</div>
				<div class="col-md-6">
					<h2 class="text-danger margen">Actualizar usuario</h2>
					<input type="text"  id="idActualizar" name="idActualizar" class="form-control margen" placeholder="Introduce el ID">
					<input type="text"  id="nombreActualizar" name="nombreActualizar" class="form-control margen" placeholder="Introduce nuevo nombre">
					
					<input type="text"  id="edadActualizar" name="edadActualizar" class="form-control margen" placeholder="Introduce la nueva edad">
					
					<button id="actualizar" class="btn btn-danger margen">Actualizar usuario</button>
					
					<!-- <p class="mt-5"><a href="app/usuarios">Ver todos los usuarios</a></p> -->
				</div>
			</div>

			<div class="row">
				<h2 class="text-danger margen">Tabla de usuarios</h2>
				<table class="table table-hover table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>NOMBRE</th>
							<th>EDAD</th>
						</tr>
					</thead>
					<tbody id="tabla">
					</tbody>
				</table>
			</div>
			
		</main>
		<footer>
		</footer>
		<script src="js/js.js"></script>
		
	</body>
</html>