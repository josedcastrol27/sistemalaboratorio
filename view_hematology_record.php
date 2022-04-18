<!DOCTYPE html>
<?php
	require_once'logincheck.php';
	$conn = new mysqli("localhost", "372668", "LA.cv1234", "372668") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<html lang = "en">
	<head>	
		<title>Sistea de Laboratorio</title>
		<meta charset = "UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
	</head>
	<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "" style = "float:left;" height = "55px"><label class = "navbar-brand">Sistema de Laboratorio</label>
		<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php echo $fetch['firstname']." ".$fetch['lastname'] ?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php"><span class = "glyphicon glyphicon-log-out"></span> Cerrar Sesión</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	<br />
	<br />
	<br />
	<div class = "well">
		<div class = "panel panel-warning">
			<div class = "panel-heading">
				<center><label>HEMATOLOGY</label></center>
			</div>
		</div>
		<a style = "float:right; margin-top:-4px;" href = "hematology.php" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> VOLVER</a> 
		<br />
		<br />
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<h4>HEMATOLOGY RECORD LIST</h4>
			</div>
		</div>
		<br />
		<table id = "table" cellspacing = "5" class = "display">
			<thead>
				<tr>
					<th>Nro Documento de Identidad </th>
					<th>Nombre</th>
					<th>Edad</th>
					<th>Gender</th>
					<th>Dirección</th>
					<th><center>Accion</center></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$conn = new mysqli("localhost", "372668", "LA.cv1234", "372668") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `hematology` NATURAL JOIN `itr` GROUP BY `itr_no` ORDER BY `hem_id` DESC") or die(mysqli_error());
				while($f = $q->fetch_array()){
			?>
				<tr>
					<td><?php echo $f['itr_no']?></td>
					<td><?php echo $f['firstname']." ".$f['lastname']?></td>
					<td><?php echo $f['age']?></td>
					<td><?php echo $f['gender']?></td>
					<td><?php echo $f['address']?></td>
					<td><center>
							<a href = "hematology_record.php?itr_no=<?php echo $f['itr_no']?>&hem_id=<?php echo $f['hem_id']?>"class = "btn btn-info"><span class = "glyphicon glyphicon-book"></span> All Record</a> 
						</center></td>
				</tr>
			<?php
				}
			?>	
			</tbody>
		</table>
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Sistema de Laboratorio</label>
	</div>
	</body>
		<?php require "script.php" ?>
		<script src ="js/add_dental.js"></script>
</html>