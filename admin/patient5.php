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
		<link rel = "stylesheet" type = "text/css" href = "../lib/auto/css/jquery.autocomplete.css">
<!-- jQuery & JS files -->
	<?php include_once("../tpl/common_js_ventas.php"); ?>
	<script src="../js/script.js"></script>  
	
	<script src="../lib/auto/js/jquery.autocomplete.js "></script>  
		
		
<script type="text/javascript">
$(function() {
  	   	
		$("#enfermedad_d").autocomplete("enfermedades1.php", {
		width: 160,
		autoFill: true,
		mustMatch: true,
		selectFirst: true
	});
		
});

</script>
	<script type="text/javascript">
	
	function aMays(e, elemento) {
tecla=(document.all) ? e.keyCode : e.which; 
 elemento.value = elemento.value.toUpperCase();
}
	
	/**
 * Funcion que devuelve true o false dependiendo de si la fecha es correcta.
 * Tiene que recibir el dia, mes y año
 */
function isValidDate(day,month,year)
{
    var dteDate;
 
    // En javascript, el mes empieza en la posicion 0 y termina en la 11 
    //   siendo 0 el mes de enero
    // Por esta razon, tenemos que restar 1 al mes
    month=month-1;
    // Establecemos un objeto Data con los valore recibidos
    // Los parametros son: año, mes, dia, hora, minuto y segundos
    // getDate(); devuelve el dia como un entero entre 1 y 31
    // getDay(); devuelve un num del 0 al 6 indicando siel dia es lunes,
    //   martes, miercoles ...
    // getHours(); Devuelve la hora
    // getMinutes(); Devuelve los minutos
    // getMonth(); devuelve el mes como un numero de 0 a 11
    // getTime(); Devuelve el tiempo transcurrido en milisegundos desde el 1
    //   de enero de 1970 hasta el momento definido en el objeto date
    // setTime(); Establece una fecha pasandole en milisegundos el valor de esta.
    // getYear(); devuelve el año
    // getFullYear(); devuelve el año
    dteDate=new Date(year,month,day);
 
    //Devuelva true o false...
    return ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear()));
}
 
/**
 * Funcion para validar una fecha
 * Tiene que recibir:
 *  La fecha en formato ingles yyyy-mm-dd
 * Devuelve:
 *  true-Fecha correcta
 *  false-Fecha Incorrecta
 */
function validate_fecha(fecha)
{
    var patron=new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$");
 
    if(fecha.search(patron)==0)
    {
        var values=fecha.split("-");
        if(isValidDate(values[2],values[1],values[0]))
        {
            return true;
        }
    }
    return false;
}
 
/**
 * Esta función calcula la edad de una persona y los meses
 * La fecha la tiene que tener el formato yyyy-mm-dd que es
 * metodo que por defecto lo devuelve el <input type="date">
 */
