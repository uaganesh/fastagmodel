<?php

function emptyInputSignup($username , $password , $confirmpassword , $name , $email  )
{

	$result;

    if(empty($username)||empty($password)||empty($confirmpassword)||empty($name)||empty($email))
     {

       $result=true;

     }
     else
     {
     	$result=false;
     }

     return $result;
}


function invalidUid($username)
{

	$result;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
     {

       $result=true;

     }
     else
     {
     	$result=false;
     }

     return $result;
}


function invalidEmail($email)
{

	$result;

    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
     {

       $result=true;

     }
     else
     {
     	$result=false;
     }

     return $result;
}


function pwdMatch($password , $confirmpassword)
{

	$result;

    if($password!==$confirmpassword)
     {

       $result=true;

     }
     else
     {
     	$result=false;
     }

     return $result;
}


function uidExists($conn , $username ,$email)
{
   $sql="SELECT * FROM registration WHERE username = ? OR email = ?;";

   $stmt=mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql))
   {
     header("location: ../registration/registration.php?error=stmtfailed");
     exit();


   }

   mysqli_stmt_bind_param($stmt, "ss" , $username , $email);
   mysqli_stmt_execute($stmt);

   $resultData=mysqli_stmt_get_result($stmt);

	if($row = mysqli_fetch_assoc($resultData))
	{

       return $row;

	}
	else
	{
		$result=false;
        return $result;
	}

	mysqli_stmt_close($stmt);
}



function createUser($conn , $username , $password , $name , $email)
{
   $sql="INSERT INTO registration (username,password,name,email) VALUES (? ,? ,?,?);";

   $stmt=mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql))
   {
     header("location: ../registration/registration.php?error=stmtfailed");
     exit();


   }

    $hashedPwd = password_hash($password,PASSWORD_DEFAULT);




   mysqli_stmt_bind_param($stmt, "ssss" , $username , $hashedPwd , $name , $email);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location: ../registration/registration.php?error=none");




}

//--------------------------------Sending Email to Registered Users ------------------------------------------//
function registermail($conn, $username ,  $password, $name , $email)
{

	$to=$email;
	$subject= 'Account Details';
	$message='<html><head><style> .center {
  margin-left: auto;
  margin-right: auto;
}</style></head><body><h5 style="color:#2453f0;">Hi '.$name.', </h5><h5 style="color:#2453f0;">Your Account with FASTag is registered successfully. Please <a href="localhost/fastag/login/login.php" target="_blank">login</a> with the following details </h5>';
	$message.='<table style="border: 1px solid black;"><tr><td>Username:</td><td style="color:#ad0a20;">'.$username.'</td></tr>';
	$message.='<tr><td>Password:</td><td style="color:#ad0a20;">'.$password.'</td></tr>';
	$message.='<tr><td>Email:</td><td style="color:#ad0a20;">'.$email.'</td></tr></table></body></html>';
  $headers="From: FASTag Support <adarsh.shankar9@gmail.com>\r\n";
	$headers .= "Content-type: text/html\r\n";
	$headers .="Reply-to: adarsh.shankar9@gmail.com \r\n ";


	mail($to,$subject,$message,$headers);
	header("location: ../registration/registration.php?error=none");
		exit();

}

//-----------------------------------------------------------------------------------------------------------------------------------//



function emptyInputLogin($username , $password)
{

  $result;

    if(empty($username)||empty($password))
     {

       $result=true;

     }
     else
     {
      $result=false;
     }

     return $result;
}




