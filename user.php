<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <title>User Page</title>
        <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link href='assets/css/rotating-card.css' rel='stylesheet' />
	</head>
    <body>
		<header>
	   		<nav class="navbar fixed-top navbar-expand navbar-light bg-light">
	   			<a class="navbar-brand logo" href="index.php">
	   				<img src="assets/img/logo.PNG">
	   			</a>
                <ul class="navbar-nav float-right" style="margin: 0px 0px 0px 1050px;">
                    <li class="nav-item">
                        <form action="" method="POST">
                            <button type="submit" class="btn" name="deconnection">
                                <ion-icon name="home"></ion-icon> Déconnecte
                            </button>
                        </form>
                    </li>
                </ul>
		    </nav>
		</header>
		
        <div class="container-fluid text-center">    
            <div class="row content" style="margin: 150px 30px 200px 0px;">
                <?php
                    session_start();
                    if ($_SESSION["CIN"] <> "") {
                        $cin = $_SESSION["CIN"];
                        include('connection.php');
                        $checkCitoyenResult = mysqli_query($conn,`SELECT * FROM citoyen where cin ='$cin'`);
                        // this is not a condition, this is an affectation
                        if ($res = mysqli_fetch_assoc($checkCitoyenResult)){
                            ?>
                                <!-- I don't what is this condition for ? -->
                            <?php  
                            $checkInscriptionsResult = mysqli_query($conn,`SELECT * FROM inscrit where cin ='$cin'`);
                            if ($row = mysqli_fetch_assoc($checkInscriptionsResult)){
                                ?>
                <div class="col-sm-2 sidenav">
                    <img class="img-circle" src="<?php echo$res["image"]; ?>" width="200" height="200" />
                </div>
                <div class="col-sm-8 text-left"> 
                    <table class="table" style="margin-top:30px; " >
                        <tbody> 
                            <tr>
                                <th>CIN</th>
                                <td><?= $row["cin"] ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><?= $row["Nom"] ?></td>
                                <td><button type="button" class="btn btn-light btn-sm">Modify</button></td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td><?= $row["prenom"] ?></td>
                                <td><button type="button" class="btn btn-light btn-sm">Modify</button></td>
                            </tr>
                            <tr>
                                <th>Adresse</th>
                                <td><?= $row["adresse"] ?></td>
                                <td><button type="button" class="btn btn-light btn-sm">Modify</button></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td><?= $row["tele"] ?></td>
                                <td><button type="button" class="btn btn-light btn-sm">Modify</button></td>
                            </tr>
                            <tr>
                                <th>PassWord</th>
                                <td>***********</td>
                                <td><button type="button" class="btn btn-light btn-sm">Modify</button></td>
                            </tr>
                            <tr>
                                <th>Birth Date</th>
                                <td><?= $row["datnaiss"] ?></td>
                                <td><button type="button" class="btn btn-light btn-sm">Modify</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    }   
                } 
            } else {header('location:index.php');}
            ?>
                </div>
                <div class="card-body row">
                    <div class="col-sm-12 sidenav">
                        <div class="card-container">
                            <div class="card">
                                <div class="front"> <img style="margin: 0px 0px 0px -15px;" src="assets/img/cursor.png" width="250" height="350"></div>
                                    <div class="back">
                                        <div class="well">
                                            <p>ADS</p>
                                        </div>
                                        <div class="well">
                                            <p>ADS</p>
                                        </div>
                                    </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="container-fluid text-center">
            <p>Footer Text</p>
        </footer>
        <?php if (isset($_POST["deconnection"])) {session_unset(); header('location:index.php');}?>
    </body>
</html>