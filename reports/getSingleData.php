<?php
include '../db_connection.php';

$conn = OpenCon();

if(isset($_GET['reg_no'])){
	$id=$_GET['reg_no'];
	$sql="SELECT * FROM student WHERE reg_no=$id";

    $studentData=$conn -> query($sql);
}



$array = array();
while($row = mysqli_fetch_assoc($studentData)){
    $array[] = $row;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Attribute</th>
                                <th class="column2">Value</th>
							</tr>
						</thead>
						<tbody>
                    
                        <?php foreach($array as $details)  ?>
                             
								<tr>
                                    <td class="column1">Register Number</td>
                                    <td class="column1"><?php echo ($details['reg_no']); ?></td>
                                </tr>
                                <tr>
                                    <td class="column1">Full Name</td>
									<td class="column1"><?php echo ($details['username']); ?></td>
                                </tr>
                                <tr>
                                    <td class="column1">Address</td>
                                    <td class="column1"><?php echo ($details['address']); ?></td>
                                </tr>
                                <tr>
                                    <td class="column1">Admission Program</td>
									<td class="column1"><?php echo ($details['program_of_add']); ?></td>
                                </tr>
                                <tr>
                                    <td class="column1">Admission Date</td>
                                    <td class="column1"><?php echo ($details['date _of_add']); ?></td>
                                </tr>
                                <tr>
                                    <td class="column1">NIC number</td>
									<td class="column1"><?php echo ($details['NIC']); ?></td>
                                </tr>
                                <tr>
                                    <td class="column1">Date of Birth</td>
                                    <td class="column1"><?php echo ($details['dob']); ?></td>
                                </tr>
                                <tr>
                                    <td class="column1">Gender</td>
									<td class="column1"><?php echo ($details['gender']); ?></td>
                                </tr>
                        
								
                                
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<script>
	var css = '@page { size: landscape; }',
    head = document.head || document.getElementsByTagName('head')[0],
    style = document.createElement('style');

	style.type = 'text/css';
	style.media = 'print';

	if (style.styleSheet){
	style.styleSheet.cssText = css;
	} else {
	style.appendChild(document.createTextNode(css));
	}

head.appendChild(style);

window.print();
	</script>

<a href="#" onclick="window.print(); return false;">Print Me</a>
	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>