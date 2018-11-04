<?php
include 'db_connection.php';
$conn = OpenCon();
//check anyone has logged in
session_start();
if (!$_SESSION['loggedin']){ 
    header("Location:index.php");
    die();
}
$course =$_SESSION['course'];
$subject =$_SESSION['subject'];
$_SESSION = '';
$_SESSION = '';
$barcodeText='';



    if(isset($_POST['name']) && isset($_POST['des'])){
        $nam = $_POST['name'];
        $des = $_POST['des'];

        $sql = "INSERT into assignments(subject_ID,courseID,name,description) values ('$subject','$course','$nam','$des')";
        
        $conn->query($sql)or die("Query Field". $conn->error);


        
    }

    
    



?>

<html lang="en">
<head>
    <title>Assignment</title>
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
                            Assignment
                    </span>
            </div>

            <form class="login100-form validate-form" action ="" method = "POST">
                <div class="wrap-input100 validate-input m-b-26" data-validate="Name is required">
                    <span class="label-input100">Name </span>
                    <input class="input100" type="text" name="name" placeholder="Enter Assignment Name">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate = "Description is required">
                    <span class="label-input100">Description</span>
                    <input class="input100" type="text" name="des" value="" placeholder="Enter Name">
                    <span class="focus-input100"></span>
                </div>


                


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type = "submit">
                        Add Assignment
                    </button>                    
                </div>
                <?php
                        if(isset($_POST['name'])) {
                            $barcodeText = $nam.' '.$des;
                            
                            $barcodeSize=100;
                            $printText='true';
                            if($barcodeText != '') {
                                //echo '<h4>Barcode:</h4>';
                                echo '<img class="barcode" alt="'.$barcodeText.'" src="barcode.php?text='.$barcodeText.'&size='.$barcodeSize.'&print='.$printText.'"/>';
                            } else {
                               
                            }   
                        }
                    ?>
            </form>
        </div>
    </div>
</div> -->

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
