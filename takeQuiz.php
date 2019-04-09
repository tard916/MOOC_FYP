<?php
  include('./backend/classes/DB.php');
  include('./backend/classes/Login.php');
   $courseID = $_GET['crs_UniqueID'];
   $quizid = $_GET['quizID'];
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

  $numberOfquestion = DB::returnRowCount('SELECT id FROM quizquestion WHERE quiz_ID = :quizid', array(':quizid'=>$quizid));
  
?>

<main role="main" class="course-page">
    <div class="curriculum-quiz ">
        <form class="" action="backend/quizAnswer.php?crs_UniqueID=<?php echo $courseID;?>" method="post">
             <?php 
                    $quizQuestion = DB::query('SELECT *FROM quizquestion WHERE quiz_ID = :quizid', array(':quizid'=>$quizid));
                    foreach ($quizQuestion as  $value) {
                ?>
            <div class="card mb-5">
                <div class="card-header">
                    Question
                </div>
                    <div class="card-body">
                        <h6 class="mb-4"><?php echo $value['question_Title'];?></h6>
                        <input type="hidden" name="qqID" value="<?php echo $value['qq_UniqueID'];?>">
                        <input type="hidden" name="crtAnswer" value="<?php echo $value['correct_Option'];?>">
                        <div class="form-check my-3">
                            <input class="form-check-input" type="radio" name="question<?php echo $value['qq_UniqueID'];?>" id="AQ1" value="<?php echo $value['option_A'];?>">
                            <label class="form-check-label" for="AQ1">
                                 <?php echo $value['option_A'];?>
                            </label>
                        </div>
                        <div class="form-check my-3">
                            <input class="form-check-input" type="radio" name="question<?php echo $value['qq_UniqueID'];?>" id="BQ1" value="<?php echo $value['option_B'];?>">
                            <label class="form-check-label" for="BQ1">
                                <?php echo $value['option_B'];?>
                            </label>
                        </div>
                        <div class="form-check my-3">
                            <input class="form-check-input" type="radio" name="question<?php echo $value['qq_UniqueID'];?>" id="CQ1" value="<?php echo $value['option_C'];?>">
                            <label class="form-check-label" for="CQ1">
                                <?php echo $value['option_C'];?>
                            </label>
                        </div>
                        <div class="form-check my-3">
                            <input class="form-check-input" type="radio" name="question<?php echo $value['qq_UniqueID'];?>" id="DQ1" value="<?php echo $value['option_D'];?>">
                            <label class="form-check-label" for="DQ1">
                                <?php echo $value['option_D'];?>
                            </label>
                        </div>
                    </div>
            </div>
        <?php
            }
        ?>
            <button type="submit" class="btn btn-outline-success btn-block">Submit</button>
        </form>
    </div>
</main>

  <footer class="footer py-4 bg-dark text-light">
      <div class="container">
      <span class="cprTxt"> &copy;2019 HELP-MOOC</span>
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

        });
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug
    <script src="js/ie10-viewport-bug-workaround.js"></script> -->
</body>
</html>