<?php
include('./classes/DB.php');
include('./classes/Login.php');
date_default_timezone_set("Asia/Kuala_Lumpur");

// echo '<script>
// console.log($_POST["userID"]);
// </script>';
if(isset($_POST['userID']) && isset($_POST['videoID'])){
    $today_date=date("Y-m-d H:i:s");
    $stdID = Login::isLoggedIn();
    $vID = $_POST['videoID'];
    $npv = 1;

    //echo $stdID;

    if (!DB::query('SELECT * FROM videoplay_logs WHERE std_uniqueID=:id AND video_id= :vid', array(':id'=>$stdID, ':vid'=>$vID))) {
        DB::query('INSERT INTO student_logs VALUES ( \'\', :std_uniqueID, :video_id, :nplayVideo)',
        array(':id'=>$stdID, ':vid'=>$vID, ':nplayVideo'=>$npv));
    }

}


?>
