<?php
    include('./backend/classes/DB.php');
    include('./backend/classes/Login.php');
    $weekID = $_GET['weekID'];
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
  
    <div class="weeklyContent" >

        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Week ID</th>
                    <th scope="col">Content ID</th>
                    <th scope="col">File Name</th>
                    <th scope="col">File Type</th>
                    <th scope="col">Course ID</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $weekContents = DB::query('SELECT * FROM course_cirriculum WHERE course_id =:courseID and week_number =:weekID',
                 array(':courseID'=>$courseID, ':weekID'=>$weekID));

                foreach ($weekContents as $value) {
                    
            ?>
                <tr>
                    <th class="weekid" scope="row"><?php echo $value['week_number'];?></th>
                    <th class="id" scope="row"><?php echo $value['id'];?></th>
                    <td><?php echo $value['file_name'];?></td>
                    <td><?php echo $value['type'];?></td>
                    <td class="courseid"><?php echo $value['course_id'];?></td>
                    <td>                    
                        <?php if($value['status'] == "show") : ?>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-danger btnEditPer"><em class="fa fa-eye-slash"></em>-HIDE</button>
                            </div>
                        <?php else : ?> 
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-warning btnEditPer"><em class="fa fa-eye"></em>-SHOW</button>
                            </div>
                        <?php endif ;?>                     
                      
                    </td>
                </tr>  
            <?php
                    
                }               
            ?>
            </tbody>
            <tfoot>
                 <tr>
                    <th scope="col">Week ID</th>
                    <th scope="col">Content ID</th>
                    <th scope="col">File Name</th>
                    <th scope="col">File Type</th>
                    <th scope="col">Course ID</th>
                    <th scope="col">Actions</th>
                </tr>
            </tfoot>
        </table>
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

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    
    </script>  
   <script type="text/javascript" src="dataTable/datatables.min.js"></script>
   <script type="text/javascript" src="js/getContentID.js"></script>

</body>
</html>
