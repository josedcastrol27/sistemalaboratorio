<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>Sistema de Laboratorio</title>
		<meta charset = "utf-8" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
	</head>
<body>
	<div class = "navbar navbar-default navtop">
		<label class = "navbar-brand">Sistema de Laboratorio</label>
	</div>
		<div id = "sidelogin">
			<form action = "login.php" enctype = "multipart/form-data" method = "POST" >
				<label class = "lbllogin">POR FAVOR INICIE SESIÓN...</label>
				<br />
				<hr /style = "border:1px dotted #000;">
				<br />
				<div class = "form-group">
					<label for = "username">Usuario</label>
					<input class = "form-control" type = "text" name = "username"  required = "required"/>
				</div>
				<br />
				<div class = "form-group">
					<label for = "password">Contraseña</label>
					<input class = "form-control" type = "password" name = "password" required = "required" />
				</div>
				<br />
				<br />
				<div class = "form-group">
					<button class  = "btn btn-success form-control" type = "submit" name = "login" ><span class = "glyphicon glyphicon-log-in"></span> Iniciar Sesión</label>
				</div>
			</form>
		</div>	
					
	<div id = "footer">
		<label class = "footer-title">&copy; Sistema de Laboratotio  
</body>
<?php
	include("admin/script.php");
?>
</html>