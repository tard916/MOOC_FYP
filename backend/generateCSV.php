<?php 

// include('./classes/DB.php');
// include('./classes/Login.php');
date_default_timezone_set("Asia/Kuala_Lumpur");

$filelocation = './ML_SRC/';
$filename     = 'studentList-'.date('Y-m-d H.i.s').'.csv';
$file_export  =  $filelocation . $filename;

$data = fopen($file_export, 'w');

$csv_fields = array();

$csv_fields[] = 'courseID';
$csv_fields[] = 'studentID';
$csv_fields[] = 'ndays_act';
$csv_fields[] = 'nday_inAct';
$csv_fields[] = 'nevents';
$csv_fields[] = 'nplayvideo';

$conn = DB::conn();

$studentList = $conn->prepare("SELECT DISTINCT 
        enrollment.course_id as courseID, 
        enrollment.student_id as studentID,
        student_logs.active_days as ndays_act,      
        (DATEDIFF(student_logs.last_login, enrollment.joining_data)- student_logs.active_days) as nday_inAct,
        courseevencount.nEvent as nevents,
        sum(videoplay_logs.nPlayVideo) as nplayvideo
    from 
        enrollment, student_logs,courseevencount,videoplay_logs,course
    where
        enrollment.course_id = student_logs.course_ID
    and
        enrollment.student_id = student_logs.std_uniqueID
    and 
        enrollment.course_id = videoplay_logs.course_ID
    and
        enrollment.student_id = videoplay_logs.std_uniqueID
    and 
        enrollment.course_id = course.crs_uniqueID
    and
        enrollment.student_id = courseevencount.studentID
    and
        enrollment.course_id = courseevencount.courseID
    group by course.crs_uniqueID,  courseevencount.studentID");

$studentList ->execute();
$row = $studentList->fetchall(PDO::FETCH_ASSOC);

fputcsv($data, $csv_fields);



foreach ($row as $values) {
    fputcsv($data, $values);
}

?>