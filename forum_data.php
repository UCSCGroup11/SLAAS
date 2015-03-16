<!DOCTYPE html>

<html class="no-js"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Administration | SLAAS</title>
    <meta name="description" content="Sri Lanka Association for Advancement of Science">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">

    <script src="js/vendor/jquery-1.9.1.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- favicon and touch icons -->
    <link rel="shortcut icon" href="images/ico/logo.png" alt="Sri Lanka Association for Advancement of Science">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
    <?php include"includes/admin_header.php";?>
    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>Admin Panel</h1>
                         
                </div>

                
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">SLAAS</a> <span class="divider">/</span></li>
                        <li class="active">User Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

 
<div class="hero-unit">
  <div class="tabbable tabs-left">
  	<ul class="nav nav-tabs">
	    <li class="active">
	        <a href="#tab1" data-toggle="tab">All posts</a></li>
	    <li>
	        <a href="#tab2" data-toggle="tab">Delete a post</a></li>
	  <!--  <li>
	        <a href="#tab3" data-toggle="tab">Add a Member</a></li>
	    <li>
	        <a href="#tab4" data-toggle="tab">Remove a Member</a></li>
	    <li>
	        <a href="#tab5" data-toggle="tab">Make an Admin</a></li>-->
    </ul>

  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
    	<section id="portfolio" class="container main"> 
    	<ul class="gallery col-2">
			<div>
				<?php
					echo '<br><br><center><table border="2">';
					echo '<tr>';
						echo '<th>Added by</th>';
						echo '<th>Title</th>';
						echo '<th>Content</th>';
						echo '<th>Date</th>';
						echo '<th>Reply</th>';
					echo '</tr>';
						mysql_connect("localhost","root","") or die ("Can't connect to the server");
						mysql_select_db("slaas") or die ("Can't connect to the database");

						$search= mysql_query("SELECT * FROM forum " );
						while($row = mysql_fetch_array($search)) {
							
							
							$addedby=$row["user_name"];
							$title=$row["title"];
							$post=$row["post"];
							$date=$row["p_date"];
							$reply=$row["reply"];
						
							
							
									
									echo '<tr>';
										
										
										echo '<td>';
											echo $addedby;
										echo '</td>';
										
										echo '<td>';
											echo $title;
										echo '</td>';
															
										echo '<td>';
											echo $post;
										echo '</td>';
										
										echo '<td>';
											echo $date;
										echo '</td>';
										
										echo '<td>';
											echo $reply;
										echo '</td>';
										
									echo '</tr>';
								
								
							
						
						}
							echo '</table></center>';
						
						
							echo '</div>';
					echo '</div>';
			
				?>	
			</div>
			</section>
			</ul>
<!--
		</div>
		<div class="tab-pane" id="tab2">
			 <p>Member Details</p>
    	</div>
    	<div class="tab-pane" id="tab3">
    		<p>Member Details</p>
    	</div>
    	<div class="tab-pane" id="tab4">
    		<p>Member Details</p>
    	</div>
    	<div class="tab-pane" id="tab5">
    		<p>Member Details</p>
    	</div>-->
	</div>
    </div>
	</div>



</body>
</html>							  