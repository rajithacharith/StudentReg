<?php
session_start();
if (!$_SESSION['loggedin']){ 
    header("Location:/index.php");
    die();
}
include 'db_connection.php';


$conn = OpenCon();

$sql="SELECT * FROM course";

$allData=$conn -> query($sql);

$array = array();
while($row = mysqli_fetch_assoc($allData)){
    $array[] = $row;
}



CloseCon($conn);
$_SESSION['course'] ="";
$_SESSION['subject'] ='';

if(isset($_POST['assignment']) || isset($_POST['summary'])){
	$_SESSION['course']=$_POST['course'];
	$_SESSION['subject']=$_POST['subject'];
	if(isset($_POST['assignment'])){
		header('location:assignment.php');
	}
	elseif(isset($_POST['summary'])){
		header('location:summary.php');
	}
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
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
    <title>Generate Bar Codes</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
                            Generate Bar Code
                    </span>
				</div>
				<form action="" method='POST'>
				<div class="col-md-6 offset-md-3" style="background: white; padding: 20px;">
						<span> Select Course</span>
						<span>
							<select id="course" name = 'course' onChange="getSubjects(this.value)">
							<option value="" selected disabled hidden>Choose here</option>
								<?php foreach ($array as $courses) { 
									echo '<option value="'.$courses['couseName'].'">'.$courses['couseName'].'</option>';
									
								}?>
									
								
								</select>
						</span>
						
					</div>
					
                <div class="col-md-6 offset-md-3" style="background: white; padding: 20px;">
				
						<span> Select Subject</span>
						<span>
							<select id="subject" name = 'subject' >
								<option hidden disabled selected value>select a course</option>
								</select>
						</span>
				</div>
                <div class="col-md-6 offset-md-3" style="background: white; padding: 20px;">
                    <span><button id="assignment" type="submit" class="btn btn-block btn-md btn-outline-success" name = 'assignment' type ='submit' >Assignment</button></span>
					<span><button id="summary" type="submit" class="btn btn-block btn-md btn-outline-success" name = 'summary' type = 'submit' >Summary</button></span>
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

	<script>
		function getSubjects(selectedObject){
			console.log(selectedObject)
			var value = JSON.stringify(selectedObject);
			//console.log(value);
			ajaxCall=callAjax(value);
			//console.log(ajaxCall);
			//console.log(ajaxCall.response);
			ajaxCall.done(processData);
			ajaxCall.fail(function(){ 
				alert("failure");
				})
		}

		function callAjax(data){
			return $.ajax({
				url:"phpCalls/getSubjects.php",
				type:"POST",
				data:{data:data}
			});
		}

		function processData(response_in){
			
			var response= JSON.parse(response_in);
			console.log(response.data["subjects"][0])
			$("#subjects").empty();
			$.each (response.data["subjects"],function (key,value){
				$("#subject")	
					.append($("<option>",
				{
					value: value.subject_name.toString(),
					text : value.subject_name.toString()},"</option>"
				))});
		}
	</script>
    
</body>
</html>