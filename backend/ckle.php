<?php
include('./classes/DB.php');
include('./classes/Login.php');
date_default_timezone_set("Asia/Kuala_Lumpur");

// echo '<script>
// console.log($_POST["userID"]);
// </script>';
if(isset($_GET['userID'])){ 
    $today_date=date("Y-m-d");
    $stdID = $_GET['userID'];
    $crsID = $_GET['courseID'];
    $iniActD= 1;
    
    if (DB::query('SELECT * FROM student_logs WHERE std_uniqueID=:id', array(':id'=>$stdID))) {

        // $lastLogin = DB::query('SELECT * FROM student_logs WHERE std_uniqueID=:id', array(':id'=>$stdID))[0]['last_login'];
        $active_days = DB::query('SELECT * FROM student_logs WHERE std_uniqueID=:id', array(':id'=>$stdID))[0]['active_days'];
        $lastLogin = DB::query('SELECT * FROM student_logs WHERE std_uniqueID=:id', array(':id'=>$stdID))[0]['last_login'];
        $ltLogin = new DateTime($lastLogin);
        $cDate = new DateTime($today_date);

        if($ltLogin ==$cDate){
            DB::query('UPDATE student_logs SET last_login= :last_login, active_days= :active_days WHERE std_uniqueID= :std_uniqueID 
            AND course_ID= :course_ID',
            array(':last_login'=>$today_date,':active_days'=>$active_days,':std_uniqueID'=>$stdID, ':course_ID'=>$crsID));
            header('Location: ../joinedCourse.php?crs_UniqueID='.$crsID);
        }else{
            $actD = $active_days + 1;
            DB::query('UPDATE student_logs SET last_login= :last_login, active_days= :active_days WHERE std_uniqueID= :std_uniqueID 
            AND course_ID= :course_ID',
            array(':last_login'=>$today_date,':active_days'=>$actD,':std_uniqueID'=>$stdID,':course_ID'=>$crsID));
            header('Location: ../joinedCourse.php?crs_UniqueID='.$crsID);
        }
        
    }else {
        
        DB::query('INSERT INTO student_logs VALUES ( \'\',:last_login, :std_uniqueID, :course_ID, :active_days)',
        array(':last_login'=>$today_date,':std_uniqueID'=>$stdID, ':active_days'=>$iniActD, ':course_ID'=>$crsID));
        header('Location: ../joinedCourse.php?crs_UniqueID='.$crsID);
    }

}


?>
