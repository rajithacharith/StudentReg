

<?php
session_start();
if (!$_SESSION['loggedin']){ 
    header("Location:../index.php");
    die();
}
include '../db_connection.php';
include 'up.php';

$conn = OpenCon();

$sql="SELECT * FROM student GROUP BY reg_no";

$allData=$conn -> query($sql);

$array = array();
while($row = mysqli_fetch_assoc($allData)){
    $array[] = $row;
}



CloseCon($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>All Data</title>
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
								<th class="column1">Registration Number</th>
                                <th class="column2">Full name</th>
                                <th class="column3">Address</th>
								<th class="column4">Admission Programme</th>
								<th class="column5">Admission Date</th>
								<th class="column6">NIC number</th>
								<th class="column7">Birth Date</th>
								<th class="column8">Gender</th>
							</tr>
						</thead>
						<tbody>
                            

                            <?php foreach($array as $details)  {?>
                             
								<tr>
									<td class="column1"><?php echo ($details['reg_no']); ?></td>
									<td class="column2"><?php echo ($details['name']); ?></td>
									<td class="column3"><?php echo ($details['address']); ?></td>
									<td class="column4"><?php echo ($details['courseID']); ?></td>
									<td class="column5"><?php echo ($details['date _of_add']); ?></td>
                                    <td class="column6"><?php echo ($details['NIC']); ?></td>
                                    <td class="column7"><?php echo ($details['dob']); ?></td>
                                    <td class="column8"><?php echo ($details['gender']); ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	

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