function loginUser($conn,$username,$password)
{





$uidExists= uidExists($conn , $username ,$username);

if($uidExists === false)
  {
    header("location: ../login/login.php?error=wronglogin");
    exit();
  }


$pwdHashed=$uidExists["password"];
$checkPwd =password_verify($password,$pwdHashed);
$sql="SELECT usertype,accountstatus FROM registration WHERE username='$username' or email='$username';";
     $result=mysqli_query($conn, $sql);
     $resultCheck = mysqli_num_rows($result);

     if($resultCheck > 0)
        {
          while($row = mysqli_fetch_assoc($result))
           {

              $GLOBALS['usertype']=$row['usertype'];
							$GLOBALS['accountstatus']=$row['accountstatus'];

              echo $GLOBALS['usertype'];
          }

          }






if($checkPwd===false)
{
   header("location: ../login/login.php?error=wrongloginpassword");

    exit();
}




else if ($checkPwd===true  and $GLOBALS['usertype']==='user')
{
   if($GLOBALS['accountstatus']==='DISABLED')
	 {
    header("location:../login/login.php?error=disabled");
	 }

  else if($GLOBALS['accountstatus']==='ENABLED')
   {
   session_start();
   $_SESSION["userid"]= $uidExists["userid"];
   $_SESSION["useruid"]= $uidExists["username"];
   $_SESSION['loggedin'] = true;
   $_SESSION['username'] = $username;
   header("location: ../index/index.php");
   exit();
   }
}

else if ($checkPwd===true and $GLOBALS['usertype']==='admin')
{

   session_start();
   $_SESSION["userid"]= $uidExists["userid"];
   $_SESSION["useruid"]= $uidExists["username"];
   $_SESSION['loggedin'] = true ;
   $_SESSION['username'] = $username;
   $_SESSION['check']=true;
   header("location: ../controlpanel/controlpanel.php");
   exit();
}


else if ($checkPwd===true and $GLOBALS['usertype']==='toll')
{

   session_start();
   $_SESSION["userid"]= $uidExists["userid"];
   $_SESSION["useruid"]= $uidExists["username"];
   $_SESSION['loggedin'] = true ;
   $_SESSION['username'] = $username;
   $_SESSION['check']=true;
   header("location: ../toll/toll.php");
   exit();
}



}



//Application Function

function emptyInputApplication($gender , $address , $contact , $date , $state , $pincode ,$manufacture ,$tagclass ,$regno ,$model ,$idproof ,$idno)
{

  $result;

    if(empty($gender)||empty($address)||empty($contact)||empty($date)||empty($state)||empty($pincode)||empty($manufacture)||empty($tagclass)||empty($regno)||empty($model)||empty($idproof)||empty($idno))
     {

       $result=true;

     }
     else
     {
      $result=false;
     }

     return $result;
}

//---------------------------REG NO VALIDATION------------------------------------------//


function regnoExists($conn , $regno)
{
   $sql="SELECT * FROM application WHERE vehicleregisterno = ?;";

   $stmt=mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql))
   {
     header("location: ../application/application.php?error=stmtfailed");
     exit();


   }

   mysqli_stmt_bind_param($stmt, "s" , $regno);
   mysqli_stmt_execute($stmt);

   $resultData=mysqli_stmt_get_result($stmt);

  if($row = mysqli_fetch_assoc($resultData))
  {

       return $row;

  }
  else
  {
    $result=false;
        return $result;
  }

  mysqli_stmt_close($stmt);
}


//------------------------------Mobile NO VALIDATION-------------------------------//

function invalidmobile($contact)
{

  $result;

    if(!preg_match('/^[0-9]{10}+$/', $contact))
     {

       $result=true;

     }
     else
     {
      $result=false;
     }

     return $result;
}

//-----------------------------------------------------------------------------------------//




function createApplication($conn , $name , $gender , $address , $contact , $date , $state , $pincode ,$manufacture ,$tagclass ,$regno ,$model , $fileNameNewrc ,$idproof ,$idno ,$fileNameNewid , $username ,$status ,$email)
{
   $sql="INSERT INTO application(name,gender,address,contact,dob,state,pincode,vehiclemanufacturer,tagclass,vehicleregisterno,vehiclemodelname,rcphoto,idtype,idno,idphoto,username,status,email) VALUES (? ,? ,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

   $stmt=mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql))
   {
     header("location: ../application.application.php?error=stmtfailed");
     exit();


   }


  mysqli_stmt_bind_param($stmt, "ssssssssssssssssss" ,$name , $gender , $address , $contact , $date , $state , $pincode ,$manufacture ,$tagclass ,$regno ,$model , $fileNameNewrc  ,$idproof ,$idno , $fileNameNewid ,$username,$status,$email);

   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location: ../application/application.php?error=none");
     exit();



}

