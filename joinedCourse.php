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

  $countOfRatings = DB::returnRowCount('SELECT id FROM rating WHERE course_id= :courseID', array(':courseID'=>$courseID));

  $valOfRatings = DB::query('SELECT rating_value FROM rating WHERE course_id= :courseID', array(':courseID'=>$courseID));
  $sumOfRatings = 0;
  foreach ($valOfRatings as  $valuert) {
    $sumOfRatings =  $sumOfRatings + (float)$valuert['rating_value'];
  }

  if ($countOfRatings >= 0 && $sumOfRatings >= 0) {
      $avRating = $sumOfRatings / $countOfRatings;
  }


?>

<main role="main" class="course-page" id="<?php echo $courseID ?>">

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
                    <input class="course-rating rating-loading" value="<?php echo $avRating; ?>">
                    <small>(<?php echo $countOfRatings; ?>)</small>
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
                        $selectQuiz = DB::query('SELECT * FROM quiz WHERE week_ID= :id AND course_id= :courseID', array(':id'=>$i, ':courseID'=>$courseID));
                        foreach ($selectQuiz as $valueQyiz) {
                    ?>
                    <li class=""><a class="curriculum-link text-dark" href="takeQuiz.php?crs_UniqueID=<?php echo $courseID;?>&quizID=<?php echo $valueQyiz['quiz_UniqueID'];?>"><i class="fa fa-question-circle" aria-hidden="true"></i> <?php echo "Week".$valueQyiz['week_ID']." Quiz"?></a></li>
                        <?php }?>
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

                <!-- Button trigger review modal  -->
                <button id="writeReview" class="btn btn btn-outline-primary btn-block mb-5" type="button" name="button" data-toggle="modal" data-target="#reviewModal">Write Review</button>

                <!-- Review modal -->
                <form class="" action="backend/submitRating.php?courseID=<?php echo $courseID;?>" method="post">
                    <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="reviewModalLongTitle">Submit Review</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center">
                              <input name="submitRating" type="text" class="rating-loading submit-rating">
                              <div class="form-group">
                                <textarea required name="ratingArea" class="form-control noresize" id="review-input" rows="6" placeholder=
                                "Describe your experience, what you got out of the course, and other helpful highlights.
                                What did the instructor do well, and what could use some improvement?"></textarea>
                              </div>
                              <p class="text-danger review-validation d-none">Please fill up above fields</p>
                              <button id="submitReview" type="submit" name="submitRatingForm" class="btn btn-outline-success btn-block submit-review">Submit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </form>

                <?php
                    $ratings = DB::query('SELECT * FROM rating WHERE course_id= :courseID ORDER BY id DESC', array(':courseID'=>$courseID));
                    foreach ($ratings as  $value) {

                    $studentId = $value['student_ID'];
                    $studentsID = DB::query('SELECT * FROM student WHERE  std_uniquID =:std_uniquID', array(':std_uniquID'=>$studentId));
                ?>
                <div class="review-row row">
                    <div class="col-md-3">
                        <?php
                            foreach ($studentsID as $valuestd) {

                        ?>
                            <h5><?php echo $valuestd['student_name'];?></h5>
                        <?php
                            }
                        ?>
                            <input class="rating-loading individual-rating" value="<?php echo $value['rating_value'];?>">
                            <p class="text-muted mt-1"><?php echo $value['date'];?></p>
                    </div>
                    <div class="col-md-9">
                        <p><?php echo $value['rating_Content'];?></p>
                    </div>
                    <hr>
                </div>

                <?php
                    }
                ?>
            </div>
            <div class="tab-pane fade py-4" id="qa" role="tabpanel">

                <button id="askQuestion" class="btn btn btn-outline-primary btn-block mb-5" type="button" name="button" data-toggle="modal" data-target="#questionModal">Ask Question</button>
                <!-- question modal -->
                <form class="" action="backend/submitQuestion.php?courseID=<?php echo $courseID;?>" method="post">
                    <div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="questionModalTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="questionModalLongTitle">Ask Question</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center">
                              <div class="form-group">
                                <textarea required class="form-control noresize" name="qtsContent" id="question-input" rows="6" placeholder="Describe what you're trying to achieve and where you're getting stuck"></textarea>
                              </div>
                              <button id="submitQuestion" type="submit" name="submitQuestionFrom" class="btn btn-outline-success btn-block submit-question">Submit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </form>

                <?php
                    $questions = DB::query('SELECT * FROM question WHERE crs_UniqueID= :courseID ORDER BY id DESC', array(':courseID'=>$courseID));
                    foreach ($questions as  $valuesQT) {

                    $studentId = $valuesQT['student_ID'];
                    $studentsID = DB::query('SELECT * FROM student WHERE  std_uniquID =:std_uniquID', array(':std_uniquID'=>$studentId));
                ?>
                <a class="question-link text-dark" href="question.php?qts_ID=<?php echo $valuesQT['qst_UniqueID'];?>&crs_UniqueID=<?php echo $courseID;?>">
                    <div class="question-row my-4 p-4">
                    <?php
                        foreach ($studentsID as $valuestd) {

                    ?>
                        <h6><?php echo $valuestd['student_name'];?></h6>
                    <?php
                         }
                    ?>
                        <p class="text-muted"><?php echo $valuesQT['create_date'];?></p>
                        <p><?php echo $valuesQT['question_Content'];?></p>
                        <p class="text-muted m-0"><i class="fa fa-reply" aria-hidden="true"></i> <?php echo $valuesQT['nun_Responses'];?> Responses</p>
                    </div>
                </a>
                <?php
                    }
                ?>
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
            var courseID = $("main").attr('id');
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
            $('.submit-rating').rating({
                theme: 'krajee-fa',
                size: 'xl',
                starCaptions: {
                    0.5: 'Terrible',
                    1: 'Aweful',
                    1.5: 'Bad',
                    2: 'Poor',
                    2.5: 'Average',
                    3: 'Fair',
                    3.5: 'Good',
                    4: 'Great',
                    4.5: 'Excellent',
                    5: 'Phenomenal'
                }
            });
            function validateReviewSubmit() {
                return !(!$.trim($("#review-input").val())) && !(!$('.submit-rating').val())
            }
            $(".submit-review").click(function(e){
                if (!validateReviewSubmit()) {
                    $(".review-validation").removeClass("d-none");
                    e.preventDefault();
                    e.stopPropagation();
                }
            });
            $("#course-sections .list-group-item").click(function(){
              $.post("./backend/nEventClicked.php",
              {
                cID: courseID,
                nEvent: 1
              });
            });
            $(".curriculum-link").click(function(){
              $.post("./backend/nEventClicked.php",
              {
                cID: courseID,
                nEvent: 1
              });
            });
            $("#writeReview").click(function(){
              $.post("./backend/nEventClicked.php",
              {
                cID: courseID,
                nEvent: 1
              });
            });
            $("#submitReview").click(function(){
              $.post("./backend/nEventClicked.php",
              {
                cID: courseID,
                nEvent: 1
              });
            });
            $("#askQuestion").click(function(){
              $.post("./backend/nEventClicked.php",
              {
                cID: courseID,
                nEvent: 1
              });
            });
            $("#submitQuestion").click(function(){
              $.post("./backend/nEventClicked.php",
              {
                cID: courseID,
                nEvent: 1
              });
            });
            $(".question-link").click(function(){
              $.post("./backend/nEventClicked.php",
              {
                cID: courseID,
                nEvent: 1
              });
            });


        });
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug
    <script src="js/ie10-viewport-bug-workaround.js"></script> -->
</body>
</html>
