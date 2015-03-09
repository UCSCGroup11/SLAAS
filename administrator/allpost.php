<?php
$link=mysql_connect("localhost","root","") or die("Sorry. Did not connect");
	mysql_select_db("slaas") or die("Database not found");

if(isset($_GET['af_id'])) {

		$id=$_GET["af_id"];
		echo $id;
		$query2 = "select * FROM forum WHERE f_id = '$id'";
		$result2 = mysql_query($query2);
		$one=mysql_fetch_array($result2);
		echo $one["title"];
		echo $one["user_name"];
		//$mess = "<h4 class=alert_success><center>Article has been deleted. </center></h4>";

		}
		?>
		
		
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
	<script>
	function delete_test() {
		return confirm("Do you want to delete this post?");
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
	
		Post Title :<?php echo $one["title"];?><br> 
		Post :<?php echo $one["post"]; ?> <br>
		Replies :<?php echo $one["reply"];?><br>
		<a class="btn btn-success btn-large pull-center" href="forum_manager.php" >Back</a>
		
	</div>
</html>