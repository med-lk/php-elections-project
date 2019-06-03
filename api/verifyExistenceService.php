<?php 
	// Routes
	if(isset($_POST['action']) && $_POST['action'] == 'testing') {verifyCIN($_POST['cin']);}

	function verifyCIN($cin) {
		try {
			include('../connection.php');
			$checkCitoyenResult = mysqli_query($conn,"SELECT * FROM citoyen where Cin ='$cin'");
			$checkInscriptionsResult = mysqli_query($conn,"SELECT * FROM inscrit where cin ='$cin'");
			if ($checkInscriptionsResult->num_rows == 0) {
				if ($checkCitoyenResult->num_rows == 1) {
					echo "message:Inscription terminée avec succées;status:success";
				}else{ echo "message:Cin n'existe pas;status:info"; }
			}else{echo "message:Ce Citoyen est deja inscrit;status:info";}
		} catch (\Throwable $th) {
			var_dump($th);
		}
	}
?>