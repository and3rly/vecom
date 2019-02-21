<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>Vecom| Log in</title>
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  	<link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" href="/vips/vtemplate/bower_components/font-awesome/css/font-awesome.min.css">
	  <link rel="stylesheet" href="/vips/vtemplate/bower_components/Ionicons/css/ionicons.min.css">
  	<link rel="stylesheet" href="/vips/vtemplate/dist/css/AdminLTE.min.css">
  	<link rel="stylesheet" href="/vips/vtemplate/plugins/iCheck/square/blue.css">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition" style="background-color: #E8F5E9;">
	<div class="login-box">
  		<div class="login-logo">
   			<a href="javascript:;"><b>Vecom</b></a>
  		</div>
  
  		<div class="login-box-body">
   			<p class="login-box-msg">Inicia sesión</p>

    		<form action="<?php echo $accion; ?>" method="post" id="FLogin" onsubmit="return IniciarSesion(this)">
      			<div class="form-group has-feedback">
        			<input type="text" class="form-control" placeholder="Usuario" name="usuario">
        			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
     			</div>

      			<div class="form-group has-feedback">
        			<input type="password" class="form-control" placeholder="Contraseña" id="tpassword" name="password">
        			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
      			</div>
				
				<div id="show_error" class="text-danger"></div>
      			<div class="form-group has-feedback">
      				<div class="checkbox">
        				<label><input type="checkbox" id="view_icheck"> Mostrar contraseña</label>
      				</div>

			        	<button type="submit" class="btn btn-primary btn-block btn-success ">Iniciar</button>

      			</div>
   			</form>
  		</div>
	</div>

	<script src="/vips/vtemplate/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="/vips/vtemplate/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="/vips/vtemplate/plugins/iCheck/icheck.min.js"></script>
	<?php echo script_tag("public/js/sesion.js", true); ?>

</body>
</html>