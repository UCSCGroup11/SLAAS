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
	<title>User Manager</title>
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
						<li class="list-group-item"><span class="glyphicon glyphicon-user"></span>&nbspUser Manager</li>
						<li class="list-group-item"><a href="forum_manager.php"><span class="glyphicon glyphicon-pencil"></span>&nbspForum Manager</a></li>
						<li class="list-group-item"><a href="media_manager.php"><span class="glyphicon glyphicon-camera"></span>&nbspMedia Manager</a></li>
						<li class="list-group-item"><a href="media_manager.php"><span class="glyphicon glyphicon-book"></span>&nbspArchive Manager</a></li>
					</ul>
				</div>
			</div>
		
		</div>
	
	
	</div>

	<div class="col-md-8">
		<font size="+1"><span class="glyphicon glyphicon-user"></span>&nbsp User Manager</font></br>
		 <div class="hero-unit">
			<div class="tabbable tabs-left">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab4" data-toggle="tab">All Users</a></li>
					<li><a href="#tab5" data-toggle="tab">Members</a></li>
				</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="tab4">
					<div class="panel panel-default">
					<div class="panel-heading"><strong>All Users</strong><br><br></div>
					<div class="panel-body">
					<table class="table" >
					<?php

					echo '<tr>';
						echo '<th>First Name&nbsp&nbsp</th>';
						echo '<th>Last Name&nbsp&nbsp</th>';
						echo '<th>Email&nbsp&nbsp</th>';
						echo '<th>Telephone No&nbsp&nbsp</th>';
						echo '<th>Address</th>';
					echo '</tr>';
						mysql_connect("localhost","root","") or die ("Can't connect to the server");
						mysql_select_db("slaas") or die ("Can't connect to the database");

						$search= mysql_query("SELECT * FROM user " );
						while($row = mysql_fetch_array($search)) {
							
							
							$fname=$row["first_name"];
							$lname=$row["last_name"];
							$email=$row["email"];
							$telnum=$row["tel_num"];
							$address=$row["address"];
						
							
							
									
									echo '<tr>';
										
										
										echo '<td>';
											echo $fname;
										echo '</td>';
										
										echo '<td>';
											echo $lname;
										echo '</td>';
															
										echo '<td>';
											echo $email;
										echo '</td>';
										
										echo '<td>';
											echo $telnum;
										echo '</td>';
										
										echo '<td>';
											echo $address;
										echo '</td>';
										
									echo '</tr>';
								
								
							
						
						}
						
	?>					
					</table>
						</div>
						</div>
						
				
			
		

				</div>	
					
				
				
				<div class="tab-pane" id="tab5" >
					<strong>Add New Admin</strong><br><br>
					<form action="" method="POST" enctype="multipart/form-data">
						<table><tr>
						<td>Admin Username </td><td><input type="text" name="admin" required="required"></td><tr>
						<tr>		
						<td>Password </td><td><input type="password" name="adminpass" required="required"></td><tr>
						<tr>
						<td>Confirm Password &nbsp</td><td><input type="password" name="adminpass" required="required"></td><tr>
						</table>
						<input class="btn btn-success btn-large pull-center" type="submit" value="Add" name="add">        
					</form>
				</div> 
			</div>


<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>


































