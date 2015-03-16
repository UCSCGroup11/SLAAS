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

<div>
<?php
					echo '<br><br><center><table border="1">';
					echo '<tr>';
						echo '<th>First Name</th>';
						echo '<th>Last Name</th>';
						echo '<th>Email</th>';
						echo '<th>Telephone No</th>';
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
							echo '</table></center>';
						
						
							echo '</div>';
					echo '</div>';
			
		
?>	
</div>
</body>
</html>							  