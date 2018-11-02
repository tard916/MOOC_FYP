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
      include('userHeader.php');
      echo "<script>console.log( 'Debug Objects: " . $user_Name . "' );</script>";
    }
    if ($user == 'STD') {
      $user_Name = DB::query('SELECT student_name FROM student WHERE std_uniquID=:outputkey', array(':outputkey'=>$outputkey))[0]['student_name'];
      include('userHeader.php');
      echo "<script>console.log( 'Debug Objects: " . $user_Name . "' );</script>";
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
                <p><a class="btn btn-lg btn-primary" href="becomeaninstrutor.php" role="button">Become an instrutor</a></p>
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

    <!--This part is for the course content part. -->
    <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body">
                <h1>C programming</h1>
                    <br />
                    <h5>Rahimi Diallo</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body">
                <h1>C programming</h1>
                    <br />
                    <h5>Rahimi Diallo</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body">
                <h1>C programming</h1>
                    <br />
                    <h5>Rahimi Diallo</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body">
                <h1>C programming</h1>
                    <br />
                    <h5>Rahimi Diallo</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body">
                <h1>C programming</h1>
                    <br />
                    <h5>Rahimi Diallo</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body">
                    <h1>C programming</h1>
                        <br />
                    <h5>Rahimi Diallo</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body">
                <h1>C programming</h1>
                    <br />
                    <h5>Rahimi Diallo</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body">
                    <h1>C programming</h1>
                        <br />
                    <h5>Rahimi Diallo</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body">
                    <h1>C programming</h1>
                    <br/>
                    <h5>Rahimi Diallo</h5>
                  <div class="d-flex justify-content-between align-items-center">

                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

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
              <form method="POST" action="backend/login.php">
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" require>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1"  require>
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
              <form method="POST" action="backend/signup.php">
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="fullName" placeholder="Full Name" aria-label="Full Name" aria-describedby="basic-addon1" require>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" require>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1"  require>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" name="verpassword" placeholder="Re-enter Password" aria-label="Re-enter Password" aria-describedby="basic-addon1"  require>
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
              <form method="POST" action="backend/instructorSignup.php">
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="fullName" placeholder="Full Name" aria-label="Full Name" aria-describedby="basic-addon1" require>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" require>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1"  require>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" name="verpassword" placeholder="Re-enter Password" aria-label="Re-enter Password" aria-describedby="basic-addon1"  require>
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

  <footer class="text-muted footer">
      <div class="container">
      <p class="float-right ">
          <a class="cprTxt" href="#">Back to top</a>
      </p>
      <p class="cprTxt"> &copy;2018 HELP-MOOC</p>

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

</body>
</html>
