<?php
include('connection.php');
session_start();
$name = $_POST["name"];
$lastname = $_POST["lastname"];
$cin = $_POST["cin"];
$password = $_POST["password"];
$datenaiss = $_POST["datenaiss"];
$address = $_POST["address"];
$phone = $_POST["phone"];
if (isset($_POST["valideInscrit"])) {


$req = mysqli_query($conn,"SELECT * FROM citoyen where cin ='$cin'");
$exe = mysqli_query($conn,"SELECT * FROM inscrit where cin ='$cin'");
$nbr = mysqli_num_rows($req);
$nbr1 = mysqli_num_rows($exe);
if ($nbr1 == 0) {
if ($nbr == 1) {

	$res = mysqli_query($conn,"INSERT INTO inscrit(cin,Nom,prenom,adresse,tele,password,datnaiss) VALUES('$cin','$lastname','$name','$address','$phone','$password','$datenaiss')");
$_SESSION["CIN"] = $cin;
	header('location:user.php');



}else{
	echo "<script>alert('Cin n\'existe pas')</script>";
	header('location:index.html');
}
}else{
	echo "<script>alert('Ce Citoyen est deja inscrit')</script>";
	header('location:index.html');
}
}
?>