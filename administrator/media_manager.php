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
	<title>Media Manager</title>
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
				<font color="#2DCC70"><span class="glyphicon glyphicon-eye-open"></span>&nbsp View Site
				</font></a>
			</li>
			
			<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<font color="#2DCC70"><span class="glyphicon glyphicon-user"></span>&nbsp <?php echo $adminname;?> <span class="caret"></span>
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
				<a href="admin.php"><div class="dashbord"><div class="panel-heading"><font color="#FFFFFF"size="+1"><span class="glyphicon glyphicon-dashboard"></span>&nbspDashboard</font></div></div></a>
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item"><a href="admin_manager.php"><span class="glyphicon glyphicon-cog"></span>&nbspAdmin Manager</a></li>
						<li class="list-group-item"><a href="user_manager.php"><span class="glyphicon glyphicon-user"></span>&nbspUser Manager</a></li>
						<li class="list-group-item"><a href="forum_manager.php"><span class="glyphicon glyphicon-pencil"></span>&nbspForum Manager</a></li>
						<li class="list-group-item"><span class="glyphicon glyphicon-camera"></span>&nbspMedia Manager</li>
						<li class="list-group-item"><a href="forum_manager.php"><span class="glyphicon glyphicon-book"></span>&nbspArchive Manager</a></li>
					</ul>
				</div>
			</div>
		
		</div>
	
	
	</div>

	<div class="col-md-8">
		<font size="+1"><span class="glyphicon glyphicon-camera"></span>&nbspMedia Manager</font></br>
		 <div class="hero-unit">
			<div class="tabbable tabs-left">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab3" data-toggle="tab">E-books</a></li>
					<li><a href="#tab4" data-toggle="tab">Videos</a></li>
					<li><a href="#tab5" data-toggle="tab">News Letters</a></li>
					<li><a href="#tab6" data-toggle="tab">Research Papers</a></li>
				</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="tab3">
					<strong>E-books</strong><br><br>
					<ul class="gallery col-4">
					<?php
					$i=0;
	$link=mysql_connect("localhost","root","") or die("Sorry. Did not connect");
	mysql_select_db("slaas") or die("Database not found");
		$search= mysql_query("SELECT * FROM library WHERE item_type='books' and approve='No'" );
		while($row = mysql_fetch_array($search)) {
			$bookname=$row["item_name"];
			$bookpath=$row["item_path"];
			$item_buser=$row["item_user"];
			$num=$i;
			//echo"<li>";
			echo"<div class=\"preview\">
                    <img alt=\" \" src=\"../images/library/books/ebook.png\">
                    <div class=\"overlay\">
                    </div>
                    <div class=\"links\">
                        <a data-toggle=\"modal\" target=\"_blank\" href=\"bookpath\"><i class=\"icon-book\"></i></a><a href=\"#\"><i class=\"icon-download\"></i></a>                                
                    </div>
                </div>
                <div class=\"desc\">
                    <h5>$bookname</h5>
                    <small>Added by <a href\"#\">$item_buser</a></small><br>
					<input class=\"btn btn-success btn-small pull-center\" type=\"submit\" value=\"Approve\" name=$num.'app'>
                </div>";
			//echo"</li>";
			
			
			$i++;
			}
		
	?>	
				</ul>	
				</div>
				
				<div class="tab-pane" id="tab4" >
					<strong>Add Youtube Videos</strong><br><br>
					<form action="" method="POST" enctype="multipart/form-data">
						<table><tr>
						<td>Link</td><td><input type="text" name="link" required="required"></td><tr>
						<tr>		
						<td>Description</td><td><input type="text" name="des" required="required"></td><tr>
						</table>
						<button class="btn btn-success btn-large pull-center" name="add">Add</button>        
					</form>
					
					<?php
					if(isset($_POST["add"])){
						$link=$_POST["link"];
						$des=$_POST["des"];
						$videos=mysql_query("insert into video (link,description) values('$link','$des')");
						}
						?>
				</div> 
				
				<div class="tab-pane" id="tab5">
					<strong>News Letters</strong><br><br>
					<form action="" method="POST" enctype="multipart/form-data">
						<fieldset class="registration-form">
						<table><tr>
						<td>Current Password</td><td><input type="text" name="cpassword" required="required"></td><br></tr>
						<tr>
						<td>New Password</td><td><input type="password" name="npassword" required="required"></td></tr>
						<tr>
						<td>Confirm the New Password&nbsp</td><td><input type="password" name="npassword" required="required"></td></tr>
						</table>
						<input class="btn btn-success btn-large pull-center" type="submit" value="change" name="change">
						</fieldset>
					</form>
				</div>
				
				
				<div class="tab-pane" id="tab6">
					<strong>Research Papers</strong><br><br>
					<form action="" method="POST" enctype="multipart/form-data">
						<fieldset class="registration-form">
						<table><tr>
						<td>Current Password</td><td><input type="text" name="cpassword" required="required"></td><br></tr>
						<tr>
						<td>New Password</td><td><input type="password" name="npassword" required="required"></td></tr>
						<tr>
						<td>Confirm the New Password&nbsp</td><td><input type="password" name="npassword" required="required"></td></tr>
						</table>
						<input class="btn btn-success btn-large pull-center" type="submit" value="change" name="change">
						</fieldset>
					</form>
				</div>
				
			


<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>


































