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
    
   echo $crsID;

}


?>
