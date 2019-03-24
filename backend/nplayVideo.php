<?php
    include('./classes/DB.php');
    include('./classes/Login.php');
    date_default_timezone_set("Asia/Kuala_Lumpur");

    if(isset($_GET['videoID']) && Login::isLoggedIn()){
        $today_date=date("Y-m-d H:i:s");
        $stdID = Login::isLoggedIn();
        $vID = $_GET['videoID'];
        $cID = $_GET['cID'];
        $npv = 1;
        
        if (!DB::query('SELECT * FROM videoplay_logs WHERE std_uniqueID=:id AND video_id= :vid', array(':id'=>$stdID, ':vid'=>$vID))) {
            DB::query('INSERT INTO videoplay_logs VALUES ( \'\', :std_uniqueID, :video_id, :nplayVideo)',
            array(':std_uniqueID'=>$stdID, ':video_id'=>$vID, ':nplayVideo'=>$npv));
            header('Location: ../curriculumPlayer.php?crs_UniqueID='.$cID);
        }
        
    }

?>
