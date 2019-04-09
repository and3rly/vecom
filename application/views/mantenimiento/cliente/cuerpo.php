<div class="panel panel-default">
	<div class="panel-body">
		<h4>Clientes
			<div class="pull-right">
				<button 
					class="btn btn-sm btn-info" 
					onclick="abrirPagina({
							tipo: 5,
							div: 'contenidoManteCliente'})">

					<i class="fa fa-plus"></i> Nuevo
				</button>
				
			</div>
		</h3>
	
		<div id="contenidoManteCliente"></div>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">NIT</th>
					<th scope="col">Dirección</th>	
					<th scope="col">Teléfono</th>
					<th scope="col">Correo</th>	
					<th scope="col">Tipo cliente</th>
					<th scope="col">Empresa</th>
					<th scope="col">Aplica descuento</th>
					<th scope="col">Monto descuento</th>
					<th scope="col">Aplica IVA</th>
					<th scope="col">Activo</th>
					<th scope="col">Opciones</th>
				</tr>
			</thead>
			<tbody id="ListaManteCliente"></tbody>
		</table>
	</div>
</div>
