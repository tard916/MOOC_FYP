<?php
    include('./backend/classes/DB.php');
    include('./backend/classes/Login.php');
    $courseID = $_GET['cid'];
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
    }else {
        include('../mainHeader.php');
    }
?>

    <main role="main" class="container curriculum-wrapper">
        <div class="col-md-10 col-lg-8 mx-auto">
            <h1 class="mt-4 text-center">Add Quiz</h1>

            <form class="" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                   <label for="week">Select Week</label>
                   <select class="form-control" id="week">
                     <option value="week1">Week 1</option>
                     <option value="week2">Week 2</option>
                     <option value="week3">Week 3</option>
                     <option value="week4">Week 4</option>
                     <option value="week5">Week 5</option>
                     <option value="week6">Week 6</option>
                     <option value="week7">Week 7</option>
                     <option value="week8">Week 8</option>
                     <option value="week9">Week 9</option>
                     <option value="week10">Week 10</option>
                   </select>
                 </div>

                 <div class="form-group">
                    <label for="numOfQuestions">Number of Questions</label>
                    <select class="form-control" id="numOfQuestions">
                      <option value="5">5 Questions</option>
                      <option value="6">6 Questions</option>
                      <option value="7">7 Questions</option>
                      <option value="8">8 Questions</option>
                      <option value="9">9 Questions</option>
                      <option value="10">10 Questions</option>
                      <option value="11">11 Questions</option>
                      <option value="12">12 Questions</option>
                      <option value="13">13 Questions</option>
                      <option value="14">14 Questions</option>
                      <option value="15">15 Questions</option>
                      <option value="16">16 Questions</option>
                      <option value="17">17 Questions</option>
                      <option value="18">18 Questions</option>
                      <option value="19">19 Questions</option>
                      <option value="20">20 Questions</option>
                    </select>
                  </div>
                <div id="quiz-accordion">


                </div>
                <a class="btn btn-outline-primary btn-block mt-5 mb-2" href="addQuiz.php" role="button">Add Another Quiz</a>
                <!--
                I don't know in which way you wanna create the quiz (submit button or href) so I create both for now
                <button type="submit" name="addQuiz" class="btn btn-outline-primary btn-block mt-5 mb-2">Add Quiz</button>
                -->
                <p class="text-muted text-center mb-2">Or</p>
                <button type="submit" name="createCourse" class="btn btn-outline-success btn-block mb-5">Create</button>
            </form>
        </div>

    </main>
     <!-- This part is for the Footer.-->
     <footer class="footer py-4 bg-dark text-light ">
         <div class="container">
         <span class="cprTxt"> &copy;2018 HELP-MOOC</span>
         </div>
     </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){
        $('#numOfQuestions').change(function(){
            var questionContent = "";
            for (var i = 1; i <= this.value; i++) {
                questionContent +=
                    '<div class="card mb-4">'+
                    '    <div class="card-header">'+
                    '        <a class="card-link d-block text-center text-secondary" data-toggle="collapse" href="#question'+i+'">Question '+i+'</a>'+
                    '    </div>'+
                    '    <div id="question'+i+'" class="collapse">'+
                    '        <div class="card-body">'+
                    '            <div class="form-group">'+
                    '                <label for="questionTitleQ'+i+'">Question Title</label>'+
                    '                <textarea class="form-control noresize" id="questionTitleQ'+i+'" rows="2"></textarea>'+
                    '            </div>'+
                    '            <div class="form-group row">'+
                    '              <label for="answer1'+i+'" class="col-2 col-form-label">A.</label>'+
                    '              <div class="col-10">'+
                    '                <input type="text" class="form-control" id="answer1'+i+'">'+
                    '              </div>'+
                    '            </div>'+
                    '            <div class="form-group row">'+
                    '              <label for="answer2'+i+'" class="col-2 col-form-label">B.</label>'+
                    '              <div class="col-10">'+
                    '                <input type="text" class="form-control" id="answer2'+i+'">'+
                    '              </div>'+
                    '            </div>'+
                    '            <div class="form-group row">'+
                    '              <label for="answer3'+i+'" class="col-2 col-form-label">C.</label>'+
                    '              <div class="col-10">'+
                    '                <input type="text" class="form-control" id="answer3'+i+'">'+
                    '              </div>'+
                    '            </div>'+
                    '            <div class="form-group row">'+
                    '              <label for="answer4'+i+'" class="col-2 col-form-label">D.</label>'+
                    '              <div class="col-10">'+
                    '                <input type="text" class="form-control" id="answer4'+i+'">'+
                    '              </div>'+
                    '            </div>'+
                    '        </div>'+
                    '    </div>'+
                    '</div>';
            }
            $("#quiz-accordion").html(questionContent);
        });
    });
    </script>
</body>
</html>
