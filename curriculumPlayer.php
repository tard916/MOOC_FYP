<?php
  include('./backend/classes/DB.php');
  include('./backend/classes/Login.php');
  $courseID = $_GET['crs_UniqueID'];
  if (Login::isLoggedIn()) {
    //echo 'Logged In!';
    //echo Login::isLoggedIn();
    $outputkey  = Login::isLoggedIn();
    list($user, $key) = explode("_", $outputkey);

    if ($user == 'STD') {
      $user_Name = DB::query('SELECT student_name FROM student WHERE std_uniquID=:outputkey', array(':outputkey'=>$outputkey))[0]['student_name'];
      include('userHeader.php');
         
    }
  }else {
      include('../mainHeader.php');
  }

?>

    <main role="main" class="container-fluid">
        <div class="curriculum-player-wrapper row">
            <div class="col-3 p-0">
                <div id="accordion">
                    <div class="card curriculum-player-card">

                        <?php
                            $courseDuration = DB::query('SELECT duration FROM course WHERE crs_uniqueID =:courseID', array(':courseID'=>$courseID))[0]['duration'];
                            for($i = 1; $i<=$courseDuration; $i++){
                        ?>
                        <div class="card-header bg-secondary">
                            <a class="card-link d-block text-white" data-toggle="collapse" href="#week<?php echo $i;?>">Week <?php echo $i;?></a>
                        </div>
                            
                        <div id="week<?php echo $i;?>" class="collapse show">
                            <ul class="list-group list-group-flush">
                                <?php    
                                    $crriculum = DB::query('SELECT * FROM course_cirriculum WHERE week_number = :id AND course_id= :courseID', array(':id'=>$i, ':courseID'=>$courseID));
                                    foreach ($crriculum as $value) { 
                                ?>
                                <li class="list-group-item"><a class="curriculum-link text-dark" href="<?php echo $value['path']?>"><?php echo $value['title'];?></a></li>
                                    <?php 
                                        }
                                    ?>
                            </ul>
                        </div> 
                        <?php                            
                            }
                        ?>                       
                    </div>
                </div>
            </div>
            <div class="col-9 p-0">
                <video id="curriculum-video" class="video-js d-none" controls preload="auto" data-setup='{"responsive": true}'>
                </video>
                <div class="curriculum-article d-none">
                    <embed id="article-src" src="" type="application/pdf" width="100%" height="100%" />
                </div>
            </div>
        </div>
    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/video.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var player = videojs('curriculum-video');

            $(".curriculum-link").click(function(e){
                e.preventDefault();
                var src = $(this).attr("href");
                var srcArray = src.split(".");
                if (srcArray[srcArray.length - 1] == "mp4") {
                    player.src({type: "video/mp4", src: src});
                    $("#curriculum-video").removeClass("d-none");
                    $("#article-src").parent().addClass("d-none");
                } else {
                    $("#article-src").attr("src", src);
                    $("#article-src").parent().removeClass("d-none");
                    $("#curriculum-video").addClass("d-none");
                }
            });
        });
    </script>

</body>
</html>
