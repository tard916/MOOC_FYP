<?php
  include('./backend/classes/DB.php');
  include('./backend/classes/Login.php');
  if (Login::isLoggedIn()) {
    $outputkey  = Login::isLoggedIn();
    list($user, $key) = explode("_", $outputkey);

    if ($user == 'STD') {
      $user_Name = DB::query('SELECT student_name FROM student WHERE std_uniquID=:outputkey', array(':outputkey'=>$outputkey))[0]['student_name'];
      include('userHeader.php');
      $user_ID = DB::query('SELECT std_uniquID FROM student WHERE std_uniquID=:outputkey', array(':outputkey'=>$outputkey))[0]['std_uniquID'];  
    }
  }else {
      include('../mainHeader.php');
  }

?>
<main role="main" class="container">
    <h1 class="mt-4">My Courses</h1>
    <hr>

     <div class="row">
        <?php
         $myCourses = DB::query('SELECT * FROM enrollment WHERE student_id=:outputkey',array(':outputkey'=>$outputkey));
         foreach ($myCourses as $courseValue) {
             $r_Course = $courseValue['course_id'];
            $select_course = DB::query('SELECT * FROM course WHERE crs_uniqueID=:r_Course', array(':r_Course'=>$r_Course));
            foreach ($select_course as $value) {
                $imagePath = $value['course_path_fol'].'/'.$value['course_image'];
                //echo $imagePath;
        ?>
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="<?php echo $imagePath;?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title mb-4"><?php echo $value['course_name'];?></h5>
                    <?php
                        $ins_uniquID = $value['instructor_id'];
                        $retrieve_the_instructor = DB::query('SELECT instructor_name FROM instructor where ins_uniquID= :ins_uniquID',array(':ins_uniquID'=>$ins_uniquID))[0]['instructor_name'];
                    ?>
                    <h6 class="card-subtitle mb-4 text-muted"><?php echo $retrieve_the_instructor;?></h6>
                    <p>Rating: 0.0 <small class="text-muted">(0)</small><small class="text-muted pull-right mt-1"><?php echo $value['duration'];?> weeks</small></p>
                    <form id="loginEvent">
                        <?php if(isset($user_ID)) {?>
                            <input type="hidden" name="std_ID" id="userIDValue" value="<?php echo $user_ID;?>">
                            <input type="hidden" name="crs_ID" id="courseIDValue" value="<?php echo $value['crs_uniqueID'];?>">
                        <?php }?>
                        <button class="btn btn-outline-success btn-block" type="submit" id="viewCourse" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">View &raquo;</button>
                    </form>
                    
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
</main>

<!--This part is for the footer section -->
<footer class="text-muted footer">
      <div class="container">
      <p class="float-right ">
          <a class="cprTxt" href="#">Back to top</a>
      </p>
      <p class="cprTxt"> &copy;2018 HELP-MOOC</p>

      </div>
  </footer>
  <!--This part is for the footer section -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/MOOC/MOOC_FYP/js/bootstrap.min.js"></script>
    <script>
        (function() {
        $('#viewCourse').click(function() {
            var http = new XMLHttpRequest();
            var url = "./backend/ckle.php";
            var userIDValue = $('#userIDValue')[0].value;
            var courseIDValue = $('#courseIDValue')[0].value;
            var params = "userID="+userIDValue+"&courseID="+courseIDValue;
            /*http.open("POST", url, true);

            //Send the proper header information along with the request
            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            http.onreadystatechange = function() {//Call a function when the state changes.
                console.log(params);
            }
            http.send(params);*/
            window.location.href = "./backend/ckle.php?" + params;
        });
      })();
    </script>
</body>
</html>
