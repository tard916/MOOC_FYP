<?php
    include('./backend/classes/DB.php');
    include('./backend/classes/Login.php');

    if (!Login::isLoggedIn()) {
        echo '<script language = "javascript">';
        echo 'alert("Not Logged in!")';
        echo '</script>';
        echo  "<script> window.location.assign('index.php'); </script>";
    }

    if (isset($_POST['confirm'])) {
        
        if (isset($_POST['alldevices'])) {
            DB::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid'=>Login::isLoggedIn()));
            echo '<script language = "javascript">';
            echo 'alert("You have been logged out!")';
            echo '</script>';
            echo  "<script> window.location.assign('index.php'); </script>";
        }else {
            if (isset($_COOKIE['SNID'])) {
                DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
            }
            setcookie('SNID', '1', time()-3600);
            setcookie('SNID_', '1', time()-3600);
            echo '<script language = "javascript">';
            echo 'alert("You have been logged out!")';
            echo '</script>';
            echo  "<script> window.location.assign('index.php'); </script>";
        }
    }
?>

<h1>Logout of your Account?</h1>
<p>Are you sure you'd like to logout?</p>
<form action="logout.php" method="post">
    <input type="checkbox" name="alldevices" value="alldevices"> Logout of all devices?<br />
    <input type="submit" name="confirm" value="Confirm">
</form>