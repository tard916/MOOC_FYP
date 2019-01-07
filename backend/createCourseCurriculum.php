<?php
       include('./classes/DB.php');
       include('./classes/Login.php');

    if (isset($_POST['createCourse'])) {

        //$course_image = $_FILES['file']['name'];
        //echo $course_image;       
        /*$instructorID = Login::isLoggedIn();
        //echo $instructorID;
        $crs_uniqueID = uniqid("CRS", true);
        $title = $_POST['title'];
        $course_name = rtrim($title);
        $category_ID = $_POST['category'];
        $starting_date = $_POST['date'];
        $duration = $_POST['duration'];
        $pre_requirments = $_POST['Pre-requirment'];
        $learning_outcomes = $_POST['Learning_Outcome'];
        $description = $_POST['Description'];
        $course_path_folder = "./src/courses/".$course_name;
        $course_path_folder_to_create = "../src/courses/{$course_name}";
        $course_image = $_FILES['file']['name'];*/
        
        /*if (!file_exists($course_path_folder_to_create)) {
            
            if(mkdir($course_path_folder_to_create, 0777, true)){
                if (move_uploaded_file($_FILES['file']['tmp_name'],$course_path_folder_to_create.'/'.$course_image)) {
                    DB::query('INSERT INTO course VALUES (\'\', :crs_uniqueID, :course_name, :category_id, :starting_date, :duration, :pre_requirments, :learning_outcomes, :descriptions, :instructor_id, :course_path_fol, :course_image)',
                    array(':crs_uniqueID'=>$crs_uniqueID, ':course_name'=>$course_name, ':category_id'=> $category_ID, ':starting_date'=>$starting_date, ':duration'=>$duration, ':pre_requirments'=>$pre_requirments,
                    ':learning_outcomes'=>$learning_outcomes, ':descriptions'=>$description, ':instructor_id'=>$instructorID, ':course_path_fol'=>$course_path_folder, ':course_image'=>$course_image));
                    echo '<script language = "javascript">';
                    echo 'alert("Record Added successfully")';
                    echo '</script>';
                    echo  "<script> window.location.assign('../instructor.php'); </script>";
                }
            }                    
            
        }else {
            if (move_uploaded_file($_FILES['file']['tmp_name'],$course_path_folder_to_create.'/'.$course_image)){
                DB::query('INSERT INTO course VALUES (\'\', :crs_uniqueID, :course_name, :category_id, :starting_date, :duration, :pre_requirments, :learning_outcomes, :descriptions, :instructor_id, :course_path_fol, :course_image)',
                array(':crs_uniqueID'=>$crs_uniqueID, ':course_name'=>$course_name, ':category_id'=> $category_ID, ':starting_date'=>$starting_date, ':duration'=>$duration, ':pre_requirments'=>$pre_requirments,
                ':learning_outcomes'=>$learning_outcomes, ':descriptions'=>$description, ':instructor_id'=>$instructorID, ':course_path_fol'=>$course_path_folder, ':course_image'=>$course_image));
                echo '<script language = "javascript">';
                echo 'alert("Record Added successfully")';
                echo '</script>';
                echo  "<script> window.location.assign('../instructor.php'); </script>";
            }                          
        }*/

        $courseID = $_POST['courseID'];
        $path = '/courseContent';
        $fileTitles = '';
        $filenames = '';
        $fileTypes = '';
        $courseDuration = DB::query('SELECT duration FROM course WHERE crs_uniqueID =:courseID', array(':courseID'=>$courseID))[0]['duration'];
        
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
               DB::query('INSERT INTO course_cirriculum VALUES (\'\', :week_number, :title, :file_name, :type, :path, :course_id)', 
            array(':week_number'=>$weekID, ':title'=>$fileTitles, ':file_name'=>$filenames, ':type'=>$fileTypes, ':path'=>$path, ':course_id'=>$courseID));
            }
            
            //echo count($resourceArray);
            //print_r($resourceArray);
            echo '<script language = "javascript">';
            echo 'alert("Record Added successfully")';
            echo '</script>';
            echo  "<script> window.location.assign('../instructor.php'); </script>";

        }
       
        
            

    }
?>