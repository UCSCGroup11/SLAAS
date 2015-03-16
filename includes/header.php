 <!--Header-->
 <?php




?>
    <header class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a id="logo" class="pull-left" href="index.php"></a>
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li class="dropdown">
                            <a href="about_us.php" >About Us</i></a>
                        </li>
                        <li class="dropdown">
                            <a href="sections.php" class="dropdown-toggle" data-toggle="dropdown">Sections <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="">Section A</a></li>
                                <li><a href="">Section B</a></li>
                                <li><a href="">Section C</a></li>
                                <li><a href="">Section D</a></li>
                                <li><a href="">Section E1</a></li>
                                <li><a href="">Section E2</a></li>
                                <li><a href="">Section E3</a></li>
                                <li><a href="">Section F</a></li>
                            </ul>
                        </li>
                        <li><a href="membership.php">Membership</a></li>
                        <?php 
							if(isset($_SESSION["username"])){
							echo"<li class=\"dropdown\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Digital Library <i class=\"icon-angle-down\"></i></a>
                            <ul class=\"dropdown-menu\">
                                <li><a href=\"library.php\">Documents</a></li>
                                <li><a href=\"video.php\">Video Gallery</a></li>
                                <li><a href=\"image.php\">Image Gallery</a></li>
                                <li><a href=\"archive.php\">Archive</a></li>
                                
                            </ul>
                        </li>";
						}
						?>
                        <li><a href="forum.php">Forum</a></li> 
                        <li><a href="contact-us.php">Contact</a></li></ul>
						<!-- newly added by dhanushka  -->
						<?php
						if(!isset($_SESSION["username"])){
							echo "<ul class=\"nav\"><li class=\"login\">
                            <a data-toggle=\"modal\" href=\"#loginForm\"><i class=\"icon-lock\"></i></a>
                        </li></ul>";
							}
							else{
							$username=$_SESSION["username"];
							echo "<ul class=\"nav\">
								<span class=\"glyphicon glyphicon-user\"></span>
									<li class=\"dropdown\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">$username <i class=\"icon-angle-down\"></i></a>
                            <ul class=\"dropdown-menu\">
                                <li><a href=\"./user.php\">My Account</a></li>
                                <li><a href=\"./logot.php\">Log Out</a></li>
                            </ul>
                        </li>
								</ul>";
							
						}
						?>
						<!-- end of adding item-->
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </header>
    <!-- /header -->