<?php
    //error_reporting(0);     
    $courseID = $_GET['crs_UniqueID'];
    include('./classes/DB.php');
    include('./classes/Login.php');
    date_default_timezone_set("Asia/Kuala_Lumpur");

    if (isset($_POST['createQuiz'])) {       

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
                    header('Location: ../question.php?qts_ID='.$question_ID);                
                    //echo  "<script> window.location.assign('../joinedCourse.php?crs_UniqueID='+$courseID); </script>";
                }             
                
            }else{
                header('Location: ../question_ID.php?qts_ID='.$question_ID);
            }
            
        }

        if (!DB::query('INSERT INTO quiz VALUES (\'\', :quiz_UniqueID, :week_ID, :course_ID, :created_date)',
        array(':quiz_UniqueID'=>$question_uniquID,':week_ID'=>$week_ID,':course_ID'=>$courseID,':created_date'=>$today_date))){
            for ($i=1; $i <= $questionCount; $i++) { 
                $qQuestion_uniquID = uniqid("QIZ_Q", true);
                $qestionTitles = array();
                $options_A = array();
                $options_B = array();
                $options_C = array();
                $otpions_D = array();
                $corrects_Answer = array();

                $qestionTitles = $_POST['questionTitle'.$i];
                $options_A =  $_POST['option_A'.$i];
                $options_B = $_POST['option_B'.$i];
                $options_C =  $_POST['option_C'.$i];
                $otpions_D =  $_POST['option_D'.$i];
                $corrects_Answer = $_POST['correct_Answer'.$i];

                    
                if(!DB::query('INSERT INTO quizquestion VALUES (\'\', :qq_UniqueID, :question_Title, :option_A, :option_B, :option_C, :option_D, :correct_Option, :quiz_ID)',
                    array(':qq_UniqueID'=>$qQuestion_uniquID,':question_Title'=>$qestionTitles,':option_A'=>$options_A,':option_B'=>$options_B,':option_C'=>$options_C,':option_D'=>$otpions_D,
                        ':correct_Option'=>$corrects_Answer,':quiz_ID'=>$question_uniquID))){
                        echo '<script>';
                        echo 'alert("Record Added successfully")';
                        echo '</script>';
                        echo  "<script> window.location.assign('../instructor.php'); </script>";
                }
            }

    }else{
        echo '<script>';
        echo 'alert("Record not Added")';
        echo '</script>';
        echo  "<script> window.location.assign('../instructor.php'); </script>";
    }
}
?>