<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HomePage</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.6.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="jquery-3.4.1.min.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Employee's Page</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="afterlogin.php">Home</a></li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Manage Product
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="AddProduct.php">Add Product</a></br>
                          <a class="dropdown-item" href="DMProduct.php">Delete/Edit Product</a></br>
                          <a class="dropdown-item" href="SearchProduct.php">Search Product</a></br>
                          <a class="dropdown-item" href="AnalysisProduct.php">Analysis Product</a></br>
                        </div>
                    </li>
                        <li><a href="index.php" class="logout">logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="banner" style="background-image: url(background3.jpg);"></div>
                    <div class="carousel-caption">
                        <h2 class="animated bounceInRight" style="animation-delay: 1s">Welcome to</br><span>Employee's</span> Page</h2>
                        <h3 class="animated bounceInLeft" style="animation-delay: 2s">Best Sushi in town!</h3>
                        <p class="animated bounceInRight" style="animation-delay: 3s"><a href="DMProduct.php">Manage Product</a></p>
                    </div>
                </div>
                <div class="item">
                    <div class="banner" style="background-image: url(background.jpg);"></div>
                    <div class="carousel-caption">
                        <h2 class="animated slideInDown" style="animation-delay: 1s">Located in<span> Blacksburg VA</span></h2>
                        <p class="animated zoomIn" style="animation-delay: 2s"><a href="https://www.google.com/maps/place/Green's+Grill+%26+Sushi+Bar/@37.2303224,-80.417712,17z/data=!3m1!4b1!4m5!3m4!1s0x884d95749bc73b9d:0x79198171e827b699!8m2!3d37.2303224!4d-80.4155233">Find us</a></p>
                    </div>
                </div>
                <div class="item">
                    <div class="banner" style="background-image: url(background2.jpg);"></div>
                    <div class="carousel-caption">
                        <h2 class="animated zoomIn" style="animation-delay: 1s">We Have <span>Many</span> Options</h2>
                        <h3 class="animated fadeInLeft" style="animation-delay: 2s">Large Quantity & Cheap price</h3>
                        <p class="animated zoomIn" style="animation-delay: 3s"><a href="#">Menu</a></p>
                    </div>
                </div>

            </div>

            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </header>

    </div>


</body>
</html>