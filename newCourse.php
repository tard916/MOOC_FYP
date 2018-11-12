<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Become an instrutor </title>
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
            <a class="navbar-brand " href="index.php">
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
                        <a class="btn btn-danger active" href="becomeaninstrutor.php">Become an instrutor <span class="sr-only">(current)</span></a>
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

    <main role="main" class="container">
        <div class="col-md-10 col-lg-8 mx-auto">
            <h1 class="mt-4 text-center">Create New Course</h1>
            <form class="" action="backend/createCourse.php" method="post">

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="e.g. Learn Photoshop CS6 from Scratch" required>
                    <small id="titleHelp" class="form-text text-muted">Maximum 50 characters</small>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category">
                        <option>IT</option>
                        <option>Business</option>
                        <option>Marketing</option>
                        <option>Music</option>
                        <option>Lifestyle</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="startDate">Starts on</label>
                    <input type="date" class="form-control" id="startDate" required>
                </div>

                <div class="form-group">
                    <label for="duration">Duration (No. of weeks)</label>
                    <input class="form-control" type="number" min="1" max="14" id="duration" required>
                    <small id="DurationHelp" class="form-text text-muted">The course duration should be 1-14 weeks</small>
                </div>

                <div class="form-group">
                    <label for="coverPic">Cover Picture</label>
                    <input type="file" class="form-control-file" id="coverPic" accept="image/jpeg, image/png" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="file" class="form-control-file" id="description" accept=".doc,.docx,.pdf" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
    $(function(){
        var dt = new Date();
        dt.setTime(dt.getTime() + (24 * 60 * 60 * 1000)); //tomorrow
        var month = dt.getMonth() + 1;
        var day = dt.getDate();
        var year = dt.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        var minDate = year + '-' + month + '-' + day;
        $('#startDate').attr('min', minDate);
    });
    </script>
</body>
</html>
