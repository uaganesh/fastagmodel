<?php
session_start();
require_once 'dbh.php';
require_once 'functions.php';

$sql="SELECT IFNULL((SELECT payment FROM application WHERE username='{$_SESSION['username']}' LIMIT 1),'null') AS payment ;";
$result=mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0)
    {
       while($row = mysqli_fetch_assoc($result))
          {

          if(($row['payment']=='null')OR($row['payment']==''))
          {
            header("location: ../manage/nodata/nodata.php");
          }
          else {
            header("location: ../manage/manage.php");
          }
  }
}



 ?>
