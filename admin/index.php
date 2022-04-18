<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>Sistema de Historias Clinicas y Registro de Pacientes - Hospital & Clinica</title>
		<meta charset = "utf-8" />
		<link rel = "shortcut icon" href = "../images/logo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
	<!-- jQuery & JS files -->	<?php include_once("../tpl/common_js_ventas.php"); ?> <script src="../js/script.js"></script>  </head>
<body>
	<div class = "navbar navbar-default">
		<img src = "../images/logo.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">Sistema de Historias Clinicas y Registro de Pacientes - Hospital & Clinica</label>
	</div>
	<div id = "top" class = "login">
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<center><h1 class = "panel-title">Administrador</a></h1></center>
			</div>
			<div class = "panel-body">
				<form enctype = "multipart/form-data" action = "login.php" role = "form" method = "POST">
					<div class = "form-group">
						<label for = "username">Usuario</label>
						<input class = "form-control" name = "username" placeholder = "Usuario" type = "text" required = "required" >
					</div>
					<div class = "form-group">
						<label for = "password">Contraseña</label>
						<input class = "form-control" name = "password" placeholder = "Contraseña" type = "password" required = "required" >
					</div>
					<div class = "form-group">
						<button class = "btn btn-block btn-success"  name = "login"><span class = "glyphicon glyphicon-log-in"></span> Iniciar Sesión</label>
					</div>
				</form>
			</div>
		</div>	
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Sistema de Historias Clinicas y Registro de Pacientes - Hospital & Clinica 2018 - <a href="http://platea21.blogspot.com/">Platea21</a></label>
	</div>
</body>
<?php
	include("script.php");
?>
<script type = "text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>
</html>