<?php

if (isset($_POST['data'])){
    $courseName=json_decode($_POST['data']);
   
    
}
session_start();
if (!$_SESSION['loggedin']){ 
    header("Location:../index.php");
    die();
}
include '../db_connection.php';


$conn = OpenCon();

$sql="SELECT subject_name FROM course natural join subject where couseName='$courseName'";

$allData=$conn -> query($sql);

$array = array();
while($row = mysqli_fetch_assoc($allData)){
    $array[] = $row;
}


CloseCon($conn);

$return = new stdClass;
$return->success=true;
$return->errorMessage="Error,AJAX failed";
$return->data["subjects"]=$array;

$jsonResponse=json_encode($return);
echo $jsonResponse

?>