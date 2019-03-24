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

    <main role="main" class="container-fluid curriculum-player-wrapper" id="<?php echo $courseID; ?>">
        <div class="row">
            <div class="col-3 p-0 h-100">
                <div id="accordion-player">
                    <div class="card curriculum-player-card">

                        <?php
                            $uID = Login::isLoggedIn();
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
                                <li class="list-group-item"><a class="curriculum-link text-dark" id="<?php echo $value['id'];?>" href="<?php echo $value['path']?>"><?php echo $value['title'];?></a></li>
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
            <div class="col-9 p-0 h-100">
                <video id="curriculum-video" class="video-js d-none" controls preload="auto" data-setup='{"responsive": true}'>
                </video>
                <div class="curriculum-article d-none">
                    <embed id="article-src" src="" type="application/pdf" />
                </div>

            </div>
        </div>
    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/video.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var courseID = $("main").attr('id');
            var vidId;
            var player = videojs('curriculum-video');
            $(".curriculum-link").click(function(e){
                vidID = this.id;
                e.preventDefault();
                var src = $(this).attr("href");
                var srcArray = src.split(".");
                if (srcArray[srcArray.length - 1] == "mp4") {
                    player.src({type: "video/mp4", src: src});
                    $("#curriculum-video").removeClass("d-none");
                    $("#article-src").parent().addClass("d-none");
                    //$(".curriculum-quiz").addClass("d-none");
                } else if (srcArray[srcArray.length - 1] == "pdf") {
                    $("#article-src").attr("src", src);
                    $("#article-src").parent().removeClass("d-none");
                    $("#curriculum-video").addClass("d-none");
                   // $(".curriculum-quiz").addClass("d-none");
                } else {
                   // $(".curriculum-quiz").removeClass("d-none");
                    $("#curriculum-video").addClass("d-none");
                    $("#article-src").parent().addClass("d-none");

                }
            });
            videojs('curriculum-video').ready(function(){
                this.on('ended', function() {
                    window.location.href = "./backend/nplayVideo.php?videoID=" + vidID + "&cID=" + courseID, function(){
                        alert('video is done!' + vidID + courseID);
                    };
                });
            });

        });
    </script>

</body>
</html>
