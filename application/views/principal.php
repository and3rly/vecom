<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Vips | Vecom</title>

  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="/vips/vtemplate/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="/vips/vtemplate/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/vips/vtemplate/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="/vips/vtemplate/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="/vips/vtemplate/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet"
		  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	<?php echo link_tag("public/css/animate.css") ?>
</head>

<body class="hold-transition skin-green	sidebar-mini">
	<div class="wrapper">
  		<header class="main-header">

			<a href="javascript:;" class="logo">
				<span class="logo-mini">VC</span>
				<span class="logo-lg">Vecom</span>
			</a>

			<nav class="navbar navbar-static-top" role="navigation">
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			  		<span class="sr-only">Toggle navigation</span>
				</a>
		
				<div class="navbar-custom-menu"></div>
			</nav>
		</header>

		<aside class="main-sidebar">
			<section class="sidebar">
				<?php $this->load->view('menu'); ?>
			</section>
		</aside>

		<div class="content-wrapper">
			<?php if (isset($titulo)): ?>
				<section class="content-header">
					<h1><?php echo $titulo ?></h1>
				</section>
			<?php endif ?>

			<section class="content container-fluid">
				<?php if (isset($vista)): ?>
					<?php $this->load->view($vista); ?>
				<?php endif ?>
			</section>
		</div>

		<!-- <footer class="main-footer">
			<div class="pull-right hidden-xs">
				Anything you want
			</div>
			<strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
		</footer> -->
  	</div>

	<script src="/vips/vtemplate/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="/vips/vtemplate/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="/vips/vtemplate/dist/js/adminlte.min.js"></script>

	<?php echo script_tag("public/components/notify/bootstrap-notify.min.js"); ?>
	<?php echo script_tag("public/js/inicio.js", true); ?>

	<?php 
	if (isset($scripts)) {
		foreach ($scripts as $key => $row) {
			if ( is_object($row) ) {
	        	echo script_tag($row->ruta, $row->imp);
	      	} else {
	        	echo script_tag($row);
	      	}
		}
	}
	?>

</body>
</html>