<?php ob_start(); ?>
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
        <!---------------------------------------------------------------!-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!----------------------------------------------------------------!-->
        <style type="text/css">
    td {
        color:#353535;
        margin:0 auto;
        margin-top:0px;
        margin-bottom:40px;
        font-size:15px;
        width:250px;
    }
    th {
        
        margin:0 auto;
        margin-top:0px;
        margin-bottom:40px;
        font-size:15px;
        width:250px;
    }

        </style>
	</head>
    <body>
		<header>
	   		<nav class="navbar fixed-top navbar-expand navbar-light bg-light">
	   			<a class="navbar-brand logo" href="index.php">
	   				<img src="assets/img/logo.PNG" width="300" height="50" style="margin: -15px;">
	   			</a>
                <ul class="navbar-nav float-right" style="margin: 20px 0px 0px 1050px;">
                    <li class="nav-item">
                        <form action="" method="POST">
                            <a href="destroy_session.php" class="btn btn-outline-secondary">
                                  <span class="glyphicon glyphicon-log-out"></span> Déconnecte
                            </a>
                        </form>
                    </li>
                </ul>
		    </nav>
		</header>
		
        <div class="container-fluid text-center">    
            <div class="row content" style="margin: 30px 30px 200px 45px;">
                <?php
                    session_start();
                    if (isset($_SESSION["CIN"])) {
                        $cin = $_SESSION["CIN"];
                        include('connection.php');
                        $checkCitoyenResult = mysqli_query($conn,"SELECT * FROM citoyen where cin ='$cin'");
                        // this is not a condition, this is an affectation
                        if ($res = mysqli_fetch_assoc($checkCitoyenResult)){
                            ?>
                                <!-- hadik katjib liya les données li bghina ndiro lihom Modify  -->
                            <?php  
                            $checkInscriptionsResult = mysqli_query($conn,"SELECT * FROM inscrit where cin ='$cin'");
                            if ($row = mysqli_fetch_assoc($checkInscriptionsResult)){
                                ?>
                <div class="col-sm-2 sidenav">
                    <img class="img-circle" src="<?php echo$res["image"]; ?>" width="200" height="200" />
                </div>
                <div class="col-sm-8 text-left"> 
                    <form action="" method="POST">
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
                                <td><button type="button" data-toggle="modal" data-target="#Nom" class="btn btn-light btn-sm">Modify</button>

                                </td>

                                <div  class="modal fade" id="Nom" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="form-group">
                                    <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLongTitle">Modifier</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                                     <div class="modal-body">
                                        <label>name : </label><input type="text" class="form-control" placeholder="your full name" name="Nom" value="<?= $row["Nom"] ?>">
                                    </div>
                                    <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Modify">Modifier</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td><?= $row["prenom"] ?></td>
                                <td><button type="button" data-toggle="modal" data-target="#prenom" class="btn btn-light btn-sm">Modify</button></td>
                                <div  class="modal fade" id="prenom" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="form-group">
                                    <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLongTitle">Modifier</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                                     <div class="modal-body">
                                        <label>Last Name : </label><input type="text" class="form-control" placeholder="your full name" name="prenom" value="<?= $row["prenom"] ?>">
                                    </div>
                                    <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Modify">Modifier</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </tr>
                            <tr>
                                <th>Adresse</th>
                                <td><?= $row["adresse"] ?></td>
                                <td><button type="button" data-toggle="modal" data-target="#adresse" class="btn btn-light btn-sm">Modify</button></td>
                                <div  class="modal fade" id="adresse" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="form-group">
                                    <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLongTitle">Modifier</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                                     <div class="modal-body">
                                        <label>Adresse : </label><input type="text" class="form-control" placeholder="your full name" name="adresse" value="<?= $row["adresse"] ?>">
                                    </div>
                                    <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Modify">Modifier</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td><?= $row["tele"] ?></td>
                                <td><button type="button" data-toggle="modal" data-target="#tele" class="btn btn-light btn-sm">Modify</button></td>
                                <div  class="modal fade" id="tele" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="form-group">
                                    <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLongTitle">Modifier</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                                     <div class="modal-body">
                                        <label>Phone : </label><input type="text" class="form-control" placeholder="your full name" name="tele" value="<?= $row["tele"] ?>">
                                    </div>
                                    <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Modify">Modifier</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </tr>
                            <tr>
                                <th>PassWord</th>
                                <td>***********</td>
                                <td><button type="button" data-toggle="modal" data-target="#PassWord" class="btn btn-light btn-sm">Modify</button></td>
                                <div  class="modal fade" id="PassWord" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="form-group">
                                    <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLongTitle">Modifier</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                                     <div class="modal-body">
                                        <label>PassWord : </label><input type="password" class="form-control" placeholder="your PassWord" name="password" value="<?= $row["password"] ?>">
                                        <label>Re-PassWord : </label><input type="password" class="form-control" placeholder="your PassWord" name="re_password" value="<?= $row["password"] ?>">
                                    </div>
                                    <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Modify">Modifier</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </tr>
                            <tr>
                                <th>Birth Date</th>
                                <td><?= $row["datnaiss"] ?></td>
                                <td><button type="button" data-toggle="modal" data-target="#datnaiss" class="btn btn-light btn-sm">Modify</button></td>
                                <div  class="modal fade" id="datnaiss" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="form-group">
                                    <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLongTitle">Modifier</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                                     <div class="modal-body">
                                        <label>Birth Date : </label><input type="Date" class="form-control" placeholder="your full name" name="datnaiss" value="<?= $row["datnaiss"] ?>">
                                    </div>
                                    <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Modify">Modifier</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </tr>
                        </tbody>
                    </table>
                    </form>
                    </div>
            <?php 
                    }   
                } 
            } elseif (isset($_SESSION["admin"])) {
              $cin = $_SESSION["admin"];
                        include('connection.php');
                        $checkCitoyenResult = mysqli_query($conn,"SELECT * FROM citoyen where cin ='$cin'");
                        // this is not a condition, this is an affectation
                        if ($res = mysqli_fetch_assoc($checkCitoyenResult)){
                            ?>
                                <!-- hadik katjib liya les données li bghina ndiro lihom Modify  -->
                            <?php  
                            $checkInscriptionsResult = mysqli_query($conn,"SELECT * FROM inscrit where cin ='$cin'");
                            if ($row = mysqli_fetch_assoc($checkInscriptionsResult)){
                                ?>
                <div class="col-sm-2 sidenav">
                    <img class="img-circle" src="<?php echo$res["image"]; ?>" width="200" height="200" />
                </div>
                <div class="col-sm-8 text-left"> 
                    <form action="" method="POST">
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
                                <td><button type="button" data-toggle="modal" data-target="#Nom" class="btn btn-light btn-sm">Modify</button>

                                </td>

                                <div  class="modal fade" id="Nom" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="form-group">
                                    <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLongTitle">Modifier</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                                     <div class="modal-body">
                                        <label>name : </label><input type="text" class="form-control" placeholder="your full name" name="Nom" value="<?= $row["Nom"] ?>">
                                    </div>
                                    <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Modify">Modifier</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td><?= $row["prenom"] ?></td>
                                <td><button type="button" data-toggle="modal" data-target="#prenom" class="btn btn-light btn-sm">Modify</button></td>
                                <div  class="modal fade" id="prenom" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="form-group">
                                    <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLongTitle">Modifier</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                                     <div class="modal-body">
                                        <label>Last Name : </label><input type="text" class="form-control" placeholder="your full name" name="prenom" value="<?= $row["prenom"] ?>">
                                    </div>
                                    <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Modify">Modifier</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </tr>
                            <tr>
                                <th>Adresse</th>
                                <td><?= $row["adresse"] ?></td>
                                <td><button type="button" data-toggle="modal" data-target="#adresse" class="btn btn-light btn-sm">Modify</button></td>
                                <div  class="modal fade" id="adresse" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="form-group">
                                    <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLongTitle">Modifier</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                                     <div class="modal-body">
                                        <label>Adresse : </label><input type="text" class="form-control" placeholder="your full name" name="adresse" value="<?= $row["adresse"] ?>">
                                    </div>
                                    <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Modify">Modifier</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td><?= $row["tele"] ?></td>
                                <td><button type="button" data-toggle="modal" data-target="#tele" class="btn btn-light btn-sm">Modify</button></td>
                                <div  class="modal fade" id="tele" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="form-group">
                                    <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLongTitle">Modifier</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                                     <div class="modal-body">
                                        <label>Phone : </label><input type="text" class="form-control" placeholder="your full name" name="tele" value="<?= $row["tele"] ?>">
                                    </div>
                                    <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Modify">Modifier</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </tr>
                            <tr>
                                <th>PassWord</th>
                                <td>***********</td>
                                <td><button type="button" data-toggle="modal" data-target="#PassWord" class="btn btn-light btn-sm">Modify</button></td>
                                <div  class="modal fade" id="PassWord" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="form-group">
                                    <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLongTitle">Modifier</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                                     <div class="modal-body">
                                        <label>PassWord : </label><input type="password" class="form-control" placeholder="your PassWord" name="password" value="<?= $row["password"] ?>">
                                        <label>Re-PassWord : </label><input type="password" class="form-control" placeholder="your PassWord" name="re_password" value="<?= $row["password"] ?>">
                                    </div>
                                    <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Modify">Modifier</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </tr>
                            <tr>
                                <th>Birth Date</th>
                                <td><?= $row["datnaiss"] ?></td>
                                <td><button type="button" data-toggle="modal" data-target="#datnaiss" class="btn btn-light btn-sm">Modify</button></td>
                                <div  class="modal fade" id="datnaiss" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="form-group">
                                    <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLongTitle">Modifier</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                                     <div class="modal-body">
                                        <label>Birth Date : </label><input type="Date" class="form-control" placeholder="your full name" name="datnaiss" value="<?= $row["datnaiss"] ?>">
                                    </div>
                                    <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Modify">Modifier</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </tr>
                        </tbody>
                    </table>
                    </form>
                    </div>
            <?php 
                    }   
                } 
            } else{header('location:index.php');}

            if (isset($_POST["Modify"])) {
                
               $name = $_POST["Nom"];
               $prenom = $_POST["prenom"];
               $tele = $_POST["tele"];
               $adresse = $_POST["adresse"];
               $password = $_POST["password"];
               $re_password = $_POST["re_password"];
               $datnaiss = $_POST["datnaiss"];
               if ($re_password == $password) {
                   
               
               $res = mysqli_query($conn,"UPDATE inscrit set Nom='$name', prenom='$prenom', adresse='$adresse',tele='$tele',password='$password',datnaiss='$datnaiss' WHERE cin ='$cin'");
               header('location:user.php');
               ob_end_flush();
           }else{
            echo "<script>alert('Error PassWord')</script>";
           }
            }
            ?>
                
               
                    <div class="col-sm-12 sidenav">
                        <br><br>
                        <div>
                   <h3>Details Elections</h3><br><br>
               </div>
                            <?php
                            $res = mysqli_query($conn,"SELECT * FROM appartenir");
                            if (mysqli_num_rows($res) <> 0) {
                            $res = mysqli_query($conn,"SELECT * FROM inscrit where idpartie <> '0'");
                            $total_vote = mysqli_num_rows($res);
                            echo "<div class='alert alert-info alert-dismissible fade show' role='alert' align='center'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Le Nombre des Citoyens qui Sont Votés : </strong>$total_vote</div>";?>
                                
                            <?php

                            if (isset($_SESSION["CIN"])) {
                                $res = mysqli_query($conn,"SELECT count(i.idpartie) as nb_vote, i.idpartie, p.full_name, p.partie_image,p.leader_name from inscrit AS i, partie as p where i.idpartie=p.idpartie and  i.idpartie<>'0' group by idpartie ORDER BY nb_vote DESC");
                                if ($row = mysqli_fetch_assoc($res)) {
                                    $nb_vote = $row["nb_vote"];
                                    $idpartie = $row["idpartie"];
                                    $nb_place = nb_place($idpartie);
                                      ?>
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                     <div class="row content">
                                        <div class="col-sm-2 sidenav">
                                            
                                            <img width="155" src="<?= $row["partie_image"] ?>" alt="Bootstrap" class="img-rounded">
                                        </div>
                                        <div class="col-sm-10 sidenav" >
                                            <h4 class="list-group-item list-group-item-action list-group-item-light"> party : <?= $row["full_name"] ?></h4>
                                            <h5 class="list-group-item list-group-item-action list-group-item-light">Chef : <?= $row["leader_name"] ?></h5>
                                            <h5 class="list-group-item list-group-item-action list-group-item-light">Nombre de votes : <?= $nb_vote ?></h5>
                                            <h5 class="list-group-item list-group-item-action list-group-item-light">Nombre de votes : <?= $nb_place ?></h5>
                                        </div>
                                     </div>
                                 </div>
                                <?php while ($row1 = mysqli_fetch_assoc($res)) {
                                    $nb = $row1["nb_vote"];
                                    if ($nb_vote == $nb) { 
                                        $idpartie = $row1["idpartie"];
                                        $nb_place = nb_place($idpartie);?>
                                        <div class='alert alert-success alert-dismissible fade show' role='alert' align='center'>
                                        <div class="row content">
                                        <div class="col-sm-2 sidenav">
                                            <img width="155" src="<?= $row1["partie_image"] ?>" alt="Bootstrap" class="img-rounded">
                                        </div>
                                        <div class="col-sm-10 sidenav">
                                            <h4 class="list-group-item list-group-item-action list-group-item-light"> party : <?= $row1["full_name"] ?></h4>
                                            <h5 class="list-group-item list-group-item-action list-group-item-light">Chef : <?= $row1["leader_name"] ?></h5>
                                            <h5 class="list-group-item list-group-item-action list-group-item-light">Nombre de votes : <?= $nb ?></h5>
                                            <h5 class="list-group-item list-group-item-action list-group-item-light">Nombre de votes : <?= $nb_place ?></h5>
                                        </div>
                                     </div>
                                 </div>
                                  <?php  }
                                } } ?>
                                </div>

                           <?php  }}else{?>
                            <div class='alert alert-info alert-dismissible fade show' role='alert' align='center'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Les Élections Pas en cours Terminé</strong></div>
                           <?php }

                            ?>
                        
                    </div>
                </div>
            </div>
        <footer class="container-fluid text-center">
            
        </footer>
        <script type="text/javascript" src="assets/js/app.js"></script>
        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <script type="text/javascript" src="assets/js/popper.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/ionicons@4.5.1/dist/ionicons.js"></script>
    </body>
</html>
<?php
    function nb_place($idpartie){
        include('connection.php');
        $res1 = mysqli_query($conn,"SELECT SUM(nb_place_party) as nb_place FROM appartenir where idpartie='$idpartie'");
        if ($row2 = mysqli_fetch_assoc($res1)) {
           $nb_place = $row2["nb_place"];
        }
        return $nb_place;
    }
?>