//------------------------------AFTER PAYMENT --------------------------------------------------//

function payment($conn , $status , $payment , $appstatus ,$regno)
{
   $sql="UPDATE application set status=? ,payment=?, applicationstatus=?  WHERE vehicleregisterno='$regno';";

   $stmt=mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql))
   {
     header("location: ../application/payment/checkout/payment.php?error=stmtfailed");
     exit();


   }

   mysqli_stmt_bind_param($stmt, "sss" , $status , $payment , $appstatus);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location:../application/success/success.php");
     exit();



}

// ------------------------------ Recharge Function --------------------------------------------//

require_once 'dbh.php';

function rechargefastag($conn , $regno , $amount , $fastag )
{


     $sql="SELECT balance FROM ledger WHERE vehicleregisterno='$regno';";
     $result=mysqli_query($conn, $sql);
     $resultCheck = mysqli_num_rows($result);

     if($resultCheck > 0)
        {
          while($row = mysqli_fetch_assoc($result))
           {

            $new= (int)$row['balance']+(int)$amount;


   $sql="UPDATE ledger set balance=? WHERE vehicleregisterno='$regno';";

   $stmt=mysqli_stmt_init($conn);



   if(!mysqli_stmt_prepare($stmt, $sql))
   {
     header("location: ../application/payment/checkout/payment.php?error=stmtfailed");
     exit();


   }

   mysqli_stmt_bind_param($stmt, "s" , $new );
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);

   transaction($conn,$fastag,$amount);
   header("location:../manage/manage.php?payment=success");
     exit();


}
}

}
//------------------------------Adding Recharge Transaaction to Transaction Table ----------------------------//
function transaction($conn,$fastag,$amount)
{

  $status='CREDIT-RECHARGE';
  $sql="INSERT INTO transaction(fastagid,amount,status) VALUES (? ,? ,?);";

$stmt=mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql))
   {
     header("location: ../registration/registration.php?error=stmtfailed");
     exit();


   }

   $amount="+ "."$amount";
   mysqli_stmt_bind_param($stmt, "sss" , $fastag,$amount,$status);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location: ../manage/manage.php?error=none");
     exit();

}
//--------------------------------ADMIN APPROVING APPLICATION ---------------------------------------------------//

function approveapplication($conn , $applicationstatus , $regno , $tagclass , $fastag ,$username ,$balance,$remarks)
{


$sql="UPDATE application set applicationstatus=?, fastagid=?,remarks=? where vehicleregisterno='$regno';";

   $stmt=mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql))
   {
     header("location: ../registration/registration.php?error=stmtfailed");
     exit();


   }


   mysqli_stmt_bind_param($stmt, "sss" , $applicationstatus , $fastag,$remarks);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);

  ledgeradd($conn,$username,$regno,$fastag,$balance);

  addtransaction($conn,$fastag,$balance);

  header("location: ../adminpending/pending.php?error=none");

     exit();



}
//---------------------------------------Add transaction to transaction table---------------------------------//

function addtransaction($conn,$fastag,$balance)
{

 $status='MIN-BALANCE-APPLICATION';
  $sql="INSERT INTO transaction(fastagid,amount,status) VALUES (? ,? ,?);";

$stmt=mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql))
   {
     header("location: ../registration/registration.php?error=stmtfailed");
     exit();


   }

   $amount="+ "."$balance";
   mysqli_stmt_bind_param($stmt, "sss" , $fastag,$amount,$status);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);

}
//--------------------------------------Adding details to Ledger By admin when approving ----------------------**

