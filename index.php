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
	</head>
	<body>
		<script type="text/javascript">
			const verifyExistence = (cin) => {
				let xml = new XMLHttpRequest();
				xml.open('POST', 'api/verifyExistenceService.php', true);
				xml.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xml.send(`cin=${cin}&action=testing`);
				xml.onreadystatechange = () => {
					if (xml.readyState == 4 && xml.status == 200) {
						// Swal.fire({
						//   text: xml.responseText,
						//   type: 'info',
						// });
						console.log(xml.responseText);
					}
				}
			}
			const verifyInscriptionForm = (event) => {
				event.preventDefault();
				let {firstName, lastName, cin, password, birthDate, address, phone} = document.forms["inscriptionForm"].elements, 
					verified = true;
				[firstName, lastName, cin, password, birthDate, address, phone].forEach(input=>{
					if(input.value == "") {input.style.border = "1px solid red"; input.focus(); verified = false;}
				})
				if(!verified){verifyExistence(cin.value);}
				return verified;
			}
    		
			const verifyLogInForm = () => {
        		let {cin, password} = document.forms["loginForm"].elements, verified = true;
				[cin, password].forEach(input=>{
					if(input.value == "") {input.style.border = "1px solid red"; input.focus(); verified = false;}
				})
				return verified;
    		}
		</script>
        <?php session_start(); ?>
		<header>
	   		<nav class="navbar fixed-top navbar-expand navbar-light bg-light">
	   			<a class="navbar-brand logo" href="#home">
	   				<img src="assets/img/logo.PNG">
	   			</a>
		      	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
		        	<span class="navbar-toggler-icon"></span>
		      	</button>

		      	<div class="collapse navbar-collapse" id="navbarsExample02">
		        	<ul class="navbar-nav mr-auto"></ul>
		        	<ul class="navbar-nav float-right">
		        		<li class="nav-item">
		   					<a class="nav-link" href="#home">
		   						<ion-icon name="home"></ion-icon> Home
		   					</a>
			   			</li>
			   			<li class="nav-item">
		   					<a class="nav-link" href="partiesList.php">
		   						<ion-icon name="people"></ion-icon> Parties
		   					</a>
			   			</li>
			   			<li class="nav-item">
			   				<a class="nav-link" href="#news">
			   					<ion-icon name="paper"></ion-icon> News
			   				</a>
			   			</li>
		   				<li class="nav-item">
		   					<a class="nav-link" href="#about">
		   						<ion-icon name="information-circle-outline"></ion-icon> About
		   					</a>
			   			</li>
			   			<li class="nav-item">
			   				<a class="nav-link" href="#contact">
			   					<ion-icon name="call"></ion-icon> Contact Us
			   				</a>
			   			</li>
                        <?php
                        
                         if (!isset($_SESSION["CIN"])) {
                            
                         ?>
			   			<li class="nav-item">
			   				<a class="nav-link btn btn-outline-info" href="#" data-toggle="modal" data-target="#SignUp">
			   					<ion-icon name="person-add"></ion-icon> <strong>Sign up</strong>
			   				</a>
			   			</li>
                        <?php }else{ ?>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-info" href="user.php">
                                <img src="assets/img/download.png" width="30" height="30">
                            </a>
                        </li>
                    <?php } ?>
			        </ul>
		      	</div>
		    </nav>
		</header>

		<video autoplay loop muted id="myVideo">
		  	<source src="assets/vid/preview.mp4" type="video/mp4" class="source">
		</video>

	   	<div class="scrolling-box">
	   		<section id="home" class="slide">
		   		<div class="container">
		   		   	<h1>Home Section</h1>
					
					<?php if (!isset($_SESSION["CIN"])) {?>
						<button class="btn btn-warning btn-lg login" class="button" data-toggle="modal" data-target="#Login">Login</button>
					<?php } ?>
 
			   		<div class="scrolling-keys" style="margin: 0px 0px 0px 200px;">
				   		<a href="#about" class="btn btn-sm btn-outline-info">
				   			<ion-icon name="arrow-round-down"></ion-icon>
				   		</a>
			   		</div>
			   	</div>
	   		</section>
	   		<section id="about" class="slide">
		   		<div class="container">
		   		   	<h1>About Section</h1>
			   		<div class="scrolling-keys" style="margin: 0px 0px 0px 200px;">
				   		<a href="#home" class="btn btn-sm btn-outline-info">
				   			<ion-icon name="arrow-round-up"></ion-icon>
				   		</a>
				   		<a href="#news" class="btn btn-sm btn-outline-info">
				   			<ion-icon name="arrow-round-down"></ion-icon>
				   		</a>
			   		</div>
		   		</div>
	   		</section>
	   		<section id="news" class="slide">
		   		<div class="container">
		   		   	<h1>News Section</h1>
			   		<div class="scrolling-keys" style="margin: 0px 0px 0px 200px;">
				   		<a href="#home" class="btn btn-sm btn-outline-info">
				   			<ion-icon name="arrow-round-up"></ion-icon>
				   		</a>
				   		<a href="#contact" class="btn btn-sm btn-outline-info">
				   			<ion-icon name="arrow-round-down"></ion-icon>
				   		</a>
			   		</div>
		   		</div>
	   		</section>
	   		<section id="contact" class="slide">
	   			<div class="container">
		   		   	<h1>Contact Us Section</h1><br /><br />
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <div class="card-container" style="height: 20rem !important;">
                                <div class="card">
                                    <div class="front" style="height: 20rem !important;">
                                        <div class="cover">
                                            <img src="assets/img/rotating_card_thumb3.png"/>
                                        </div>
                                        <div class="user">
                                            <img class="img-circle" src="assets/img/rotating_card_profile.png"/>
                                        </div>  
                                        <div class="content">
                                            <div class="main">
                                                <h3 class="name">Inna Corman</h3>
                                                <p class="profession">Product Manager</p>
                                            </div>
                                        </div>
                                    </div> <!-- end front panel -->
                                    <div class="back" style="height: 20rem !important;">
                                        <div class="header">
                                            <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                                        </div>      
                                        <div class="content" style="height: 20rem !important;">
                                            <div class="main">
                                                <p class="text-center">Adresse : rue 55 Num 12...</p>
                                                <p>Telephone : 0632779844</p>
                                            </div>
                                        </div><br>
                                        <div class="footer">
                                            <div class="social-links text-center">
                                                <a href="http://creative-tim.com" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                                <a href="http://creative-tim.com" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                                <a href="http://creative-tim.com" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                                            </div>
                                        </div>
                                    </div> <!-- end back panel -->
                                </div> <!-- end card -->
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card-container" style="height: 20rem !important;">
                                <div class="card">
                                    <div class="front" style="height: 20rem !important;">
                                        <div class="cover">
                                            <img src="assets/img/rotating_card_thumb3.png"/>
                                        </div>
                                        <div class="user">
                                            <img class="img-circle" src="assets/img/rotating_card_profile.png"/>
                                        </div>  
                                        <div class="content">
                                            <div class="main">
                                                <h3 class="name">Inna Corman</h3>
                                                <p class="profession">Product Manager</p>
                                            </div>
                                        </div>
                                    </div> <!-- end front panel -->
                                    <div class="back" style="height: 20rem !important;">
                                        <div class="header">
                                            <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                                        </div>      
                                        <div class="content" style="height: 20rem !important;">
                                            <div class="main">
                                                <p class="text-center">Adresse : rue 55 Num 12...</p>
                                                <p>Telephone : 0632779844</p>
                                            </div>
                                        </div><br>
                                        <div class="footer">
                                            <div class="social-links text-center">
                                                <a href="http://creative-tim.com" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                                <a href="http://creative-tim.com" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                                <a href="http://creative-tim.com" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                                            </div>
                                        </div>
                                    </div> <!-- end back panel -->
                                </div> <!-- end card -->
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card-container" style="height: 20rem !important;">
                                <div class="card">
                                    <div class="front" style="height: 20rem !important;">
                                        <div class="cover">
                                            <img src="assets/img/rotating_card_thumb3.png"/>
                                        </div>
                                        <div class="user">
                                            <img class="img-circle" src="assets/img/rotating_card_profile.png"/>
                                        </div>  
                                        <div class="content">
                                            <div class="main">
                                                <h3 class="name">Inna Corman</h3>
                                                <p class="profession">Product Manager</p>
                                            </div>
                                        </div>
                                    </div> <!-- end front panel -->
                                    <div class="back" style="height: 20rem !important;">
                                        <div class="header">
                                            <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                                        </div>      
                                        <div class="content" style="height: 20rem !important;">
                                            <div class="main">
                                                <p class="text-center">Adresse : rue 55 Num 12...</p>
                                                <p>Telephone : 0632779844</p>
                                            </div>
                                        </div><br>
                                        <div class="footer">
                                            <div class="social-links text-center">
                                                <a href="http://creative-tim.com" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                                <a href="http://creative-tim.com" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                                <a href="http://creative-tim.com" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                                            </div>
                                        </div>
                                    </div> <!-- end back panel -->
                                </div> <!-- end card -->
                            </div>
                        </div>
                    </div>
                    <div class="scrolling-keys" style="margin: 0px 0px 0px 200px;">
                        <a href="#home" class="btn btn-sm btn-outline-info">
                            <ion-icon name="arrow-round-up"></ion-icon>
                        </a>
                    </div>
                </div>
            </section>
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

		<div id="Login" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		   	<div class="modal-dialog modal-dialog-centered" role="document">
		   		<div class="modal-content">
		   		   	<div class="modal-header">
		   		   		<h5 class="modal-title" id="exampleModalLongTitle">login</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
		   		   	</div>
		   		   	<form action="inscription.php" method="POST" name="loginForm" onsubmit="return verifyLogInForm();">
			   		   	<div class="modal-body">
			   		   		<div class="form-group">
						    	<label>CIN : </label>
						    	<input type="text" class="form-control" placeholder="Your CIN" name="cin">
						  	</div>
						  	<div class="form-group">
						    	<label>Password : </label>
						    	<input type="text" class="form-control" placeholder="Your Password" name="password">
						  	</div>
			   		   	</div>
			   		   	<div class="modal-footer">
			   		   		<button type="submit" class="btn btn-primary" name="submitLogin">Enter</button>
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
	   	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	</body>
</html>