<!DOCTYPE html>
<html>
<head>
	<title>Voter</title>
	        <meta charset="utf-8">
	        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheetَ" type="text/css" href="assets/css/stylevote.css">
        <script type="text/javascript" src="assets/js/verification.js"></script>
<style type="text/css">
.cotainer{
	margin-top: 80%;

}
.inner{
	overflow: hidden;
}
.inner img{
	transition: all 1.5s ease;

}
.inner:hover img{
	transform: scale(1.3);

    content: url("assets/img/papiers-peints-bon-signe.gif");

}
</style>
</head>
<body>
    <header style="height: 100px; ">
        <nav  class="navbar navbar-toggleable-sm navbar-inverse bg-inverse">

                <a class="navbar-brand logo" href="index.php">
                    <img src="assets/img/logo.PNG">
                </a>
                <div class="navbar-toggler navbar-toggler-right">
                 <a class="nav-link btn btn-outline-info" href="user.php" >
                    <img src="assets/img/download.png" width="40" height="40">
                </a>
                </div>
        </nav>
    </header>
<?php
include('connection.php');
session_start();
$id_user = $_SESSION["CIN"];
$res = mysqli_query($conn,"SELECT * FROM inscrit WHERE cin = '$id_user' and idpartie='0'");
if (mysqli_num_rows($res) <> 0) {
?>
        <dir class="container">
        	<dir class="row justify-content-center">

<?php 

$res = mysqli_query($conn,"SELECT * from partie");

while ($row = mysqli_fetch_assoc($res)) {  ?>
        		<dir class="col-md-4">
        			<div class="card shadow" style="width: 16rem;">
        				<dir class="inner">
        					<a onclick="return valider_vote();" href="valider.php?idparty=<?php echo$row["idpartie"] ?>" ><img style="margin: 10px 0px 0px -20px;"   class="card-img-top" src="<?php echo$row["partie_image"] ?>" alt="Card image cap" width="200" height="200"></a>
        				</dir>
                          
                          <div class="card-body text-center">
                            <h5 class="card-title"><?php echo$row["full_name"] ?></h5>
                           
                    </div>
                </div>
        		</dir>
<?php }?>
        	</dir>
        </dir>	
<?php }else{ ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert" align="center"> 
                  
                   <strong>---------Vous Avez Déjâ Voté---------</strong>
               </div>
<?php }?>
</body>
</html>