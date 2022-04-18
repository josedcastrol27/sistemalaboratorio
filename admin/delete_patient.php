<?php
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$conn->query("DELETE FROM `itr` WHERE `itr_no` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error());
	header("location:patient.php");

