<?php 
session_start();
if (!$_SESSION['loggedin']){ 
    header("Location:index.php");
    die();
}
//include db_connection class
include 'db_connection.php';
//get a db_connection
$conn = OpenCon();
//start the session
session_start();

if($_SERVER["REQUEST_METHOD"]=="GET"){
    
    if(isset($_GET['reg_no'])){
        $username = $_GET['reg_no'];
    }

    if(isset($reg_no)){
        $sql = "SELECT * FROM student WHERE username = '$reg_no'";
        $results = $conn -> query($sql);
        $count=mysqli_num_rows($results);
    }
    CloseCon($conn);
}


?>

 <meta name="viewport" content="width=device-width, initial-scale=1">
    

<!DOCTYPE html>
<html>

<head>
    <?php include 'up.php' ; ?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Print Content</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/print.css">
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
    
    <script type="text/javascript">



    function Popup() 
    {     
        
        window.print()
        return true;
    }

</script>
    </head>
<?php
if(isset($reg_no)){

?>
<body>
    <div class="print">
    <?php foreach ($results as $details) ?>
    <div class="data_table">
        
            <table class="table">
            <tbody>
            <th><h6><b>Personal Information</b></h6></th>
                    
                    <tr>
                        <td class="column1">NIC Number</td>
                        <td class="column1"><?php echo($details['reg_no']); ?></td>
                    </tr>
                    <tr>
                        <td class="column1">Date of Birth</td>
                        <td class="column1"><?php echo($details['dob']); ?></td>
                    </tr>
                    <tr>
                        <td class="column1">Gender</td>
                        <td class="column1"><?php echo($details['gender']); ?></td>
                    </tr>
                    
                
            
                <th><h6><b>HoD / Coordinator </b></h6> </th>
                    
                    <tr>
                        <td class="column1">Signature</td>
                        <td class="column1"></td>
                    </tr>
                    <tr>
                        <td class="column1">Name</td>
                        <td class="column1">dummy</td>
                    </tr>
                    <tr>
                        <td class="column1">Date</td>
                        <td class="column1">dummy</td>
                    </tr>
                    
                

                <th><h6><b>Registrar</b></h6></th>
                    
                    <tr>
                        <td class="column1">Signature</td>
                        <td class="column1"></td>
                    </tr>
                    <tr>
                        <td class="column1">Name</td>
                        <td class="column1">dummy</td>
                    </tr>
                    <tr>
                        <td class="column1">Date</td>
                        <td class="column1">dummy</td>
                    </tr>
                    
                </div>


                </tbody>
            </table>
    </div>
    <button  class="login100-form-btn print-btn" type = "submit" style="margin:5%;" id="print" onclick="Popup()" >Print</button>
    </div>

    

<?php
    }
?>





    
</body>
</html>