function calcularEdad()
{
    var fecha=document.getElementById("user_date").value;
    if(validate_fecha(fecha)==true)
    {
        // Si la fecha es correcta, calculamos la edad
        var values=fecha.split("-");
        var dia = values[2];
        var mes = values[1];
        var ano = values[0];
 
        // cogemos los valores actuales
        var fecha_hoy = new Date();
        var ahora_ano = fecha_hoy.getYear();
        var ahora_mes = fecha_hoy.getMonth()+1;
        var ahora_dia = fecha_hoy.getDate();
 
        // realizamos el calculo
        var edad = (ahora_ano + 1900) - ano;
        if ( ahora_mes < mes )
        {
            edad--;
        }
        if ((mes == ahora_mes) && (ahora_dia < dia))
        {
            edad--;
        }
        if (edad > 1900)
        {
            edad -= 1900;
        }
 
        // calculamos los meses
        var meses=0;
        if(ahora_mes>mes)
            meses=ahora_mes-mes;
        if(ahora_mes<mes)
            meses=12-(mes-ahora_mes);
        if(ahora_mes==mes && dia>ahora_dia)
            meses=11;
 
        // calculamos los dias
        var dias=0;
        if(ahora_dia>dia)
            dias=ahora_dia-dia;
        if(ahora_dia<dia)
        {
            ultimoDiaMes=new Date(ahora_ano, ahora_mes, 0);
            dias=ultimoDiaMes.getDate()-(dia-ahora_dia);
        }
 
        //document.getElementById("result").innerHTML="Tienes "+edad+" años, "+meses+" meses y "+dias+" días";
		//document.getElementById("result").innerHTML = "+edad+";
		document.getElementById("age").value = edad;
		//document.getElementById("texto").onfocus = function(){this.value = "otro texto";
		

    }else{
        document.getElementById("result").innerHTML="La fecha "+fecha+" es incorrecta";
    }
}
</script>	
		
		
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
		<div style = "display:none;" id = "add_itr" class = "panel panel-success">	
			<div class = "panel-heading">
				<label>AGREGAR INFORMACION DEL PACIENTE</label>
				<button id = "hide_itr" style = "float:right; margin-top:-4px;" class = "btn btn-sm btn-danger"><span class = "glyphicon glyphicon-remove"></span> CERRAR</button>
			</div>
			<div class = "panel-body">
				<form id = "form_dental" method = "POST" enctype = "multipart/form-data">
					<table>
					<div style = "float:left;" class = "form-inline">
						<tr>
						<td><label for = "itr_no">HISTORIA CLINICA Nro:</label>
						<input class = "form-control" size = "10" min = "0" type ="text" name = "itr_no">
						</td></tr>
						<tr>
						<td><h3>1. Datos de Filiación</h3><hr width="400%"></td>
						<td><label for= "">Fecha: &nbsp;&nbsp;&nbsp;</label>
						<input class = "form-control" type="date" value="<?php echo date ('M-d-Y'); ?>" name="date1" /></td>						
						</tr>
					</div>
					<!--<div style = "float:center;" class = "form-inline">
						<label for = "family_no">Cantidad Familia</label>
						<input class = "form-control" placeholder = "(Opcional)" size = "5" type = "text" name = "family_no">
					</div>-->
					
					<tr>
					<td><div class = "form-inline">
					<label for = "middlename">DNI:&nbsp;&nbsp;&nbsp;</label>
						<input class = "form-control" name = "dni" placeholder = "" type = "text">
						&nbsp;&nbsp;&nbsp;
					</div>
					
					</td>
					</tr>
					<tr>
					
					<div class = "form-inline">
					<td>
						<label for = "lastname">Apellidos:&nbsp;&nbsp;&nbsp;</label>
						<input class = "form-control" size = "40px" name = "lastname" type = "text" required = "required">
					</td>
					<td>					
						<label for = "firstname">Nombres:&nbsp;&nbsp;&nbsp;</label>
						<input class = "form-control" size = "40px" name = "firstname" type = "text" required = "required">
						&nbsp;&nbsp;&nbsp;
					</td>	
						
					</div>
					</tr>
					<br />
				<!--	<div class = "form-group">-->
						<!--<label for = "birthdate" style = "float:left;">Fecha de Nacimiento:&nbsp;&nbsp;&nbsp;</label>
						<!--<br style = "clear:both;" />
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
						
						<br>
						<br>
						
						<br>
						<select name = "month" style = "width:25%; float:left;" class = "form-control" required = "required">
							<option value = "">Mes</option>
							<option value = "01">Enero:</option>
							<option value = "02">Febrero</option>
							<option value = "03">Marzo</option>
							<option value = "04">Abril</option>
							<option value = "05">Mayo</option>
							<option value = "06">Junio</option>
							<option value = "07">Julio</option>
							<option value = "08">Agosto</option>
							<option value = "09">Setiembre</option>
							<option value = "10">Octubre</option>
							<option value = "11">Noviembre</option>
							<option value = "12">Diciembre</option>
						</select>
						
						<select name = "year" class = "form-control" style = "width:13%; float:left;" required = "required">
							<option value = "">Año</option>
							<?php
								$a = date(Y);
								while(1965 <= $a){
									echo "<option value = '".$a."'>".$a--."</option>";
								}
							?>
						</select>-->
						<tr>
						<td><label for = "birthdate" style = "float:left;">Fecha de Nacimiento:&nbsp;&nbsp;&nbsp;</label>
						<input type="date" name="user_date" id="user_date" /></td>
						<td><input type="button" value="Calcular edad" onclick="javascript:calcularEdad();" />
						<label for = "age">Edad &nbsp;&nbsp;&nbsp;</label></td>
						<td><input class = "form-control" style = "width:20%;" min = "0" max = "999" name = "age" id="age" type ="text"></td>
						</tr>
											
						<!-- div donde mostraremos el resultado -->
												
						<tr>
						<td><label for = "phil_health_no">Ocupación:</label>
						<input name = "phil_health_no" placeholder = "" class = "form-control" type = "text">
						</td>
						<td><label for = "address">Dirección</label>
						<input class = "form-control" name = "address" type = "text" required = "required">
						</td>
						<td><label for = "address">Centro de Trabajo</label>
						<input class = "form-control" name = "trabajo" type = "text" required = "required">
						</td>
						<td><label for = "address">Teléfono / Celular</label>
						<input class = "form-control" name = "telefono" type = "text" required = "required">
						</td>
						<td><label for = "civil_status">Estado Civil</label>
						<select style = "width:22%;" class = "form-control" name = "civil_status" required = "required">
							<option value = "">--Porfavor seleccione una opción--</option>
							<option value = "Soltero">Soltero</option>
							<option value = "Casado">Casado</option>
						</select>
						</td>
						<td><label for = "gender">Genero:</label>
						<select style = "width:22%;" class = "form-control" name = "gender" required = "required">
							<option value = "">--Porfavor seleccione una opción--</option>
							<option value = "Masculino">Masculino</option>
							<option value = "Femenino">Femenino</option>
						</select>
						</td>
						</tr>
					<!--</div>-->
					
					<tr><td><h3>2. ANAMNESIS</h3><hr width="400%"></td></tr>
					<tr>
					<td><label for = "address">Enfermedad Actual</label>
						<input class = "form-control" name = "enfermedad" type = "text" required = "required">
						</td>
					</tr>
					<tr><td><label for = "address">Antecendentes Patológicos</label>
						<input class = "form-control" name = "patologicos" type = "text" required = "required">
						</td>
					</tr>
					<tr><td><h3>3. Examen Físico</h3><hr width="400%"></td>
					</tr>
					<tr>
					<div class = "form-inline">
						<td><label for = "bp">BP:</label>
						<input class = "form-control" name = "bp" type = "text"  required = "required">
						&nbsp;&nbsp;&nbsp;</td>
						<td><label for = "temp">TEMP:</label>
						<input class = "form-control" name = "temp" type = "number" max = "999" min = "0" size = "15" required = "required"><label>&deg;C</label>
						&nbsp;&nbsp;&nbsp;</td>
						<td><label for = "pr">PR:</label>
						<input class = "form-control" name = "pr" type = "text"  required = "required">
						</tr|>
					</tr>
					<tr>
						<td><label for = "rr">RR:</label>
						<input class = "form-control" name = "rr" type = "text"  required = "required">
						&nbsp;&nbsp;&nbsp;</td>
						<td><label for = "wt">WT :</label>
						<input class = "form-control" name = "wt" style = "margin-right:10px;" type = "number"  required = "required"><label>kg</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><label for = "ht">HT :</label>
						<input class = "form-control" name = "ht" style = "margin-right:10px;" type = "text"  required = "required"></td>
						<td><label for = "ht">OTROS :</label>
						<input class = "form-control" name = "otros" style = "margin-right:10px;" type = "text"  required = "required"></td>
					</div>
					</tr>
					
					<tr><td><h3>4. Diagnostico</h3><hr width="400%"></td></tr>
					<tr>
					<td><label for = "ht">Enfermedad</label>
						<input class = "form-control" name = "" id="enfermedad_d" style = "margin-right:10px;" type = "text"  >
					</td>
					
					<td><label for = "ht">Código</label>
						<input class = "form-control" name = "enfermedad_c" id = "enfermedad_c" style = "margin-right:10px;" type = "text"  >
						</td>
					</tr>
					<tr>
					<td>
					<div class = "form-inline">
						<button class = "btn btn-primary" name = "save_patient"><span class = "glyphicon glyphicon-save"></span> GUARDAR</button>
					</div>
					</td>
					</tr>
					</table>
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
							<th>Nro Documento de Identidad </th>
							<th>Nombre</th>
							<th>F. Nacimiento</th>
							<th>Edad</th>
							<th>Dirección</th>
							<th>Estado Civil</th>
							<th><center>Accion</center></th>
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
							<td><center><a href = "complaints.php?id=<?php echo $fetch['itr_no']?>&lastname=<?php echo $fetch['lastname']?>" class = "btn btn-sm btn-info">Complaints <span class = "badge"><?php echo $f['total']?></span></a> 
							<a href = "edit_patient.php?id=<?php echo $fetch['itr_no']?>&lastname=<?php echo $fetch['lastname']?>" class = "btn btn-sm btn-warning"><span class = "glyphicon glyphicon-pencil"></span> Actualizar</a></center></td>
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