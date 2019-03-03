<?php
    $courseID = $_GET['courseID'];
    include('./classes/DB.php');
    include('./classes/Login.php');
    date_default_timezone_set("Asia/Kuala_Lumpur");

    if (isset($_POST['submitRatingForm'])) {

        if (Login::isLoggedIn()) {
            $rating_uniquID = uniqid("RTG_", true);
            $student_ID = Login::isLoggedIn();
            $ratingValue = $_POST['submitRating'];
            $content = $_POST['ratingArea'];
            $today_date=date("Y-m-d H:i:s");
           
            $insert = DB::query('INSERT INTO rating VALUES (\'\',:rating_ID, :rating_value, :rating_Content, :student_ID, :date, :course_ID)', 
            array(':rating_ID'=>$rating_uniquID, ':rating_value'=> $ratingValue, ':rating_Content'=>$content, ':student_ID'=>$student_ID, ':date'=>$today_date, ':course_ID'=>$courseID));
            if (!$insert){                
                header('Location: ../joinedCourse.php?crs_UniqueID='.$courseID);                
                //echo  "<script> window.location.assign('../joinedCourse.php?crs_UniqueID='+$courseID); </script>";
            }else{
                header('Location: ../joinedCourse.php?crs_UniqueID='.$courseID);
            }
            
        }
    }
?>