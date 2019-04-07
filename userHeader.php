<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to our MOOC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- videojs CSS -->
    <link href="css/video-js.min.css" rel="stylesheet">

    <!--This is the google Arvo font and font-awesome-->
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">

    <!-- Star Rating CSS -->
    <link href="css/star-rating.min.css" rel="stylesheet">
    <link href="css/theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">


</head>
<body>
    <header>
        <!-- this block is for the navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Navbar content -->
            <a class="navbar-brand active" href="index.php">
                <img src="./src/images/logo/logo.png"  height="30" class="d-inline-block align-top" alt="">
                MOOC
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownC" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-list-ul"></i>
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php 
                                $category = DB::query('SELECT * FROM category');
                                foreach ($category as  $value) {
                                   
                            ?>
                                <a class="dropdown-item" href="index.php?categoryID=<?php echo $value['id']?>"><?php echo $value['category_name'];?></a>
                            <?php  
                                }
                            ?>
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav mx-auto col-lg-4  mt-2 mt-lg-0">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for Courses" aria-label="Search for Courses" aria-describedby="button-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                </ul>
                <form id="loginEvent">
                    <?php if(isset($user_ID)) {?>
                        <input type="hidden" name="std_ID" id="userIDValue" value="<?php echo $user_ID;?>">
                    <?php }?>
                    <ul class="nav navbar-nav pull-sm-right">
                        <li class="nav-item dropdown">
                            <button class="btn btn-outline-primary" type="submit" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $user_Name;?></button>
                            <!-- <a class="btn btn-outline-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            </a> -->
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="studentCourses.php">My Courses</a>
                                <a class="dropdown-item" href="allCourses.php">Explore Courses</a>
                                <a class="dropdown-item" href="#">Help</a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                            </div>
                        </li>
                    </ul>

                </form>
            </div>
        </nav>
    </header>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="logoutModalLabel">Logout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <p>Are you sure you'd like to logout?</p>
              <form action="logout.php" method="post">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="alldevices" name="alldevices" id="alldevices">
                      <label class="form-check-label" for="alldevices">
                           Logout of all devices?
                      </label>
                  </div>
                  <button type="submit" name="confirm" class="btn btn-primary btn-block mt-4">Confirm</button>
              </form>
          </div>
        </div>
      </div>
    </div>
