<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Medico</title>
    <link rel="shortcut icon" href="assets/images/Logo Icon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <style>
        body{
            background-image: linear-gradient(to right, #0066ff , cyan);
        }
        .nav-list:hover{
            text-decoration: underline;
        }
        #main{
            padding-top: 150px;
            margin-bottom: 65px;;
        }
        #main{
            padding: 50px;
            padding-left: 150px;
            padding-right: 150px;
            border-radius: 20px;
            box-shadow: 3px 3px 15px black;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #f0f0f0;;
        }
        footer{
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 65px;
        }
	@media screen and (max-width: 1050px){
		#main{
			width: 80%;
			font-size: smaller;
			padding: 30px;		
			padding-left: 0px;
			padding-right: 0px;
		}
	}
    </style>
</head>
<body>
    <header>
        <div id="nav-head" class="header-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 no-padding col-sm-12 nav-img">
                        <a href="index.php"><img src="assets/images/Full Logo.png" alt=""></a>
                        <a data-toggle="collapse" data-target="#menu" href="#menu" ><i class="fas d-block d-md-none small-menu fa-bars"></i></a></li>
                    </div>
                    <div id="menu" class="col-lg-10 col-md-9 d-none d-md-block nav-item">
                        <ul>
                            <li class="nav-list"><a href="index.php">Home</a></li>
                            <li class="nav-list"><a href="registerdoc.php">Register</a></li>
                            <li class="nav-list"><a href="appointments.php">Appointments</a></li>
                            <li class="nav-list"><a href="about_us.html">About Us</a></li>
                        </ul>
                        <?php
			if(!isset($_SESSION['loggedin'])){
			?>
                        <ul class="nav navbar-nav mr-auto">
                            <li class="dropdown" style="padding-right: 0%;" align=right>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="registeruser.php">Sign Up</a></li>
                                    <li><a href="loginuser.php">Login</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
			<?php
			} else{?>
			<ul class="nav navbar-nav mr-auto">
                            <li class="dropdown" style="padding-right: 0%;" align=right>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white; border-radius: 4px; padding: 10px; background-color: #000099;"><?php echo $_SESSION['username']; ?>
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
			<?php
			}
			?>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container" id="main" align=center>
        <h1 style="color: #000099; font-size: 50px;">Designed and developed by</h1><br>
        <h2>JAI BHAARATH</h2>
    </div>
    <footer style="background-color: white;">
        <p style="color: black; text-align: center; padding-top: 20px;">Copyright &copy; 2021, Medico. All rights reserved.</p>
    </footer>
</body>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/js/script.js"></script>
</html>