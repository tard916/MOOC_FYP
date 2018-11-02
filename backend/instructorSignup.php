<?php

    include('./classes/DB.php');

    if (isset($_POST['createaccount'])) {
       $instructor_name = $_POST['fullName'];
       $password = $_POST['password'];
       $Vpassword = $_POST['verpassword'];
       $email = $_POST['email'];
       $ins_uniquID = uniqid("INS_", true);       

        if ($password == $Vpassword) {
           if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (strlen($password) >= 6 && strlen($password) <= 60) {
                    if (!DB::query('SELECT email FROM instructor WHERE email=:email', array(':email'=>$email))){
                        DB::query('INSERT INTO instructor VALUES (\'\',:ins_uniquID, :instructor_name, :email, :password)', 
                        array(':ins_uniquID'=>$ins_uniquID, ':instructor_name'=> $instructor_name, ':email'=>$email, ':password'=>password_hash($password, PASSWORD_BCRYPT)));
                        
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