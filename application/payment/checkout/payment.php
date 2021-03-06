<!doctype html>
<?php 
include_once '../header.php';
include_once '../../../includes/dbh.php';

?>
<?php
if(!isset($_SESSION['loggedin'])){ //if login in session is not set

    header("Location:../login/login.php");
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>FASTag Application Payment</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">

    <?php
                 
                 $sql="SELECT tagclass,vehicleregisterno FROM application WHERE username='{$_SESSION['username']}' and payment='pending'";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {
                                

                                $tagtype=$row['tagclass'];

                                $regno=$row['vehicleregisterno'];

                               echo '<p>'.$tagtype.'</p>';

                         



          ?>





    <?php
                 
                 $sql="SELECT * FROM feedetails WHERE tagclass=$tagtype";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {
                                

    ?>

    

    <!-- Bootstrap core CSS -->
<link href="../custom/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="ab.png" alt="" width="200" height="50">
      <h2>Payment For Fastag</h2>
      <p class="lead">One last step to Get Your FASTag. Complete the Payment to submit your FASTag Application.</br> If Approved Fastag will be sent to your Registered Address</p>
    </div>

    <div class="row g-3">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Fees</span>
          <span class="badge bg-secondary rounded-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Tag Issuance Fee (One Time)</h6>
              <small class="text-muted">Tag Issuance Fee: Rs.84.75 </br> GST Rs. 15.25  </small>
            </div>
            <span class="text-muted">???100</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Security Deposit</h6>
              <small class="text-muted">Refundable Security Deposit</small>
            </div>
            <?php echo '<span class="text-muted">'.'???'.$row['securitydeposit'].'</span>'; ?>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Threshold</h6>
              <small class="text-muted">Minimum Balance to keep</small>
            </div>
            <?php echo '<span class="text-muted">'.'???'.$row['threshold'].'</span>'; ?>
          </li>
          
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <?php echo '<strong>'.'???'.$row['total'].'</strong>';?>
          </li>
        </ul>

  <?php
         }

      }

?> 

<?php
                            }

                      }
                ?>


     <?php
                 
                 $sql="SELECT * FROM registration WHERE username='{$_SESSION['username']}'";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {
                                

              ?>


      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Check your Information</h4>
        <form action="../../../includes/payment.php" method="post">
          <div class="row g-3">
            <div class="col-12">
              <label for="firstName" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name"  value="<?php echo $row['name']; ?>" readonly >
            
            </div>

            
            </div>
            </br>
            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="username" value="<?php echo $row['username']; ?>" readonly>
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>
            </br>
            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" value="<?php echo $row['email']; ?>" readonly>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
</br>

<?php
         }

      }

?> 




<?php
                 
               
                 $sql="SELECT * FROM application WHERE  username='{$_SESSION['username']}' AND vehicleregisterno='$regno' AND status='1'";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {
                                

              ?>


            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" value="<?php echo $row['address']; ?>" readonly>


            <div class="col-12">
              </br>
              <label for="manufacturer" class="form-label">Vehicle Model</label>
              <input type="text" class="form-control" id="address" value="<?php echo $row['vehiclemodelname']; ?>" readonly> 
            </br>
              <label for="manufacturer" class="form-label">Vehicle Manufacturer</label>
              <input type="text" class="form-control" id="address" value="<?php echo $row['vehiclemanufacturer']; ?>" readonly>
             </br>
              <label for="registerno" class="form-label">Vehicle Register No</label>
              <input type="text" class="form-control" name="registerno"   value="<?php echo $row['vehicleregisterno']; ?>" readonly>


              

<?php
         }

      }

?>             

            

            

   

          </br> </br> <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">PAY NOW</button>
        </form>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2020 FASTag</p>
    
  </footer>
</div>


    <script src="../custom/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
  </body>
</html>
