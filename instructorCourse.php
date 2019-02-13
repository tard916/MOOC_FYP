<?php
  include('./backend/classes/DB.php');
  include('./backend/classes/Login.php');
   $courseID = $_GET['cid'];
  // $courseID = 'CRS5c4eb123cbbbe9.91086078';
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
    /*if ($user == 'STD') {
      $user_Name = DB::query('SELECT student_name FROM student WHERE std_uniquID=:outputkey', array(':outputkey'=>$outputkey))[0]['student_name'];
      include('./userHeader.php');
      echo "<script>console.log( 'Debug Objects: " . $user_Name . "' );</script>";
    }*/
  }else {
      include('mainHeader.php');
  }

  $courseResult = DB::query('SELECT * FROM course WHERE crs_uniqueID =:courseID', array(':courseID'=>$courseID));


?>

<main role="main" class="course-page">

    <!--This part is for the Carousel slide -->
    <div class="course-jumbotron jumbotron m-0 text-light">
        <div class="container">
            <?php
                foreach ($courseResult as $value) {
                    $instructorId = $value['instructor_id'];
                    $intructorName = DB::query('SELECT * FROM instructor WHERE  ins_uniquID =:ins_uniquID', array(':ins_uniquID'=>$instructorId))[0]['instructor_name'];
            ?>
            <!--<h1 class="display-4 text-center mb-3"></h1>
            <p class="lead text-center px-sm-3 px-md-5">
                <span class="pull-left"><i class="fa fa-star-o" aria-hidden="true"></i> 4.50/5.00 <small>(100)</small></span>
                <span class=""><i class="fa fa-user-o" aria-hidden="true"></i> <?php echo $intructorName;?></span>
                <span class="pull-right"><i class="fa fa-clock-o" aria-hidden="true"></i> </span>

            </p>-->

            <h1 class="display-4 text-center mb-3"><?php echo $value['course_name'];?></h1>
            <div class="row lead text-center">
                <div class="col-md-4 ">
                    <input class="course-rating rating-loading" value="3.75">
                    <small>(100)</small>
                </div>
                <div class="col-md-4"><i class="fa fa-user-o" aria-hidden="true"></i> <?php echo $intructorName;?></div>
                <div class="col-md-4"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $value['duration'];?> Weeks</div>

            </div>
        </div>
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

                    <a class="btn btn btn-outline-primary btn-block mb-2" href="newCourseCurriculum.php?cid=<?php echo $courseID;?>" role="button">Add Curriculum</a>
                    <p class="text-muted text-center mb-2">Or</p>
                    <a class="btn btn btn-outline-primary btn-block mb-5" href="manageCurriculum.php?cid=<?php echo $courseID;?>" role="button">Manage Curriculum</a>

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

                <div class="review-row row">
                    <div class="col-md-3">
                        <h5>Mehrab Kamrani</h5>
                        <input class="rating-loading individual-rating" value="3.5">
                        <p class="text-muted mt-1">5 days ago</p>
                    </div>
                    <div class="col-md-9">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vehicula, tortor vitae tristique dignissim, augue tellus hendrerit quam, vel laoreet leo ligula vitae diam. Sed sagittis augue ultrices molestie scelerisque. Integer massa justo, ornare at gravida sit amet, bibendum sagittis erat. Phasellus id molestie massa. Aenean ornare finibus lorem, quis dignissim purus interdum a. Proin non urna nisl. Cras condimentum velit massa, nec sollicitudin risus scelerisque sed. Mauris condimentum arcu ac gravida pharetra. Nullam vel tellus sapien.</p>
                    </div>
                    <hr>
                </div>

                <div class="review-row row">
                    <div class="col-md-3">
                        <h5>Mehrab Kamrani</h5>
                        <input class="rating-loading individual-rating" value="3.5">
                        <p class="text-muted mt-1">5 days ago</p>
                    </div>
                    <div class="col-md-9">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vehicula, tortor vitae tristique dignissim, augue tellus hendrerit quam, vel laoreet leo ligula vitae diam. Sed sagittis augue ultrices molestie scelerisque. Integer massa justo, ornare at gravida sit amet, bibendum sagittis erat. Phasellus id molestie massa. Aenean ornare finibus lorem, quis dignissim purus interdum a. Proin non urna nisl. Cras condimentum velit massa, nec sollicitudin risus scelerisque sed. Mauris condimentum arcu ac gravida pharetra. Nullam vel tellus sapien.</p>
                    </div>
                    <hr>
                </div>

                <div class="review-row row">
                    <div class="col-md-3">
                        <h5>Mehrab Kamrani</h5>
                        <input class="rating-loading individual-rating" value="3.5">
                        <p class="text-muted mt-1">5 days ago</p>
                    </div>
                    <div class="col-md-9">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vehicula, tortor vitae tristique dignissim, augue tellus hendrerit quam, vel laoreet leo ligula vitae diam. Sed sagittis augue ultrices molestie scelerisque. Integer massa justo, ornare at gravida sit amet, bibendum sagittis erat. Phasellus id molestie massa. Aenean ornare finibus lorem, quis dignissim purus interdum a. Proin non urna nisl. Cras condimentum velit massa, nec sollicitudin risus scelerisque sed. Mauris condimentum arcu ac gravida pharetra. Nullam vel tellus sapien.</p>
                    </div>
                    <hr>
                </div>

            </div>
            <div class="tab-pane fade py-4" id="qa" role="tabpanel">

                <a class="question-link text-dark" href="question.php">
                    <div class="question-row my-4 p-4">
                        <h6>Mehrab Kamrani</h6>
                        <p class="text-muted">5 days ago</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vehicula, tortor vitae tristique dignissim, augue tellus hendrerit quam, vel laoreet leo ligula vitae diam. Sed sagittis augue ultrices molestie scelerisque. Integer massa justo, ornare at gravida sit amet, bibendum sagittis erat. Phasellus id molestie massa. Aenean ornare finibus lorem, quis dignissim purus interdum a. Proin non urna nisl. Cras condimentum velit massa, nec sollicitudin risus scelerisque sed. Mauris condimentum arcu ac gravida pharetra. Nullam vel tellus sapien.</p>
                        <p class="text-muted m-0"><i class="fa fa-reply" aria-hidden="true"></i> 2 Responses</p>
                    </div>
                </a>
                <a class="question-link text-dark" href="question.php">
                    <div class="question-row my-4 p-4">
                        <h6>Mehrab Kamrani</h6>
                        <p class="text-muted">5 days ago</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vehicula, tortor vitae tristique dignissim, augue tellus hendrerit quam, vel laoreet leo ligula vitae diam. Sed sagittis augue ultrices molestie scelerisque. Integer massa justo, ornare at gravida sit amet, bibendum sagittis erat. Phasellus id molestie massa. Aenean ornare finibus lorem, quis dignissim purus interdum a. Proin non urna nisl. Cras condimentum velit massa, nec sollicitudin risus scelerisque sed. Mauris condimentum arcu ac gravida pharetra. Nullam vel tellus sapien.</p>
                        <p class="text-muted m-0"><i class="fa fa-reply" aria-hidden="true"></i> 2 Responses</p>
                    </div>
                </a>
                <a class="question-link text-dark" href="question.php">
                    <div class="question-row my-4 p-4">
                        <h6>Mehrab Kamrani</h6>
                        <p class="text-muted">5 days ago</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vehicula, tortor vitae tristique dignissim, augue tellus hendrerit quam, vel laoreet leo ligula vitae diam. Sed sagittis augue ultrices molestie scelerisque. Integer massa justo, ornare at gravida sit amet, bibendum sagittis erat. Phasellus id molestie massa. Aenean ornare finibus lorem, quis dignissim purus interdum a. Proin non urna nisl. Cras condimentum velit massa, nec sollicitudin risus scelerisque sed. Mauris condimentum arcu ac gravida pharetra. Nullam vel tellus sapien.</p>
                        <p class="text-muted m-0"><i class="fa fa-reply" aria-hidden="true"></i> 2 Responses</p>
                    </div>
                </a>

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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/star-rating.min.js"></script>
    <script src="js/theme.min.js"></script>
    <script>
        $(document).on('ready', function () {
            $('.course-rating').rating({
                theme: 'krajee-fa',
                displayOnly: true,
                defaultCaption: '{rating}',
                size: 'sm',
            });
            $('.individual-rating').rating({
                theme: 'krajee-fa',
                displayOnly: true,
                showCaption: false,
                size: 'sm',
            });
        });
    </script>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug
    <script src="js/ie10-viewport-bug-workaround.js"></script> -->
</body>
</html>
