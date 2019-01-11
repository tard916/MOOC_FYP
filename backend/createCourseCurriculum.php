<?php
       include('./classes/DB.php');
       include('./classes/Login.php');

    if (isset($_POST['createCourse'])) {
        $courseID = $_POST['courseID'];
        $path = '/courseContent';
        $fileTitles = '';
        $filenames = '';
        $fileTypes = '';
        $courseDuration = DB::query('SELECT duration FROM course WHERE crs_uniqueID =:courseID', array(':courseID'=>$courseID))[0]['duration'];
        $coursePath = DB::query('SELECT course_path_fol FROM course WHERE crs_uniqueID =:courseID', array(':courseID'=>$courseID))[0]['course_path_fol'];
        $coursePathContent = '.'.$coursePath.'/courseContent';
        $fileTMP = '';

        for($i = 1; $i<=$courseDuration; $i++){
            $fileTitle = array();
            $fileTitle = $_POST['title'.$i];
            $filename  = array();
            $filename = $_FILES['fileName'.$i]['name'];
            $filenameTMP  = array();
            $filenameTMP = $_FILES['fileName'.$i]['tmp_name'];
            $fileType = array();
            $fileType = $_POST['fileType'.$i];
            $weekID = $_POST['weekID'.$i];

            $weekArray =  array($weekID, $fileTitle, $filename, $filenameTMP, $fileType,$courseID);
            $resourceArray = array();
            $resourceNoByWeek = count($fileTitle);
            for ($a=0; $a <$resourceNoByWeek ; $a++) { 
                array_push($resourceArray, $weekID,$fileTitle[$a], $filename[$a], $filenameTMP[$a], $fileType[$a],$courseID);
                $fileTitles = $fileTitle[$a];
                $filenames = $filename[$a];
                $fileTypes = $fileType[$a];
                $fileTMP = $filenameTMP[$a];
                /*DB::query('INSERT INTO course_cirriculum VALUES (\'\', :week_number, :title, :file_name, :type, :path, :course_id)', 
                array(':week_number'=>$weekID, ':title'=>$fileTitles, ':file_name'=>$filenames, ':type'=>$fileTypes, ':path'=>$path,
                ':course_id'=>$courseID));*/

                if (!file_exists($coursePathContent)) {                
                    if(mkdir($coursePathContent, 0777, true)){
                        if (move_uploaded_file($fileTMP,$coursePathContent.'/'.$filenames)) {
                            DB::query('INSERT INTO course_cirriculum VALUES (\'\', :week_number, :title, :file_name, :type, :path, :course_id)', 
                            array(':week_number'=>$weekID, ':title'=>$fileTitles, ':file_name'=>$filenames, ':type'=>$fileTypes, ':path'=>$path,
                            ':course_id'=>$courseID));echo '<script language = "javascript">';
                            echo 'alert("Record Added successfully")';
                            echo '</script>';
                            echo  "<script> window.location.assign('../instructor.php'); </script>";
                        }
                    }                    
                    
                }else {
                    if (move_uploaded_file($fileTMP,$coursePathContent.'/'.$filenames)){
                        DB::query('INSERT INTO course_cirriculum VALUES (\'\', :week_number, :title, :file_name, :type, :path, :course_id)', 
                        array(':week_number'=>$weekID, ':title'=>$fileTitles, ':file_name'=>$filenames, ':type'=>$fileTypes, ':path'=>$path,
                        ':course_id'=>$courseID));echo '<script language = "javascript">';
                        echo 'alert("Record Added successfully")';
                        echo '</script>';
                        echo  "<script> window.location.assign('../instructor.php'); </script>";
                    }  
                }
            
                //echo count($resourceArray);
                //print_r($resourceArray);
                //echo '<script language = "javascript">';
                //echo 'alert("Record Added successfully")';
                //echo '</script>';
                //echo  "<script> window.location.assign('../instructor.php'); </script>";

            }
        }
    }
?>