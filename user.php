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
    $req = mysqli_query($conn,"SELECT * FROM citoyen where cin ='$cin'");

    if ($res = mysqli_fetch_assoc($req)){
    ?>
        <?php  
    
    $req = mysqli_query($conn,"SELECT * FROM inscrit where cin ='$cin'");
if ($row = mysqli_fetch_assoc($req)){

     ?>
    <div class="col-sm-2 sidenav">

        <img class="img-circle" src="<?php echo$res["image"]; ?>" width="200" height="200" />

    </div>

    <div class="col-sm-8 text-left"> 
      <table class="table" style="margin-top:30px; " >
    <tbody>
      <tr>
        
        <td>CIN</td>
        <td><?php echo$row["cin"]; ?></td>
        <td></td>

      </tr>
    <tr>

        <td>Name</td>
        <td><?php echo$row["Nom"]; ?></td>
         <td><button type="button" class="btn btn-light btn-sm">Modify</button></td>
 
      </tr>
      <tr>

        <td>Last Name</td>
        <td><?php echo$row["prenom"]; ?></td>
         <td><button type="button" class="btn btn-light btn-sm">Modify</button></td>

      </tr>
            <tr>

        <td>Adresse</td>
        <td><?php echo$row["adresse"]; ?></td>
         <td><button type="button" class="btn btn-light btn-sm">Modify</button></td>

      </tr>
      <tr>

        <td>Phone</td>
        <td><?php echo$row["tele"]; ?></td>
         <td><button type="button" class="btn btn-light btn-sm">Modify</button></td>

      </tr>
      <tr>

        <td>PassWord</td>
        <td>***********</td>
         <td><button type="button" class="btn btn-light btn-sm">Modify</button></td>

      </tr>
      <tr>

        <td>Birth Date</td>
        <td><?php echo$row["datnaiss"]; ?></td>
         <td><button type="button" class="btn btn-light btn-sm">Modify</button></td>

      </tr>

    </tbody>
  </table>
  <?php } 

 } 
}else{
  header('location:index.php');
}
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

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

<?php
if (isset($_POST["deconnection"])) {

session_unset(); 
 header('location:index.php');
}

?>
</body>
</html>