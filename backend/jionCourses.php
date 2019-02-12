<?php
    include('./classes/DB.php');
    include('./classes/Login.php');    
    date_default_timezone_set("Asia/Kuala_Lumpur");
    
    if (Login::isLoggedIn()) {
        $crs_UniqueID = $_GET['crs_UniqueID'];
        $student_ID = Login::isLoggedIn();
	    $today_date=date("Y-m-d H:i:s");

        if (!DB::query('SELECT course_id, student_id FROM enrollment WHERE course_id =:crs_UniqueID and student_id=:student_ID',array(':crs_UniqueID'=>$crs_UniqueID, ':student_ID'=>$student_ID))) {
            DB::query('INSERT INTO enrollment  VALUES (\'\', :course_id, :student_id, :joining_data)', 
            array(':course_id'=>$crs_UniqueID , ':student_id'=>$student_ID, ':joining_data'=>$today_date));
            echo '<script language = "javascript">';
            echo 'alert("You have successfully joined the course!")';
            echo '</script>';
            echo  "<script> window.location.assign('../studentCourses.php'); </script>";
        }else{
            echo '<script language = "javascript">';
            echo 'alert("You have already joined this course!")';
            echo '</script>';
            echo  "<script> window.location.assign('../studentCourses.php'); </script>";
        }
    }else{
        echo '<script language = "javascript">';
            echo 'alert("You need to by logged in before joining any course!")';
            echo '</script>';
            echo  "<script> window.location.assign('../index.php'); </script>";
    }  
  
?>