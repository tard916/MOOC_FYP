<?php
    include('./classes/DB.php');
    include('./classes/Login.php');
    date_default_timezone_set("Asia/Kuala_Lumpur");
    
    
    if(isset($_POST['nEvent']) && Login::isLoggedIn()){
        $today_date=date("Y-m-d H:i:s");
        $stdID = Login::isLoggedIn();
        $nEvent = $_POST['nEvent'];
        $cID = $_POST['cID'];
       
        if (!DB::query('SELECT * FROM courseevencount WHERE std_uniqueID=:id AND courseID= :cid', array(':id'=>$stdID, ':cid'=>$cID))) {
            DB::query('INSERT INTO courseevencount VALUES ( \'\', :courseID, :studentID, :nEvent)',
            array( ':courseID'=>$cID, ':studentID'=>$stdID, ':nEvent'=>$nEvent));
            //header('Location: ../curriculumPlayer.php?crs_UniqueID='.$cID);
        }else{
            $lastEventCount = !DB::query('SELECT nEvent FROM courseevencount WHERE std_uniqueID=:id AND courseID= :cid', 
            array(':id'=>$stdID, ':cid'=>$cID))[0]['nEvent'];
            $lastEventCount = $lastEventCount + $nEvent;
            DB::query('UPDATE courseevencount SET nEvent= :nEvent WHERE std_uniqueID=:id AND courseID= :cid', 
            array(':id'=>$stdID, ':cid'=>$cID, 'nEvent'=>$lastEventCount));
        }
        
    }

?>