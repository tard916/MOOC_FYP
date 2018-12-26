<?php
       include('./classes/DB.php');
       include('./classes/Login.php');

    if (isset($_POST['createCourse'])) {

        //$course_image = $_FILES['file']['name'];
        //echo $course_image;

        if (Login::isLoggedIn()) {
            $instructorID = Login::isLoggedIn();
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
            $course_image = $_FILES['file']['name'];
            
            if (!file_exists($course_path_folder_to_create)) {
                
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
            }
        }
    }
?>