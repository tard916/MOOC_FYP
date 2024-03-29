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
                <img src="./src/images/logo/logo.png" height="30" class="d-inline-block align-top" alt="">
                MOOC
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-list-ul"></i>
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
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

                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item ">
                        <a class="btn btn-danger" data-toggle="modal" href="#becomeInstructorModal">Become an instrutor <span class="sr-only">(current)</span></a>
                    </li>
                </ul>

                <ul class="nav navbar-nav pull-sm-right">
                    <li class="nav-item mr-lg-1">
                        <a class="nav-link" data-toggle="modal" href="#loginModal">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary" data-toggle="modal" href="#signupModal">Sign Up</a>
                    </li>
                </ul>

            </div>
        </nav>
    </header>
