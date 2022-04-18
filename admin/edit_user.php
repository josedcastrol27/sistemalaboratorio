<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
?>
<html lang = "eng">
	<head>
		<title>Sistema de Historias Clinicas y Registro de Pacientes - Hospital & Clinica</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
	<!-- jQuery & JS files -->	<?php include_once("../tpl/common_js_ventas.php"); ?> <script src="../js/script.js"></script>  </head>
<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "../images/logo.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">Sistema de Historias Clinicas y Registro de Pacientes - Hospital & Clinica</label>
			<?php
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = '$_SESSION[admin_id]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php
							echo $f['firstname']." ".$f['lastname'];
							$conn->close();
						?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Cerrar Sesión</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	<div id = "sidebar">
			<ul id = "menu" class = "nav menu">
				<li><a href = "home.php"><i class = "glyphicon glyphicon-home"></i> Inicio</a></li>
				<li><a href = ""><i class = "glyphicon glyphicon-cog"></i> Cuentas</a>
					<ul>
						<li><a href = "admin.php"><i class = "glyphicon glyphicon-cog"></i> Administrador</a></li>
						<li><a href = "user.php"><i class = "glyphicon glyphicon-cog"></i> Usuarios </a></li>
					</ul>
				</li>
				<li><li><a href = "patient.php"><i class = "glyphicon glyphicon-user"></i> Paciente</a></li></li>
				<li><a href = ""><i class = "glyphicon glyphicon-folder-close"></i> Secciones</a>
					<ul>
						<li><a href = "fecalysis.php"><i class = "glyphicon glyphicon-folder-open"></i> Fecalisis</a></li>
						<li><a href = "maternity.php"><i class = "glyphicon glyphicon-folder-open"></i> Maternidad</a></li>
						<li><a href = "hematology.php"><i class = "glyphicon glyphicon-folder-open"></i> Hematología</a></li>
						<li><a href = "dental.php"><i class = "glyphicon glyphicon-folder-open"></i> Dental</a></li>
						<li><a href = "xray.php"><i class = "glyphicon glyphicon-folder-open"></i> Rayos X</a></li>
						<li><a href = "rehabilitation.php"><i class = "glyphicon glyphicon-folder-open"></i> Rehabilitacion</a></li>
						<li><a href = "sputum.php"><i class = "glyphicon glyphicon-folder-open"></i> Esputo</a></li>
						<li><a href = "urinalysis.php"><i class = "glyphicon glyphicon-folder-open"></i> Análisis de orina</a></li>
					</ul>
				</li>
			</ul>
	</div>
	<div id = "content">
		<br />
		<br />
		<br />
		<div class = "panel panel-success">	
		<?php
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_GET[id]'") or die(mysqli_error());
			$fetch = $query->fetch_array();
		?>
			<div class = "panel-heading">
				<label>AGREGAR USUARIO</label>
				<a href = "user.php" class = "btn btn-sm btn-info" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-hand-right"></span> VOLVER</a>
			</div>
			<div class = "panel-body">
				<form id = "form_user" method = "POST" enctype = "multi-part/form-data">
					<div class = "panel panel-default" style = "width:60%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
						<div class = "form-group">
							<label for = "username">Usuario: </label>
							<input class = "form-control" value = "<?php echo $fetch['username']?>" name = "username" type = "text" required = "required">
						</div>
						<div class = "form-group">	
							<label for = "password">Contraseña: </label>
							<input class = "form-control" name = "password" maxlength = "12" value = "<?php echo $fetch['password']?>" type = "password" required = "required">
						</div>
						<div class = "form-group">
							<label for = "firstname">Nombre: </label>
							<input class = "form-control" type = "text" value = "<?php echo $fetch['firstname']?>" name = "firstname" required = "required">
						</div>
						<div class = "form-group">
							<label for = "middlename">Segundo Nombre: </label>
							<input class = "form-control" type = "text" value = "<?php echo $fetch['middlename']?>" name = "middlename" placeholder = "(Opcional)">
						</div>
						<div class = "form-group">
							<label for = "lastname">Apellidos: </label>
							<input class = "form-control" type = "text" value = "<?php echo $fetch['lastname']?>" name = "lastname" required = "required">
						</div>
						<div class = "form-group">
							<label for = "section">Seccion: </label>
							<select name = "section" class = "form-control" required = "required">
								<option value = "">--Porfavor seleccione una opción--</option>
								<option value = "Dental">Dental</option>
								<option value = "Fecalysis">Fecalysis</option>
								<option value = "Hematology">Hematology</option>
								<option value = "Prenatal">Prenatal</option>
								<option value = "Xray">Rayos X</option>
								<option value = "Rehabilitation">Rehabilitation</option>
								<option value = "Sputum">Sputum</option>
								<option value = "Urinalysis">Urinalysis</option>
								<option value = "Maternity">Maternidad</option>
							</select>
						</div>
							<button class = "btn btn-warning" name = "edit_user" ><span class = "glyphicon glyphicon-edit"></span> GUARDAR</button>
							<br />
					</div>	
					<?php require 'edit_query.php'?>
					</div>
				</form>			
			</div>	
		</div>	
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Sistema de Historias Clinicas y Registro de Pacientes - Hospital & Clinica 2018 - <a href="http://platea21.blogspot.com/">Platea21</a></label>
	</div>
<?php include("script.php"); ?>
<script type = "text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>	
</body>
</html>