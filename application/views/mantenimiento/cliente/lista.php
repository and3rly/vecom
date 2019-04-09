<?php if (isset($resultado) && $resultado): ?>
	<?php foreach ($resultado as $key => $row): ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $row->nombre; ?></td>
			<td><?php echo $row->nit; ?></td>
			<td><?php echo $row->direccion; ?></td>
			<td><?php echo $row->telefono; ?></td>
			<td><?php echo $row->correo; ?></td>	
			<td><?php echo $row->cliente_tipo; ?></td>		
			<td><?php echo $row->empresa; ?></td>
			<td><?php echo $row->aplica_descuento; ?></td>	
			<td><?php echo $row->monto_descuento; ?></td>
			<td><?php echo $row->aplica_iva; ?></td>
			<td><?php echo $row->activo; ?></td>			
			<td>
				<button 
					class="btn btn-xs btn-info" 
					onclick="abrirPagina({
						div: 'contenidoManteCliente',
						registro: <?php echo $row->cliente ?>,
						tipo: 5,
						ccarga : 1
					})"	>
					<i class="glyphicon glyphicon-pencil" ></i>
				</button>

				<button
					class="btn btn-xs btn-danger"
					onclick="anularCliente(<?php echo $row->cliente ?>)">
					<i class="glyphicon glyphicon-trash" ></i>	
				</button>
			</td>
		</tr>
	<?php endforeach ?>
<?php endif ?>