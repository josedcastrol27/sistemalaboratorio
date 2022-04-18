<?php
ob_start();
?>
<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
?>
<html lang = "es_ES">
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
						<li><a href = "user.php"><i class = "glyphicon glyphicon-cog"></i> Usuario</a></li>
					</ul>
				</li>
				<li><li><a href = "patient.php"><i class = "glyphicon glyphicon-user"></i> Pacientes</a></li></li>
				<li><a href = ""><i class = "glyphicon glyphicon-folder-close"></i> Secciones</a>
					<ul>
						<li><a href = "fecalysis.php"><i class = "glyphicon glyphicon-folder-open"></i> Fecalisis</a></li>
						<li><a href = "maternity.php"><i class = "glyphicon glyphicon-folder-open"></i> Maternidad</a></li>
						<li><a href = "hematology.php"><i class = "glyphicon glyphicon-folder-open"></i> Hematologia</a></li>
						<li><a href = "dental.php"><i class = "glyphicon glyphicon-folder-open"></i> Dental</a></li>
						<li><a href = "xray.php"><i class = "glyphicon glyphicon-folder-open"></i> Rayos X</a></li>
						<li><a href = "rehabilitation.php"><i class = "glyphicon glyphicon-folder-open"></i> Rehabilitacion</a></li>
						<li><a href = "sputum.php"><i class = "glyphicon glyphicon-folder-open"></i> Esputo</a></li>
						<li><a href = "urinalysis.php"><i class = "glyphicon glyphicon-folder-open"></i> Análisis de Orina</a></li>
					</ul>
				</li>
			</ul>
	</div>
	<div id = "content">
		<br />
		<br />
		<br />
		<div style = "display:none;" id = "add_itr" class = "panel panel-success">	
			<div class = "panel-heading">
				<label>AGREGAR INFORMACION DEL PACIENTE</label>
				<button id = "hide_itr" style = "float:right; margin-top:-4px;" class = "btn btn-sm btn-danger"><span class = "glyphicon glyphicon-remove"></span> CLOSE</button>
			</div>
			<div class = "panel-body">
				<form id = "form_dental" method = "POST" enctype = "multipart/form-data">
					<div style = "float:left;" class = "form-inline">
						<label for = "itr_no">Nro. Historia:</label>
						<input class = "form-control" size = "3" min = "0" type = "number" name = "itr_no">
					</div>
					<div style = "float:right;" class = "form-inline">
						<label for = "family_no">Nro DNI:</label>
						<input class = "form-control" placeholder = "(Optional)" size = "5" type = "text" name = "family_no">
					</div>
					<br />
					<br />
					<br />
					<div class = "form-inline">
						<label for = "firstname">Primer Nombre:</label>
						<input class = "form-control" name = "firstname" type = "text" required = "required">
						&nbsp;&nbsp;&nbsp;
						<label for = "middlename">Segundo Nombre:</label>
						<input class = "form-control" name = "middlename" placeholder = "(Optional)" type = "text">
						&nbsp;&nbsp;&nbsp;
						<label for = "lastname">Apellidos:</label>
						<input class = "form-control" name = "lastname" type = "text" required = "required">
					</div>
					<br />
					<div class = "form-group">
						<label for = "birthdate" style = "float:left;">F. Nacimiento:</label>
						<br style = "clear:both;" />
						<select name = "month" style = "width:15%; float:left;" class = "form-control" required = "required">
							<option value = "">sleccione mes</option>
							<option value = "01">Enero</option>
							<option value = "02">Febrero</option>
							<option value = "03">Marzo</option>
							<option value = "04">Abril</option>
							<option value = "05">Mayo</option>
							<option value = "06">Junio</option>
							<option value = "07">Julio</option>
							<option value = "08">Agosto</option>
							<option value = "09">Septiembre</option>
							<option value = "10">Octubre</option>
							<option value = "11">Noviembre</option>
							<option value = "12">Diciembre</option>
						</select>
						<select name = "day" class = "form-control" style = "width:13%; float:left;" required = "required">
							<option value = "">Dia</option>
							<option value = "01">01</option>
							<option value = "02">02</option>
							<option value = "03">03</option>
							<option value = "04">04</option>
							<option value = "05">05</option>
							<option value = "06">06</option>
							<option value = "07">07</option>
							<option value = "08">08</option>
							<option value = "09">09</option>	
							<?php
								$a = 10;
								while($a <= 31){
									echo "<option value = '".$a."'>".$a++."</option>";
								}
							?>
						</select>
						<select name = "year" class = "form-control" style = "width:13%; float:left;" required = "required">
							<option value = "">Año</option>
							<?php
								$a = date(Y);
								while(1965 <= $a){
									echo "<option value = '".$a."'>".$a--."</option>";
								}
							?>
						</select>
						<br style = "clear:both;"/>
						<br />
						<label for = "phil_health_no">Tratamiento:</label>
						<input name = "phil_health_no" placeholder = "(if any)" class = "form-control" type = "text">
						<br />
						<label for = "address">Direccion:</label>
						<input class = "form-control" name = "address" type = "text" required = "required">
						<br />
						<label for = "age">Edad:</label>
						<input class = "form-control" style = "width:20%;" min = "0" max = "999" name = "age" type = "number">
						<br />
						<label for = "civil_status">Estado Civil:</label>
						<select style = "width:22%;" class = "form-control" name = "civil_status" required = "required">
							<option value = "">--Seleccione--</option>
							<option value = "Single">soltero(a)</option>
							<option value = "Married">Casado(a)</option>
						</select>
						<br />
						<label for = "gender">Genero:</label>
						<select style = "width:22%;" class = "form-control" name = "gender" required = "required">
							<option value = "">--Seleccione--</option>
							<option value = "Male">Masculino</option>
							<option value = "Female">Femenino</option>
						</select>
					</div>
					<br />
					<div class = "form-inline">
						<label for = "bp">BP:</label>
						<input class = "form-control" name = "bp" type = "text"  required = "required">
						&nbsp;&nbsp;&nbsp;
						<label for = "temp">TEMP:</label>
						<input class = "form-control" name = "temp" type = "number" max = "999" min = "0" size = "15" required = "required"><label>&deg;C</label>
						&nbsp;&nbsp;&nbsp;
						<label for = "pr">PR:</label>
						<input class = "form-control" name = "pr" type = "text"  required = "required">
						<br />
						<br />
						<label for = "rr">RR:</label>
						<input class = "form-control" name = "rr" type = "text"  required = "required">
						&nbsp;&nbsp;&nbsp;
						<label for = "wt">WT :</label>
						<input class = "form-control" name = "wt" style = "width:10%;" type = "number"  required = "required"><label>kg</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label for = "ht">HT :</label>
						<input class = "form-control" name = "ht" style = "margin-right:10px;" type = "text"  required = "required">
					</div>
					<br />
					<div class = "form-inline">
						<button class = "btn btn-primary" name = "save_patient"><span class = "glyphicon glyphicon-save"></span> SAVE</button>
					</div>
				</form>
			</div>	
		</div>	
		<?php require '../add_patient.php'?>
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<label>LISTA DE PACIENTES</Label>
			</div>
			<div class = "panel-body">
				<button id = "show_itr" class = "btn btn-info"><span class = "glyphicon glyphicon-plus"></span> AGREGAR PACIENTE</button>
				<br />
				<br />
				<table id = "table" class = "display" width = "100%" cellspacing = "0">
					<thead>
						<tr>
							<th>Nro. Historia</th>
							<th>Nombre</th>
							<th>F. Nacimiento</th>
							<th>Edad</th>
							<th>Dirección</th>
							<th>Estado Civil</th>
							<th><center>Acción</center></th>
						</tr>
					</thead>
					<tbody>
					<?php
						$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
						$query = $conn->query("SELECT * FROM `itr` ORDER BY `itr_no` DESC") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
						$id = $fetch['itr_no'];
						$q = $conn->query("SELECT COUNT(*) as total FROM `complaints` where `itr_no` = '$id' && `status` = 'Pending'") or die(mysqli_error());
						$f = $q->fetch_array();
					?>
						<tr>
							<td><?php echo $fetch['itr_no']?></td>
							<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
							<td><?php echo $fetch['birthdate']?></td>				
							<td><?php echo $fetch['age']?></td>				
							<td><?php echo $fetch['address']?></td>
							<td><?php echo $fetch['civil_status']?></td>
							<td><center><a href = "complaints.php?id=<?php echo $fetch['itr_no']?>&lastname=<?php echo $fetch['lastname']?>" class = "btn btn-sm btn-info">COMPLICACIONES <span class = "badge"><?php echo $f['total']?></span></a> 
							<a href = "edit_patient.php?id=<?php echo $fetch['itr_no']?>&lastname=<?php echo $fetch['lastname']?>" class = "btn btn-sm btn-warning"><span class = "glyphicon glyphicon-pencil"></span> Actualizar</a><a href = "delete_patient.php?id=<?php echo $fetch['itr_no']?>&lastname=<?php echo $fetch['lastname']?>" class = "btn btn-sm btn-danger"><i class = "glyphicon glyphicon-remove"></i>Eliminar</a></center></td>
						</tr>
					<?php
						}
						$conn->close();
					?>
					</tbody>
					</table>
			</div>
		</div>
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Sistema de Historias Clinicas y Registro de Pacientes - Hospital & Clinica</label>
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
<?php
ob_end_flush();
?>