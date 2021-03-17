<!DOCTYPE html>
<?php
include_once '../header/headerblack/header.php';
include_once '../includes/dbh.php';
?>
<?php
if(!isset($_SESSION['check'])){ //checking session check variable

    header("Location:../includes/logout.php");
}
?>
<html lang="en">
<head>
	<title>Pending Applications</title>
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
<body id="bgset">

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Application No</th>
									<th class="cell100 column2">Name</th>
									<th class="cell100 column3">Vehicle Register No</th>
									<th class="cell100 column4">Application Form</th>

								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
               <?php

                 $sql="SELECT * FROM application WHERE applicationstatus='pending'";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {



								    echo '<tr class="row100 body">';
									echo '<td class="cell100 column1">'.$row['applicationid'].'</td>';
									echo '<td class="cell100 column2">'.$row['name'].'</td>';
									echo '<td class="cell100 column3">'.$row['vehicleregisterno'].'</td>';
									echo '<td class="cell100 column4"><a class="custombutton" href="../viewapplication/viewapplication.php?regno='.$row['vehicleregisterno'].'">View Application</a></td>';

								    echo  '</tr>';

					       }
					    }
					    ?>

							</tbody>
						</table>
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
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});


	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