function ledgeradd($conn,$username,$regno,$fastag,$balance)
{

$sql="INSERT INTO ledger(username,vehicleregisterno,fastagid,balance) VALUES (? ,? ,?,?);";

$stmt=mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql))
   {
     header("location: ../registration/registration.php?error=stmtfailed");
     exit();


   }


   mysqli_stmt_bind_param($stmt, "ssss" , $username ,$regno ,$fastag ,$balance);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);



}

function rejectapplication($conn ,$applicationstatus,$regno, $remarks)
{

$sql="UPDATE application set remarks=? ,applicationstatus=? where vehicleregisterno='$regno';";

   $stmt=mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql))
   {
     header("location: ../registration/registration.php?error=stmtfailed");
     exit();


   }


   mysqli_stmt_bind_param($stmt, "ss" , $remarks ,$applicationstatus);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
  header("location: ../adminpending/pending.php?error=none");

     exit();



}

//---------------------------------------UPDATING DATA FROM ADMIN PANEL ----------------------------------------//


function emptyInputUpdate($name , $address , $contact , $dob , $state , $pincode, $idtype, $idno)
{

	$result;

    if(empty($name)||empty($address)||empty($contact)||empty($dob)||empty($state)||empty($pincode)||empty($idtype)||empty($idno))
     {

       $result=true;

     }
     else
     {
     	$result=false;
     }

     return $result;
}

function updateuser($conn ,$name , $address , $contact , $dob , $state , $pincode, $idtype, $idno , $regno)
{
   $sql="UPDATE application set name=? ,address=?, contact=? ,dob=? ,state=?,pincode=?,idtype=?,idno=?  WHERE vehicleregisterno='$regno';";

   $stmt=mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql))
   {
     header("location: ../updatedetails/updatedetails.php?regno=$regno&error=stmtfailed");
     exit();


   }

   mysqli_stmt_bind_param($stmt, "ssssssss" , $name , $address , $contact , $dob , $state , $pincode, $idtype, $idno);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location: ../updatedetails/updatedetails.php?regno=$regno&error=success");
     exit();



}
//---------------------------------------	BLOCK USER 	--------------------------------------------------------------//

function blockuser($conn,$username,$accountstatus,$regno)
{
   $sql="UPDATE registration set accountstatus=? WHERE username='$username';";

   $stmt=mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql))
   {
     header("location: ../updatedetails/updatedetails.php?regno=$regno&error=stmtfailed");
     exit();


   }

   mysqli_stmt_bind_param($stmt, "s" , $accountstatus);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location: ../updatedetails/updatedetails.php?regno=$regno&error=disabled");
  exit();

}


//--------------------------------unblock user --------------------------------------------------------//
function unblockuser($conn,$username,$accountstatus,$regno)
{
   $sql="UPDATE registration set accountstatus=? WHERE username='$username';";

   $stmt=mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql))
   {
     header("location: ../updatedetails/updatedetails.php?regno=$regno&error=stmtfailed");
     exit();


   }

   mysqli_stmt_bind_param($stmt, "s" , $accountstatus);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location: ../updatedetails/updatedetails.php?regno=$regno&error=enabled");
  exit();

}


//--------------------------------------Feedback ------------------------------------------------------------------//

function feedback($conn,$username ,$message)
{
	$sql="INSERT INTO feedback(username,feedback) VALUES (? ,?);";

  $stmt=mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $sql))
  {
 	 header("location: ../feedback/feedback.php?error=stmtfailed");
 	 exit();


  }


 mysqli_stmt_bind_param($stmt, "ss" ,$username , $message);

  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../feedback/feedback.php?error=none");
 	 exit();




}





//---------------------------toll payment ------------------------------------------------------------------------//

function fastagExists($conn , $fastagid)
{
   $sql="SELECT * FROM application WHERE fastagid = ?";

   $stmt=mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql))
   {
     header("location: ../toll/toll.php?error=stmtfailed");
     exit();


   }

   mysqli_stmt_bind_param($stmt, "s" , $fastagid);
   mysqli_stmt_execute($stmt);

   $resultData=mysqli_stmt_get_result($stmt);

	if($row = mysqli_fetch_assoc($resultData))
	{

       return $row;

	}
	else
	{
		$result=false;
    return $result;
	}

	mysqli_stmt_close($stmt);
}

