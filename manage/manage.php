<!DOCTYPE html>
<html lang="en">
<?php
include_once '../header/headerblack/header.php';
include_once '../includes/dbh.php';

?>

<head>
	<title>Your FASTAG</title>
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
			<?php
	     if(isset($_GET["error"]))
	     {
	       if($_GET["error"]=="none")
	       {
	        echo '<p id="error">Recharge Successfull!</p>';
	       }
			 }
			 ?>

			<div class="wrap-table100">
				<div class="table100">

					<table>
						<thead>
							<tr class="table100-head">
								<div class="thead">
								<th  >Application No</th>
								<th >Vehicle Registration No</th>
								<th >Vehicle Manufacturer</th>
								<th>Application Status</th>
								<th >Remarks</th>
								<th >FASTag ID</th>
								<th >Balance</th>
								<th >Recharge</th>
								<th >Download</th>
								<th >Transaction</th>

							</div>

							</tr>
						</thead>

						<tbody>

			<form action="recharge/recharge.php" method="POST">



			<?php

                 $sql="SELECT * FROM application WHERE (username='{$_SESSION['username']}' and applicationstatus='pending') OR (username='{$_SESSION['username']}' AND applicationstatus='APPROVED') OR (username='{$_SESSION['username']}' AND applicationstatus='REJECTED')";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {


                           	        								    echo '<tr>';
									echo '<td >'.$row['applicationid'].'</td>';
									echo '<td >'.$row['vehicleregisterno'].'</td>';
									echo '<td >'.$row['vehiclemanufacturer'].'</td>';
									$regno=$row['vehicleregisterno'];
									echo '<input type="hidden" name="regnoo" id="regnoo" value='.$regno.' />';


									echo '<td <strong><center>'.$row['applicationstatus'].'</center></strong></td>';
									echo '<td ><strong>'.$row['remarks'].'</strong></td>';

									?>

								<?php

                 if($row['applicationstatus']==='APPROVED')
	            {
                  $sql1="SELECT fastagid,balance FROM ledger WHERE username='{$_SESSION['username']}' and vehicleregisterno='$regno'";
                 $result1=mysqli_query($conn, $sql1);
                 $resultCheck1 = mysqli_num_rows($result1);

                 if($resultCheck1 > 0)
                     {
                        while($row1 = mysqli_fetch_assoc($result1))

                           {


									echo '<td class="fastag" ><strong>'.$row1['fastagid'].'</strong></td>';
									echo '<td ><strong>'.$row1['balance'].'</strong></td>';


						            echo '<td><a class="recharge" href="recharge/recharge.php?regno='.$regno.'">Recharge</a></td>';
						             echo '<td><a class="print" target="_blank" href="../generatepdf/generate.php?regno='.$regno.'">Print</a></td>';

						             echo '<td><a class="transaction" target="_blank" href="../transaction/transaction.php?regno='.$regno.'">History</a></td>';




									      /*echo '<td class="column6"><button type="submit" style="background-color: #555555;padding: 10px 32px; color:white;" value="Recharge" class="button">Recharge</button></td>';*/
									 }

									echo '</tr>';


								}
							}

							}
					 }
							?>

								</form>




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
