<?php
    $question_ID = $_GET['qts_ID'];
    $courseID = $_GET['crs_UniqueID'];
    include('./classes/DB.php');
    include('./classes/Login.php');
    date_default_timezone_set("Asia/Kuala_Lumpur");

    if (isset($_POST['submitResponseFrom'])) {

        if (Login::isLoggedIn()) {
            $question_uniquID = uniqid("RQTS_", true);
            $student_ID = Login::isLoggedIn();
            $content = $_POST['responseContent'];
            $today_date=date("Y-m-d H:i:s");
            
            $nunOfResponse = DB::query('SELECT nun_Responses FROM question WHERE qst_UniqueID =:qst_UniqueID', array(':qst_UniqueID'=>$question_ID))[0]['nun_Responses'];
           
            $insert = DB::query('INSERT INTO response VALUES (\'\',:response_uniqueID, :response_Content, :student_ID, :question_ID, :create_date)', 
            array(':response_uniqueID'=>$question_uniquID, ':response_Content'=>$content,
            ':student_ID'=>$student_ID, ':question_ID'=>$question_ID, ':create_date'=>$today_date));
            if (!$insert){
                $nunOfResponse = $nunOfResponse + 1;
                $update = DB::query('UPDATE question SET nun_Responses = :nun_Responses WHERE qst_UniqueID =:qst_UniqueID', array('nun_Responses'=>$nunOfResponse,':qst_UniqueID'=>$question_ID));
                if (!$update) {
                    header('Location: ../question.php?qts_ID='.$question_ID.'&crs_UniqeID='.$courseID);                
                    //echo  "<script> window.location.assign('../joinedCourse.php?crs_UniqueID='+$courseID); </script>";
                }             
                
            }else{
                header('Location:  ../question.php?qts_ID='.$question_ID.'&crs_UniqeID='.$courseID);
            }
            
        }
    }
?>