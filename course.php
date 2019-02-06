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

                <!-- Button trigger review modal  -->
                <button class="btn btn btn-outline-primary btn-block mb-5" type="button" name="button" data-toggle="modal" data-target="#reviewModal">Write Review</button>

                <!-- Review modal -->
                <form class="" action="index.html" method="post">
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
                              <input name="submitRating" type="number" class="rating-loading submit-rating">
                              <div class="form-group">
                                <textarea required style="resize: none;" class="form-control" id="review-input" rows="6" placeholder=
                                "Describe your experience, what you got out of the course, and other helpful highlights.

What did the instructor do well, and what could use some improvement?"></textarea>
                              </div>
                              <p class="text-danger review-validation d-none">Please fill up above fields</p>
                              <button type="submit" class="btn btn-outline-success btn-block submit-review">Submit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </form>

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

                <button class="btn btn btn-outline-primary btn-block mb-5" type="button" name="button" data-toggle="modal" data-target="#questionModal">Ask Question</button>
                <!-- Review modal -->
                <form class="" action="index.html" method="post">
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
                                <textarea required style="resize: none;" class="form-control" id="question-input" rows="6" placeholder="Describe what you're trying to achieve and where you're getting stuck"></textarea>
                              </div>
                              <button type="submit" class="btn btn-outline-success btn-block submit-question">Submit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </form>


                <a class="question-link text-dark" href="#">
                    <div class="question-row my-4 p-4">
                        <h6>Mehrab Kamrani</h6>
                        <p class="text-muted">5 days ago</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vehicula, tortor vitae tristique dignissim, augue tellus hendrerit quam, vel laoreet leo ligula vitae diam. Sed sagittis augue ultrices molestie scelerisque. Integer massa justo, ornare at gravida sit amet, bibendum sagittis erat. Phasellus id molestie massa. Aenean ornare finibus lorem, quis dignissim purus interdum a. Proin non urna nisl. Cras condimentum velit massa, nec sollicitudin risus scelerisque sed. Mauris condimentum arcu ac gravida pharetra. Nullam vel tellus sapien.</p>
                        <p class="text-muted m-0"><i class="fa fa-reply" aria-hidden="true"></i> 2 Responses</p>
                    </div>
                </a>
                <a class="question-link text-dark" href="#">
                    <div class="question-row my-4 p-4">
                        <h6>Mehrab Kamrani</h6>
                        <p class="text-muted">5 days ago</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vehicula, tortor vitae tristique dignissim, augue tellus hendrerit quam, vel laoreet leo ligula vitae diam. Sed sagittis augue ultrices molestie scelerisque. Integer massa justo, ornare at gravida sit amet, bibendum sagittis erat. Phasellus id molestie massa. Aenean ornare finibus lorem, quis dignissim purus interdum a. Proin non urna nisl. Cras condimentum velit massa, nec sollicitudin risus scelerisque sed. Mauris condimentum arcu ac gravida pharetra. Nullam vel tellus sapien.</p>
                        <p class="text-muted m-0"><i class="fa fa-reply" aria-hidden="true"></i> 2 Responses</p>
                    </div>
                </a>
                <a class="question-link text-dark" href="#">
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
