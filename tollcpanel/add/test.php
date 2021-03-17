<?php
include_once '../../includes/dbh.php';


	if(isset($_POST['type']) == 1){
		$username =$_POST['username'];
		$query ="SELECT * FROM registration where username ='".$username."' ";
		$result =mysqli_query($conn, $query);
		$rowcount=mysqli_num_rows($result);
		if($rowcount >0){
			echo "<p id='rederror' class='status-not-available'> Username Not Available.</p>";
		}else{
			 echo "<p id='greenerror' class='status-available'> Username Available.</p>";
       
		}
	}
?>
