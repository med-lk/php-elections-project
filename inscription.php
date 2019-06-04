<?php
	include('connection.php');
	session_start();
	if (isset($_POST["firstName"])) {
		$firstName = $_POST["firstName"];
		$lastName = $_POST["lastName"];
		$cin = $_POST["cin"];
		$password = $_POST["password"];
		$birthDate = $_POST["birthDate"];
		$address = $_POST["address"];
		$phone = $_POST["phone"];

		$checkCitoyenResult = mysqli_query($conn,"SELECT * FROM citoyen where cin ='$cin'");
		$checkInscriptionsResult = mysqli_query($conn,"SELECT * FROM inscrit where cin ='$cin'");
		
		if ($checkInscriptionsResult->num_rows == 0) {
			if ($checkCitoyenResult->num_rows == 1) {
				mysqli_query($conn,"INSERT INTO inscrit(cin,Nom,prenom,adresse,tele,password,datnaiss) VALUES('$cin','$lastName','$firstName','$address','$phone','$password','$birthDate')");
				$_SESSION["CIN"] = $cin;
				header('location:user.php');
			}else{ echo "<script>alert('Cin n\'existe pas')</script>";}
		}else{echo "<script>alert('Ce Citoyen est deja inscrit')</script>";}
	}	

	if (!isset($_POST["firstName"])) {
		$cin = $_POST["cin"];
		$password = $_POST["password"];
		$checkInscriptionsResult = mysqli_query($conn,"SELECT * FROM inscrit where cin ='$cin' and password='$password'");
		if ($row = mysqli_fetch_assoc($checkInscriptionsResult)) {
			$role = $row["role"];
			if ($role == 1) {
			  $_SESSION["CIN"] = $cin; header('location:user.php');
			}elseif ($role == 2) {
				 $_SESSION["admin"] = $cin; header('location:user.php');
			}
			}
			
		else{echo "<script>alert('ERROR SUR CIN OU LE MOT DE PASS')</script>";}
		
	}
?>