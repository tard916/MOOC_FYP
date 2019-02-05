<?php
  include('./backend/classes/DB.php');
  include('./backend/classes/Login.php');
   $courseID = $_GET['crs_UniqueID'];
  if (Login::isLoggedIn()) {
    //echo 'Logged In!';
    //echo Login::isLoggedIn();
    $outputkey  = Login::isLoggedIn();
    echo "<script>console.log( 'Debug Objects: " . $outputkey . "' );</script>";
    list($user, $key) = explode("_", $outputkey);
    echo "<script>console.log( 'user_type: " . $user . "' );</script>";


    if ($user == 'INS') {
      $user_Name = DB::query('SELECT instructor_name FROM instructor WHERE ins_uniquID=:outputkey', array(':outputkey'=>$outputkey))[0]['instructor_name'];

      include('./instructorHeader.php');
      echo "<script>console.log( 'Debug Objects: " . $user_Name . "' );</script>";
    }
    if ($user == 'STD') {
      $user_Name = DB::query('SELECT student_name FROM student WHERE std_uniquID=:outputkey', array(':outputkey'=>$outputkey))[0]['student_name'];
      include('./userHeader.php');
      echo "<script>console.log( 'Debug Objects: " . $user_Name . "' );</script>";
    }
  }else {
      include('mainHeader.php');
  }

  $courseResult = DB::query('SELECT * FROM course WHERE crs_uniqueID =:courseID', array(':courseID'=>$courseID));
  

?>

<main role="main">

    <!--This part is for the Carousel slide -->
    <div class="course-jumbotron jumbotron m-0 p-sm-5">
    <?php 
        foreach ($courseResult as $value) {
            $instructorId = $value['instructor_id'];
            $intructorName = DB::query('SELECT * FROM instructor WHERE  ins_uniquID =:ins_uniquID', array(':ins_uniquID'=>$instructorId))[0]['instructor_name'];
    ?>
        <h1 class="display-4 text-center mb-3"><?php echo $value['course_name'];?></h1>
        <p class="lead text-center px-sm-3 px-md-5">
            <span class="pull-left"><i class="fa fa-star-o" aria-hidden="true"></i> 4.50/5.00 <small>(100)</small></span>
            <span class=""><i class="fa fa-user-o" aria-hidden="true"></i> <?php echo $intructorName;?></span>
            <span class="pull-right"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $value['duration'];?> Weeks</span>

        </p>
   
    </div>
    <!--This part is for the Carousel slide -->
    <!-- List group -->
    <div class="list-group text-center" id="course-sections" role="tablist">
      <a class="list-group-item list-group-item-action active" data-toggle="list" href="#overview" role="tab">Overview</a>
      <a class="list-group-item list-group-item-action" data-toggle="list" href="#syllabus" role="tab">Syllabus</a>
      <a class="list-group-item list-group-item-action" data-toggle="list" href="#review" role="tab">Review</a>
      <a class="list-group-item list-group-item-action" data-toggle="list" href="#qa" role="tab">Q&A</a>
    </div>

    <!-- Tab panes -->
    <div class="container">
        <div class="tab-content">
            <div class="tab-pane fade py-4 show active" id="overview" role="tabpanel">
                <div class="course-section">
                    <h4>Description</h4>
                    <hr>
                    <p><?php echo $value['descriptions'];?></p>
                </div>
                <div class="course-section">
                    <h4>Learning Outcome</h4>
                    <hr>
                    <p><?php echo $value['learning_outcomes'];?></p>
                </div>
                <div class="course-section">
                    <h4>Requirements</h4>
                    <hr>
                    <p><?php echo $value['pre_requirments'];?></p>
                </div>
            </div>
    <?php
        }
    ?>
            <div class="tab-pane fade py-4" id="syllabus" role="tabpanel">
                <div class="course-curriculum-section">

                <?php
                    $courseDuration = DB::query('SELECT duration FROM course WHERE crs_uniqueID =:courseID', array(':courseID'=>$courseID))[0]['duration'];
                    for($i = 1; $i<=$courseDuration; $i++){
                ?>

                    <h5 class="">Week <?php echo $i;?></h5>
                    <ul class="list-unstyled mb-5">
                    <?php
                        $crriculum = DB::query('SELECT * FROM course_cirriculum WHERE week_number = :id AND course_id= :courseID', array(':id'=>$i, ':courseID'=>$courseID));
                        foreach ($crriculum as $value) {
                    ?>
                   
                    <li class=""><a class="curriculum-link text-dark" href="curriculumPlayer.php?crs_UniqueID=<?php echo $courseID;?>"><i class="fa fa-file-video-o" aria-hidden="true"></i> <?php echo $value['title'];?></a></li>
                        <?php
                            }
                        ?>
                        <!--<li class=""><a class="curriculum-link text-dark" href="#"><i class="fa fa-file-video-o" aria-hidden="true"></i> Model View Controler (MVC) with PHP part 1</a></li>
                        <li class=""><a class="curriculum-link text-dark" href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i> Intro to MVC</a></li>-->
                    </ul>                   
                <?php
                    }
                ?>
                </div>
            </div>
            <div class="tab-pane fade py-4" id="review" role="tabpanel">
                <h2 class="text-center">Rating: 4.50/5.00  <small class="text-muted">(100)</small></h2>
                <hr>
            </div>
            <div class="tab-pane fade py-4" id="qa" role="tabpanel">
              Irure enim occaecat labore sit qui aliquip reprehenderit amet velit. Deserunt ullamco ex elit nostrud ut dolore nisi officia magna sit occaecat laboris sunt dolor. Nisi eu minim cillum occaecat aute est cupidatat aliqua labore aute occaecat ea aliquip sunt amet. Aute mollit dolor ut exercitation irure commodo non amet consectetur quis amet culpa. Quis ullamco nisi amet qui aute irure eu. Magna labore dolor quis ex labore id nostrud deserunt dolor eiusmod eu pariatur culpa mollit in irure.
            </div>
        </div>
    </div>


</main>

  <footer class="footer py-4 bg-dark text-light">
      <div class="container">
      <span class="cprTxt"> &copy;2018 HELP-MOOC</span>
      </div>
  </footer>
  <!--This part is for the footer section -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug
    <script src="js/ie10-viewport-bug-workaround.js"></script> -->
</body>
</html>
