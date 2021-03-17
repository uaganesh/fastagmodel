<?php

    $fileid=$_FILES['idfile'];
    $fileNameid=$_FILES['idfile']['name'];
	$fileTmpNameid=$_FILES['idfile']['tmp_name'];
	$fileSizeid=$_FILES['idfile']['size'];
	$fileErrorid=$_FILES['idfile']['error'];
	$fileTypeid=$_FILES['idfile']['type'];
	
  
   $fileExtid=explode('.', $fileNameid);
   $fileActualExtid = strtolower(end($fileExtid));


   $allowedid = array('pdf');

   if(in_array($fileActualExtid, $allowedid))
  {

         if($fileErrorid===0)
         {
         
              if($fileSizeid < 10000000)
              {
   
                $fileNameNewid= uniqid('',true).".".$fileActualExtid;


                $fileDestination = '../uploads/id/'.$fileNameNewid;

                move_uploaded_file($fileTmpNameid, $fileDestination);

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
      	       header("Location: test.php?invalidfileformat ");
            }

  }