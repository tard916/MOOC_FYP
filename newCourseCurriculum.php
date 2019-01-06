<?php
    include('./backend/classes/DB.php');
    include('./backend/classes/Login.php');
    $courseID = $_GET['cid'];
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
                    <input type="hidden" name="courseID" value="<?php echo $courseID;?>">
                    <?php
                        $courseDuration = DB::query('SELECT duration FROM course WHERE crs_uniqueID =:courseID', array(':courseID'=>$courseID))[0]['duration'];

                        for($i = 1; $i<=$courseDuration; $i++){
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link d-block text-center" data-toggle="collapse" href="#week<?php echo $i;?>">Week <?php echo $i;?></a>
                            <input type="hidden" name="weekID<?php echo $i;?>" value="<?php echo $i;?>">
                        </div>
                        <div id="week<?php echo $i;?>" class="collapse">
                            <div class="card-body">
                                <div class="form-row align-items-center">
                                    <div class="form-group col-md-7">
                                        <label for="resourceFile">Resource File</label>
                                        <input type="file" class="form-control-file" id="resourceFile" name="fileName<?php echo $i;?>[]">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="resourceType">Resource Type</label>
                                        <select id="resourceType" class="form-control form-control-sm" name="fileType<?php echo $i;?>[]">
                                            <option value="Video" selected>Video</option>
                                            <option value="Quiz">Quiz</option>
                                            <option value="Article">Article</option>
                                        </select>
                                    </div>
                                </div>
                                <a href="#" class="add-resource btn btn-outline-dark btn-block"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php
                }?>
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
    <script type="text/javascript">
    $(document).ready(function(){
        var newResourceHTML =
        '<div class="form-row align-items-center">' +
            '<div class="form-group col-md-7">' +
                '<label for="resourceFile">Resource File</label>' +
                '<input type="file" class="form-control-file" id="resourceFile">' +
            '</div>' +
            '<div class="form-group col-md-3">' +
                '<label for="resourceType">Resource Type</label>' +
                '<select id="resourceType" class="form-control form-control-sm">' +
                    '<option selected>Video Lecture</option>' +
                    '<option>Quiz</option>' +
                    '<option>Article</option>' +
                '</select>' +
            '</div>' +
            '<div class="form-group offset-md-1 col-md-1">' +
                '<a href="#" class="remove-resource btn btn-outline-danger pull-right"><i class="fa fa-remove"></i></a>' +
            '</div>' +
        '</div>';

        $(".add-resource").click(function(e){
            e.preventDefault();
            var weekID = $(this).parent().parent().attr('id').replace("week", "");
            var formRow =   $(document.createElement("div")).addClass('form-row align-items-center');
            var formGroup7= $(document.createElement("div")).addClass('form-group col-md-7').appendTo(formRow);
                            $(document.createElement("label")).attr('for', 'resourceFile').text('Resource File').appendTo(formGroup7);
                            $(document.createElement("input")).attr({type: "file",id: "resourceFile", name: "fileName"+weekID+"[]"}).addClass('form-control-file').appendTo(formGroup7);
            var formGroup3= $(document.createElement("div")).addClass('form-group col-md-3').appendTo(formRow);
                            $(document.createElement("label")).attr('for', 'resourceType').text('Resource Type').appendTo(formGroup3);
            var select =    $(document.createElement("select")).attr({id: "resourceType", name: "fileType"+weekID+"[]"}).addClass('form-control form-control-sm').appendTo(formGroup3);
                            $(document.createElement("option")).text('Video').appendTo(select);
                            $(document.createElement("option")).text('Quiz').appendTo(select);
                            $(document.createElement("option")).text('Article').appendTo(select);
            var removerDiv= $(document.createElement("div")).addClass('form-group offset-md-1 col-md-1').appendTo(formRow);
            var removeBtn = $(document.createElement("a")).attr('href', '#').addClass('remove-resource btn btn-outline-danger pull-right').appendTo(removerDiv).click(function(e){e.preventDefault();$(this).parent().parent().remove();});
                            $(document.createElement("i")).addClass('fa fa-remove').appendTo(removeBtn);
            $(this).before(formRow);
        });
    });
    </script>
</body>
</html>
