<!DOCTYPE html>
<?php
include_once '../header/headerblack/header.php';
include_once '../includes/dbh.php';

?>
<?php
if(!isset($_SESSION['loggedin'])){ //if login in session is not set

    header("Location:../login/login.php");
}
?>

<?php
if(isset($_GET["error"]))
     {
       if($_GET["error"]=="none")
       {
           header("Refresh:3; url=payment/checkout/payment.php");
       }

     }
  ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Application</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function()
    {
       $(".regclass").keydown(function(e)
       {
         if(e.keyCode == 32)
         {
           $('.regclass').css('border-color','red');
           alert("No Space is Allowed !");
           e.preventDefault();
         }
         else
           {
            $('.regclass').css('border-color','');
           }

       });
    });

    jQuery(document).ready(function() {

    	// 1 Capitalize string - convert textbox user entered text to uppercase
    	jQuery('.txtuppercase').keyup(function() {
    		$(this).val($(this).val().toUpperCase());
    	});
    });

  </script>
</head>

<body>

    <div class="main">

        <div class="container">
            <form action="../includes/fastagapp.php" method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data">
                <div>
                    <h3>Personal info</h3>
                    <fieldset>
                        <h2>Personal information</h2></br>
                        <p class="desc">Please enter your infomation carefully</p>


                        <div class="fieldset-content">
                            <div class="form-row">
                                <label class="form-label">Name</label>
                                <div class="form-flex">
                                    <div class="form-group">
           <?php

                 $sql="SELECT name,username,email FROM registration WHERE username='{$_SESSION['username']}'";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {


              ?>
                                        <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" readonly />

                                        <input type="hidden" name="email" value="<?php echo $row['email']; ?>"/>

                                        <span class="text-input">Name on the registered account</span>
                                    </div>

                                </div>
                            </div>

                          <div class="form-group">
                          <label class="form-label" for="cars">Gender</label>
                          <select placehoder="Select" name="gender" id="gender" required title="Fill Gender">
                          <option hidden disabled selected value>Select an option</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                          <option value="transgender">Transgender</option>
                          </select>
                          </div>



                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="txtuppercase" name="address" class="address" id="address" />

                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label">Contact Number</label>
                                <input type="number" name="contact" id="contact" pattern="^[6-9]\d{9}$" title="Invalid Mobile Number"/>
                         </div>
                            <div class="form-date">
                                <label for="birth_date" class="form-label">Birth Date</label>
                                <input type="date" name="date" id="date" min="1950-01-01" max="2002-01-01" title="Date of Birth Should be between 01-01-1950 and 01-01-2002"/>
                               </div>
                         <div class="form-group">
                          <label class="form-label" for="state">State</label>
                          <select name="state" id="state">
                          <option hidden disabled selected value>Select an option</option>
                          <option value="arunachalpradesh">Arunachal Pradesh</option>
                          <option value="assam">Assam</option>
                          <option value="bihar">Bihar</option>
                          <option value="chhattisgarh">Chhattisgarh </option>
                          <option value="goa">Goa</option>
                          <option value="gujarat">Gujarat</option>
                          <option value="Haryana">Haryana</option>
                          <option value="himachalpradesh">Himachal Pradesh</option>
                          <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                          <option value="Jharkhand">Jharkhand</option>
                          <option value="Karnataka">Karnataka</option>
                          <option value="Kerala">Kerala</option>
                          <option value="Madhya Pradesh">Madhya Pradesh</option>
                          <option value="Maharashtra">Maharashtra</option>
                          <option value="Manipur">Manipur</option>
                          <option value="Meghalaya">Meghalaya</option>
                          <option value="Mizoram">Mizoram</option>
                          <option value="Nagaland">Nagaland</option>
                          <option value="Odisha">Odisha</option>
                          <option value="Punjab">Punjab</option>
                          <option value="Sikkim">Sikkim</option>
                          <option value="Tamil Nadu">Tamil Nadu</option>
                          <option value="Telangana">Telangana</option>
                          <option value="Tripura">Tripura</option>
                          <option value="Uttar Pradesh">Uttar Pradesh</option>
                          <option value="Uttarakhand">Uttarakhand</option>
                          <option value=" West Bengal"> West Bengal</option>

                          </select>
                          </div>

                          <div class="form-group">
                                <label for="pincode" class="form-label">Pincode</label>
                                <input type="number" minlength="6" maxlength="6" size="4" name="pincode" id="pincode" title="Pincode Should Be of 6 Digits" />

                                                       <?php
     if(isset($_GET["error"]))
     {
       if($_GET["error"]=="emptyinput")
       {
        echo "<p style='color:red; text-align:center; font-size: 20px; font-weight:bold;'>Fill out all the Details!</p>";
       }
       else if($_GET["error"]=="regnoexist")
       {
        echo "<p style='color:red; text-align:center; font-size: 20px; font-weight:bold;'>Register Number of the vehicle already exist in our database !</p>";
       }
       else if($_GET["error"]=="invalidmobile")
       {
        echo "<p style='color:red; text-align:center; font-size: 20px; font-weight:bold;'>Please enter a valid mobile number!</p>";
       }
       else if($_GET["error"]=="invalidfileid")
       {
        echo "<p style='color:red; text-align:center; font-size: 20px; font-weight:bold;'>File Format of ID Proof is not pdf</p>";
       }
       else if($_GET["error"]=="invalidfilerc")
       {
        echo "<p style='color:red; text-align:center; font-size: 20px; font-weight:bold;'>File Format of RC Proof is not pdf</p>";
       }
       else if($_GET["error"]=="stmtfailed")
       {
        echo "<p style='color:red; text-align:center; font-size: 20px; font-weight:bold;'>Something Went Wrong !</p>";
       }
        else if($_GET["error"]=="none")
       {
         echo "<p style='color:green; text-align:center; font-size: 20px; font-weight:bold;'>Signed up Sucessfully . Redirecting to Payment Page</p>";
       }

     }
     ?>

                          </div>

                      </div>


                  </fieldset>



                    <h3>Vehicle Details</h3>
                    <fieldset>
                        <h2>Vehicle Details</h2></br>
                        <p class="desc">Please enter your infomation carefully</p>
                        <div class="fieldset-content">
                            <div class="form-row">
                                <label class="form-label">Vehicle Manufacturer</label>
                                <div class="form-flex">
                                    <div class="form-group">
                                        <input type="text" class="txtuppercase" name="manufacture" id="manufacture" />
                                        <span class="text-input">Vehicle Manufacturer eg : Hyundai , Mercedes</span>
                                    </div>

                                </div>
                            </div>

                          <div class="form-group">
                          <label class="form-label" for="cars">Tag Class</label>
                          <select name="tagclass" id="tagclass">
                          <option hidden disabled selected value>Select an option</option>
                          <option value="4">4-Car / Jeep / Van/ Tata Ace and similar mini light commercial vehicle</option>
                          <option value="5">5-Light Commercial vehicle 2-axle</option>
                          <option value="6">6-Bus–3 axle</option>
                          <option value="61">6-Truck-3 axle</option>
                          <option value="7">7-Bus 2 axle / Mini bus, Truck 2 axle</option>
                          <option value="12">12-Tractor / Tractor with trailer, Truck 4, 5 & 6 -axle</option>
                          <option value="15">15-Truck 7-axle and above</option>
                          <option value="16">16-Heavy Construction Machinery (HCM)/Earth Moving Equipment (EME)</option>

                          </select>
                          </div>



                            <div class="form-group">
                                <label for="address"  class="form-label">Vehicle Registration No</label>
                                <input type="text" class="regclass txtuppercase" pattern="^[A-Za-z0-9]*$" name="regno" id="regno" title="No Special Characters Allowed" />

                            </div>

                            <div class="form-group">
                                <label for="model" class="form-label">Vehicle Model Name</label>
                                <input type="text" class="txtuppercase" name="model" id="model" />

                            </div>

                            <div class="form-group">
                                <label for="phone" class="form-label">Upload Scanned Photo of RC as PDF</label>
                                <input type="file"  name="rcfile" id="rcfile"  required/>

                      </div>
                    </fieldset>

                    <h3>KYC</h3>
                    <fieldset>
                        <h2>KYC Details</h2></br>
                        <p class="desc">Please enter your infomation carefully</p>
                        <div class="fieldset-content">
                           <div class="form-group">
                          <label class="form-label" for="idproof">ID Proof</label>
                          <select name="idproof" id="idproof">
                          <option hidden disabled selected value="">Select an option</option>
                          <option value="Voter's ID">Voter's ID</option>
                          <option value="Adhaar Card">Adhaar Card</option>
                          <option value="PAN Card">PAN Card</option>
                          <option value="Passport">Passport</option>
                          <option value="Driving License">Driving License</option>
                          </select>
                        </div>





                            <div class="form-group">
                                <label for="idno" class="form-label">ID Card No</label>
                                <input type="text" name="idno" id="idno" /></br>

                                <label for="idno" class="form-label">Username</label>
                                <input type="text" name="username" id="username" value="<?php echo $row['username']; ?>" readonly/>

                            </div>


                            <div class="form-group">
                                <label for="phone" class="form-label">Upload Scanned Photo of Proof of ID as PDF</label>
                                <input type="file" name="idfile" id="idfile" required />
                           </div>


                            <div class="form-group">
                                <p class="form-label">Note: The information once submitted cannot be edited and it is final . Make sure the information entered is correct since wrong information may lead to the rejection of the application</p></br>
                                <ul class="form-label">
                                <li>The Identity Proof and RC Proof submitted should be of a single person.</li><br>
                                <li>After submission of your details, you will have to pay fees online depending on the vehicle you own</li><br>
                                <li>Post online payment,if approved you can print the FASTag and receive the copy of FASTag on your registered address so make sure address given is correct</li>
                                </ul>
                           </div>
                      </div>


                    </fieldset>
                </div>
            </form>
        </div>

    </div>

<?php
         }

      }

?>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="vendor/minimalist-picker/dobpicker.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/wnumb/wNumb.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
