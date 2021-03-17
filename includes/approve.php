<?php

require_once 'dbh.php';
require_once 'functions.php';

if(isset($_POST['approve']))
 {
$regno=$_POST['vehicleregisterno'];
$username=$_POST['username'];
$tagclass=$_POST['tagclass'];
$fastag=uniqid();
$applicationstatus='APPROVED';
$remarks='APPLICATION APPROVED';




                 
                 $sql="SELECT threshold FROM feedetails WHERE tagclass='$tagclass'";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {
                                
                              $GLOBALS['balance']=$row['threshold'];

                           }
                     }

              
$balance=$GLOBALS['balance'];



approveapplication($conn , $applicationstatus , $regno , $tagclass , $fastag ,$username ,$balance ,$remarks);


}

elseif(isset($_POST['rejectapplication']))
{

$regno=$_POST['vehicleregisterno'];
$remarks=$_POST['reason'];
$applicationstatus='REJECTED';
rejectapplication($conn ,$applicationstatus,$regno, $remarks);

}

else
{

  header("location: ../login/login.php"); 
  exit();
}


