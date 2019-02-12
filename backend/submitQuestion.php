<?php
    $courseID = $_GET['courseID'];
    include('./classes/DB.php');
    include('./classes/Login.php');
    date_default_timezone_set("Asia/Kuala_Lumpur");

    if (isset($_POST['submitQuestionFrom'])) {

        if (Login::isLoggedIn()) {
            $question_uniquID = uniqid("QTS_", true);
            $student_ID = Login::isLoggedIn();
            $content = $_POST['qtsContent'];
            $today_date=date("Y-m-d H:i:s");
            $nun_Responses = 0;
           
            $insert = DB::query('INSERT INTO question VALUES (\'\',:qst_UniqueID, :question_Content, :crs_UniqueID, :student_ID, :nun_Responses, :create_date)', 
            array(':qst_UniqueID'=>$question_uniquID, ':question_Content'=>$content,
             ':crs_UniqueID'=>$courseID, ':student_ID'=>$student_ID, ':nun_Responses'=>$nun_Responses, ':create_date'=>$today_date));
            if (!$insert){                
                header('Location: ../joinedCourse.php?crs_UniqueID='.$courseID);                
                //echo  "<script> window.location.assign('../joinedCourse.php?crs_UniqueID='+$courseID); </script>";
            }else{
                header('Location: ../joinedCourse.php?crs_UniqueID='.$courseID);
            }
            
        }
    }
?>