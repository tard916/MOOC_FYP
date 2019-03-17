<?php
include('./classes/DB.php');
include('./classes/Login.php');
date_default_timezone_set("Asia/Kuala_Lumpur");

echo '<script>
console.log($_POST["userID"]);
</script>';
if(isset($_GET['userID'])){
    $today_date=date("Y-m-d H:i:s");
    $stdID = $_GET['userID'];

    echo $stdID;

    if (!DB::query(DB::query('SELECT std_uniqueID FROM student_logs WHERE std_uniqueID=:id', array(':id'=>$stdID)))) {
       DB::query('INSERT INTO student_logs VALUES (\'\', :last_login, :std_uniqueID )',
        array(':last_login'=>$today_date,':std_uniqueID'=>$stdID));
    }else {
        DB::query('UPDATE student_logs SET last_login= :last_login WHERE std_uniqueID= :std_uniqueID)',
        array(':last_login'=>$today_date,':std_uniqueID'=>$stdID));
    }

}


?>
