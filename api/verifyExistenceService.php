<?php 
	// Routes
	if(isset($_POST['action']) && $_POST['action'] == 'signup') {verifyNotExistCIN($_POST['cin']);}
	if(isset($_POST['action']) && $_POST['action'] == 'signin') {verifyExistCIN($_POST['cin']);}

	function verifyNotExistCIN($cin) {
		include('../connection.php');
		$checkCitoyenResult = mysqli_query($conn,"SELECT * FROM citoyen where Cin ='$cin'");
		$checkInscriptionsResult = mysqli_query($conn,"SELECT * FROM inscrit where cin ='$cin'");
		
		try 
		{
			if ($checkInscriptionsResult->num_rows == 0) {
				if ($checkCitoyenResult->num_rows == 1) {echo "message:Inscription terminée avec succées;status:success";}
				else{ echo "message:Cin n'existe pas;status:info"; }
			}else{echo "message:Ce Citoyen est deja inscrit;status:info";}
		} 
		catch (\Throwable $th) {var_dump($th);}
	}

	function verifyExistCIN($cin) {
		include('../connection.php');
		$checkInscriptionsResult = mysqli_query($conn,"SELECT * FROM inscrit where cin ='$cin'");

		try {
			if ($checkInscriptionsResult->num_rows == 0) {echo "message:Cin n'existe pas;status:info";}
			else {echo "message:Bienvenue, veuillez attendre quelques instants ...;status:success";}
		} 
		catch (\Throwable $th) {var_dump($th);}
	}
?>