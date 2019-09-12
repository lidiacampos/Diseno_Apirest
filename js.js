document.getElementById('buscarUno').onclick=function(){
	cargarUno();
}

document.getElementById('buscarTodos').onclick=function(){
	cargarTodos();
}

document.getElementById('insertar').onclick=function(){
	insertarUsuario();
}

document.getElementById('eliminar').onclick=function(){
	eliminarUsuario();
}

document.getElementById('actualizar').onclick=function(){
	actualizarUsuario();
}



function cargarUno(){
	
	var idUsuario = document.getElementById('id').value;
	if(idUsuario != ''){
		fetch('app/usuarios/' + idUsuario)
		.then(function(response){ //.then genera una promesa
			console.log(response.status) //consulta el estado de la respuesta, el estado 200 es éxito
			return response.json();//devolvemos la respuesta
		}).then(function(datos){
			console.log(datos);
	
			var tabla = document.getElementById('tabla'); 
			tabla.innerHTML =''; 
			for(var i =0; i < datos.length; i++){
				
					var row = tabla.insertRow(i); 
					var id = row.insertCell(0);
					var nombre = row.insertCell(1);
					var edad = row.insertCell(2);
	
					id.innerHTML = datos[i].id;
					nombre.innerHTML = datos[i].nombre;
					edad.innerHTML = datos[i].edad;

				tabla.appendChild(row);
			}
		});
	} else{
		var texto = document.getElementById('texto'); 
			texto.innerHTML ='<small>Ingresa un ID para mostrar al usuario en la Tabla</small>';
	}
}

function cargarTodos(){
	fetch('app/usuarios') //fetch peticion tipo GET a json externo 
	.then(function(response){ //.then genera una promesa
		console.log(response.status) //consulta el estado de la respuesta, el estado 200 es éxito
		return response.json();//devolvemos la respuesta
	}).then(function(datos){
		console.log(datos);

		var tabla = document.getElementById('tabla'); 
		tabla.innerHTML =''; 
		for(var i =0; i < datos.length; i++){

			var row = tabla.insertRow(i); 
			var id = row.insertCell(0);
			var nombre = row.insertCell(1);
			var edad = row.insertCell(2);
			
			
			id.innerHTML = datos[i].id;
			nombre.innerHTML = datos[i].nombre;
			edad.innerHTML = datos[i].edad;

			tabla.appendChild(row);
		}
	});
}

function insertarUsuario(){
	var objeto = new FormData(); // Recoge los valores y los lleva a app/usuarios.php
	objeto.append('nombre', document.getElementById('nombre').value);
	objeto.append('edad', document.getElementById('edad').value);

	fetch('app/usuarios.php' , {method: 'post', body: objeto}) //fetch peticion lanzada a la ruta y esperamos respuesta, 
	//añadiendo un nuevo argumento tipo JSON a fetch cambia el método de envío porque por defecto es GET.
	.then(function(response){ //.then genera una promesa y captura la respuesta. 
		console.log(response.status) //consulta el estado de la respuesta, el estado 200 es éxito
		if(response.status = 200){
			console.log('Datos enviados');
		}
	});
}

function eliminarUsuario(){
	fetch('app/usuarios/',
		{headers: {'Accept': 'application/json', 'Content-Type': 'application/json'},
		body: JSON.stringify({idEliminar: document.getElementById('idEliminar').value}),
		method: 'del'
	}).then(function(response){
		console.log(status);
	});
}
function actualizarUsuario(){
	fetch('app/usuarios/',
		{headers: {'Accept': 'application/json', 'Content-Type': 'application/json'},
		body: JSON.stringify({idActualizar: document.getElementById('idActualizar').value,
							nombreActualizar: document.getElementById('nombreActualizar').value,
							edadActualizar: document.getElementById('edadActualizar').value}),
		method: 'put'
	}).then(function(response){
		console.log(status);
	});
}