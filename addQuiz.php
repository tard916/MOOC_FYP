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
                     <option>Week 1</option>
                     <option>Week 2</option>
                     <option>Week 3</option>
                     <option>Week 4</option>
                     <option>Week 5</option>
                     <option>Week 6</option>
                     <option>Week 7</option>
                     <option>Week 8</option>
                     <option>Week 9</option>
                     <option>Week 10</option>
                   </select>
                 </div>

                 <div class="form-group">
                    <label for="numOfQuestions">Number of Questions</label>
                    <select class="form-control" id="numOfQuestions">
                      <option>5 Questions</option>
                      <option>6 Questions</option>
                      <option>7 Questions</option>
                      <option>8 Questions</option>
                      <option>9 Questions</option>
                      <option>10 Questions</option>
                      <option>11 Questions</option>
                      <option>12 Questions</option>
                      <option>13 Questions</option>
                      <option>14 Questions</option>
                      <option>15 Questions</option>
                      <option>16 Questions</option>
                      <option>17 Questions</option>
                      <option>18 Questions</option>
                      <option>19 Questions</option>
                      <option>20 Questions</option>
                    </select>
                  </div>
                <div id="quiz-accordion">
                    <div class="card mb-4">
                        <div class="card-header">
                            <a class="card-link d-block text-center text-secondary" data-toggle="collapse" href="#question1">Question 1</a>
                        </div>
                        <div id="question1" class="collapse">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="questionTitle">Question Title</label>
                                    <textarea class="form-control noresize" id="questionTitle" rows="2"></textarea>
                                </div>
                                <div class="form-group row">
                                  <label for="answer1" class="col-2 col-form-label">A.</label>
                                  <div class="col-10">
                                    <input type="text" class="form-control" id="answer1">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="answer2" class="col-2 col-form-label">B.</label>
                                  <div class="col-10">
                                    <input type="text" class="form-control" id="answer2">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="answer3" class="col-2 col-form-label">C.</label>
                                  <div class="col-10">
                                    <input type="text" class="form-control" id="answer3">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="answer4" class="col-2 col-form-label">D.</label>
                                  <div class="col-10">
                                    <input type="text" class="form-control" id="answer4">
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

        $(".add-resource").click(function(e){
            e.preventDefault();
            var weekID = $(this).parent().parent().attr('id').replace("week", "");
            var formRow =   $(document.createElement("div")).addClass('form-row align-items-center pt-3').css( "border-top", "1px solid #d1d1d1" );
            var titleGroup= $(document.createElement("div")).addClass('form-group col-md-4').appendTo(formRow);
                            $(document.createElement("label")).attr('for', 'resourceTitle').text('Title').appendTo(titleGroup);
                            $(document.createElement("input")).attr({type: "text",id: "resourceTitle", name: "title"+weekID+"[]"}).addClass('form-control form-control-sm').appendTo(titleGroup);
            var fileGroup = $(document.createElement("div")).addClass('form-group col-md-4').appendTo(formRow);
                            $(document.createElement("label")).attr('for', 'resourceFile').text('Resource File').appendTo(fileGroup);
                            $(document.createElement("input")).attr({type: "file",id: "resourceFile", name: "fileName"+weekID+"[]"}).addClass('form-control-file').appendTo(fileGroup);
            var typeGroup = $(document.createElement("div")).addClass('form-group col-md-3').appendTo(formRow);
                            $(document.createElement("label")).attr('for', 'resourceType').text('Resource Type').appendTo(typeGroup);
            var select =    $(document.createElement("select")).attr({id: "resourceType", name: "fileType"+weekID+"[]"}).addClass('form-control form-control-sm').appendTo(typeGroup);
                            $(document.createElement("option")).text('Video').appendTo(select);
                            $(document.createElement("option")).text('Quiz').appendTo(select);
                            $(document.createElement("option")).text('Article').appendTo(select);
            var removerDiv= $(document.createElement("div")).addClass('form-group col-md-1').appendTo(formRow);
            var removeBtn = $(document.createElement("a")).attr('href', '#').addClass('remove-resource btn btn-outline-danger pull-right').appendTo(removerDiv).click(function(e){e.preventDefault();$(this).parent().parent().remove();});
                            $(document.createElement("i")).addClass('fa fa-remove').appendTo(removeBtn);
            $(this).before(formRow);
        });
    });
    </script>
</body>
</html>
