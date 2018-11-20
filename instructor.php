<?php
    include('./backend/classes/DB.php');
    include('./backend/classes/Login.php');
    if (Login::isLoggedIn()) {
      //echo 'Logged In!';
      //echo Login::isLoggedIn();
      $outputkey  = Login::isLoggedIn();
      list($user, $key) = explode("_", $outputkey);

      if ($user == 'INS') {
        $user_Name = DB::query('SELECT instructor_name FROM instructor WHERE ins_uniquID=:outputkey', array(':outputkey'=>$outputkey))[0]['instructor_name'];

        include('./instructorHeader.php');
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

            <?php
                $select_course = DB::query('SELECT * FROM course');
                foreach ($select_course as $value) {                    
            ?>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                        <div class="card-body pb-0">
                            <h5 class="card-title mb-4"><?php echo $value['course_name'];?>Learn Photoshop CS6 from Scratch</h5>
                            <?php
                                $ins_uniquID = $value['instructor_id']; 
                                $retrieve_the_instructor = DB::query('SELECT instructor_name FROM instructor where ins_uniquID= :ins_uniquID',array(':ins_uniquID'=>$ins_uniquID))[0]['instructor_name'];
                            ?>
                            <h6 class="card-subtitle mb-4 text-muted"><?php echo $retrieve_the_instructor;?>Rahimi Diallo</h6>
                            <p>Rating: 4.3 <small class="text-muted">(174)</small><small class="text-muted pull-right mt-1"><?php echo $value['duration'];?> weeks</small></p>

                        </div>
                    </div>
                </div>
            <?php
                }
            ?>            
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

</body>
</html>
