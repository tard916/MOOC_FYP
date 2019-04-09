<?php
include('./classes/DB.php');
include('./classes/Login.php');
$weekID = $_GET['weekID'];
$courseID = $_GET['cid'];

    if (isset($_GET['id'])) {
        $rowID = $_GET['id'];
        $dbstatus = DB::query('SELECT status FROM course_cirriculum WHERE id = :rowID', array(':rowID'=>$rowID))[0]['status'];
        
        if ($dbstatus == "show") {
            $stsHide = "hide";
            $hideResult =  DB::query('UPDATE course_cirriculum SET status=:stsHide WHERE id = :cntntID', 
            array(':stsHide'=>$stsHide, ':cntntID'=>$rowID));
            header('Location: ../manageWeekContent.php?weekID='.$weekID.'&cid='.$courseID);
        }else{
            $stsHide = "show";
            $hideResult =  DB::query('UPDATE course_cirriculum SET status=:stsHide WHERE id = :cntntID', 
            array(':stsHide'=>$stsHide, ':cntntID'=>$rowID));
            header('Location: ../manageWeekContent.php?weekID='.$weekID.'&cid='.$courseID);
        }
    }

?>