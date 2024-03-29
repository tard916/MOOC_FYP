<?php
    include('./backend/classes/DB.php');
    include('./backend/classes/Login.php');
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
?>
    <main role="main" class="container my-courses-wrapper">
        <h1 class="mt-4">Pending Courses</h1>
        <hr>

        <div class="row">

            <?php
                $status = "pending";
                $select_course = DB::query('SELECT * FROM course WHERE status =:status', array(':status'=>$status));
                foreach ($select_course as $value) {
                    $imagePath = $value['course_path_fol'].'/'.$value['course_image'];
                    //echo $imagePath;
                    //newCourseCurriculum.php?cid=<?php echo $value['crs_uniqueID'];
            ?>
                <div class="col-md-4 col-sm-6 mb-4">
                    <a href="adminCourse.php?cid=<?php echo $value['crs_uniqueID']?>">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo $imagePath;?>" alt="Card image cap">
                            <div class="card-body pb-0">
                                <h5 class="card-title mb-4"><?php echo $value['course_name'];?></h5>
                                <?php
                                    $ins_uniquID = $value['instructor_id'];
                                    $retrieve_the_instructor = DB::query('SELECT instructor_name FROM instructor where ins_uniquID= :ins_uniquID',array(':ins_uniquID'=>$ins_uniquID))[0]['instructor_name'];
                                ?>
                                <h6 class="card-subtitle mb-4 text-muted"><?php echo $retrieve_the_instructor;?></h6>
                                <p>Rating: 0.0 <small class="text-muted">(0)</small><small class="text-muted pull-right mt-1"><?php echo $value['duration'];?> weeks</small></p>

                            </div>
                        </div>
                    </a>
                </div>
            <?php
                }
            ?>
        </div>
    </main>
     <!-- This part is for the Footer.-->
     <footer class="footer py-4 bg-dark text-light">
         <div class="container">
         <span class="cprTxt"> &copy;2019 HELP-MOOC</span>
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
