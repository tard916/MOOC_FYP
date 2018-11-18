<?php
  include('./backend/classes/DB.php');
  include('./backend/classes/Login.php');
  if (Login::isLoggedIn()) {
    //echo 'Logged In!';
    //echo Login::isLoggedIn();
    $outputkey  = Login::isLoggedIn();
    list($user, $key) = explode("_", $outputkey);

    if ($user == 'STD') {
      $user_Name = DB::query('SELECT student_name FROM student WHERE std_uniquID=:outputkey', array(':outputkey'=>$outputkey))[0]['student_name'];
      include('userHeader.php');
      $cwd= getcwd();
      //echo $cwd;
      //echo "<script>console.log( 'cwd: " . $cwd . "' );</script>";
    }
  }else {
      include('../mainHeader.php');
  }

?>
<main role="main" class="container">
    <h1 class="mt-4">My Courses</h1>
    <hr>

    <div class="row">
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body pb-0">
                    <h5 class="card-title mb-4">Learn Photoshop CS6 from Scratch</h5>

                    <h6 class="card-subtitle mb-4 text-muted">Rahimi Diallo</h6>
                      <p>Rating: 4.3 <small class="text-muted">(174)</small><small class="text-muted pull-right mt-1">14 weeks</small></p>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body pb-0">
                    <h5 class="card-title mb-4">Learn Photoshop CS6 from Scratch</h5>

                    <h6 class="card-subtitle mb-4 text-muted">Rahimi Diallo</h6>
                      <p>Rating: 4.3 <small class="text-muted">(174)</small><small class="text-muted pull-right mt-1">14 weeks</small></p>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body pb-0">
                    <h5 class="card-title mb-4">Learn Photoshop CS6 from Scratch</h5>

                    <h6 class="card-subtitle mb-4 text-muted">Rahimi Diallo</h6>
                      <p>Rating: 4.3 <small class="text-muted">(174)</small><small class="text-muted pull-right mt-1">14 weeks</small></p>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body pb-0">
                    <h5 class="card-title mb-4">Learn Photoshop CS6 from Scratch</h5>

                    <h6 class="card-subtitle mb-4 text-muted">Rahimi Diallo</h6>
                      <p>Rating: 4.3 <small class="text-muted">(174)</small><small class="text-muted pull-right mt-1">14 weeks</small></p>

                </div>
            </div>
        </div>
    </div>
</main>

<!--This part is for the footer section -->
<footer class="text-muted footer">
      <div class="container">
      <p class="float-right ">
          <a class="cprTxt" href="#">Back to top</a>
      </p>
      <p class="cprTxt"> &copy;2018 HELP-MOOC</p>

      </div>
  </footer>
  <!--This part is for the footer section -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/MOOC/MOOC_FYP/js/bootstrap.min.js"></script>

</body>
</html>
