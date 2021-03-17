<?php

if(isset($_POST["update"]))
{
$name= $_POST['name'];
$address= $_POST['address'];
$contact=$_POST['contact'];
$dob= $_POST['dob'];
$state=$_POST['state'];
$pincode=$_POST['pincode'];
$idtype=$_POST['idtype'];
$idno=$_POST['idno'];
$regno=$_POST['vehicleregisterno'];

require_once 'dbh.php';
require_once 'functions.php';

if (emptyInputUpdate($name , $address , $contact , $dob , $state , $pincode, $idtype, $idno)!==false)
{

       header("location: ../updatedetails/updatedetails.php?regno=$regno&error=emptyinput");
       exit();
}


updateuser($conn ,$name , $address , $contact , $dob , $state , $pincode, $idtype, $idno ,$regno);


}

else if(isset($_POST["blockuser"]))
{

  require_once 'dbh.php';
  require_once 'functions.php';

$username=$_POST['userid'];
$accountstatus='DISABLED';
$regno=$_POST['vehicleregisterno'];

blockuser($conn,$username,$accountstatus,$regno);

}

else if(isset($_POST["unblockuser"]))
{

  require_once 'dbh.php';
  require_once 'functions.php';

$username=$_POST['userid'];
$accountstatus='ENABLED';
$regno=$_POST['vehicleregisterno'];

unblockuser($conn,$username,$accountstatus,$regno);

}

else {

  header("location: ../login/login.php");
}































 ?>
