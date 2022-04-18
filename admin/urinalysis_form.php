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
		<?php
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$q = $conn->query("SELECT * FROM `urinalysis` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' &&`urinalysis_id` = '$_GET[urinalysis_id]'") or die(mysqli_error());
			$f = $q->fetch_array();
		?>
		<div class = "alert alert-info">Basic Information <a class = "btn btn-success" style = "float:right; margin-top:-7px;" href = "urinalysis_record.php?itr_no=<?php echo $f['itr_no']?>"><span class = "glyphicon glyphicon-hand-right"></span> VOLVER</a></div>
					<div style = "width:30%; float:left;">
						<label style = "font-size:18px;">Nombre</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['firstname']." ".$f['middlename']." ".$f['lastname']?></label>
					</div>
					<div style = "width:10%; float:left;">
						<label style = "font-size:18px;">Edad</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['age']?></label>
					</div>
					<div style = "width:10%; float:left;">
						<label style = "font-size:18px;">Genero</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['gender']?></label>
					</div>
					<div style = "float:left; width:40%;">
						<label style = "font-size:18px;">Direccion/label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>				
					</div>
				<br style = "clear:both;"/>	
				<hr style = "border:1px dotted #d3d3d3;" />
				<div class = "form-inline">
					<label style = "font-size:18px;">Date of Request:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['date_of_request']?></label>
				</div>
				<br />
				<h4 style = "color:#3C763D;"><b>PHYSICAL PROPERTIES</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Color:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['color']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Transparency:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['transparency']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Specific Gravity:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['specific_gravity']?></label>
				</div>
				<br />
				<br style = "clear:both;" />
				<h4 style = "color:#3C763D;"><b>CHEMICAL ANALYSIS</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Ph:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['ph']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Sugar:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['sugar']?></label>
				</div>	
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Protein:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['protein']?></label>
				</div>	
				<br />
				<br style = "clear:both;" />
				<div>
					<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Pregnancy Test:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['pregnancy_test']?></label>
				</div>
				<br />
				<br style = "clear:both;" />
				<h4 style = "color:#3C763D;"><b>MICROSCOPE EXAMINATION</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Pus Cells:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['pus_cells']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">RBC:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['rbc']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Cast:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['cast']?></label>
				</div>
				<br />
				<br style = "clear:both;"/>
				<h4 style = "color:#3C763D;"><b>CRYSTAL</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Urates:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['urates']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Uric Acid:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['uric_acid']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Cal Ox:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['cal_ox']?></label>
				</div>
				<br />
				<br style = "clear:both;"/>
				<h4 style = "color:#3C763D;"><b>OTHERS</b></h4>
				<br />
				<div style = "float:left; width:30%;">	
					<label style = "font-size:18px;">Epith Cells:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['epith_cells']?></label>
				</div>	
				<div style = "float:left; width:30%;">	
					<label style = "font-size:18px;">Mucus Threads:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['mucus_threads']?></label>
				</div>	
				<div style = "float:left; width:30%;">	
					<label style = "font-size:18px;">Others:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['others']?></label>
				</div>
				<br />
				<br style = "clear:both;"/>
				<br style = "clear:both;"/>
				<div style = "float:left; width:30%;">	
					<label style = "font-size:18px;">Pathologist:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['pathologist']?></label>
				</div>
				<div style = "float:left; width:30%;">	
					<label style = "font-size:18px;">Medical Technologist:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['medical_technologist']?></label>
				</div>
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Sistema de Historias Clinicas y Registro de Pacientes - Hospital & Clinica 2018 - <a href="http://platea21.blogspot.com/">Platea21</a></label>
	</div>
	<?php require'script3.php'?>
</body> 
</html>