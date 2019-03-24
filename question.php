<?php
  include('./backend/classes/DB.php');
  include('./backend/classes/Login.php');
   $courseID = $_GET['crs_UniqueID'];
   $qst_UniqueID = $_GET['qts_ID'];
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

  $questiondetail = DB::query('SELECT * FROM question WHERE qst_UniqueID =:qst_UniqueID', array(':qst_UniqueID'=>$qst_UniqueID));
  foreach ($questiondetail as  $value) {
      $qts_Content =  $value['question_Content'];
      $student_ID = $value['student_ID'];
      $nun_Of_Responses = $value['nun_Responses'];
      $courseID = $value['crs_UniqueID'];
  }

  $courseName = DB::query('SELECT * FROM course WHERE crs_uniqueID =:crs_uniqueID', array(':crs_uniqueID'=>$courseID))[0]['course_name'];
  $studentName = DB::query('SELECT * FROM student WHERE std_uniquID =:std_uniquID', array(':std_uniquID'=>$student_ID))[0]['student_name'];

?>

<main role="main" class="question-page">

    <div class="jumbotron jumbotron-fluid mb-5">
        <div class="container">
            <h6 class="text-center"><a class="text-dark" href="#"><?php echo $courseName;?></a></h6>
            <p class="lead question"><strong><?php echo $qts_Content;?></strong></p>
            <div class="row">
                <p class="col-6"><small>Asked by: </small><?php echo $studentName;?></p>
                <p class="col-6 text-muted text-right"><i class="fa fa-reply" aria-hidden="true"></i> <?php echo $nun_Of_Responses;?> Responses</p>
            </div>
        </div>
    </div>
    <div class="container responses-section">
        <button class="btn btn btn-outline-primary btn-block mb-5" type="button" name="button" data-toggle="modal" data-target="#answerModal">Answer</button>
        <!-- answer modal -->
        <form class="" action="backend/responseQuestion.php?qts_ID=<?php echo $qst_UniqueID;?>&crs_UniqueID=<?php echo $courseID;?>" method="post">
            <div class="modal fade" id="answerModal" tabindex="-1" role="dialog" aria-labelledby="answerModalTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="answerModalLongTitle">Answer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body text-center">
                      <div class="form-group">
                        <textarea required name="responseContent" class="form-control noresize" id="answer-input" rows="6" placeholder="Add your answer"></textarea>
                      </div>
                      <button type="submit" name="submitResponseFrom" class="btn btn-outline-success btn-block submit-answer">Submit</button>
                  </div>
                </div>
              </div>
            </div>
        </form>

        <?php
            $responses = DB::query('SELECT * FROM response WHERE question_ID= :question_ID ORDER BY id DESC', array(':question_ID'=>$qst_UniqueID));
            foreach ($responses as  $valuesRP) {
            
            $studentId = $valuesRP['student_ID'];
            $studentsID = DB::query('SELECT * FROM student WHERE  std_uniquID =:std_uniquID', array(':std_uniquID'=>$studentId));
        ?>

        <div class="response-row my-4 p-4">
        <?php
            foreach ($studentsID as $valuestd) {
        ?>
            <h6><?php echo $valuestd['student_name'];?></h6>
        <?php
            }
        ?>
            <p><?php echo $valuesRP['response_Content'];?></p>
        </div>
        <?php
            }
        ?>
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

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug
    <script src="js/ie10-viewport-bug-workaround.js"></script> -->
</body>
</html>
