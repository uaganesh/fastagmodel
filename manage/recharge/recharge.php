<!DOCTYPE html>
<html  >
<?php

include_once 'header/header.php';
include_once '../../includes/dbh.php';
?>
 
<head>
  <!-- Site made with Mobirise Website Builder v5.2.0, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.2.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo5.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Recharge FASTag</title>
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

  <link href="custom/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="../custom/dist/js/bootstrap.bundle.min.js"></script>
  
  
  
  
</head>
<body>
  
  <section class="form2 cid-sjAVihPUA5" id="form2-x">

    

    
    <div class="align-center container">
        <div class="row justify-content-center">
            <div class="col-lg-8 mx-auto mbr-form">
               
                    <div class="">
                        
                        <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...! some
                            problem!</div>
                    </div>
                    <div class="dragArea row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h1 class="mbr-section-title mb-4 display-2"><strong>Recharge Your FASTag !</strong></h1>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <p class="mbr-text mbr-fonts-style mb-5 display-7"></p>
                        </div>


                        <?php
                 
                 $sql="SELECT * FROM ledger WHERE username='{$_SESSION['username']}' and vehicleregisterno='" . $_GET['regno'] . "'";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {
                                

              ?>

              <form action="../../includes/recharge.php" method="POST">
                        <div class="col-lg col-md col-12 form-group" data-for="email">
                            <input type="text" name="fastag" value="<?php echo $row['fastagid']; ?>" data-form-field="name" class="form-control" id="name-form2-x" readonly>
                            <label  for="name">FASTag id</label>
                        </div>
                        <div class="col-lg col-md col-12 form-group" data-for="email">
                            <input type="regno" name="regno" value="<?php echo $row['vehicleregisterno']; ?>" data-form-field="email" class="form-control" id="email-form2-x" readonly>
                            <label  for="vehicleregisterno">Vehicle Register No</label>
                        </div>
                        <div class="col-lg col-md col-12 form-group" data-for="email">
                            <input type="text" minlength="3" name="amount" placeholder="Recharge Amount" data-form-field="email" class="form-control" id="email-form2-x">
                        </div>

                <?php
              }
            }?>
                       

                    <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Debit card</label>
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

          <button class="w-100 btn btn-primary btn-lg" name="submit" type="submit">PAY NOW</button>
   

      </div>
    </div>

  </form>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2020 FASTag</p>
    
  </footer>
</div>
             
            </div>
        </div>
    </div>
</section><section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/a" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a></section><script src="assets/web/assets/jquery/jquery.min.js"></script>  <script src="assets/popper/popper.min.js"></script>  <script src="assets/tether/tether.min.js"></script>  <script src="assets/bootstrap/js/bootstrap.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/theme/js/script.js"></script>  
  
  
</body>
</html>