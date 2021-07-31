<?php
    session_start();
?>
<?php
include('config.php');
if(isset($_POST['register'])){
    $docname = $_POST['docname'];
    $docemail = $_POST['docemail'];
    $docno = $_POST['docno'];
    $docsplztn = $_POST['docsplztn'];
    $docexp = $_POST['docexp'];
    $dochosp = $_POST['dochosp'];
    $docadd = $_POST['docadd'];
    $doccity = $_POST['doccity'];
    $docfees = $_POST['docfees'];
    $check = mysqli_query($conn, "SELECT E_mail FROM doctors WHERE E_mail = '".$_POST['docemail']."'");
    if(mysqli_num_rows($check)>0) {
        echo '<script>alert("E-Mail already exists!")</script>'; 
    }
    else if(!preg_match('/^[0-9]{10}+$/', $docno)) {
        echo '<script>alert("Enter a valid 10-digit phone number!")</script>'; 
    }
    else{
        $sql = "INSERT INTO doctors(Doc_Name,E_Mail,Phone_No,Specialization,Experience,Clinic_Name,Address,City,Consultation_Fees) VALUES('$docname','$docemail','$docno','$docsplztn','$docexp','$dochosp','$docadd','$doccity','$docfees')";
        mysqli_query($conn, $sql);
        if(!$sql) {
            echo '<script>alert("Registration failed!")</script>'; 
        } 
        else {
            header('Location:index.php');        
        }
    }
}

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
        select{
            display: block;
            width: 100%;
            text-align: center;
        }
        input, select{
            border: 1px solid #000099;
        }
        table{
            margin: auto;
        }
        td{
            padding: 8px;
            font-weight: bold;
            font-size: large;
        }
        .reg{
            background-color: #000099;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }
        .reg:hover{
            color: #000099;
            background-color: white;
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
			padding: 10px;
		}
		table, tr, td{
			padding: 4px;
			font-size: 17px;		
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
    <div class="container" id="main" align=center>
        <h1 style="color: #000099; font-size: 50px;">Doctor Registration</h1><br>
        <form action="registerdoc.php" method="post" name="docreg">
            <table>
                <tr>
                    <td>
                        Name: 
                    </td>
                    <td>
                        <input type="text" id="docname" name="docname"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        E-mail: 
                    </td>
                    <td>
                        <input type="email" id="docemail" name="docemail"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Phone Number: 
                    </td>
                    <td>
                        <input type="text" required id="docno" name="docno"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Specialization: 
                    </td>
                    <td>
                        <select name="docsplztn">
                            <option value="Specialization" style="display: none;">--Specialization--</option>
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
                    </td>
                </tr>
                <tr>
                    <td>
                        Years of experience: 
                    </td>
                    <td>
                        <input type="text" id="docexp" name="docexp"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Clinic/Hospital name: 
                    </td>
                    <td>
                        <input type="text" id="dochosp" name="dochosp"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Address: 
                    </td>
                    <td>
                        <input type="text" id="docadd" name="docadd"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        City: 
                    </td>
                    <td>
                        <select name="doccity">
                            <option value="City" style="display: none;">--City--</option>
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
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 30px;">
                        Consultation fees: 
                    </td>
                    <td style="padding-bottom: 30px;">
                        <input type="text" id="docfees" name="docfees"/>
                    </td>
                </tr>
                <tr>
                <td colspan="2">
                        <input class="reg" type="submit" name="register" value="Register" style="width: 49.25%; text-align: center; display: inline;"/>
                        <input class="reg" style="width: 49.25%;" type="reset" value="Cancel"/>
                </td>
                </tr>
            </table>
        </form>
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