<!DOCTYPE html>
<?php 
include_once '../header/headerblack/header.php';
include_once '../includes/dbh.php';
?>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Transaction History</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
	<table>
		<thead>
			<tr>
				<th>FASTag ID</th>
				<th>Time Stamp</th>
				<th>Amount</th>
				<th>Status</th>
				
			</tr>
		</thead>
		<tbody>

			<?php
                 
                 $sql="SELECT fastagid FROM application WHERE vehicleregisterno='" . $_GET['regno'] . "'";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {

                           	$GLOBALS['fastag']=$row['fastagid'];
                           }

                     }

                  
    //--------------------------------------------------------------------------------------------------------//

        $sql="SELECT *,date_format(date, '%d-%m-%Y %H:%i:%s') AS formatdate FROM transaction WHERE fastagid='".$GLOBALS['fastag']."' ORDER BY transactionid DESC";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {

                           	  echo '<tr>';
				              echo  '<td>'.$row['fastagid'].'</td>';
				               echo  '<td>'.$row['formatdate'].'</td>';
				               echo   '<td>'.$row['amount'].'</td>';
			                   	echo '<td>'.$row['status'].'</td>';
			
			                     echo  '</tr>';
                           }

                     }


                 


              ?>
			
		
	
		</tbody>
	</table>
</div>
<!-- partial -->
  
</body>
</html>
