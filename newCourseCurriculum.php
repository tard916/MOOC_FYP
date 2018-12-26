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

    <main role="main" class="container curriculum-wrapper">
        <div class="col-md-10 col-lg-8 mx-auto">
            <h1 class="mt-4 text-center">New Course Curriculum</h1>
            <form class="" action="backend/createCourseCurriculum.php" method="post" enctype="multipart/form-data">

                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link d-block text-center" data-toggle="collapse" href="#weekOne">Week 1</a>
                        </div>
                        <div id="weekOne" class="collapse show">
                            <div class="card-body pb-0">
                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label for="resourceFile">Resource File</label>
                                        <input type="file" class="form-control-file" id="resourceFile">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="resourceType">Resource Type</label>
                                        <select id="resourceType" class="form-control form-control-sm">
                                            <option selected>Video Lecture</option>
                                            <option>Quiz</option>
                                            <option>Article</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link d-block text-center" data-toggle="collapse" href="#weekTwo">Week 2</a>
                            </div>
                            <div id="weekTwo" class="collapse">
                                <div class="card-body pb-0">
                                    <div class="form-row">
                                        <div class="form-group col-md-7">
                                            <label for="resourceFile">Resource File</label>
                                            <input type="file" class="form-control-file" id="resourceFile">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="resourceType">Resource Type</label>
                                            <select id="resourceType" class="form-control form-control-sm">
                                                <option selected>Video Lecture</option>
                                                <option>Quiz</option>
                                                <option>Article</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link d-block text-center" data-toggle="collapse" href="#weekThree">Week 3</a>
                            </div>
                            <div id="weekThree" class="collapse">
                                <div class="card-body pb-0">
                                    <div class="form-row">
                                        <div class="form-group col-md-7">
                                            <label for="resourceFile">Resource File</label>
                                            <input type="file" class="form-control-file" id="resourceFile">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="resourceType">Resource Type</label>
                                            <select id="resourceType" class="form-control form-control-sm">
                                                <option selected>Video Lecture</option>
                                                <option>Quiz</option>
                                                <option>Article</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <button type="submit" name="createCourse" class="btn btn-outline-primary btn-block my-5">Create</button>
            </form>
        </div>

    </main>
     <!-- This part is for the Footer.-->
     <footer class="footer py-4 bg-dark text-light ">
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
    <script type="text/javascript"></script>
</body>
</html>
