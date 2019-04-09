<?php
    include('./backend/classes/DB.php');
    include('./backend/classes/Login.php');
    $courseID = $_GET['cid'];
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

<main role="main" class="container my-courses-wrapper">
    <div class="card-columns">    
      
      <?php
        $courseDuration = DB::query('SELECT duration FROM course WHERE crs_uniqueID =:courseID', array(':courseID'=>$courseID))[0]['duration'];

        for($i = 1; $i<=$courseDuration; $i++){
      ?>
      <a href="manageWeekContent.php?weekID=<?php echo $i ?>&&cid=<?php echo $courseID;?>">
        <div class="card">
            <div class="card-body pb-0">
                <h5 class="card-title mb-4">Week <?php echo $i;?></h5>
                <h5 class="card-text">
                  <small>
                    The week <?php echo $i;?> have () content of type () and (). If you wish to manage please click on the card.
                  </small>                 
                </h5>
            </div>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
      </a>
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
