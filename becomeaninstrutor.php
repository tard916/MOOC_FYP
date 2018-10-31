<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">

    <!--This is the google Arvo font and font-awesome-->
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
</head>
<body>
    <header> 
                <!-- this block is for the navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Navbar content -->
            <a class="navbar-brand active" href="index.php">
                <img src="/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                HELP-MOOC
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
                      <input type="text" class="form-control" placeholder="Search for Courses" aria-label="Recipient's username" aria-describedby="button-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                </ul>

                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item ">
                        <a class="btn btn-danger" href="becomeaninstrutor.php">Become an instrutor <span class="sr-only">(current)</span></a>
                    </li>
                </ul>

                <ul class="nav navbar-nav pull-sm-right">
                    <li class="nav-item mr-lg-1">
                        <a class="nav-link" href="login.php">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary" href="signup.php">Sign Up</a>
                    </li>
                </ul>

            </div>
        </nav>
    </header>

    <main role="main">
        <!-- This part is for the single slid image.-->
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src=".../800x400?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1 class="text-uppercase slideT">Help Change The World.</h1>
                            <p>Shear your knowlege by teaching people around the world.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Join Us as Instructor</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
     <!-- This part is for the Footer.-->
    <footer class="text-muted footer">
        <div class="container">
            <p class="float-right ">
                <a class="cprTxt" href="#">Back to top</a>
            </p>
            <p class="cprTxt"> &copy;2018 HELP-MOOC</p>        
        </div>
    </footer>   
    
</body>
</html>