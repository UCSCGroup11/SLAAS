<!DOCTYPE html>

<html class="no-js"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Home | SLAAS</title>
    <meta name="description" content="Sri Lanka Association for Advancement of Science">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- favicon and touch icons -->
    <link rel="shortcut icon" href="images/ico/logo.png" alt="Sri Lanka Association for Advancement of Science">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>
	<!-- include header and login form-->
    <?php include"includes/login_e.php";?>
	<?php include"includes/login_form.php";?>
   <?php include"includes/header.php"; ?> 
   <!-- myslass and signup buttons -->
    <?php
		if(!isset($_SESSION["username"])){
			echo"<div class=\"row-fluid\">
					<div class=\"span3\" align=\"right\">
						<a class=\"btn btn-success btn-large pull-center\" data-toggle=\"modal\" href=\"#loginForm\">My SLAAS</a>
						<a class=\"btn btn-success btn-large pull-center\" href=\"../SLAAS/registration.php\">Sign Up</a>
					</div>
				</div>";
			}
		else{
			echo"<div class=\"row-fluid\">
					<div class=\"span3\" align=\"right\">
						<a class=\"btn btn-success btn-large pull-center\" href=\"user.php\">My SLAAS</a>
					</div>
				</div>";
			}
			?>
	<!--end-my slass and login form-->		
    <!--Slider-->
    <section id="slide-show">
     <div id="slider" class="sl-slider-wrapper">

        <!--Slider Items-->    
        <div class="sl-slider">
            <!--Slider Item1-->
            <div class="sl-slide item1" data-orientation="horizontal" data-slice1-rotation="" data-slice2-rotation="" data-slice1-scale="2" data-slice2-scale="2">
                <div class="sl-slide-inner">
                    <div class="container">
                        <img class="pull-right" src="images/sample/slider/img8.jpg" alt="" />
                        <h2>Membership</h2>
                        <h3 class="gap"></h3>
                        <a class="btn btn-large btn-transparent" href="membership.php">Learn More</a>
                    </div>
                </div>
            </div>
            <!--/Slider Item1-->

            <!--Slider Item2-->
            <div class="sl-slide item2" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="20" data-slice1-scale="1.5" data-slice2-scale="1.5">
                <div class="sl-slide-inner">
                    <div class="container">
                        <img class="pull-right" src="images/sample/slider/img3.jpg" alt="" />
                        <h2>Events &amp; News</h2>
                        <h3 class="gap"></h3>
                        <a class="btn btn-large btn-transparent" href="about_us.php">Learn More</a>
                    </div>
                </div>
            </div>
            <!--Slider Item2-->

            <!--Slider Item3-->
            <div class="sl-slide item3" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                   <div class="container">
                    <img class="pull-right" src="images/sample/slider/img2.gif" alt="" />
                    <h2>Digital Library</h2>
                    <h3 class="gap"></h3>
                    <a class="btn btn-large btn-transparent" href="index.php">Learn More</a>
                </div>
            </div>
        </div>
        <!--Slider Item3-->

    </div>
    <!--/Slider Items-->

    <!--Slider Next Prev button-->
    <nav id="nav-arrows" class="nav-arrows">
        <span class="nav-arrow-prev"><i class="icon-angle-left"></i></span>
        <span class="nav-arrow-next"><i class="icon-angle-right"></i></span> 
    </nav>
    <!--/Slider Next Prev button-->

</div>
<!-- /slider-wrapper -->           
</section>
<!--/Slider-->

<section class="main-info">
    <div class="container">
        <div class="row-fluid">
            <div class="span4">
                    <div class="left">
                        <i style="font-size: 48px" ></i>
                        <p> </p>
                        <h4>Objectives</h4>
                        <ul>
                            <li>Promotion and advancement of science</li>
                            <li>Systematic direction of scientific inquiry in the interest of the Country</li>
                            <li>Dissemination of scientific knowledge and promotion of discussion</li>
                            <li>Encouragement of contact within the scientific community</li>
                        </ul>
                    </div>
                </div>

                <div class="span4">
                    <div class="left">
                        <i style="font-size: 48px" ></i>
                        <p> </p>
                        <h4>Structure and Management</h4>
                        <p><b>Sri Lanka Association for the Advancement of Science</b> consists of Foundation Members, Members, Life Members, Corporate Members, Associate Members, Session Members and Student Members.

                        The Council of the SLAAS comprising 30 elected and ex-officio members acts in the name of and on behalf of the Association in all matters.

                        There are three Special Statutory Committees, seven Sectional Committees, six Statutory Committees & several other Committees to carry out wide range of activities to fulfill the objectives of the Association. All Members of Council and Special, Sectional, Statutory & Other Committees serve in an honorary capacity.</p>
                    </div>
                </div>
                
                <div class="span4">
                    <div class="left">
                        <i style="font-size: 48px"></i>
                        <p> </p>
                        <h4>Discussions</h4>
                        <iframe src="postWindow.php" width="360" height="230px"></iframe>
                    </div>
                </div>
            
            
        </div>
    </div>
</section>
<?php include"includes/footer.php"; ?>

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- Required javascript files for Slider -->
<script src="js/jquery.ba-cond.min.js"></script>
<script src="js/jquery.slitslider.js"></script>
<!-- /Required javascript files for Slider -->

<!-- SL Slider -->
<script type="text/javascript"> 
$(function() {
    var Page = (function() {

        var $navArrows = $( '#nav-arrows' ),
        slitslider = $( '#slider' ).slitslider( {
            autoplay : true
        } ),

        init = function() {
            initEvents();
        },
        initEvents = function() {
            $navArrows.children( ':last' ).on( 'click', function() {
                slitslider.next();
                return false;
            });

            $navArrows.children( ':first' ).on( 'click', function() {
                slitslider.previous();
                return false;
            });
        };

        return { init : init };

    })();

    Page.init();
});
</script>
<!-- /SL Slider -->
</body>
</html>