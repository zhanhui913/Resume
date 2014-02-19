<?php
require 'src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
    'appId'  => '605720179505205',
    'secret' => '16c941efa03366774fa4afbd570afa9b',
));

// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
    try {
        // Proceed knowing you have a logged in user who's authenticated.
        $user_profile = $facebook->api('/me');
    } catch (FacebookApiException $e) {
        error_log($e);
        $user = null;
    }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
    $logoutUrl = $facebook->getLogoutUrl();
} else {
    $statusUrl = $facebook->getLoginStatusUrl();
    $loginUrl = $facebook->getLoginUrl();
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>Zhan</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/business-casual.css" rel="stylesheet">
</head>

<body>
<!--
    <div class="brand">Business Casual</div>
    <div class="address-bar">The Plaza | 5483 Start Bootstrap Ave. | Beverly Hills, California 26892 | 555.519.2013</div>
-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Zhan H. Yap</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="bioware.html">CMPUT 250 : Bioware Aurora</a></li>
                            <li><a href="diary.html">CMPUT 301 : Multi-Diary</a></li>
                            <li><a href="kinect.html">CMPUT 302 : Kinect</a></li>
                            <li><a href="3di.html">CMPUT 307 : 3Di Inc</a></li>
                            <li><a href="flickr.html">CMPUT 391 : Flickr</a></li>
                            <li><a href="petrinary.html">CMPUT 401 : Petrinary</a></li>
                            <li class="divider"></li>
                            <li><a href="casualty.html">INTD 450 : Casaulty</a></li>
                            <li class="divider"></li>
                            <li><a href="multimedia.html">EDIT 486 : Interactive Multimedia</a></li>
                        </ul>
                    </li>
                    <li><a href="feature.html">Feature</a>
                    </li>
                    <li><a href="contact.html">Contact</a>
                    </li>
                    <?php
                        if($user){ ?>
    




                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user_profile['name']?>
                                        <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <img src="https://graph.facebook.com/<?php echo $user; ?>/picture?width=100&height=100"
                                                                alt="Alternate Text" class="img-responsive" />
                                                            <p class="text-center small">
                                                                <a href="#">Change Photo</a></p>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <span><?php echo $user_profile['name'];?></span>
                                                            <p class="text-muted small">
                                                                <?php echo $user_profile['username']?></p>
                                                            <div class="divider">
                                                            </div>
                                                            <a href="#" class="btn btn-primary btn-sm active">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="navbar-footer">
                                                    <div class="navbar-footer-content">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <a href="<?php $logoutUrl; $facebook->destroySession(); ?>" class="btn btn-default btn-sm pull-right">Sign Out</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>






                        <?php }else { ?>
                            <li><a   data-toggle="modal" href="#loginModal">Login</a>
                            </li>                            
                        <?php }
                    ?>

                </ul>
            </div>

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/slide-1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/slide-2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/slide-3.jpg" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2>
                        <small>Welcome to</small>
                    </h2>
                    <h1>
                        <span class="brand-name">Zhan's Resume</span>
                    </h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>By <strong>Zhan H. Yap</strong></small>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Build a website that's <strong>awesome!</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-sm-4">
                    <img class="img-responsive img-border img-left" src="img/intro-pic.jpg" alt="">
                </div>    
                <div class="col-lg-8">
                    <p>Petrinary is a social media website where pet owners can register their pets to create a profile and interact with other pets to go on walks, etc.</p>
                    <p>With this, you can also earn points when you walk your pets, take any vaccination shots, complete profiles.</p>
                    <p>We also have a vets profile so that vets can perform routine checks and vaccinations and assign points to a pet.</p>
                </div> 
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Beautiful boxes <strong>to showcase your content</strong>
                    </h2>
                    <hr>

                    <!-- Login Modal -->
                   <div  class="modal fade bs-modal-sm" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" style="width: 310px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <center><h4 class="modal-title" id="myModalLabel">Login</h4></center>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action='' name="login_form">
                                        <center>
                                            <p><input type="text" style="width: 100%" class="span3" name="eid" id="email" placeholder="Username"></p>
                                            <p><input type="password" style="width: 100%" class="span3" name="passwd" placeholder="Password"></p>
                                            <button type="submit" style="width: 100%" class="btn btn-primary">Sign in</button>
                                        </center>
                                    </form>
                                    <hr/>
                                    <center>
                                        <h4>OR</h4>

                                        <input type="btn btn-lg btn-facebook btn-block" onclick="location.href('<?php echo $loginUrl; ?>');" value="Facebook">
                                        
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Company 2014</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
    // Activates the Carousel
    $('.carousel').carousel({
        interval: 5000
    })
    </script>



</body>

</html>
