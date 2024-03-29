<?php
  include('./backend/classes/DB.php');
  include('./backend/classes/Login.php');
  if (Login::isLoggedIn()) {
    $outputkey  = Login::isLoggedIn();
    list($user, $key) = explode("_", $outputkey);
    if ($user == 'INS') {
      $user_Name = DB::query('SELECT instructor_name FROM instructor WHERE ins_uniquID=:outputkey', array(':outputkey'=>$outputkey))[0]['instructor_name'];
      include('./instructorHeader.php');     
      include('./backend/generateCSV.php');
      include('./backend/loadCSV.php');
     
    }
    else if ($user == 'STD') {
      $user_Name = DB::query('SELECT student_name FROM student WHERE std_uniquID=:outputkey', array(':outputkey'=>$outputkey))[0]['student_name'];
      $user_ID = DB::query('SELECT std_uniquID FROM student WHERE std_uniquID=:outputkey', array(':outputkey'=>$outputkey))[0]['std_uniquID'];
      include('./userHeader.php');
      
    }
    else if ($user == 'ADM') {
      header("Location: admin.php"); /* Redirect browser */
      exit();
    }
  }else {
      include('mainHeader.php');
  }
?>

  <main role="main">

    <!--This part is for the Carousel slide -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide img-fluid" src="./src/images/bg/bg5.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1 class="text-uppercase slideT">Inspiration.</h1>
                <p>Education is the most powerful weapon for changing the world.</p>
                <p><a class="btn btn-lg btn-primary" href="signup.php" role="button">Sign up today</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide img-fluid" src="./src/images/bg/bg2.jpg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1 class="text-uppercase slideT">Develop your skills.</h1>
                <p>Learning is the eyes of the mind.</p>
                <p><a class="btn btn-lg btn-primary" href="login.php" role="button">Log In</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide img-fluid" src="./src/images/bg/bg3.jpg" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1 class="text-uppercase slideT">Help Change The World.</h1>
                <p>Shear your knowlege by teaching people around the world.</p>
                <p><a class="btn btn-lg btn-primary" href="becomeaninstructor.php" role="button">Become an instructor</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
    <!--This part is for the Carousel slide -->


    <!--This part is for the course content part. -->
    <div class="album py-5 bg-light">
        <div class="container">
        <div class="row">
        <?php
          $status= 'approved';
          if(isset($_GET['categoryID'])){
            $categoryID = $_GET['categoryID'];
            $select_course = DB::query('SELECT * FROM course WHERE category_id = :category_id AND status =:status',
             array(':category_id'=>$categoryID, ':status'=>$status));
          }else{
            $select_course = DB::query('SELECT * FROM course WHERE status =:status', array(':status'=>$status));
          }          
          foreach ($select_course as $value) {
              $imagePath = $value['course_path_fol'].'/'.$value['course_image'];
              //echo $imagePath;
        ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="<?php echo $imagePath;?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title mb-4"><?php echo $value['course_name'];?></h5>
                    <?php
                        $ins_uniquID = $value['instructor_id'];
                        $retrieve_the_instructor = DB::query('SELECT instructor_name FROM instructor where ins_uniquID= :ins_uniquID',array(':ins_uniquID'=>$ins_uniquID))[0]['instructor_name'];
                    ?>
                    <h6 class="card-subtitle mb-4 text-muted"><?php echo $retrieve_the_instructor;?></h6>
                    <p>Rating: 0.0 <small class="text-muted">(0)</small><small class="text-muted pull-right mt-1"><?php echo $value['duration'];?> weeks</small></p>
                    <a class="btn btn-outline-success btn-block" href="<?php
                        if(!Login::isLoggedIn()){
                          echo "notJoinedCourse.php?crs_UniqueID=".$value['crs_uniqueID'];
                        }else{
                          echo "backend/jionCourses.php?crs_UniqueID=".$value['crs_uniqueID'];
                        }
                        //backend/jionCourses.php?crs_UniqueID=<?php echo $value['crs_uniqueID'];
                    ?>" role="button">Join &raquo;</a>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
        </div>
    </div>
    <!--This part is for the course content part. -->

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header bg-white">
            <h5 class="modal-title" id="loginModalTitle">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="POST" class="needs-validation" novalidate action="backend/login.php">
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required >
                    </div>
                  </div>
                  <button type="submit" name="login" class="btn btn-success btn-lg btn-block mb-3">Log In</button>
              </form>
              <div class="text-center">or <a href="#">Forgot Password</a></div>

          </div>
          <div class="modal-footer">

              <div>Don't have an account? <a data-toggle="modal" data-dismiss="modal" href="#signupModal">Sign up</a></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Login Modal -->

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header bg-white">
            <h5 class="modal-title" id="loginModalTitle">Logout of your Account?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="POST" class="needs-validation" novalidate action="backend/login.php">
                <p>Are you sure you'd like to logout?</p>
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="checkbox" name="alldevices" class="form-control" value="alldevices" aria-label="Email" aria-describedby="basic-addon1" required>Logout of all devices?<br />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required >
                    </div>
                  </div>
                  <button type="submit"  name="confirm" class="btn btn-success btn-lg btn-block mb-3">Log Out</button>
              </form>
              <div class="text-center">or <a href="#">Forgot Password</a></div>

          </div>
          <div class="modal-footer">

              <div>Don't have an account? <a data-toggle="modal" data-dismiss="modal" href="#signupModal">Sign up</a></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Logout Modal -->


    <!-- Signup Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header bg-white">
            <h5 class="modal-title" id="signupModalTitle">Sign Up</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="POST" class="needs-validation" novalidate action="backend/signup.php">
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-user"></i></span>
                        </div>
                        <input id="signupName" type="text" class="form-control" name="fullName" placeholder="Full Name" aria-label="Full Name" aria-describedby="basic-addon1" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input id="signupEmail" type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-lock"></i></span>
                        </div>
                        <input id="signupPassword" type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required >
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-lock"></i></span>
                        </div>
                        <input id="signupReenterpassword" type="password" class="form-control" name="verpassword" placeholder="Re-enter Password" aria-label="Re-enter Password" aria-describedby="basic-addon1" required >
                    </div>
                  </div>
                  <button type="submit" name="createaccount" class="btn btn-success btn-lg btn-block">Sign Up</button>
              </form>

          </div>
          <div class="modal-footer">
              <div>Already have an account? <a data-toggle="modal" data-dismiss="modal" href="#loginModal">Log In</a></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Signup Modal -->


    <!-- BecomeInstructor Modal -->
    <div class="modal fade" id="becomeInstructorModal" tabindex="-1" role="dialog" aria-labelledby="becomeInstructorModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header bg-white">
            <h5 class="modal-title" id="becomeInstructorModalTitle">Become an Instructor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="POST" class="needs-validation" novalidate action="backend/instructorSignup.php">
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-user"></i></span>
                        </div>
                        <input id="instructorSignupName" type="text" class="form-control" name="fullName" placeholder="Full Name" aria-label="Full Name" aria-describedby="basic-addon1" required>

                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input id="instructorSignupEmail" type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required>

                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-lock"></i></span>
                        </div>
                        <input id="instructorSignupPassword" type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required >
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-lock"></i></span>
                        </div>
                        <input id="instructorSignupReenterpassword" type="password" class="form-control" name="verpassword" placeholder="Re-enter Password" aria-label="Re-enter Password" aria-describedby="basic-addon1" required >
                    </div>
                  </div>
                  <button type="submit" name="createaccount" class="btn btn-success btn-lg btn-block">Sign Up</button>
              </form>

          </div>
          <div class="modal-footer">
              <div>Already have an account? <a data-toggle="modal" data-dismiss="modal" href="#loginModal">Log In</a></div>
          </div>
        </div>
      </div>
    </div>
    <!-- BecomeInstructor Modal -->



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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/eventsubmiter.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug
    <script src="js/ie10-viewport-bug-workaround.js"></script> -->

    <!-- bootstrap-validate -->
    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.1.3/dist/bootstrap-validate.js" ></script>
    <script>
    bootstrapValidate(['#signupEmail', '#instructorSignupEmail'], 'email:Invalid email address!');
    bootstrapValidate(['#signupName', '#instructorSignupName',], 'required:Please fill out this field!');
    bootstrapValidate(['#signupPassword', '#instructorSignupPassword'], 'min:6:Please enter at least 6 characters!');
    bootstrapValidate('#instructorSignupReenterpassword', 'matches:#instructorSignupPassword:Your passwords should match');
    bootstrapValidate('#signupReenterpassword', 'matches:#signupPassword:Your passwords should match');


      (function() {
        'use strict';
        window.addEventListener('load', function() {

          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false || form.getElementsByClassName('is-invalid').length !== 0) {
                  event.preventDefault();
                  event.stopPropagation();
              }
            }, false);
          });
        }, false);
        // $('#navbarDropdown').click(function() {
        //     var http = new XMLHttpRequest();
        //     var url = "./backend/ckle.php";
        //     var userIDValue = $('#userIDValue')[0].value;
        //     var params = "userID="+userIDValue;
        //     /*http.open("POST", url, true);

        //     //Send the proper header information along with the request
        //     http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //     http.onreadystatechange = function() {//Call a function when the state changes.
        //         console.log(params);
        //     }
        //     http.send(params);*/
        //     window.location.href = "./backend/ckle.php?" + params;
        // });
      })();
    </script>

</body>
</html>
