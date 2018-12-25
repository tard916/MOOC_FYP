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
        <div class="col-md-10 col-lg-8 mx-auto">
            <h1 class="mt-4 text-center">Create New Course</h1>
            <form class="" action="backend/createCourse.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp" placeholder="e.g. Learn Photoshop CS6 from Scratch" required>
                    <small id="titleHelp" class="form-text text-muted">Maximum 50 characters</small>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>

                    <select class="form-control" id="category" name="category">
                    <?php
                        $select_cat = DB::query('SELECT * FROM category');
                        foreach ($select_cat as $value) {

                    ?>
                        <option value="<?php echo $value['id']?>"><?php echo $value['category_name']?></option>
                    <?php
                        }
                    ?>
                    </select>

                </div>

                <div class="form-group">
                    <label for="startDate">Starts on</label>
                    <input type="date"  name="date" class="form-control" id="startDate" required>
                </div>

                <div class="form-group">
                    <label for="duration">Duration (No. of weeks)</label>
                    <input class="form-control" name="duration" type="number" min="1" max="14" id="duration" required>
                    <small id="DurationHelp" class="form-text text-muted">The course duration should be 1-14 weeks</small>
                </div>

                <div class="form-group">
                    <label for="Pre-requirment">Pre-requirment</label>
                    <input type="text" class="form-control" name="Pre-requirment" id="title" aria-describedby="titleHelp" placeholder="e.g. Learn Photoshop CS6 from Scratch" required>
                    <small id="titleHelp" class="form-text text-muted">Maximum 50 characters</small>
                </div>

                <div class="form-group">
                    <label for="Learning_Outcome">Learning Outcome</label>
                    <input type="text" class="form-control" name="Learning_Outcome" id="title" aria-describedby="titleHelp" placeholder="e.g. Learn Photoshop CS6 from Scratch" required>
                    <small id="titleHelp" class="form-text text-muted">Maximum 50 characters</small>
                </div>

                <div class="form-group">
                    <label for="Description">Description</label>
                    <input type="text" class="form-control" name="Description" id="title" aria-describedby="titleHelp" placeholder="e.g. Learn Photoshop CS6 from Scratch" required>
                    <small id="titleHelp" class="form-text text-muted">Maximum 50 characters</small>
                </div>

                <div class="form-group">
                    <label for="coverPic">Cover Picture</label>
                    <input type="file" class="form-control-file" name="file" id="coverPic" accept="image/jpeg, image/png" required>
                </div>

               <!-- <div class="form-group">
                    <label for="description">Description</label>
                    <input type="file" class="form-control-file" id="description" accept=".doc,.docx,.pdf" required>
                </div>-->
                <button type="submit" name="createCourse" class="btn btn-outline-primary btn-block my-5">Continue</button>
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
    <script type="text/javascript">
    $(function(){
        var dt = new Date();
        dt.setTime(dt.getTime() + (24 * 60 * 60 * 1000)); //tomorrow
        var month = dt.getMonth() + 1;
        var day = dt.getDate();
        var year = dt.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        var minDate = year + '-' + month + '-' + day;
        $('#startDate').attr('min', minDate);
    });
    </script>
</body>
</html>
