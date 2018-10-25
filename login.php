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
    <link href="css/custome.css" rel="stylesheet">

    <!--This is the google Arvo font and font-awesome-->
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
</head>
<body>
    <header>    
        <!-- this block is for the navbar -->
        <nav class="navbar navbar-expand-lg navbar-light navbar-dark bg-primary">
            <!-- Navbar content -->
            <a class="navbar-brand" href="index.php">
                <img src="/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                HELP-MOOC
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav pull-sm-left">                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="navbar-toggler-icon"></span>
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="becomeaninstrutor.php">Become an instructor <span class="sr-only">(current)</span></a>
                    </li>            
                </ul>

                <ul class="navbar-nav mx-auto">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </ul>

                <ul class="nav navbar-nav pull-sm-right">
                    <li class="nav-item">
                        <a class="nav-link active" href="login.php">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign Up</a>
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
                            <h1 class="text-uppercase slideT">Develop your skills.</h1>
                            <p>Learning is the eyes of the mind.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Log In</a></p>
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