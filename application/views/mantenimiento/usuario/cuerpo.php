<div class="panel panel-default">
	<div class="panel-body">
		<h4>Empleados
			<div class="pull-right">
				<button 
					class="btn btn-sm btn-info" 
					onclick="abrirPagina({
							tipo: 1,
							div: 'contenidoManteUsuario'})">

					<i class="fa fa-plus"></i> Nuevo
				</button>
				
			</div>
		</h3>
	
		<div id="contenidoManteUsuario"></div>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Identificación</th>
					<th scope="col">Teléfono</th>
					<th scope="col">Correo</th>	
					<th scope="col">Dirección</th>
					<th scope="col">Empresa</th>
					<th scope="col">Rol</th>
					<th scope="col">Opciones</th>
				</tr>
			</thead>
			<tbody id="ListaManteUsuario"></tbody>
		</table>
	</div>
</div>
	