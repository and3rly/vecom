<ul class="sidebar-menu" data-widget="tree">
	<li class="header">Menú Vips</li>

	<li><a href=""><i class="fa fa-user"></i> <span>Venta</span></a></li>
	
	<li class="treeview">
		<a href="#"><i class="glyphicon glyphicon-wrench"></i> <span>Mantenimiento</span>
		</a>
		<ul class="treeview-menu">
			<li class="treeview">
			<li><a href="<?php echo base_url('index.php/mantenimiento/usuario') ?>"><i class="fa fa-user"></i> <span>Usuarios</span></a></li>
			<li><a href="<?php echo base_url('index.php/mantenimiento/empresa') ?>"><i class="glyphicon glyphicon-home"></i> <span>Empresas</span></a></li>			
			<li><a href="<?php echo base_url('index.php/mantenimiento/cliente') ?>"><i class="glyphicon glyphicon-home"></i> <span>Clientes</span></a></li>
		</ul>
	</li>
	


	<li class="treeview">
		<a href="#"><i class="fa fa-cog"></i> <span>Configuración</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li class="treeview">
				<a href="#">Cuenta</a> </li>
			<li><a href="<?php echo base_url("index.php/sesion/cerrar_sesion") ?>">Cerrar Sesión</a></li>
		</ul>
	</li>
</ul>