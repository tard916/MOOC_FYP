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

  $countOfRatings = DB::returnRowCount('SELECT id FROM rating WHERE course_id= :courseID', array(':courseID'=>$courseID));  

  $valOfRatings = DB::query('SELECT rating_value FROM rating WHERE course_id= :courseID', array(':courseID'=>$courseID));
  $sumOfRatings = 0;
  foreach ($valOfRatings as  $valuert) {
    $sumOfRatings =  $sumOfRatings + (float)$valuert['rating_value'];
  } 
  $avRating= 0.0;
  if ($countOfRatings > 0 && $sumOfRatings > 0) {
      $avRating = $sumOfRatings / $countOfRatings;      
  }


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
                    <input class="course-rating rating-loading" value="<?php echo $avRating;?>">
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
      <a class="list-group-item list-group-item-action" data-toggle="list" href="#studentProgress" role="tab">Student Progress</a>
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

                <?php
                    $questions = DB::query('SELECT * FROM question WHERE crs_UniqueID= :courseID ORDER BY id DESC', array(':courseID'=>$courseID));
                    foreach ($questions as  $valuesQT) {
                    
                    $studentId = $valuesQT['student_ID'];
                    $studentsID = DB::query('SELECT * FROM student WHERE  std_uniquID =:std_uniquID', array(':std_uniquID'=>$studentId));
                ?>
                <a class="question-link text-dark" href="question.php?qts_ID=<?php echo $valuesQT['qst_UniqueID'];?>">
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
            <div class="tab-pane fade py-4" id="studentProgress" role="tabpanel">

                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Student ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Progress</th>
                            <th scope="col">At Risk?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $listOfStudent = DB::query('SELECT student_at_risk.studentID as ID, 
                            student.student_name as name,student_at_risk.dropout as dropout
                            FROM student_at_risk, student
                            WHERE student_at_risk.courseID = :courseID
                            AND student_at_risk.studentID = student.std_uniquID',
                             array(':courseID'=>$courseID));
                            foreach ($listOfStudent as  $valuesSLT) {
                            
                            $studentId = $valuesSLT['ID'];
                            $type="Video";
                            $countVideo = DB::query('SELECT count(type) as totalVideo FROM course_cirriculum WHERE course_id = :courseID and type= :type',
                            array(':type'=>$type, ':courseID'=>$courseID))[0]['totalVideo'];                            
                            // echo $countVideo;

                            $sumOfVideoWatched = DB::query('SELECT sum(nplayVideo) as sumOfVideoWatched FROM videoplay_logs WHERE std_uniqueID = :stdID AND course_ID = :courseID',
                            array(':stdID'=>$studentId, ':courseID'=>$courseID))[0]['sumOfVideoWatched'];
                            // echo $sumOfVideoWatched;

                            $totalProgress = number_format((( $sumOfVideoWatched *100 ) / $countVideo), 2, '.', '');
                            // ( $sumOfVideoWatched *100 ) / $countVideo;
                            // echo $totalProgress;
                            
                        ?>
                        <tr>
                            <th scope="row"><?php echo $valuesSLT['ID']?></th>
                            <td scope="row"><?php echo $valuesSLT['name']?></td>
                            <td scope="row">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo $totalProgress;?>%;" aria-valuenow="<?php echo $totalProgress;?>" aria-valuemin="0" aria-valuemax="100"><?php echo $totalProgress;?>%</div>
                                </div>
                            </td>
                            
                            <?php if ($valuesSLT['dropout'] == 0) {?>
                                <td scope="row"><i class="fa fa-times " aria-hidden="true"></i></td>
                            <?php }else{?>
                                <td scope="row"><i class="fa fa-check at-risk" aria-hidden="true"></i></td>
                            <?php }?>
                        </tr>
                        <?php
                            }
                        ?>

                        <!-- <tr>
                            <th scope="row">2</th>
                            <td>Hassan Saleem</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                            </td>
                            <td><i class="fa fa-check at-risk" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Thierno Abdoul Rahimi Diallo</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 41%;" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100">41%</div>
                                </div>
                            </td>
                            <td><i class="fa fa-times at-risk" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Umar Adkhamov</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">15%</div>
                                </div>
                            </td>
                            <td><i class="fa fa-check at-risk" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mehrab Kamrani</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 71%;" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100">71%</div>
                                </div>
                            </td>
                            <td><i class="fa fa-times at-risk" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Hassan Saleem</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                            </td>
                            <td><i class="fa fa-check at-risk" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Thierno Abdoul Rahimi Diallo</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 41%;" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100">41%</div>
                                </div>
                            </td>
                            <td><i class="fa fa-times at-risk" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Umar Adkhamov</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">15%</div>
                                </div>
                            </td>
                            <td><i class="fa fa-check at-risk" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Hassan Saleem</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                            </td>
                            <td><i class="fa fa-check at-risk" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Thierno Abdoul Rahimi Diallo</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 41%;" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100">41%</div>
                                </div>
                            </td>
                            <td><i class="fa fa-times at-risk" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Umar Adkhamov</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">15%</div>
                                </div>
                            </td>
                            <td><i class="fa fa-check at-risk" aria-hidden="true"></i></td>
                        </tr> -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">Student ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Progress</th>
                            <th scope="col">At Risk?</th>
                        </tr>
                    </tfoot>
                </table>

                <!--<table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Progress</th>
                      <th scope="col">At Risk?</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mehrab Kamrani</td>
                      <td>
                          <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 71%;" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100">71%</div>
                          </div>
                      </td>
                      <td><i class="fa fa-times at-risk" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Hassan Saleem</td>
                      <td>
                          <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                          </div>
                      </td>
                      <td><i class="fa fa-check at-risk" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Thierno Abdoul Rahimi Diallo</td>
                      <td>
                          <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 41%;" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100">41%</div>
                          </div>
                      </td>
                      <td><i class="fa fa-times at-risk" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>Umar Adkhamov</td>
                      <td>
                          <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">15%</div>
                          </div>
                      </td>
                      <td><i class="fa fa-check at-risk" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mehrab Kamrani</td>
                      <td>
                          <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 71%;" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100">71%</div>
                          </div>
                      </td>
                      <td><i class="fa fa-times at-risk" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Hassan Saleem</td>
                      <td>
                          <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                          </div>
                      </td>
                      <td><i class="fa fa-check at-risk" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Thierno Abdoul Rahimi Diallo</td>
                      <td>
                          <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 41%;" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100">41%</div>
                          </div>
                      </td>
                      <td><i class="fa fa-times at-risk" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>Umar Adkhamov</td>
                      <td>
                          <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">15%</div>
                          </div>
                      </td>
                      <td><i class="fa fa-check at-risk" aria-hidden="true"></i></td>
                    </tr>
                  </tbody>
                </table>-->

            </div>
        </div>
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

            // if there's a tick for at risk, the row will have red background
            $('.at-risk').each(function(){
                if ($(this).hasClass('fa-check')) {
                    $(this).parent().parent().addClass('table-danger');
                }
            });

        });
    </script>      
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    
    </script>  
   <script type="text/javascript" src="dataTable/datatables.min.js"></script>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug
    <script src="js/ie10-viewport-bug-workaround.js"></script> -->
</body>
</html>