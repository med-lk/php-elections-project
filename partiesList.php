<!DOCTYPE html>
<html>
    <head>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <title>Party</title>
        <meta charset="utf-16">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-6" />
        <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link href='assets/css/rotating-card.css' rel='stylesheet' />
        <link rel="stylesheetَ" type="text/css" href="assets/css/style.css">

<script type="text/javascript">
            const verifyInscriptionForm = () => {
                let {firstName, lastName, cin, password, birthDate, address, phone} = document.forms["Form"].elements, 
                    verified = true;
                [firstName, lastName, cin, password, birthDate, address, phone].forEach(input=>{
                    if(input.value == "") {input.style.border = "1px solid red"; input.focus(); verified = false;}
                })
                return verified;
            }
</script>
    </head>
    <body>
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
                        <?php
                        session_start();
                         if (!isset($_SESSION["CIN"])) {
                            
                         ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <ion-icon name="home"></ion-icon> Home
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
                    <form action="inscription.php" method="POST" name="inscriptionForm" onsubmit="return verifyInscriptionForm();">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>name : </label>
                                <input type="text" class="form-control" placeholder="your full name" name="firstName">
                            </div>
                            <div class="form-group">
                                <label>Last name : </label>
                                <input type="text" class="form-control" placeholder="your full name" name="lastName">
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
                                <input type="date" class="form-control" placeholder="your birth date" name="birthDate">
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
                            <button type="submit" class="btn btn-primary" name="submitInscription">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card" style="margin-top: 140px; margin-left: 200px; width: 70rem;">
            <div class="card-header title text-center">
                <h1>Party :</h1>
            </div>
 <div class="card-body row" style="margin-top: 20px;">
<?php 
include("connection.php");
$res = mysqli_query($conn,"SELECT * from partie");

while ($row = mysqli_fetch_assoc($res)) {  ?>
           
                <div class="col-sm-4">
                    <div class="card-container">
                        <div class="card">
                            <div class="front">
                                <div class="cover">
                                    <img src="assets/img/rotating_card_thumb2.png"/>
                                </div>
                                <div class="user">
                                    <img class="img-circle" src="<?php echo$row["leader_image"] ?>"/>
                                </div>
                                <div class="content">
                                    <div class="main">
                                        <h3 class="name"><?php echo$row["leader_name"] ?></h3>
                                        <p class="profession">: حزب</p><br>
                                        <p class="text-center">                    
                                            <div class="user">
                                                <img class="img-circle" src="<?php echo$row["partie_image"] ?>"/>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div><!-- end front panel --> 
                            <div class="back">
                                <div class="header">
                                    <h5 class="motto">"Président Du Jarti Justice Et Développement"</h5>
                                </div>
                                <div class="content">
                                    <div class="main">
                                        <h4 class="text-center">Réformes Proposées</h4>
                                        <p class="text-center">Web design, Adobe Photoshop, HTML5, CSS3, Corel and many others...</p>
                                        <div class="stats-container"></div>
                                    </div>
                                </div>
                                <div align="center">
                                <a href="details.php?idp=<?php echo$row["idpartie"]?>"><button class="btn btn-primary btn-outline-info" > Parties</button></a>
                                </div>
                                <div class="footer">
                                    <div class="social-links text-center">
                                        <a href="#" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                        <a href="#" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                        <a href="#" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                                    </div>
                                </div>
                            </div> <!-- end back panel -->
                        </div> <!-- end card -->
                    </div> <!-- end card-container -->
                </div> <!-- end col sm 3 -->


<?php }  ?>
</div>

</div>
        

        <script type="text/javascript" src="assets/js/app.js"></script>
        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <script type="text/javascript" src="assets/js/popper.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/ionicons@4.5.1/dist/ionicons.js"></script>
    </body>
</html>