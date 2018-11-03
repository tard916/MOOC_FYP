<?php
    include('./classes/DB.php');

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

       // echo $email."<br/>".$password;

       if (!DB::query('SELECT email FROM student WHERE email=:email', array(':email'=>$email))) {
            if (!DB::query('SELECT email FROM instructor WHERE email=:email', array(':email'=>$email))) {
                if (!DB::query('SELECT email FROM admin WHERE email=:email', array(':email'=>$email))) {
                    echo 'User not registered!';
                }else{
                    if(password_verify($password, DB::query('SELECT password FROM admin WHERE email=:email', array(':email'=>$email))[0]['password'])){
                        $cstrong = TRUE;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $user_id = DB::query('SELECT id FROM admin WHERE email=:email', array(':email'=>$email))[0]['id'];
                        DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);                
                
                        echo '<script language = "javascript">';
                        echo 'alert("Logged in successfully!")';
                        echo '</script>';
                        echo  "<script> window.location.assign('../index.php'); </script>";
                       
                    }else{
                        echo 'Incorrect Password!';
                    }
                }
            }else{
                if(password_verify($password, DB::query('SELECT password FROM instructor  WHERE email=:email', array(':email'=>$email))[0]['password'])){
                    $cstrong = TRUE;
                    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                    $user_id = DB::query('SELECT ins_uniquID FROM instructor WHERE email=:email', array(':email'=>$email))[0]['ins_uniquID'];
                    DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
                    setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                    setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
            
            
                    echo '<script language = "javascript">';
                    echo 'alert("Logged in successfully!")';
                    echo '</script>';
                    echo  "<script> window.location.assign('../index.php'); </script>";
                }else{
                    echo 'Incorrect Password!';
                }
            }
        }else{
            if(password_verify($password, DB::query('SELECT password FROM student WHERE email=:email', array(':email'=>$email))[0]['password'])){
                $cstrong = TRUE;
                $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                $user_id = DB::query('SELECT std_uniquID FROM student WHERE email=:email', array(':email'=>$email))[0]['std_uniquID'];
                DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
                setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
        
        
                echo '<script language = "javascript">';
                echo 'alert("Logged in successfully!")';
                echo '</script>';
                echo  "<script> window.location.assign('../index.php'); </script>";
            }else{
                echo 'Incorrect Password!';
            }
        }
    }


   
?>
