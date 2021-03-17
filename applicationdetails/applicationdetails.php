<!DOCTYPE html>
<html lang="en">
<?php
include_once '../header/headerblack/header.php';
include_once '../includes/dbh.php';
?>
<head>
	<title>Manage Application</title>
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
				<div class="table100 ver1 m-b-110">
					<table data-vertable="ver1">
						<thead>
							<tr class="row100 head">
								<th class="column100 column1" data-column="column1">Application Id</th>
								<th class="column100 column2" data-column="column2">Register No</th>
								<th class="column100 column3" data-column="column3">Name</th>
								<th class="column100 column4" data-column="column4">FASTag ID</th>
								<th class="column100 column4" data-column="column4">Application Status</th>
								<th class="column100 column5" data-column="column5">Manage</th>

							</tr>
						</thead>
						<tbody>
							<?php

								$sql="SELECT * FROM application WHERE applicationstatus!='PENDING'";
								$result=mysqli_query($conn, $sql);
								$resultCheck = mysqli_num_rows($result);

								if($resultCheck > 0)
										{
											 while($row = mysqli_fetch_assoc($result))
													{


							  echo '<tr class="row100" >';
								echo '<td class="column100 column1" data-column="column1" id="btset">'.$row['applicationid'].'</td>';
								echo '<td class="column100 column2" data-column="column2" id="btset">'.$row['vehicleregisterno'].'</td>';
								echo '<td class="column100 column3" data-column="column3" id="btset">'.$row['name'].'</td>';
								echo '<td class="column100 column4" data-column="column4" id="btset">'.$row['fastagid'].'</td>';
								echo '<td class="column100 column4" data-column="column4" id="btset">'.$row['applicationstatus'].'</td>';
								echo '<td class="column100 column5" data-column="column5"  id="btsetlast"><a href="../updatedetails/updatedetails.php?regno='.$row['vehicleregisterno'].'" id="btoverride">Manage</a></td>';

						echo 	'</tr>';


    }
	}
						?>

						</tbody>
					</table>
				</div>


					</table>
				</div>
			</div>
		</div>
	</div>




<!--===============================================================================================-->


</body>
</html>
