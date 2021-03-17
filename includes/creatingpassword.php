<?php
if (isset($_POST["reset-password-submit"]))
{
     $selector=$_POST["selector"];
     $validator=$_POST["validator"];
     $password=$_POST["password"];
     $confirmpassword=$_POST["confirmpassword"];


        if (empty($password)||empty($confirmpassword))
             {
              header("location:../createpassword/createpassword.php?newpwd=empty");
              exit();

             }
        else if($password!=$confirmpassword)
             {
              header("location:../createpassword/createpassword.php?newpwd=pwdnotsame");
              exit();
             }

       $currentDate=date("U");
       require 'dbh.php';

       $sql="SELECT * FROM pwdreset WHERE pwdResetSelector=? and pwdResetExpires >= ?";

       $stmt=mysqli_stmt_init($conn);
       if (!mysqli_stmt_prepare($stmt ,$sql) )
       {
              echo "There was an error";
              exit();
       }
       else
       {

          mysqli_stmt_bind_param($stmt, "ss" , $selector , $currentDate);
          mysqli_stmt_execute($stmt);

          $result =mysqli_stmt_get_result($stmt);

              if(!$row=mysqli_fetch_assoc($result))
                {
                  echo"You need to resubmit your reset request";
                  exit();
                }
              else
                {
                  $tokenBin=hex2bin($validator);
                  $tokenCheck= password_verify($tokenBin,$row["pwdResetToken"]);


                            if($tokenCheck === false)
                              {
                                  echo "You need to resubmit your request";
                                  exit();
                              }
                            elseif($tokenCheck === true)
                              {
                                  $tokenEmail=$row['pwdResetEmail'];

                                  $sql="SELECT * FROM registration WHERE email=?;";
                                  $stmt=mysqli_stmt_init($conn);
                                        if (!mysqli_stmt_prepare($stmt ,$sql) )
                                        {
                                          echo "There was an error";
                                          exit();
                                        }
                                        else {

                                          mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                          mysqli_stmt_execute($stmt);
                                          $result =mysqli_stmt_get_result($stmt);
                                            if(!$row=mysqli_fetch_assoc($result))
                                            {
                                                echo"There was an error";
                                                exit();
                                            }
                                            else
                                            {

                                                  $sql="UPDATE registration SET password=? WHERE email=?";
                                                  $stmt=mysqli_stmt_init($conn);
                                                  if (!mysqli_stmt_prepare($stmt ,$sql) )
                                                      {
                                                        echo "There was an error";
                                                        exit();
                                                      }
                                                      else
                                                      {
                                                        $newPwdHash=password_hash($password,PASSWORD_DEFAULT);
                                                        mysqli_stmt_bind_param($stmt,"ss",$newPwdHash,$tokenEmail);
                                                        mysqli_stmt_execute($stmt);

                                                        $sql="DELETE FROM pwdreset WHERE pwdResetEmail=?";
                                                        $stmt=mysqli_stmt_init($conn);
                                                            if (!mysqli_stmt_prepare($stmt ,$sql) )
                                                            {
                                                              echo "There was an error";
                                                              exit();
                                                            }
                                                            else
                                                            {
                                                              mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                                              mysqli_stmt_execute($stmt);
                                                              header("Location: ../login/login.php?newpwd=passwordupdated");
                                                            }
                                                         }

}
}
}
}









}




}
else
{
  header("Location: ../index/index.php");
}














 ?>
