<br>
<div class="box box-success">
	<div class="box-header with-border">
  		<h3 class="box-title">
  			<i class="fa fa-user"></i> Registro de Clientes
  		</h3>
  		<button type="button" class="close pull-right" data-dismiss="modal" onclick="cerrarPestania({ocultar:true, odiv:'contenidoManteCliente'})">&times;</button>
	</div>

<div class="box-body">
   	<?php echo $form->open_form; ?>
		<div class="form-group form-group-sm">
				<?php echo $form->label_nombre; ?>
			<div class="col-sm-4"><?php echo $form->input_nombre; ?></div>
			
			<?php echo $form->label_nit; ?>
			<div class="col-sm-4"><?php echo $form->input_nit; ?> </div>
		</div>

		<div class="form-group form-group-sm">
			<?php echo $form->label_direccion; ?>
			<div class="col-sm-4"><?php echo $form->input_direccion; ?> </div>
			
			<?php echo $form->label_telefono; ?>
			<div class="col-sm-4"><?php echo $form->input_telefono; ?> </div>	
		</form>">

		<div class="form-group form-group-sm">
			<?php echo $form->label_correo; ?>
			<div class="col-sm-4"><?php echo $form->input_correo; ?> </div>
			
			<?php echo $form->label_tipo; ?>
			<div class="col-sm-4"><?php echo $form->select_tipo; ?> </div>
		</div>

		<div class="form-group form-group-sm">			
			<?php echo $form->label_empresa; ?>
			<div class="col-sm-4"><?php echo $form->select_empresa; ?> </div>
			

			<?php echo $form->label_aplica_descuento; ?>
			<div class="col-sm-4"><?php echo $form->input_apdesc;; ?> </div>

		</div>

		<div class="form-group form-group-sm">
			<div id="divmontodescuento" style="display: none;">
				<?php echo $form->label_monto_descuento; ?>
				<div class="col-sm-4"><?php echo $form->input_monto_descuento; ?></div>
			</div>
			
			<?php echo $form->label_iva; ?>
			<div class="col-sm-4"><?php echo $form->input_iva; ?> </div>						
		</div>
		
		<div class="form-group form-group-sm">
			<?php echo $form->label_activo; ?>
			<div class="col-sm-4"><?php echo $form->input_activo; ?></div>
		</div>

	
		<div class="form-group form-group-sm">
			
		
			<div class="col-sm-offset-2 col-sm-4 text-right">
				<?php echo $form->boton_submit ?></div>		
		</div>

	<?php echo $form->close_form; ?>
  </div>
</div>

