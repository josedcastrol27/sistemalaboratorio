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
			$q = $conn->query("SELECT * FROM `hematology` NATURAL JOIN `itr` WHERE `hem_id` = '$_GET[hem_id]' && `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
			$f = $q->fetch_array();
		?>
		<div class = "alert alert-info">Basic Information<a class = "btn btn-success" style = "float:right; margin-top:-7px;" href = "hematology_record.php?itr_no=<?php echo $f['itr_no']?>"><span class = "glyphicon glyphicon-hand-right"></span> VOLVER</a></div>
				<div style = "width:30%; float:left;">
						<label style = "font-size:18px;">Nombre</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['firstname']." ".$f['middlename'].". ".$f['lastname']?></label>
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
					<div style = "width:10%; float:left;">
						<label style = "font-size:18px;">BP</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['BP']?></label>
					</div>
					<div style = "float:left; width:40%;">
						<label style = "font-size:18px;">Direccion/label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>				
					</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;" />
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Date Requested:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo date("m/d/Y", strtotime($f['date_requested']))?></label>
				</div>
				<div style = "float:left; width:30%;">
					<label style = "font-size:18px;">Requested By:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['requested_by']?></label>
				</div>
				<br />
				<br />
				<br />
				<h4 style = "color:#3C763D;"><b>NORMAL VALUES</b></h4>
				<br />
				<div style = "float:left; width:30%;">	
					<label style = "font-size:18px;">Hemoglobin:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['hemoglobin']?></label>
					<label style = "color:#f00;">g(m 130-180,f 120-160)</label>
				</div>	
				<div style = "float:left; width:30%;">	
					<label style = "font-size:18px;">Hematocrit:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['hematocrit']?></label>
					<label style = "color:#f00;">1/1(m.40-.54,f .37-47)</label>
				</div>
				<br />
				<br style = "clear:both;"/>
				<div style = "float:left; width:30%;">	
					<label style = "font-size:18px;">RBC Count:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['RBC_count']?></label>
					<label style = "color:#f00;">g(m 130-180,f 120-160)</label>	
				</div>
				<div style = "float:left; width:30%;">	
					<label style = "font-size:18px;">WBC Count:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['WBC_count']?></label>
					<label style = "color:#f00;">x10 12/1(4.5-11.0)</label>	
				</div>	
				<br/>
				<br style = "clear:both;"/>
				<h4 style = "color:#3C763D;"><b>DIFFERENT VALUES</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Neutrophil:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['neutrophil']?></label>
					<label style = "color:#f00;">(55-65)</label>
				</div>	
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Segmenters:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['segmenters']?></label>
				</div>	
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Stabs:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['stabs']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Lymphocytes:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['lymphocytes']?></label>
					<label style = "color:#f00;">(25-35)</label>
				</div>	
				<br />
				<br style = "clear:both;" />
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Monocyte:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['monocyte']?></label>
					<label style = "color:#f00;">(4-8)</label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Eosinophil:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['eosinophil']?></label>
					<label style = "color:#f00;">(1-3)</label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Basophil:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['basophil']?></label>
					<label style = "color:#f00;">(0-1)</label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Total:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['total']?></label>
				</div>
				<br />
				<br style = "clear:both;" />
				<h4 style = "color:#3C763D;"><b>COAGULATION PROFILE</b></h4>
				<br />
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Platelet:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['platelet']?></label>
					<label style = "color:#f00;">x10g/1(160-450)</label>
				</div>	
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Bleeding Time:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['bleeding_time']?></label>
					<label style = "color:#f00;">(1-5)mins</label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Clotting Time:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['clotting_time']?></label>
					<label style = "color:#f00;">(3-5)mins</label>
				</div>	
				<br />
				<br style = "clear:both;" />
				<h4 style = "color:#3C763D;"><b>BLOOD TYPE</b></h4>
				<br />
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">ABO Group:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['ABO_group']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Rh Group:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['Rh_group']?></label>
				</div>
				<br />
				<br style = "clear:both;"/>
				<div>
					<h4><b>Observaciones:</b></h4>
					<div class = "text-muted" style = "word-wrap:break-word; font-size:18px;">
						<?php echo $f['remarks']?>
					</div>
				</div>
				<br />
				<div style = "float:left; width:40%;">
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