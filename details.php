<!DOCTYPE html>
<html>
    <head>
        <title>Parties</title>
	    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <title>Parties</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link href='assets/css/rotating-card.css' rel='stylesheet' />
        <link rel="stylesheetَ" type="text/css" href="assets/css/style.css">
    </head>
<?php include('connection.php');
$idpartie = $_GET["idp"];

$res = mysqli_query($conn,"SELECT * from partie where idpartie = $idpartie");

$row = mysqli_fetch_assoc($res);

 ?>

    <body style="background-image: url('<?php echo$row["partie_image"]?>');">

        <script type="text/javascript">
            function verifier(){
        var name = document.forms["f"]["name"];
        var lastname = document.forms["f"]["lastname"];
        var cin = document.forms["f"]["cin"];
        var password = document.forms["f"]["password"];
        var datenaiss = document.forms["f"]["datenaiss"];
        var address = document.forms["f"]["address"];
        var tel = document.forms["f"]["phone"];

        if (name.value == "") {
              name.style.border = "1px solid red";
              name.focus();
              return false;
            
}
        if (lastname.value == "" ) {
              lastname.style.border = "1px solid red";
              lastname.focus();
              return false;
            
}
        if (cin.value == "" ) {
              cin.style.border = "1px solid red";
              cin.focus();
              return false;
            
}

        if (password.value == "" ) {
              password.style.border = "1px solid red";
              password.focus();
              return false;
            
}

        if (datenaiss.value == "" ) {
              datenaiss.style.border = "1px solid red";
              datenaiss.focus();
              return false;
            
}

        if (address.value == "" ) {
              address.style.border = "1px solid red";
              address.focus();
              return false;
            
}

        if (tel.value == "" ) {
              tel.style.border = "1px solid red";
              tel.focus();
              return false;
            
}
return true;
    }
        </script>
        <header>
            <nav class="navbar fixed-top navbar-expand navbar-light bg-light">
                <a class="navbar-brand logo" href="index.html#home">
                    <img src="assets/img/logo.PNG">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample02">
                    <ul class="navbar-nav mr-auto"></ul>
                    <ul class="navbar-nav float-right">
                       <?php
                        session_start();
                         if (!isset($_SESSION["CIN"])) {
                            
                         ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html#home">
                                <ion-icon name="home"></ion-icon> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="partiesList.html">
                                <ion-icon name="people"></ion-icon> Parties
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html#news">
                                <ion-icon name="paper"></ion-icon> News
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html#about">
                                <ion-icon name="information-circle-outline"></ion-icon> About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html#contact">
                                <ion-icon name="call"></ion-icon> Contact Us
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-info" href="#" data-toggle="modal" data-target="#SignUp">
                                <ion-icon name="person-add"></ion-icon> <strong>Sign up</strong>
                            </a>
                        </li>
                    <?php }else{ ?>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-info" href="user.php">
                                <img src="assets/img/download.png" width="50" height="50">
                            </a>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </nav>
        </header>

        <div style="margin: 160px 0px 0px 260px;">
            
        </div>
        <div style="margin: 60px;">
            <div class="container" style="background-color: #f2f2f2; box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12); " align="center">
             	<div class="row justify-content-center" style="height: 950px;">
             		<div class="col-0">
                        <div class="alert alert-primary" role="alert">
                            <h2 align="center"><?php echo$row["full_name"]?></h2>
                        </div>
                    </div>
                    <div class="col-0" align="center">
                        <img width="200" height="200" src="<?php echo$row["leader_image"]?>" class="rounded-circle float-center" alt="Sample image" />
                        <h4><?php echo$row["leader_name"]?></h4><br />
                            <div class="col-md-6 alert alert-info">
                                <h5>les condidats</h5><br />
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                        <img src="assets/img/user.PNG" class="rounded-circle float-center" alt="Sample image" width="100" height="100"><br />aaaaaa
                                    </div>
                                    <div class="col-3">
                                        <img src="assets/img/user.PNG" class="rounded-circle float-center" alt="Sample image" width="100" height="100"><br />bbbbbb
                                    </div>
                                    <div class="col-3">
                                        <img src="assets/img/user.PNG" class="rounded-circle float-center" alt="Sample image" width="100" height="100"><br />cccccc
                                    </div>
                                    <div class="col-3">
                                        <img src="assets/img/user.PNG" class="rounded-circle float-center" alt="Sample image" width="100" height="100"><br />dddddd
                                    </div>
                                </div>
                            </div><br>

                            <div  class="col-md-4 alert alert-info">
                                <h5>Goal of party</h5>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    Natural Reader is a professional text to speech program that converts any written text into spoken words. The paid versions of Natural Reader have many more features.
                                    If you are interested in using our voices for non-personal use such as for Youtube videos, e-Learning, or other commercial or public purposes, please check out our Natural Reader Commercial web application.
                                </div>
                            </div><br><br><br>
                            <div class="row justify-content-end">
                                <?php
                       
                                 if (isset($_SESSION["CIN"])) {
                            
                                ?>
                                <div class="col-4">
                                    <a href="vote.php"><button type="button" class="btn btn-outline-info btn-lg" style="width: 12rem;"><strong>Voter</strong></button></a><br>
                                </div>
                                <?php }else{ ?>
                                    <a class="nav-link btn btn-outline-info btn-lg" href="#" data-toggle="modal" data-target="#SignUp" style="width: 12rem;"><ion-icon name="person-add"></ion-icon> <strong>Sign up</strong>
                                    </a>


                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Modal -->
        <div  class="modal fade" id="SignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Sign Up</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="inscription.php" method="POST" name="f" onsubmit="return verifier();">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>name : </label>
                                <input type="text" class="form-control" placeholder="your full name" name="name">
                            </div>
                            <div class="form-group">
                                <label>Last name : </label>
                                <input type="text" class="form-control" placeholder="your full name" name="lastname">
                            </div>
                            <div class="form-group">
                                <label>CIN : </label>
                                <input type="text" class="form-control" placeholder="your cin" name="cin">
                            </div>
                            <div class="form-group">
                                <label>Password : </label>
                                <input type="password" class="form-control" placeholder="your password" name="password">
                            </div>
                            <div class="form-group">
                                <label>Birth date : </label>
                                <input type="date" class="form-control" placeholder="your birth date" name="datenaiss">
                            </div>
                            <div class="form-group">
                                <label>Address : </label>
                                <input type="text" class="form-control" placeholder="your adresse" name="address">
                            </div>
                            <div class="form-group">
                                <label>Phone : </label>
                                <input type="text" class="form-control" placeholder="your phone number" name="phone">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="valideInscrit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                
        <script type="text/javascript" src="assets/js/app.js"></script>
        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <script type="text/javascript" src="assets/js/popper.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/ionicons@4.5.1/dist/ionicons.js"></script>
    </body>
</html>