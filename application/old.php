<!DOCTYPE html>
<?php 
include_once '../header/headerblack/header.php';
?>
<?php
if(!isset($_SESSION['loggedin'])){ //if login in session is not set

    header("Location:../login/login.php");
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
                                        <input type="text" name="name" id="name" />
                                        <span class="text-input">Name on the registered account</span>
                                    </div>
                                    
                                </div>
                            </div>

                          <div class="form-group">
                          <label class="form-label" for="cars">Gender</label>
                          <select placehoder="Select" name="gender" id="gender">
                          <option hidden disabled selected value>Select an option</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                          <option value="transgender">Transgender</option>
                          </select>
                          </div>



                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" id="address" />
                             
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label">Contact Number</label>
                                <input type="number" name="contact" id="contact" />
                         </div>
                            <div class="form-date">
                                <label for="birth_date" class="form-label">Birth Date</label>
                                <input type="date" name="date" id="date" />
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
                                <input type="number" maxlength="6" size="4" name="pincode" id="pincode" />

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
        echo "<p style='color:green; text-align:center; font-size: 20px; font-weight:bold;'>Signed up Sucessfully </p>";
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
                                        <input type="text" name="manufacture" id="manufacture" />
                                        <span class="text-input">Vehicle Manufacturer eg : Hyundai , Mercedes</span>
                                    </div>
                                    
                                </div>
                            </div>

                          <div class="form-group">
                          <label class="form-label" for="cars">Tag Class</label>
                          <select name="tagclass" id="tagclass">
                          <option hidden disabled selected value>Select an option</option>
                          <option value="4">4-Car / Jeep / Van/ Tata Ace and similar mini light commercial vehicle</option>
                          <option value="5">5-Light Commercial Vehicle</option>
                          <option value="6">6-Three Axle Commercial Vehicles</option>
                          <option value="7">7-Bus/Truck</option>
                          <option value="12">12-4 to 6 axle</option>
                          <option value="7">7-7 or More Axle</option>
                          <option value="16">16-Heavy Construction Machinery (HCM)/Earth Moving Equipment (EME)</option>

                          </select>
                          </div>



                            <div class="form-group">
                                <label for="address" class="form-label">Vehicle Registration No</label>
                                <input type="text" name="regno" id="regno" />
                             
                            </div>

                            <div class="form-group">
                                <label for="model" class="form-label">Vehicle Model Name</label>
                                <input type="text" name="model" id="model" />
                             
                            </div>

                            <div class="form-group">
                                <label for="phone" class="form-label">Upload Scanned Photo of RC as PDF</label>
                                <input type="file" name="rcfile" id="rcfile"  required/>
                         
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
                                <input type="text" name="idno" id="idno" />
                             
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
                                <li>Post online payment,if approved you are set to receive the copy of FASTag on your registered address so make sure address given is correct</li>
                                </ul>
                           </div>
                      </div>

                        
                    </fieldset>
                </div>
            </form>
        </div>

    </div>


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