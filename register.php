<?php
include 'db_connection.php';

$conn = OpenCon();
//check anyone has logged in
session_start();
if (!$_SESSION['loggedin']){ 
    header("Location:index.php");
    die();
}
$username = $password = "";
$u_error = $p_error ="";
//processing form data

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $reg_no =   isset($_POST['regNo'])? $_POST['regNo'] :'';
    $name =   isset($_POST['name'])? $_POST['name'] :'';
    $address =   isset($_POST['address'])? $_POST['address'] :'';
    $program =   isset($_POST['program'])? $_POST['program'] :'';
    $addmissionDate =   isset($_POST['addmissionDate'])? $_POST['addmissionDate'] :'';
    $nic =   isset($_POST['nic'])? $_POST['nic'] :'';
    $dob =   isset($_POST['dob'])? $_POST['dob'] :'';
    $gender =   isset($_POST['gender'])? $_POST['gender'] :'';

    if(isset($reg_no) && isset($address) && isset($addmissionDate) && isset($program) && isset($nic) && isset($dob) && isset($gender)){
        $sql = "INSERT into student values ('$reg_no','$address','$addmissionDate','$nic','$dob','$gender','$program','$name');";

        $conn->query($sql)or die("Query Field". $conn->error);
        header("location:register.php");
    }
    CloseCon($conn);
}
?>

<html lang="en">
<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>
<?php
include 'up.php';

?>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
                            Register
                    </span>
            </div>

            <form class="login100-form validate-form" action ="" method = "POST">
                <div class="wrap-input100 validate-input m-b-26" data-validate="Register No is required">
                    <span class="label-input100">Register No</span>
                    <input class="input100" type="text" name="regNo" placeholder="Enter Register No">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate = "Username is required">
                    <span class="label-input100">Name</span>
                    <input class="input100" type="text" name="name" value="" placeholder="Enter Name">
                    <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100 validate-input m-b-18" data-validate = "Address is required">
                    <span class="label-input100">Address</span>
                    <input class="input100" type="text" name="address" placeholder="Enter address">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-18" data-validate = "Program is required">
                    <span class="label-input100">Admission Program</span>
                    <select class="form-control" name = 'program'>
                        <option value="pick">Courses</option>
                        <?php
                            $sql = mysqli_query($conn, "SELECT * From course");
                            $row = mysqli_num_rows($sql);
                            while ($row = mysqli_fetch_array($sql)){
                                echo "<option value='".$row['courseID'] ."'>" .$row['couseName'] ."</option>" ;
                            }
                        ?>
                    </select>
                    <span class="focus-input100"></span>
                </div>
            
                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                    <span class="label-input100">Date of Addmission</span>
                    <input class="input100" type="date" name="addmissionDate" placeholder="Enter addmission date">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate = "NIC Number is required">
                    <span class="label-input100">NIC</span>
                    <input class="input100" type="text" name="nic" placeholder="Enter NIC Number">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate = "Birthday is required">
                    <span class="label-input100">Date of Birth</span>
                    <input class="input100" type="date" name="dob" placeholder="Enter birthday">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate = "Program is required">
                    <span class="label-input100">Gender</span>
                    <select class="form-control" name = 'gender'>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    </select>
                    <span class="focus-input100"></span>
                </div>


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type = "submit">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
