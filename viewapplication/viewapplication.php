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


              ?>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Application Form</h2>
                </div>
                <div class="card-body">
                    <form  action="../includes/approve.php" method="POST">


                        <div class="form-row">
                            <div class="name">Application Number</div>
                            <div class="value">
                                <input class="input--style-6" type="text" value="<?php echo $row['applicationid']; ?>" name="name" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Name</div>
                            <div class="value">
                                <input class="input--style-6" type="text" value="<?php echo $row['name']; ?>" name="name" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">username</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="username" value="<?php echo $row['username']; ?>" name="name" readonly>
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
                                    <input class="input--style-6" type="text" name="address" value="<?php echo $row['address']; ?>" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Contact</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="contact" value="<?php echo $row['contact']; ?>" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Date of Birth</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="dob" value="<?php echo $row['dob']; ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">State</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="state" value="<?php echo $row['state']; ?>" readonly>
                                </div>
                            </div>
                        </div>


                         <div class="form-row">
                            <div class="name">Pincode</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="pincode" value="<?php echo $row['pincode']; ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Vehicle Manufacturer</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="dob" value="<?php echo $row['vehiclemanufacturer']; ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Vehicle Model Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="dob" value="<?php echo $row['vehiclemodelname']; ?>" readonly>
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
                                    <?php echo '<a class="pdf" target="_blank" href="../includes/viewrc.php?pdf='.$row['rcphoto'].'">View PDF</a>';?>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">ID Type</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="dob" value="<?php echo $row['idtype']; ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">ID No</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="dob" value="<?php echo $row['idno']; ?>" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">ID Type</div>
                            <div class="value">
                                <div class="input-group">
                                    <?php echo '<a class="pdf" target="_blank" href="../includes/viewid.php?pdf='.$row['idphoto'].'">View PDF</a>';?>
                                </div>
                            </div>
                        </div>









                </div>

                <div class="card-footer">
                    <button class="btn btn--radius-2 approve" name="approve" type="submit">Approve Application</button>
                </div>

                <div class="card-body">

                     <div class="form-row">
                            <div class="name">Reason for Rejection</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="reason" >
                                </div>
                            </div>
                        </div>
              </div>


                <div class="card-footer">
                    <button class="btn btn--radius-2 reject" name="rejectapplication" type="submit">Reject Application</button>
                </div>

            </div>
        </div>
    </div>
  </form>
    <?php
}
}?>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
