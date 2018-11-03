<?php
       include('./classes/DB.php');

       if (isset($_POST['createaccount'])) {
          $student_name = $_POST['fullName'];
          $password = $_POST['password'];
          $Vpassword = $_POST['verpassword'];
          $email = $_POST['email'];
          $std_uniquID = uniqid("STD_", true);       
   
           if ($password == $Vpassword) {
              if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                   if (strlen($password) >= 6 && strlen($password) <= 60) {
                       if (!DB::query('SELECT email FROM student WHERE email=:email', array(':email'=>$email))){
                           DB::query('INSERT INTO student VALUES (\'\',:std_uniquID, :student_name, :email, :password)', 
                           array(':std_uniquID'=>$std_uniquID, ':student_name'=> $student_name, ':email'=>$email, ':password'=>password_hash($password, PASSWORD_BCRYPT)));
                           
                           echo '<script language = "javascript">';
                           echo 'alert("Record Added successfully")';
                           echo '</script>';
                           echo  "<script> window.location.assign('../index.php'); </script>";
                       }else{
                           echo 'Email in Use!';
                       }
                   }else{
                       echo 'Invalid Password!';
                   }
               }else{
                   echo 'Invalid Email!';
               }                
            
           }else {
               echo 'Invalid Password!';
           } 
       }

?>