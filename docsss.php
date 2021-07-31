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
        #page{
            position: relative;
            min-height: 100vh;
        }
        #main{
            padding-top: 150px;
            padding-bottom: 100px;
        }
        .doc{
            background-color: #f0f0f0;;
            border-radius: 10px;
            box-shadow: 3px 3px 15px black;
            padding: 15px;
        }
        .docbox{
            padding-bottom: 40px;
        }
        #book{
            border-radius: 4px;
            padding: 4px;
            border: none;
            padding-left: 10px;
            padding-right: 10px;
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
			padding: 30px;
			padding-top: 120px;
			padding-bottom: 60px;
		}
		table, tr, td{
			font-size: 15px;
			padding: 5px;		
		}
	}

    </style>
</head>
<body>
    <div id="page">
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
    <div align=center class="container" id="main">
    <?php
        include('config.php');
        $doccity = $_POST["doccity"];
        $docsplztn = $_POST["docsplztn"];
        if($doccity=='City' && $docsplztn=='Specialization'){
            $doccity = "City";
            $docsplztn = "Specialization";
            $records = mysqli_query($conn,"select * from doctors");
        }
        else{
            $records = mysqli_query($conn,"select * from doctors where City='$doccity' and Specialization='$docsplztn'");
        }
        while($data = mysqli_fetch_array($records)){
        ?>
        <div class="docbox">
        <div class="doc row">
            <div class="col" align=left>
                <h2 style="color: #000099;"><?php echo $data['Doc_Name']; ?></h2>
                <p style="font-size: x-large;"><?php echo $data['Specialization']; ?></p>
                <p><?php echo $data['Experience'];?> years experience</p><br>
                <h5 style="display: inline;"><?php echo $data['Clinic_Name']; ?> &#x2022 </h5><p style="display: inline;"><?php echo $data['Address']; ?></p>
            </div>
            <div class="col" align=right>
                <h4 style="padding-top: 8px; padding-bottom: 48px;">&#9742; <?php echo $data['Phone_No']; ?></h4>
                <h5>Rs. <?php echo $data['Consultation_Fees']; ?> Consultation fee</h5>
                <form action="docsss.php" method="POST">
                    <button id="book" style="cursor: pointer; background-color: #000099; color: white;" type="submit">
                    <?php
                    if(!isset($_SESSION['loggedin'])){
                    $_SESSION['Doc_ID'] = $data['Doc_IDd'];
                 
                    ?>
                        <a href="registeruser.php" style="color: white">Book Appointment</a>
                    <?php }else{ ?>
                      
                        <a href="book.php?Doc_ID=<?php echo $data['Doc_IDd'];?>" style="color: white">Book Appointment</a>
                    <?php   }
                    ?>
                    </button>
                </form>
            </div>
        </div>
        </div>
        <?php } ?>
    </div>
    <footer style="background-color: white;">
        <p style="color: black; text-align: center; padding-top: 20px;">Copyright &copy; 2021, Medico. All rights reserved.</p>
    </footer>
    </div>
</body>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/js/script.js"></script>
</html>