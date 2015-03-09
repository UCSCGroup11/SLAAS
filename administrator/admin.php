<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	
	<link href="css/social-buttons.css" rel="stylesheet">
	<link href="css/sb-admin-2.css" rel="stylesheet">
	<title>Administrator</title>
	<link rel="shortcut icon" href="logo.png" alt="Sri Lanka Association for Advancement of Science">
</head>
<style>
.dashbord{
	background-color:#2DCC70;
	font-color:#FFFFFF;
}
</style>
<?php
	session_start();
	$adminname=$_SESSION["adminname"];
	$adminpassword =$_SESSION["adminpassword"];	
?>

<body>
	<nav class="navbar navbar-default navbar-static-top" role="navigation">
		<div class="navbar-header">
				<a id="logo" class="pull-left" href="../index.php"><img src="logo.png"></a>
                <a class="navbar-brand" href="admin.php">Administrator</a>
        </div>
		<ul class="nav nav-pills navbar-right">
			<li class="dropdown">
				<a href="../index.php">
				<font color="#2DCC70"><span class="glyphicon glyphicon-eye-open"></span>&nbsp View Site </font>
				</a>
				
			</li>
			
			<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<font color="#2DCC70"><span class="glyphicon glyphicon-user"></span>&nbsp <?php echo $adminname;?> <span class="caret"></span>
				</a>
                    <ul class="dropdown-menu ">
                        <li><a href="#">User Profile</a>
                        </li>
                        <li><a href="#"> Settings</a>
                        </li>   
                    </ul></font>
                    <!-- /.dropdown-user -->
                </li>
				<li><a href="logout.php" > Log out</a></li>
		</ul>
	</nav>
	
	
	<div class="col-md-3">
		<div class="well">
			
			<div class="panel panel-default">
				<div class="dashbord"><div class="panel-heading"><font color="#FFFFFF"size="+1"><span class="glyphicon glyphicon-dashboard"></span>&nbspDashboard</font></div></div>
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item"><a href="admin_manager.php"><span class="glyphicon glyphicon-cog"></span>&nbspAdmin Manager</a></li>
						<li class="list-group-item"><a href="user_manager.php"><span class="glyphicon glyphicon-user"></span>&nbspUser Manager</a></li>
						<li class="list-group-item"><a href="forum_manager.php"><span class="glyphicon glyphicon-pencil"></span>&nbspForum Manager</a></li>
						<li class="list-group-item"><a href="media_manager.php"><span class="glyphicon glyphicon-camera"></span>&nbspMedia Manager</a></li>
						<li class="list-group-item"><a href="media_manager.php"><span class="glyphicon glyphicon-book"></span>&nbspArchive Manager</a></li>
					</ul>
				</div>
			</div>
		
		</div>
	
	
	</div>

	<div class="col-md-8">
		<font size="+3">Dashboard</font>
		<div class="row">
		<div class="col-lg-4 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <font size="+8"><span class="glyphicon glyphicon-user"></span></font>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>New Users!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><span class="glyphicon glyphicon-hand-right"></span></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
<?php		
		$link=mysql_connect("localhost","root","") or die("Sorry. Did not connect");
	mysql_select_db("slaas") or die("Database not found");

	$select="SELECT * FROM library WHERE approve='No'";
	$query=mysql_query($select);

	$count1=mysql_num_rows($query);
	?>	
		<div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <font size="+8"><span class="glyphicon glyphicon-camera"></span></font>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count1;?></div>
                                    <div>New Media items!</div>
                                </div>
                            </div>
                        </div>
                        <a href="media_manager.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><span class="glyphicon glyphicon-hand-right"></span></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
		<?php 
			$post="select * from forum where approve='No'";
			$postres=mysql_query($post);
			$count2=mysql_num_rows($postres);
		?>
		<div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <font size="+8"><span class="glyphicon glyphicon-pencil"></span></font>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count2;?></div>
                                    <div>New Discussions!</div>
                                </div>
                            </div>
                        </div>
                        <a href="forum_manager.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><span class="glyphicon glyphicon-hand-right"></span></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				</div>	
				<div class="row">
				<div class="alert alert-success" role="alert">Last Administrator login
				<span class="badge pull-right">2014-12-29</span></div>
				</div>
				</div>
	
		
	</div>

































</html>