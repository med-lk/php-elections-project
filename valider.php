<!DOCTYPE html>
<html>
<head>
			<meta charset="utf-8">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <title>Home Page</title>
        <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link href='assets/css/rotating-card.css' rel='stylesheet' />
	<title>Valider</title>
</head>
            <header>
            <nav class="navbar fixed-top navbar-expand navbar-light bg-light">
                <a class="navbar-brand logo" href="index.php">
                    <img src="assets/img/logo.PNG">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample02">
                    <ul class="navbar-nav mr-auto"></ul>
                    <ul class="navbar-nav float-right">
                         <li class="nav-item">
                            <a class="nav-link btn btn-outline-info" href="user.php">
                                <img src="assets/img/download.png" width="30" height="30">
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
<body>
<div style="margin: 320px 0px 0px 0px;">
  <div class="alert alert-success">
    <img src="assets/img/Sin-título-1.png" width="100" height="100"><strong>Vous Avez Voté Avec Succès</strong> 
  </div>
</div>
<?php
include('connection.php');
echo"Connexion Succesfully !!"
session_start();
$id_user = $_SESSION["CIN"];
$idparty = $_GET["idparty"];
    $res = mysqli_query($conn,"UPDATE inscrit SET idpartie='$idparty' where cin='$id_user'");

?>

</body>
</html>