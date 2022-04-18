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
		<script src = "../js/jquery.min.js"></script>
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
						<a class = "me" href = "logout.php">Cerrar Sesión</a>
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
		<div style = "display:none;" id = "com" class = "panel panel-success">	
			<div class = "panel-heading">
				<label>PATIENT / MOLESTIAS</label>
				<button class = "btn btn-danger" id = "hide_com" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-remove"></span>CERRAR</button>
			</div>
			<div class = "panel-body">
			<?php
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
				<form method = "POST" enctype = "multipart/form-data">
					<div style = "float:left;" class = "form-inline">
						<label for = "itr_no">HISTORIA CLINICA Nro:</label>
						<input class = "form-control" value = "<?php echo $f['itr_no'] ?>" disabled = "disabled" size = "3" type = "number" name = "itr_no">
					</div>
					<div style = "float:right;" class = "form-inline">
						<label for = "family_no">Cantidad Familia</label>
						<input class = "form-control" size = "3" value = "
							<?php 
								if($f['family_no'] == "0"){
									echo "";
								}else{
									echo $f['family_no'];
								}	
							?>" disabled = "disabled" type = "number" name = "family_no">
					</div>
					<br />
					<br />
					<br />
					<div class = "form-inline">
						<label for = "firstname">Nombre:</label>
						<input class = "form-control" name = "firstname" value = "<?php echo $f['firstname']?>" disabled = "disabled" type = "text" required = "required">
						&nbsp;&nbsp;&nbsp;
						<label for = "middlename">Segundo Nombre:</label>
						<input class = "form-control" name = "middlename" value = "<?php echo $f['middlename']?>" disabled = "disabled" type = "text" required = "required">
						&nbsp;&nbsp;&nbsp;
						<label for = "lastname">Apellidos:</label>
						<input class = "form-control" name = "lastname" value = "<?php echo $f['lastname']?>" disabled = "disabled" type = "text" required = "required">
					</div>
					<br />
					<div class = "form-group">
						<label>Molestias:</label>
						<textarea style = "resize:none;" name = "complaints" class = "form-control"></textarea>
						<br />
						<label>Observaciones:</label>
						<textarea style = "resize:none;" name = "remarks" class = "form-control"></textarea>
						<br />
						<label>Seccion:</label>
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
					<br />
					<div class = "form-inline">
						<button class = "btn btn-primary" name = "save_complaints"><span class = "glyphicon glyphicon-save"></span> GUARDAR</button>
					</div>
					<?php require_once 'add_complaints.php' ?>
				</form>
			</div>	
		</div>	
		<?php
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$query = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error());
			$fetch = $query->fetch_array();
		?>
		<div class = "panel panel-info">
			<div class = "panel-heading">
				<label style = "font-size:16px;">COMPLAINTS / <?php echo $fetch['firstname']." ".$fetch['lastname']?></label>
				<a style = "float:right; margin-top:-5px;" id = "add_complaints" class = "btn btn-success" href = "patient.php"><span class = "glyphicon glyphicon-hand-right"></span> VOLVER</a>
			</div>
		</div>
		<button class = "btn btn-primary" id = "show_com"><i class = "glyphicon glyphicon-plus">AGREGAR</i></button>
		<div class = "panel-body">
			<?php
				$q1 = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[id]'") or die(mysqli_error());
				$f1 = $q1->fetch_array();
				$q = $conn->query("SELECT * FROM `complaints` WHERE `itr_no` = '$_GET[id]' ORDER BY `status` DESC") or die(mysqli_error());	
					while($f = $q->fetch_array()){
						if($f['status'] == "Done"){
							echo "<label style = 'color:#3399f3;'>".$f['section']."</label>"."<textarea  style = 'resize:none;' disabled = 'disabled' class = 'form-control'>".$f['remark']."</textarea>".$f['date']."<label style = 'float:right; color:red;'>Done</label><br /><br /><hr style = 'border:1px solid #eee;' />";
						}
						if($f['status'] == "Pending"){
							echo "<label style = 'color:#3399f3;'>".$f['section']."</label>"."<textarea  style = 'resize:none;' disabled = 'disabled' class = 'form-control'>".$f['remark']."</textarea>".$f['date']."<br /><br /><hr style = 'border:1px solid #eee;' />";
						}
					}
				?>
		</div>
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Sistema de Historias Clinicas y Registro de Pacientes - Hospital & Clinica 2018 - <a href="http://platea21.blogspot.com/">Platea21</a></label>
	</div>
<?php include("script.php"); ?>
</body>
</html>