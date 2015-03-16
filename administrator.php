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
    <?php include"includes/header_administrator.php";?>
    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>Admin Panel</h1>
                         
                </div>

                
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">SLAAS</a> <span class="divider">/</span></li>
                        <li class="active">Admin Panel</li>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            <section id="registration-page" class="container">
                <form class="center" action='' method="POST">
                    <fieldset class="registration-form">
                        <div class="control-group">
                            <!-- Username -->
                             <div class="controls">
                                <input type="text" id="adminname" name="adminname" placeholder="Admin Name" required="required" class="input-xlarge">
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Username -->
                             <div class="controls">
                                <input type="password" id="adminpassword" name="adminpassword" placeholder="Admin Password" required="required" class="input-xlarge">
                            </div>
                        </div>

                        <div class="control-group">
                        <!-- Button -->
                            <div class="controls">
                                <button class="btn btn-success btn-large btn-block" name="submit">Sign In</button>
								</div>
                            
                        </div>

                    </fieldset>
                </form>
										    <?php
        session_start();
        if (isset($_POST["submit"])){
            $aname=$_POST["adminname"];
            $apass=$_POST["adminpassword"];
    
            $link=mysql_connect("localhost","root","") or die("Sorry. Did not connect");
            mysql_select_db("slaas") or die("Database not found");

            $select="SELECT * FROM admin WHERE admin_name='$aname' AND admin_password='$apass'";
            $query=mysql_query($select);

            $check=mysql_num_rows($query);
            echo $check;
    
            if ($check>0){
    
    
                $_SESSION["adminname"]=$aname;
				$_SESSION["adminpassword"]=$apass;
                header("location:administrator/admin.php");
    
            }
            else{
                echo "<center><font color=\"red\" size=\"+2\">Invalid Username or Password</font></center>";
				$d=date("Y/m/d");
				echo $d;
            }
        }
?>
				
				
            </section>
        </div>
    </section>




    <?php include"includes/footer.php";?>

</body>