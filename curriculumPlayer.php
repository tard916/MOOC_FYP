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

    <main role="main" class="container-fluid">
        <div class="curriculum-player-wrapper row">
            <div class="col-3 p-0">
                <div id="accordion">
                    <div class="card curriculum-player-card">
                        <div class="card-header bg-secondary">
                            <a class="card-link d-block text-white" data-toggle="collapse" href="#week1">Week One</a>
                        </div>
                        <div id="week1" class="collapse show">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a class="curriculum-link text-dark" href="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4">Big Buck Bunny</a></li>
                                <li class="list-group-item"><a class="curriculum-link text-dark" href="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4">For Bigger Escape</a></li>
                                <li class="list-group-item"><a class="curriculum-link text-dark" href="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf">Article 1</a></li>
                            </ul>
                        </div>
                        <div class="card-header bg-secondary">
                            <a class="card-link d-block text-white" data-toggle="collapse" href="#week2">Week Two</a>
                        </div>
                        <div id="week2" class="collapse show">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a class="curriculum-link text-dark" href="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerFun.mp4">For Bigger Fun</a></li>
                                <li class="list-group-item"><a class="curriculum-link text-dark" href="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4">For Bigger Blazes</a></li>
                                <li class="list-group-item"><a class="curriculum-link text-dark" href="http://iwg-gti.org/common_up/iwg-new/document_1481208108.pdf">Article 2</a></li>
                            </ul>
                        </div>
                        <div class="card-header bg-secondary">
                            <a class="card-link d-block text-white" data-toggle="collapse" href="#week3">Week Three</a>
                        </div>
                        <div id="week3" class="collapse show">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a class="curriculum-link text-dark" href="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerJoyrides.mp4">For Bigger Joyrides</a></li>
                                <li class="list-group-item"><a class="curriculum-link text-dark" href="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4">Elephant Dream</a></li>
                                <li class="list-group-item"><a class="curriculum-link text-dark" href="http://www.africau.edu/images/default/sample.pdf">Article 3</a></li>
                            </ul>
                        </div>
                        <div class="card-header bg-secondary">
                            <a class="card-link d-block text-white" data-toggle="collapse" href="#week4">Week Four</a>
                        </div>
                        <div id="week4" class="collapse show">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a class="curriculum-link text-dark" href="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerMeltdowns.mp4">For Bigger Meltdowns</a></li>
                                <li class="list-group-item"><a class="curriculum-link text-dark" href="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/Sintel.mp4">Sintel</a></li>
                                <li class="list-group-item"><a class="curriculum-link text-dark" href="http://www.cviproject.eu/wp-content/uploads/2016/06/dummyPDF.pdf">Article 4</a></li>
                            </ul>
                        </div>
                        <div class="card-header bg-secondary">
                            <a class="card-link d-block text-white" data-toggle="collapse" href="#week5">Week Five</a>
                        </div>
                        <div id="week5" class="collapse show">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a class="curriculum-link text-dark" href="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/SubaruOutbackOnStreetAndDirt.mp4">Subaru Outback On Street And Dirt</a></li>
                                <li class="list-group-item"><a class="curriculum-link text-dark" href="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/TearsOfSteel.mp4">Tears of Steel</a></li>
                                <li class="list-group-item"><a class="curriculum-link text-dark" href="http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf">Article 5</a></li>
                            </ul>
                        </div>
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
