<?php 
	// Routes
	if(isset($_POST['action']) && $_POST['action'] == 'testing') {verifyCIN($_POST['cin']);}

	function verifyCIN($cin) {
		include('../connection.php');
		$checkCitoyenResult = mysqli_query($conn,"SELECT * FROM citoyen where cin ='$cin'");
		$checkInscriptionsResult = mysqli_query($conn,"SELECT * FROM inscrit where cin ='$cin'");
		if ($checkInscriptionsResult->num_rows == 0) {
			if ($checkCitoyenResult->num_rows == 1) {
				mysqli_query($conn,"INSERT INTO inscrit(cin,Nom,prenom,adresse,tele,password,datnaiss) VALUES('$cin','$lastName','$firstName','$address','$phone','$password','$birthDate')");
				$_SESSION["CIN"] = $cin;
				header('location:user.php');
			}else{ echo "Cin n'existe pas";}
		}else{echo "Ce Citoyen est deja inscrit";}
	}
?>