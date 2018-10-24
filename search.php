<?php
//include db_connection class
include 'db_connection.php';
//get a db_connection
$conn = OpenCon();
//start the session
session_start();

if (!$_SESSION['loggedin']){ 
    header("Location:index.php");
    die();
}
if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(isset($_POST['reg_no'])){
        $reg_no = $_POST['reg_no'];
    }

    if(isset($reg_no)){
        $sql = "SELECT * FROM student WHERE name = '$reg_no'";
        $results = $conn -> query($sql);
        $count=mysqli_num_rows($results);
        foreach ($results as $details){
            Header("Location: printdata.php?reg_no=".$details['reg_no']);
        }
    }
    CloseCon($conn);

}

?>
<html lang="en">
<head>
    <title>Search</title>
    
  
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
                            Search
                    </span>
            </div>

            <form class="login100-form validate-form" action ="" method = "POST">
                <div class="wrap-input100">
                    <span class="label-input100">Register No</span>
                    <input class="input100" type="text" name="password" placeholder="Enter Register Number">
                    <span class="focus-input100"></span>
                </div>
                <br><br>




                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type = "submit" style="margin:5%">
                        Search
                    </button>
                </div>

                <div class="container-login100-form-btn">
                
                    <button  class="login100-form-btn" type = "submit" style="margin:5%" id="print" onclick="printContent(document.getElementById('printdiv'));" >Print</button>
                </div>
            </form>


<?php
    if(isset($results)){
    ?>

    <div class='container' id='printDiv' style='width:472px; height: 332px'>


        <table class='table'>
            <tbody>

            <?php foreach ($results

            as $details) ?>
            
            <tr>
                <td class="column1">Register Number</td>
                <td class="column1"><?php echo($details['reg_no']); ?></td>
            </tr>
            <tr>
                <td class="column1">Full Name</td>
                <td class="column1"><?php echo($details['username']); ?></td>
            </tr>
            <tr>
                <td class="column1">Address</td>
                <td class="column1"><?php echo($details['address']); ?></td>
            </tr>
            <tr>
                <td class="column1">Admission Program</td>
                <td class="column1"><?php echo($details['program_of_add']); ?></td>
            </tr>
            <tr>
                <td class="column1">Admission Date</td>
                <td class="column1"><?php echo($details['date _of_add']); ?></td>
            </tr>
            <tr>
                <td class="column1">NIC number</td>
                <td class="column1"><?php echo($details['NIC']); ?></td>
            </tr>
            <tr>
                <td class="column1">Date of Birth</td>
                <td class="column1"><?php echo($details['dob']); ?></td>
            </tr>
            <tr>
                <td class="column1">Gender</td>
                <td class="column1"><?php echo($details['gender']); ?></td>
            </tr>


            </tbody>
        </table>
    </div>
    <?php
}
            ?>

</div>












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