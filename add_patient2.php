<?php
	if(ISSET($_POST['save_patient'])){
		$itr_no = $_POST['itr_no'];
		$date1= $_POST['date1'];
		//$family_no = $_POST['family_no'];
		$family_no = "";
		$firstname = $_POST['firstname'];
		//$middlename = $_POST['middlename'];
		$dni = $_POST['dni'];
		$lastname = $_POST['lastname'];
		//$birthdate = $_POST['month']."/".$_POST['day']."/".$_POST['year'];
		$birthdate = $_POST['user_date'];
		$age = $_POST['age'];
		$phil_health_no = $_POST['phil_health_no'];
		$address = $_POST['address'];
		$civil_status = $_POST['civil_status'];
		$gender = $_POST['gender'];
		$bp = $_POST['bp'];
		$temp = $_POST['temp']."&deg;C";
		$pr = $_POST['pr'];
		$rr = $_POST['rr'];
		$wt= $_POST['wt']."kg";
		$ht = $_POST['ht'];
		$telefono=$_POST['trabajo'];
		$trabajo=$_POST['telefono'];
		$enfermedad_actual=$_POST['enfermedad'];
		$patologicos=$_POST['patologicos'];
		$conn = new mysqli("localhost", "372668", "LA.cv1234", "hcpms") or die(mysqli_error());
		$q1 = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$itr_no'") or die(mysqli_error());
		$c1 = $q1->num_rows;
		if($c1 > 0){
				echo "<script>alert('Nro Documento de Identidad . must not be the same!')</script>";
		}else{
			$conn->query("INSERT INTO itr VALUES ('$itr_no', '$date1','$family_no', '$phil_health_no', '$firstname', '$dni', '$lastname', '$birthdate', '$age', '$address', '$civil_status', '$gender', '$bp', '$temp', '$pr', '$rr', '$wt', '".addslashes($ht)."','$telefono', '$trabajo', '$enfermedad_actual','$patologicos')") or die(mysqli_error($conn));
			header("location: patient.php");	
		}
	}
	//$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error($myConnection)); 