<?php
       ini_set('display_errors', '1');
       include('./classes/DB.php');
       include('./classes/Login.php');
       
       

    if (isset($_POST['createCourse'])) {

        $courseID = $_POST['courseID'];
        $weekID= array();
        $weekID = $_POST['weekID'];
        $fileNamesArray = array();
        $fileNamesArrayTMP = array();
        $fileType = array();
        $fileNamesArray = $_FILES['fileName']['name'];
        $fileNamesArrayTMP = $_FILES['fileName']['tmp_name'];
        $fileType = $_POST['fileType'];
        
        echo $courseID;
        echo "<pre>";
        print_r($fileNamesArray);
        print_r($fileType);
        print_r($weekID);
        print_r($fileNamesArrayTMP);
        echo "</pre>";
        
       function getFileName($courseID,$fileName,$fileNamesArrayTMP,$week,$type)
       {
            $course_path_folder = DB::query('SELECT course_path_fol FROM course WHERE crs_uniqueID =:courseID', array(':courseID'=>$courseID))[0]['course_path_fol'];
            echo $course_path_folder."<br>";
            $course_path_folder_to_create = ".".$course_path_folder."/courseContent";
            echo $course_path_folder_to_create."<br>";
            $path = $course_path_folder."/courseContent".$fileName;
            echo $path."<br>";
            echo $fileName."<br>";
            if (file_exists($course_path_folder_to_create)) {                
                if(mkdir($course_path_folder_to_create, 0777, true)){
                    $str= '';
                    for ($i=0; $i<=count($fileNamesArrayTMP); $i++) {
                        $str =  $fileNamesArrayTMP[$i];
                        if (move_uploaded_file($str,$course_path_folder_to_create.'/'.$fileName)) {
                            DB::query('INSERT INTO course_cirriculum VALUES (\'\', :week_number, :file_name, :type, :path, :course_id)',
                            array(':week_number'=>$week, ':file_name'=>$fileName, ':type'=> $type, ':path'=>$path, ':course_id'=>$courseID));
                            echo '<script language = "javascript">';
                            echo 'alert("Record Added successfully")';
                            echo '</script>';
                            echo  "<script> window.location.assign('../instructor.php'); </script>";
                        }
                    }
                    
                }                    
                
            }else {
                $str= '';
                    for ($i=0; $i<=count($fileNamesArrayTMP); $i++) {
                        $str =  $fileNamesArrayTMP[$i];
                        if (move_uploaded_file($str,$course_path_folder_to_create.'/'.$fileName)) {
                        DB::query('INSERT INTO course_cirriculum VALUES (\'\', :week_number, :file_name, :type, :path, :course_id)',
                        array(':week_number'=>$week, ':file_name'=>$fileName, ':type'=> $type, ':path'=>$path, ':course_id'=>$courseID));
                        echo '<script language = "javascript">';
                        echo 'alert("Record Added successfully")';
                        echo '</script>';
                        echo  "<script> window.location.assign('../instructor.php'); </script>";
                    }
                }                        
            }
       }
       $fileName = '';
       for ($i=0;$i<=count($fileNamesArray);$i++) {
            $fileName =  $fileNamesArray[$i];
            $week = '';
            for ($j=0;$j<count($weekID);$j++) {
                $week = $weekID[$j];
            }
            $type = '';
            for ($k=0; $k<count($fileType); $k++) {
                $type = $fileType[$k];
            }
            getFileName($courseID,$fileName,$fileNamesArrayTMP,(int)$week,$type);
        }
    }
?>