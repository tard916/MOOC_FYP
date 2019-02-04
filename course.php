<?php
  include('./backend/classes/DB.php');
  include('./backend/classes/Login.php');
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
?>

<main role="main">

    <!--This part is for the Carousel slide -->
    <div class="course-jumbotron jumbotron m-0 p-sm-5">
        <h1 class="display-4 text-center mb-3">Learn Advanced C++ Programming</h1>
        <div class="row lead text-center">
            <div class="col-md-4 ">
                <input class="course-rating rating-loading" value="3.75">
                <small>(100)</small>
            </div>
            <div class="col-md-4"><i class="fa fa-user-o" aria-hidden="true"></i> Thierno Abdoul Rahimi Diallo</div>
            <div class="col-md-4"><i class="fa fa-clock-o" aria-hidden="true"></i> 14 Weeks</div>

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
                    <p>This course is for experienced C programmers who want to program in C++. The examples and exercises require a basic understanding of algorithms and object-oriented software.</p>
                </div>
                <div class="course-section">
                    <h4>Learning Outcome</h4>
                    <hr>
                    <p>This course is for experienced C programmers who want to program in C++. The examples and exercises require a basic understanding of algorithms and object-oriented software.</p>
                </div>
                <div class="course-section">
                    <h4>Requirements</h4>
                    <hr>
                    <p>This course is for experienced C programmers who want to program in C++. The examples and exercises require a basic understanding of algorithms and object-oriented software.</p>
                </div>
            </div>

            <div class="tab-pane fade py-4" id="syllabus" role="tabpanel">
                <div class="course-curriculum-section">

                    <h5 class="">Week 1</h5>
                    <ul class="list-unstyled mb-5">
                        <li class=""><a class="curriculum-link text-dark" href="#"><i class="fa fa-file-video-o" aria-hidden="true"></i> Model View Controler (MVC) with PHP part 1</a></li>
                        <li class=""><a class="curriculum-link text-dark" href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i> Intro to MVC</a></li>
                    </ul>

                    <h5 class="">Week 2</h5>
                    <ul class="list-unstyled mb-5">
                        <li class=""><a class="curriculum-link text-dark" href="#"><i class="fa fa-file-video-o" aria-hidden="true"></i> Model View Controler (MVC) with PHP part 2 and 3</a></li>
                    </ul>

                    <h5 class="">Week 3</h5>
                    <ul class="list-unstyled mb-5">
                        <li class=""><a class="curriculum-link text-dark" href="#"><i class="fa fa-file-video-o" aria-hidden="true"></i> Model View Controler (MVC) with PHP part 4</a></li>
                    </ul>

                    <h5 class="">Week 4</h5>
                    <ul class="list-unstyled mb-5">
                        <li class=""><a class="curriculum-link text-dark" href="#"><i class="fa fa-file-video-o" aria-hidden="true"></i> Model View Controler (MVC) with PHP part 5</a></li>
                    </ul>

                    <h5 class="">Week 5</h5>
                    <ul class="list-unstyled mb-5">
                        <li class=""><a class="curriculum-link text-dark" href="#"><i class="fa fa-file-video-o" aria-hidden="true"></i> Model View Controler (MVC) with PHP part 6</a></li>
                    </ul>

                    <h5 class="">Week 6</h5>
                    <ul class="list-unstyled mb-5">
                        <li class=""><a class="curriculum-link text-dark" href="#"><i class="fa fa-file-video-o" aria-hidden="true"></i> Model View Controler (MVC) with PHP part 7</a></li>
                    </ul>

                    <h5 class="">Week 7</h5>
                    <ul class="list-unstyled mb-5">
                        <li class=""><a class="curriculum-link text-dark" href="#"><i class="fa fa-file-video-o" aria-hidden="true"></i> Model View Controler (MVC) with PHP part 8</a></li>
                    </ul>

                    <h5 class="">Week 8</h5>
                    <ul class="list-unstyled mb-5">
                        <li class=""><a class="curriculum-link text-dark" href="#"><i class="fa fa-file-video-o" aria-hidden="true"></i> Model View Controler (MVC) with PHP part 9</a></li>
                    </ul>

                    <h5 class="">Week 9</h5>
                    <ul class="list-unstyled mb-5">
                        <li class=""><a class="curriculum-link text-dark" href="#"><i class="fa fa-file-video-o" aria-hidden="true"></i> Model View Controler (MVC) with PHP part 10</a></li>
                    </ul>

                    <h5 class="">Week 10</h5>
                    <ul class="list-unstyled mb-5">
                        <li class=""><a class="curriculum-link text-dark" href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i> Model View Controler (MVC) with PHP pdf</a></li>
                    </ul>

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
              Irure enim occaecat labore sit qui aliquip reprehenderit amet velit. Deserunt ullamco ex elit nostrud ut dolore nisi officia magna sit occaecat laboris sunt dolor. Nisi eu minim cillum occaecat aute est cupidatat aliqua labore aute occaecat ea aliquip sunt amet. Aute mollit dolor ut exercitation irure commodo non amet consectetur quis amet culpa. Quis ullamco nisi amet qui aute irure eu. Magna labore dolor quis ex labore id nostrud deserunt dolor eiusmod eu pariatur culpa mollit in irure.
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
