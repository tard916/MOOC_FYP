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
    }else {
        include('../mainHeader.php');
    }  
?>
    <main role="main" class="container">
        <h1 class="mt-4">My Courses</h1>
        <hr>

        <div class="row">
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100">
                    <a href="newCourse.php" class="m-auto text-dark"><i class="fa fa-plus" aria-hidden="true" style="font-size: 100px;"></i></a>

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
     <!-- This part is for the Footer.-->
     <footer class="footer py-4 bg-dark text-light">
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
</body>
</html>
