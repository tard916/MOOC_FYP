<?php
  include('./backend/classes/DB.php');
  include('./backend/classes/Login.php');
   $courseID = $_GET['cid'];
  // $courseID = 'CRS5c4eb123cbbbe9.91086078';
  if (Login::isLoggedIn()) {
    //echo 'Logged In!';
    //echo Login::isLoggedIn();
    $outputkey  = Login::isLoggedIn();
    list($user, $key) = explode("_", $outputkey);

    if ($user == 'ADM') {
      $user_Name = DB::query('SELECT name FROM admin WHERE adm_uniqueID=:outputkey', array(':outputkey'=>$outputkey))[0]['name'];

      include('./adminHeader.php');
    }
  }else {
      include('../mainHeader.php');
  }

  $courseResult = DB::query('SELECT * FROM course WHERE crs_uniqueID =:courseID', array(':courseID'=>$courseID));

  $courseRName = DB::query('SELECT course_name FROM course WHERE crs_uniqueID =:courseID', array(':courseID'=>$courseID))[0]['course_name'];


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
                <div class="col-sm-6"><i class="fa fa-user-o" aria-hidden="true"></i> <?php echo $intructorName;?></div>
                <div class="col-sm-6"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $value['duration'];?> Weeks</div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <a class="btn btn-outline-success btn-block mt-5" href="#"  data-toggle="modal" data-target="#approveModal" role="button"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-outline-danger btn-block mt-5" href="#"  data-toggle="modal" data-target="#rejectModal" role="button"><i class="fa fa-times" aria-hidden="true"></i> Reject</a>
                </div>
            </div>
        </div>
    </div>
    <!--This part is for the Carousel slide -->
    <!-- List group -->
    <div class="list-group text-center" id="course-sections" role="tablist">
      <a class="list-group-item list-group-item-action active" data-toggle="list" href="#overview" role="tab">Overview</a>
      <a class="list-group-item list-group-item-action" data-toggle="list" href="#syllabus" role="tab">Syllabus</a>
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
        </div>
    </div>

     <!-- Approve Modal -->
     <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="approveModalLabel">Approve Course</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <p>You are about to Approve this course:</p>
              <h4><?php echo $courseRName;?></h4>
              <form action="backend/approve.php?courseID=<?php echo $courseID;?>" method="post">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="check" name="checked" id="alldevices" >
                      <label class="form-check-label" for="alldevices">
                           Are you sure you want to proceed? This action cannot be reversed.
                      </label>
                  </div>
                  <button type="submit" name="confirm" class="btn btn-primary btn-block mt-4">Confirm</button>
              </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Reject Modal -->
    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="rejectModalLabel">Reject Course</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <p>You are about to reject this course:</p>
              <h4><?php echo $courseRName;?></h4>
              <form action="backend/reject.php?courseID=<?php echo $courseID;?>" method="post">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="check" name="checked" id="alldevices" >
                      <label class="form-check-label" for="alldevices">
                           Are you sure you want to proceed? This action cannot be reversed.
                      </label>
                  </div>
                  <button type="submit" name="confirm" class="btn btn-primary btn-block mt-4">Confirm</button>
              </form>
          </div>
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



    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug
    <script src="js/ie10-viewport-bug-workaround.js"></script> -->
</body>
</html>
