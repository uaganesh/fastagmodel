<!DOCTYPE html>
<html lang="en" >
<?php
include_once '../header/headerblack/header.php';
include_once '../includes/dbh.php';

?>
<head>
  <meta charset="UTF-8">
  <title>Feedback</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="table-users">
   <div class="header">Feedback</div>

   <table cellspacing="0">
      <tr>

         <th>Name</th>

         <th width="500">Comments</th>
      </tr>

      <?php

                 $sql="SELECT * FROM feedback ORDER BY feedbackid DESC limit 20";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {

              echo '<tr>';

                 echo '<td>'.$row['username'].'</td>';
                 echo '<td>'.$row['feedback'].'</td>';

            echo  '</tr>';

      }
      }
      ?>



   </table>
</div>
<!-- partial -->

</body>
</html>