//-----------------------------Checking Tag class on Toll Booth +---------------------------------------------------//

function checktagclass($conn,$fastagid)
{
	$sql="SELECT tagclass FROM application WHERE fastagid='$fastagid'";
	$result=mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if($resultCheck > 0)
			{
				 while($row = mysqli_fetch_assoc($result))
						{

							return $row['tagclass'];

						}
			}
 }


 //------------------------------Checking Toll Amount -------------------------------------------------------------//

function checkamount($conn,$tollusername,$tagclass)
{


	$sql="SELECT * FROM toll WHERE tollusername='$tollusername'";
	$result=mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if($resultCheck > 0)
			{
				 while($row = mysqli_fetch_assoc($result))
						{

							return $row[$tagclass];

						}

}


}

//---------------------------------------Check Status --------------------------------------------------------------//

function checkstatus($conn,$tollusername,$tagclass)
{


	$sql="SELECT * FROM toll WHERE tollusername='$tollusername'";
	$result=mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if($resultCheck > 0)
			{
				 while($row = mysqli_fetch_assoc($result))
						{

							return $row['status'];

						}

}


}

//------------------------------------Debiting From Fastag Account-------------------------------------------------//

function debitamount($conn , $fastagid , $amount , $status )
{


     $sql="SELECT balance FROM ledger WHERE fastagid='$fastagid';";
     $result=mysqli_query($conn, $sql);
     $resultCheck = mysqli_num_rows($result);

     if($resultCheck > 0)
        {
          while($row = mysqli_fetch_assoc($result))
           {


						 if((int)$row['balance']<50)
						{
							header("location: ../toll/toll.php?error=noamount");
							exit();
						}

            $new= (int)$row['balance']-(int)$amount;


   $sql="UPDATE ledger set balance=? WHERE fastagid='$fastagid';";

   $stmt=mysqli_stmt_init($conn);



   if(!mysqli_stmt_prepare($stmt, $sql))
   {
     header("location: ../toll/toll.php?error=stmtfailed");
     exit();


   }

   mysqli_stmt_bind_param($stmt, "s" , $new );
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);

   transactiondebit($conn,$fastagid,$amount,$status);
   header("location:../toll/toll.php?payment=success");



}
}

}
//------------------------------Adding Recharge Transaaction to Transaction Table ----------------------------//
function transactiondebit($conn,$fastagid,$amount,$status)
{


  $sql="INSERT INTO transaction(fastagid,amount,status) VALUES (? ,? ,?);";

$stmt=mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql))
   {
     header("location: ../toll/toll.php?error=stmtfailed");
     exit();


   }

   $amount="- "."$amount";
   mysqli_stmt_bind_param($stmt, "sss" , $fastagid,$amount,$status);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location: ../toll/toll.php?error=none");


}


function mailuser($conn ,$fastagid ,$amount)
{

	$sql="SELECT email FROM application WHERE fastagid='$fastagid'";
	$result=mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if($resultCheck > 0)
			{
				 while($row = mysqli_fetch_assoc($result))
						{

							$email=$row['email'];

						}
			}



	$to=$email;
	$subject= 'Transaction Alert';
	$message='<html><body><p style="color:#5a14e4; font-weight:bold;">Rs '.$amount.' debited from your FASTag ID '.$fastagid.' As Toll Fee. For more details login to your Account . Thank you for using FASTag</p></body></html>';
  $headers="From: FASTag Support <adarsh.shankar9@gmail.com>\r\n";
	$headers .= "Content-type: text/html\r\n";
	$headers .="Reply-to: adarsh.shankar9@gmail.com \r\n ";


	mail($to,$subject,$message,$headers);
	header("location: ../toll/toll.php?error=mailsuccess");
		exit();



}
