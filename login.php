<?php
	session_start();
	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$conn = new mysqli("localhost", "372668", "LA.cv1234", "372668") or die(mysqli_error());
		$query = $conn->query("SELECT * FROM `user` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$valid = $query->num_rows;
		$section = $fetch['section'];	
			if($valid > 0){
				
				
				if($section == "Hematology"){
					$_SESSION['user_id'] = $fetch['user_id'];
					header("location:hematology.php");
				}
				
				
			}else{
				echo "<script>alert('Account Does Not Exist!')</script>";
				echo "<script>window.location = 'index.php'</script>";
			}
						
		
		}
		$conn->close();
	