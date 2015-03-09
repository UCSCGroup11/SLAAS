<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	
	<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	 <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/sl-slide.css">
	<title>Forum Manager</title>
	
	<script type="text/javascript">
		function delete_test() {
			return confirm("Do you want to delete this article?");
			}
	</script>
	
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
	
	$link=mysql_connect("localhost","root","") or die("Sorry. Did not connect");
	mysql_select_db("slaas") or die("Database not found");
	
		
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
				<font color="#2DCC70"><span class="glyphicon glyphicon-eye-open"></span>&nbsp View Site
				</font></a>
			</li>
			
			<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<font color="#2DCC70"><span class="glyphicon glyphicon-user"></span>&nbsp<?php echo $adminname;?> <span class="caret"></span>
				</a>
                    <ul class="dropdown-menu ">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
				<a href="admin.php"><div class="dashbord"><div class="panel-heading"><font color="#FFFFFF"size="+1"><span class="glyphicon glyphicon-dashboard"></span>&nbspDashboard </font></div></div></a>
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item"><a href="admin_manager.php"><span class="glyphicon glyphicon-cog"></span>&nbspAdmin Manager</a></li>
						<li class="list-group-item"><a href="user_manager.php"><span class="glyphicon glyphicon-user"></span>&nbspUser Manager</a></li>
						<li class="list-group-item"><span class="glyphicon glyphicon-pencil"></span>&nbspForum Manager</li>
						<li class="list-group-item"><a href="media_manager.php"><span class="glyphicon glyphicon-camera"></span>&nbspMedia Manager</a></li>
						<li class="list-group-item"><a href="media_manager.php"><span class="glyphicon glyphicon-book"></span>&nbspArchive Manager</a></li>
					</ul>
				</div>
			</div>
		
		</div>
	
	
	</div>

	<div class="col-md-8">
		<font size="+1"><span class="glyphicon glyphicon-pencil"></span>&nbsp Forum Manager</font></br>
		 <div class="hero-unit">
			<div class="tabbable tabs-left">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab4" data-toggle="tab">New Posts</a></li>
					<li><a href="#tab5" data-toggle="tab">All posts</a></li>
				</ul>

			<div class="tab-content">
				<div class="tab-pane " id="tab4">
				<table class="table">
				
				<?php
					$post="select * from forum where approve='No'";
					$res=mysql_query($post);
					$count=mysql_num_rows($res);
					
					while($row=mysql_fetch_array($res)){
						$ID=$row["f_id"];
						echo "<tr><td><span class=\"glyphicon glyphicon-hand-right\"></span></td><td>".$row["title"]."</td><td>by</td><td>".$row["user_name"]."</td><td>at</td><td>".$row["p_date"]."</td><td><a  href='post.php?f_id=".urlencode($row['f_id'])." '> view</a></td></tr>";
						
					}
					?>
					</table>
				</div>
				
				<div class="tab-pane" id="tab5" >
					<table class="table">
				
				<?php
					$allpost="select * from forum";
					$allres=mysql_query($allpost);
					
					while($allrow=mysql_fetch_array($allres)){
						echo "<tr><td><span class=\"glyphicon glyphicon-hand-right\"></span></td><td>".$allrow["title"]."</td><td>by</td><td>".$allrow["user_name"]."</td><td>at</td><td>".$allrow["p_date"]."</td><td><a href='allpost.php?af_id=".urlencode($allrow['f_id'])." '>view</a></td></tr>";
						
						}
					
					?>
					</table>
				</div> 
			</div>
		</div>
	</div>
	</div>

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>



































