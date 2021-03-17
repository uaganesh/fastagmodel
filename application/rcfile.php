<?php

    $filerc=$_FILES['rcfile'];
    $fileNamerc=$_FILES['rcfile']['name'];
	$fileTmpNamerc=$_FILES['rcfile']['tmp_name'];
	$fileSizerc=$_FILES['rcfile']['size'];
	$fileErrorrc=$_FILES['rcfile']['error'];
	$fileTyperc=$_FILES['rcfile']['type'];
	
  
   $fileExtrc=explode('.', $fileNamerc);
   $fileActualExtrc = strtolower(end($fileExtrc));


   $allowedrc = array('pdf');

   if(in_array($fileActualExtrc, $allowedrc))
  {

         if($fileErrorrc===0)
         {
         
              if($fileSizerc < 10000000)
              {
   
                $fileNameNewrc= uniqid('',true).".".$fileActualExtrc;


                $fileDestination = '../uploads/rc/'.$fileNameNewrc;

                move_uploaded_file($fileTmpNamerc, $fileDestination);

                /*$sql = "INSERT into test(title,filename) VALUES('$fileName','$fileNameNew')";
 
                  if(mysqli_query($conn,$sql))
                   {
 
                    echo "File Sucessfully uploaded";
                   }
                  else
                  {
                    echo "Error";
                  }
                             
 

                header("Location: test.php?uploadsucess ");*/

               }
              else
                {

                    echo"Your File is too big!"; 

                }

           }

         else
            {
      	       echo "There was an error uploading your file ";
            }

  }