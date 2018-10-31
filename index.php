<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to our MOOC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">

    <!--This is the google Arvo font and font-awesome-->
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
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
                <ul class="nav navbar-nav pull-sm-left">
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

                <ul class="navbar-nav mx-auto">

                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for Courses" aria-label="Recipient's username" aria-describedby="button-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                </ul>

                <ul class="navbar-nav mx-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="becomeaninstrutor.php">Become an instrutor <span class="sr-only">(current)</span></a>
                    </li>
                </ul>

                <ul class="nav navbar-nav pull-sm-right">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign Up</a>
                    </li>
                </ul>

            </div>
        </nav>
    </header>

<main role="main">

    <!--This part is for the Carousel slide -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide img-fluid" src="./src/images/bg/bg1.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1 class="text-uppercase slideT">Inspiration.</h1>
                <p>Education is the most powerful weapon for changing the world.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide img-fluid" src="./src/images/bg/bg2.jpg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1 class="text-uppercase slideT">Develop your skills.</h1>
                <p>Learning is the eyes of the mind.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Log In</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide img-fluid" src="./src/images/bg/bg3.jpg" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1 class="text-uppercase slideT">Help Change The World.</h1>
                <p>Shear your knowlege by teaching people around the world.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Become an instrutor</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>

    <!--This part is for the course content part. -->
    <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body">
                <h1>C programming</h1>
                    <br />
                    <h5>Rahimi Diallo</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body">
                <h1>C programming</h1>
                    <br />
                    <h5>Rahimi Diallo</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body">
                <h1>C programming</h1>
                    <br />
                    <h5>Rahimi Diallo</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body">
                <h1>C programming</h1>
                    <br />
                    <h5>Rahimi Diallo</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body">
                <h1>C programming</h1>
                    <br />
                    <h5>Rahimi Diallo</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body">
                    <h1>C programming</h1>
                        <br />
                    <h5>Rahimi Diallo</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body">
                <h1>C programming</h1>
                    <br />
                    <h5>Rahimi Diallo</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body">
                    <h1>C programming</h1>
                        <br />
                    <h5>Rahimi Diallo</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="./src/images/sample2.jpg" alt="Card image cap">
                <div class="card-body">
                    <h1>C programming</h1>
                    <br/>
                    <h5>Rahimi Diallo</h5>
                  <div class="d-flex justify-content-between align-items-center">

                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

</main>

<footer class="text-muted footer">
    <div class="container">
    <p class="float-right ">
        <a class="cprTxt" href="#">Back to top</a>
    </p>
    <p class="cprTxt"> &copy;2018 HELP-MOOC</p>

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

</body>
</html>
