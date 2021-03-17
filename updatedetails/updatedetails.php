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
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Application Form </title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<?php

                 $sql="SELECT * FROM application WHERE  vehicleregisterno='" . $_GET['regno'] . "'";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {

                           $GLOBALS['username']=$row['username'];
              ?>


<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
              <?php
               if(isset($_GET["error"]))
               {
                 if($_GET["error"]=="success")
                 {
                echo '<h2 id="error">Details Updated Successfully</h2>';

              }
              else if($_GET["error"]=="emptyinput")
              {
             echo '<h2 id="error">Fill all the Details</h2>';

           }
           else if($_GET["error"]=="enabled")
           {
          echo '<h2 id="error">User Account is Enabled</h2>';

        }
        else if($_GET["error"]=="disabled")
        {
       echo '<h2 id="error">User Account Blocked Successfully</h2>';

     }
            }
            ?>

            <div class="card-heading">
                <h2 class="title">Application Form</h2>
                </div>
                <div class="card-body">
                    <form  action="../includes/updatedetails.php" method="POST">


                        <div class="form-row">
                            <div class="name">Application Number</div>
                            <div class="value">
                                <input class="input--style-6" type="text" value="<?php echo $row['applicationid']; ?>" name="name" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Name</div>
                            <div class="value">
                                <input class="input--style-6" type="text" value="<?php echo $row['name']; ?>" name="name">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">username</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="userid" value="<?php echo $row['username']; ?>" name="name" readonly>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Gender</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="email" value="<?php echo $row['gender']; ?>" >
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Address</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="address" value="<?php echo $row['address']; ?>">
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Contact</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="contact" value="<?php echo $row['contact']; ?>">
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Date of Birth</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="dob" value="<?php echo $row['dob']; ?>" >
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">State</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="state" value="<?php echo $row['state']; ?>" >
                                </div>
                            </div>
                        </div>


                         <div class="form-row">
                            <div class="name">Pincode</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="pincode" value="<?php echo $row['pincode']; ?>" >
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Vehicle Manufacturer</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="vehiclemanufacturer" value="<?php echo $row['vehiclemanufacturer']; ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Vehicle Model Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="vehiclemodelname" value="<?php echo $row['vehiclemodelname']; ?>" readonly>
                                </div>
                            </div>
                        </div>

                         <div class="form-row">
                            <div class="name">Vehicle Register No</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="vehicleregisterno" value="<?php echo $row['vehicleregisterno']; ?>" readonly>
                                </div>
                            </div>
                        </div>


                         <div class="form-row">
                            <div class="name">Tag Class</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="tagclass" value="<?php echo $row['tagclass']; ?>" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Proof Of RC</div>
                            <div class="value">
                                <div class="input-group">
                                    <?php echo '<a class="view" target="_blank" href="../includes/viewrc.php?pdf='.$row['rcphoto'].'">View PDF</a>';?>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">ID Type</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="idtype" value="<?php echo $row['idtype']; ?>" >
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">ID No</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="idno" value="<?php echo $row['idno']; ?>" >
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">ID Proof</div>
                            <div class="value">
                                <div class="input-group">
                                    <?php echo '<a class="view" target="_blank" href="../includes/viewid.php?pdf='.$row['idphoto'].'">View PDF</a>';?>
                                </div>
                            </div>
                        </div>









                </div>



                <div class="card-body">

                     <div class="form-row">
                            <div class="name">Status</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="reason" value="<?php echo $row['remarks']; ?>" readonly >
                                </div>
                            </div>
                        </div>
              </div>
              <?php
              $appstatus=$row['applicationstatus'];

              if($appstatus==='APPROVED')
              {
                ?>

                <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" id="bluebutton" name="update" type="submit">UPDATE DETAILS</button>
                </div>

            <?php




                               $sql="SELECT accountstatus FROM registration WHERE  username='$username'";
                               $result=mysqli_query($conn, $sql);
                               $resultCheck = mysqli_num_rows($result);

                               if($resultCheck > 0)
                                   {
                                      while($row1 = mysqli_fetch_assoc($result))
                                         {

                                        $acstatus=$row1['accountstatus'];



                if($acstatus==='ENABLED')
                {
                  echo '<div class="card-footer">';
                  echo '<button class="btn btn--radius-2 btn--blue-2" id="block" name="blockuser" type="submit">BLOCK USER</button>';
                  echo '</div>';
                }
               else if($acstatus==='DISABLED')
                {
                 echo '<div class="card-footer">';
                 echo '<button class="btn btn--radius-2 btn--blue-2" id="unblock" name="unblockuser" type="submit">UNBLOCK USER</button>';
                echo '</div>';
                }

              }
            }

             }
            }
        }

              ?>

            </div>
        </div>
    </div>
  </form>


    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
