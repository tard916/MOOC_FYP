<?php
  include('./backend/classes/DB.php');
  include('./backend/classes/Login.php');
   //$courseID = $_GET['crs_UniqueID'];
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

  //$courseResult = DB::query('SELECT * FROM course WHERE crs_uniqueID =:courseID', array(':courseID'=>$courseID));


?>

<main role="main" class="question-page">

    <div class="jumbotron jumbotron-fluid mb-5">
        <div class="container">
            <h6 class="text-center"><a class="text-dark" href="#">Model View Controler (MVC) with PHP</a></h6>
            <p class="lead question"><strong>Is it true that PHP is going to die soon? 😂</strong></p>
            <div class="row">
                <p class="col-6"><small>Asked by: </small>Mehrab Kamrani</p>
                <p class="col-6 text-muted text-right"><i class="fa fa-reply" aria-hidden="true"></i> 2 Responses</p>
            </div>
        </div>
    </div>
    <div class="container responses-section">
        <button class="btn btn btn-outline-primary btn-block mb-5" type="button" name="button" data-toggle="modal" data-target="#answerModal">Answer</button>
        <!-- answer modal -->
        <form class="" action="index.html" method="post">
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
                        <textarea required class="form-control noresize" id="answer-input" rows="6" placeholder="Add your answer"></textarea>
                      </div>
                      <button type="submit" class="btn btn-outline-success btn-block submit-answer">Submit</button>
                  </div>
                </div>
              </div>
            </div>
        </form>

        <div class="response-row my-4 p-4">
            <h6>Mehrab Kamrani</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vehicula, tortor vitae tristique dignissim, augue tellus hendrerit quam, vel laoreet leo ligula vitae diam. Sed sagittis augue ultrices molestie scelerisque. Integer massa justo, ornare at gravida sit amet, bibendum sagittis erat. Phasellus id molestie massa. Aenean ornare finibus lorem, quis dignissim purus interdum a. Proin non urna nisl. Cras condimentum velit massa, nec sollicitudin risus scelerisque sed. Mauris condimentum arcu ac gravida pharetra. Nullam vel tellus sapien.</p>
        </div>
        <div class="response-row my-4 p-4">
            <h6>Mehrab Kamrani</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vehicula, tortor vitae tristique dignissim, augue tellus hendrerit quam, vel laoreet leo ligula vitae diam. Sed sagittis augue ultrices molestie scelerisque. Integer massa justo, ornare at gravida sit amet, bibendum sagittis erat. Phasellus id molestie massa. Aenean ornare finibus lorem, quis dignissim purus interdum a. Proin non urna nisl. Cras condimentum velit massa, nec sollicitudin risus scelerisque sed. Mauris condimentum arcu ac gravida pharetra. Nullam vel tellus sapien.</p>
        </div>
        <div class="response-row my-4 p-4">
            <h6>Mehrab Kamrani</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vehicula, tortor vitae tristique dignissim, augue tellus hendrerit quam, vel laoreet leo ligula vitae diam. Sed sagittis augue ultrices molestie scelerisque. Integer massa justo, ornare at gravida sit amet, bibendum sagittis erat. Phasellus id molestie massa. Aenean ornare finibus lorem, quis dignissim purus interdum a. Proin non urna nisl. Cras condimentum velit massa, nec sollicitudin risus scelerisque sed. Mauris condimentum arcu ac gravida pharetra. Nullam vel tellus sapien.</p>
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

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug
    <script src="js/ie10-viewport-bug-workaround.js"></script> -->
</body>
</html>
