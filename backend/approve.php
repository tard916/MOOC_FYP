<?php
    $courseID = $_GET['courseID'];
    include('./classes/DB.php');
    include('./classes/Login.php');
    date_default_timezone_set("Asia/Kuala_Lumpur");

    if (isset($_POST['confirm'])) {

        if(isset($_POST['checked'])){    
            $statusUPD = 'approved';       
            $insert = DB::query('UPDATE course SET status=:statusUPD WHERE crs_uniqueID = :course_ID', 
            array('statusUPD'=>$statusUPD, ':course_ID'=>$courseID));                         
            header('Location: ../admin.php');                
            
        }else{
            header('Location: ../adminCourse.php?cid='.$courseID);
        }
    }
?>