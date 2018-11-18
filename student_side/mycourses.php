<?php
  include('../backend/classes/DB.php');
  include('../backend/classes/Login.php');
  if (Login::isLoggedIn()) {
    //echo 'Logged In!';
    //echo Login::isLoggedIn();
    $outputkey  = Login::isLoggedIn();
    echo "<script>console.log( 'Debug Objects: " . $outputkey . "' );</script>";
    list($user, $key) = explode("_", $outputkey);
    echo "<script>console.log( 'user_type: " . $user . "' );</script>";

    if ($user == 'STD') {
      $user_Name = DB::query('SELECT student_name FROM student WHERE std_uniquID=:outputkey', array(':outputkey'=>$outputkey))[0]['student_name'];
      include('userHeader.php');
      echo "<script>console.log( 'Debug user Objects: " . $user_Name . "' );</script>";
      $cwd= getcwd();
      echo $cwd;
      //echo "<script>console.log( 'cwd: " . $cwd . "' );</script>";
    }
  }else {
      include('../mainHeader.php');
  }  

?>
<main role="main">
<div class="jumbotron jumbotron-header-bar jumbotron-header-bar--tabs jumbotron-header-bar--my-courses">
        <div class="container">
            <div class="jumbotron-header-bar__inner">
                <div>
                    <h1>My Courses</h1>
                </div>
            </div>
            <ul class="nav nav-tabs" role="tablist">
                <li ng-class="{active: viewModel.currentTab == 'learning'}" role="presentation" class="active">
                    <a href="/home/my-courses/learning/" data-purpose="learning-tab" role="tab">
                       All courses
                   </a>
                </li>
                
                    <li ng-class="{active: viewModel.currentTab == 'collections'}" role="presentation">
                        <a href="/home/my-courses/collections/" data-purpose="collections-tab" role="tab">
                            Collections
                        </a>
                    </li>
                
                
                <li ng-class="{active: viewModel.currentTab == 'wishlist'}" role="presentation">
                    <a href="/home/my-courses/wishlist/" data-purpose="wishlist-tab" role="tab">
                       Wishlist
                   </a>
                </li>
                
                <li ng-class="{active: viewModel.currentTab == 'archived'}" role="presentation">
                    <a href="/home/my-courses/archived/" data-purpose="archived-tab" role="tab">
                        Archived
                    </a>
                </li>
            </ul>
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
