<?php
    //error_reporting(0);     
    $courseID = $_GET['cid'];
    include('./classes/DB.php');
    include('./classes/Login.php');
    date_default_timezone_set("Asia/Kuala_Lumpur");

    if (isset($_POST['createQuiz'])) {
        $question_uniquID = uniqid("QIZ_", true);
        
        $week_ID = $_POST['selectedWeek'];
        $today_date=date("Y-m-d H:i:s");
        $questionCount = $_POST['nunOfestion'];

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