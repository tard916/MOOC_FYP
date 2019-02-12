<?php
    $courseID = $_GET['courseID'];
    include('./classes/DB.php');
    include('./classes/Login.php');
    date_default_timezone_set("Asia/Kuala_Lumpur");

    if (isset($_POST['submitQuestionFrom'])) {
        $question_uniquID = uniqid("QIZ_", true);
        $content = $_POST['qtsContent'];
        $today_date=date("Y-m-d H:i:s");
    }
?>