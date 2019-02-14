<?php
  include('./backend/classes/DB.php');
  include('./backend/classes/Login.php');
  $courseID = $_GET['crs_UniqueID'];
  if (Login::isLoggedIn()) {
    //echo 'Logged In!';
    //echo Login::isLoggedIn();
    $outputkey  = Login::isLoggedIn();
    list($user, $key) = explode("_", $outputkey);
    if ($user == 'STD') {
      $user_Name = DB::query('SELECT student_name FROM student WHERE std_uniquID=:outputkey', array(':outputkey'=>$outputkey))[0]['student_name'];
      include('userHeader.php');

    }
  }else {
      include('../mainHeader.php');
  }
?>

    <main role="main" class="container-fluid curriculum-player-wrapper">
        <div class="row">
            <div class="col-3 p-0 h-100">
                <div id="accordion-player">
                    <div class="card curriculum-player-card">

                        <?php
                            $courseDuration = DB::query('SELECT duration FROM course WHERE crs_uniqueID =:courseID', array(':courseID'=>$courseID))[0]['duration'];
                            for($i = 1; $i<=$courseDuration; $i++){
                        ?>
                        <div class="card-header bg-secondary">
                            <a class="card-link d-block text-white" data-toggle="collapse" href="#week<?php echo $i;?>">Week <?php echo $i;?></a>
                        </div>

                        <div id="week<?php echo $i;?>" class="collapse show">
                            <ul class="list-group list-group-flush">
                                <?php
                                    $crriculum = DB::query('SELECT * FROM course_cirriculum WHERE week_number = :id AND course_id= :courseID', array(':id'=>$i, ':courseID'=>$courseID));
                                    foreach ($crriculum as $value) {
                                ?>
                                <li class="list-group-item"><a class="curriculum-link text-dark" href="<?php echo $value['path']?>"><?php echo $value['title'];?></a></li>
                                    <?php
                                        }
                                    ?>
                            </ul>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-9 p-0 h-100">
                <video id="curriculum-video" class="video-js d-none" controls preload="auto" data-setup='{"responsive": true}'>
                </video>
                <div class="curriculum-article d-none">
                    <embed id="article-src" src="" type="application/pdf" />
                </div>
                <div class="curriculum-quiz p-md-5 p-sm-3 p-1 h-100">
                    <form class="" action="" method="post">
                        <div class="card mb-5">
                          <div class="card-header">
                            Question 1
                          </div>
                          <div class="card-body">
                            <h6 class="mb-4">Here is the question, here is the question here is the question?</h6>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question1" id="AQ1" value="A" required>
                              <label class="form-check-label" for="AQ1">
                                  This is the answer A for first question. This is the answer A for first question. This is the answer A for first question. This is the answer A for first question
                              </label>
                            </div>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question1" id="BQ1" value="B">
                              <label class="form-check-label" for="BQ1">
                                  This is the answer B for first question
                              </label>
                            </div>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question1" id="CQ1" value="C">
                              <label class="form-check-label" for="CQ1">
                                  This is the answer C for first question
                              </label>
                            </div>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question1" id="DQ1" value="D">
                              <label class="form-check-label" for="DQ1">
                                  This is the answer C for first question
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="card mb-5">
                          <div class="card-header">
                            Question 2
                          </div>
                          <div class="card-body">
                            <h6 class="mb-4">Here is the question, here is the question here is the question?</h6>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question2" id="AQ2" value="A" required>
                              <label class="form-check-label" for="AQ2">
                                  This is the answer A for second question
                              </label>
                            </div>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question2" id="BQ2" value="B">
                              <label class="form-check-label" for="BQ2">
                                  This is the answer B for second question
                              </label>
                            </div>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question2" id="CQ2" value="C">
                              <label class="form-check-label" for="CQ2">
                                  This is the answer C for second question
                              </label>
                            </div>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question2" id="DQ2" value="D">
                              <label class="form-check-label" for="DQ2">
                                  This is the answer C for second question
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="card mb-5">
                          <div class="card-header">
                            Question 3
                          </div>
                          <div class="card-body">
                            <h6 class="mb-4">Here is the question, here is the question here is the question?</h6>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question4" id="AQ3" value="A" required>
                              <label class="form-check-label" for="AQ3">
                                  This is the answer A for third question
                              </label>
                            </div>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question4" id="BQ3" value="B">
                              <label class="form-check-label" for="BQ3">
                                  This is the answer B for third question
                              </label>
                            </div>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question4" id="CQ3" value="C">
                              <label class="form-check-label" for="CQ3">
                                  This is the answer C for third question
                              </label>
                            </div>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question4" id="DQ3" value="D">
                              <label class="form-check-label" for="DQ3">
                                  This is the answer C for third question
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="card mb-5">
                          <div class="card-header">
                            Question 4
                          </div>
                          <div class="card-body">
                            <h6 class="mb-4">Here is the question, here is the question here is the question?</h6>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question4" id="AQ4" value="A" required>
                              <label class="form-check-label" for="AQ4">
                                  This is the answer A for fourth question
                              </label>
                            </div>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question4" id="BQ4" value="B">
                              <label class="form-check-label" for="BQ4">
                                  This is the answer B for fourth question
                              </label>
                            </div>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question4" id="CQ4" value="C">
                              <label class="form-check-label" for="CQ4">
                                  This is the answer C for fourth question
                              </label>
                            </div>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question4" id="DQ4" value="D">
                              <label class="form-check-label" for="DQ4">
                                  This is the answer C for fourth question
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="card mb-5">
                          <div class="card-header">
                            Question 5
                          </div>
                          <div class="card-body">
                            <h6 class="mb-4">Here is the question, here is the question here is the question?</h6>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question5" id="AQ5" value="A" required>
                              <label class="form-check-label" for="AQ5">
                                  This is the answer A for fifth question
                              </label>
                            </div>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question5" id="BQ5" value="B">
                              <label class="form-check-label" for="BQ5">
                                  This is the answer B for fifth question
                              </label>
                            </div>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question5" id="CQ5" value="C">
                              <label class="form-check-label" for="CQ5">
                                  This is the answer C for fifth question
                              </label>
                            </div>
                            <div class="form-check my-3">
                              <input class="form-check-input" type="radio" name="question5" id="DQ5" value="D">
                              <label class="form-check-label" for="DQ5">
                                  This is the answer C for fifth question
                              </label>
                            </div>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-outline-success btn-block">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/video.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var player = videojs('curriculum-video');
            $(".curriculum-link").click(function(e){
                e.preventDefault();
                var src = $(this).attr("href");
                var srcArray = src.split(".");
                if (srcArray[srcArray.length - 1] == "mp4") {
                    player.src({type: "video/mp4", src: src});
                    $("#curriculum-video").removeClass("d-none");
                    $("#article-src").parent().addClass("d-none");
                    $(".curriculum-quiz").addClass("d-none");
                } else if (srcArray[srcArray.length - 1] == "pdf") {
                    $("#article-src").attr("src", src);
                    $("#article-src").parent().removeClass("d-none");
                    $("#curriculum-video").addClass("d-none");
                    $(".curriculum-quiz").addClass("d-none");
                } else {
                    $(".curriculum-quiz").removeClass("d-none");
                    $("#curriculum-video").addClass("d-none");
                    $("#article-src").parent().addClass("d-none");

                }
            });
        });
    </script>

</body>
</html>
