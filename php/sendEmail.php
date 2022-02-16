<?php
   error_reporting(0);
   
   require("database.php");

   if($con)
   {
      if($_POST) {

         $name = $_POST['name'];
         $email = $_POST['email'];
         $subject = $_POST['subject'];
         $contact_message = $_POST['message'];
         
         $check_data_sql = "SELECT * FROM `mail` WHERE email = '".$email."' ";
         if($result = mysqli_query($con,$check_data_sql))
         {
            
            $fetched_data =  mysqli_fetch_array($result);
            if($fetched_data != "")
            {
               echo "<strong style='color:red'>Email Already Registered !</strong>";
            //     echo "<pre>";
            //    $fetched_data =  mysqli_fetch_array($result);
            //    echo $fetched_data[2];
            // echo "</pre>";
         
            }
            else
            {
               $sql = "INSERT INTO `mail`(`name`, `email`, `subject`, `message`) VALUES ('".$name."','".$email."','".$subject."','".$contact_message."')";
               if (mysqli_query($con, $sql)) {
                  echo "<strong style='color:green'>New record created successfully</strong>";
                } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($con);
                }
            }
            

            // echo "<pre>";
            //    $fetched_data =  mysqli_fetch_array($result);
            //    echo $fetched_data[2];
            // echo "</pre>";
         }
         else
         {
            echo  "No Data Found";
         }
         
      }
   }
   else { echo "Error: Mysqli Server Not Running...."; }

?>