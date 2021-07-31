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
        .nav-list :hover{
            text-decoration: underline;
        }
        select{
            background-color: #000099;
            color: white;
            height: 38px;
            border: 0ch;
            text-align: center;
        }
        #doccity{
            width: 150px;
            padding-left: 7px;
        }
        #docsplztn{
            width: 163px;
            padding-left: 7px;
        }
        #search{
            text-align: center;
            padding-top: 150px;
            width: 800px;
            margin: auto;
        }
        #searchbutton{
            height: 38px;
            width: 38px;
            border: 0ch;
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
                            <li class="nav-list"><a href="about_us.php">About Us</a></li>
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

    <div id="search" class="col align-items-center">
        <h1 style="font-size: 70px; color: white;">Make an Appointment</h1><br>
        <form action="docsss.php" method="POST">
            <div class="row align-items-center no-gutters" style="float:none; margin: auto; width: 351px; padding-bottom: 95px;">
                <div class="dropdown col">
                    <select id="doccity" name="doccity">
                        <option value="City" style="display: none;">Search Location</option>
                        <option value="Ahmedabad">Ahmedabad</option>
                        <option value="Bangalore">Bangalore</option>
                        <option value="Chennai">Chennai</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Hyderabad">Hyderabad</option>
                        <option value="Kolkata">Kolkata</option>
                        <option value="Lucknow">Lucknow</option>
                        <option value="Mumbai">Mumbai</option>
                        <option value="Vijayawada">Vijayawada</option>
                    </select>
                </div>
                <div class="dropdown col">              
                    <select id="docsplztn" name="docsplztn">
                        <option value="Specialization" style="display: none;">Search Speciality</option>
                        <option value="Pediatrician">Pediatrician</option>
                        <option value="GeneralPhysician">General Physician</option>
                        <option value="Dentist">Dentist</option>
                        <option value="Dermatologist">Dermatologist</option>
                        <option value="Optometrist">Optometrist</option>
                        <option value="Orthopedist">Orthopedist</option>
                        <option value="Radiologist">Radiologist</option>
                        <option value="Virologist">Virologist</option>
                        <option value="Ayurvedist">Ayurvedist</option>
                    </select>
                </div>
                <div class="search-container col">
                    <button id="searchbutton" type="submit" style="cursor: pointer;"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <section class="with-medical">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <h1 style="color: #000099;">We are your Trusted Friend</h1><br>
                    <ul style="font-size: larger;">
                        <li>&#9830; 24/7 Support</li>
                        <li>&#9830; Emergency Appointment</li>
                        <li>&#9830; Online Consultation</li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12">
                    <img src="assets/images/Doc BG.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="key-features department">
        <div class="container">
            <div class="inner-title" style="color: white;">
                <h2><b>Consult top doctors for any health concern</b></h2>
                <p>Private online consultations with verified doctors in all specialists</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <figure>
                            <img src="assets/images/Pediatrics.jpg" alt="">
                        </figure>
                        <h5>Pediatrics</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <figure>
                            <img src="assets/images/Dermatology.jpg" alt="">
                        </figure>
                        <h5>Dermatology</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <figure>
                            <img src="assets/images/Optometry.jpg" alt="">
                        </figure>
                        <h5>Optometry</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <figure>
                            <img src="assets/images/Orthopedics.jpg" alt="">
                        </figure>
                        <h5>Orthopedics</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <figure>
                            <img src="assets/images/Radiology.jpg" alt="">
                        </figure>
                        <h5>Radiology</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <figure>
                            <img src="assets/images/Virology.jpg" alt="">
                        </figure>
                        <h5>Virology</h5>
                    </div>
                </div>
        </div>

    </section>
    <div class="copy" style="background-color: white;">
        <div class="container">
            <p style="color: black; text-align: center;">Copyright &copy; 2021, Medico. All rights reserved.</p>
        </div>
    </div>

</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/js/script.js"></script>


</html>