<?php if (isset($resultado) && $resultado): ?>
	<?php foreach ($resultado as $key => $row): ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $row->nombre; ?></td>
			<td><?php echo $row->identificacion; ?></td>
			<td><?php echo $row->telefono; ?></td>
			<td><?php echo $row->correo; ?></td>		
			<td><?php echo $row->direccion; ?></td>
			<td><?php echo $row->nempresa; ?></td>
			<td><?php echo $row->nrol; ?></td>
			<td>
				<button 
					class="btn btn-xs btn-info" 
					onclick="abrirPagina({
						div: 'contenidoManteUsuario',
						registro: <?php echo $row->usuario ?>,
						tipo: 1,
						ccarga : 1
					})"	>
					<i class="glyphicon glyphicon-pencil" ></i>
				</button>

				<button
					class="btn btn-xs btn-danger"
					onclick="anularUsuario(<?php echo $row->usuario ?>)">
					<i class="glyphicon glyphicon-trash" ></i>	
				</button>
			</td>
		</tr>
	<?php endforeach ?>
<?php endif ?>