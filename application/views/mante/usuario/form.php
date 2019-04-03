<br>
<div class="box box-success">
	<div class="box-header with-border">
  		<h3 class="box-title">
  			<i class="fa fa-user"></i> Registro de Empleados
  		</h3>
  		<button type="button" class="close pull-right" data-dismiss="modal" onclick="cerrarPestania({ocultar:true, odiv:'contenidoManteUsuario'})">&times;</button>
	</div>

<div class="box-body">
   	<?php echo $form->open_form; ?>
		<div class="form-group form-group-sm">
				<?php echo $form->label_nombre; ?>
			<div class="col-sm-4"><?php echo $form->input_nombre; ?></div>
			
			<?php echo $form->label_correo; ?>
			<div class="col-sm-4"><?php echo $form->input_correo; ?> </div>
		</div>

		<div class="form-group form-group-sm">
			<?php echo $form->label_alias; ?>
			<div class="col-sm-4"><?php echo $form->input_alias; ?> </div>
			
			<?php echo $form->label_contrasenia; ?>
			<div class="col-sm-4"><?php echo $form->input_contrasenia; ?> </div>
		</div>

		<div class="form-group form-group-sm">
			<?php echo $form->label_identificacion ?>
			<div class="col-sm-4"><?php echo $form->input_identificacion; ?> </div>
			
			<?php echo $form->label_telefono; ?>
			<div class="col-sm-4"><?php echo $form->input_telefono; ?> </div>
			
		</div>

		<div class="form-group form-group-sm">
			<?php echo $form->label_direccion; ?>
			<div class="col-sm-4"><?php echo $form->input_direccion; ?> </div>
			
			<?php echo $form->label_rol; ?>
			<div class="col-sm-4"><?php echo $form->select_lista; ?></div>
		</div>
		
		<div class="form-group form-group-sm">
			<?php echo $form->label_jefe; ?>
			<div class="col-sm-4"><?php echo $form->input_jefe; ?>  </div> 
		
			<?php echo $form->label_subjefe; ?>
			<div class="col-sm-4"><?php echo $form->input_subjefe; ?></div>
			
		</div>

		<div class="form-group form-group-sm">
			<?php echo $form->label_empresa; ?>
			<div class="col-sm-4"><?php echo $form->select_empresa; ?></div>

			<div class="col-sm-offset-2 col-sm-4 text-right">
				<?php echo $form->boton_submit ?>
			</div>
		</div>
	<?php echo $form->close_form; ?>
  </div>
</div>