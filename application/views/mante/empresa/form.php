<br>
<div class="box box-success">
	<div class="box-header with-border">
  		<h3 class="box-title">
  			<i class="fa fa-user"></i> Registro de Empresas
  		</h3>
  		<button type="button" class="close pull-right" data-dismiss="modal" onclick="cerrarPestania({ocultar:true, odiv:'contenidoManteEmpresa'})">&times;</button>
	</div>

<div class="box-body">
   	<?php echo $form->open_form; ?>
		<div class="form-group form-group-sm">
				<?php echo $form->label_nombre; ?>
			<div class="col-sm-4"><?php echo $form->input_nombre; ?></div>
			
			<?php echo $form->label_direccion; ?>
			<div class="col-sm-4"><?php echo $form->input_direccion; ?> </div>
		</div>

		<div class="form-group form-group-sm">
			<?php echo $form->label_telefono; ?>
			<div class="col-sm-4"><?php echo $form->input_telefono; ?> </div>
			
			<?php echo $form->label_representante; ?>
			<div class="col-sm-4"><?php echo $form->input_representante; ?> </div>
		</div>

		<div class="form-group form-group-sm">
			<?php echo $form->label_nit; ?>
			<div class="col-sm-4"><?php echo $form->input_nit;; ?> </div>
			
			<?php echo $form->label_abreviatura; ?>
			<div class="col-sm-4"><?php echo $form->input_abreviatura; ?> </div>
			
		</div>

		<div class="form-group form-group-sm">
			<?php echo $form->label_iva; ?>
			<div class="col-sm-4"><?php echo $form->input_iva; ?> </div>
			
			<?php echo $form->label_logo; ?>
			<div class="col-sm-4"><?php echo $form->input_logo; ?></div>
		</div>
		
		<div class="form-group form-group-sm">
			<?php echo $form->label_pais; ?>
			<div class="col-sm-4"><?php echo $form->select_pais; ?></div>
		
			<?php echo $form->label_moneda; ?>
			<div class="col-sm-4"><?php echo $form->select_moneda; ?></div>
		</div>

	
		<div class="form-group form-group-sm">
			
		
			<div class="col-sm-offset-2 col-sm-4 text-right">
				<?php echo $form->boton_submit ?></div>		
		</div>

	<?php echo $form->close_form; ?>
  </div>
</div>