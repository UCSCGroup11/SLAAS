<!DOCTYPE html>


<html class="no-js"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Registration | SLAAS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/ico/logo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

<style type="text/css">
  input[type=radio] {
    margin:10px 10px 0
}
</style>
    
</head>

<body>  

<?php include"includes/login_e.php";?>
<?php include"includes/login_form.php";?>
<?php include"includes/header.php"; ?>

  <section class="title">
    <div class="container">
      <div class="row-fluid">
        <div class="span6">
          <h1>Registration</h1>
        </div>
        <div class="span6">
          <ul class="breadcrumb pull-right">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li><a href="#">My SLAAS</a> <span class="divider">/</span></li>
            <li class="active">Registration</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- / .title -->       


  <section id="registration-page" class="container">    
    <form name="registration" class="center" action='' onsubmit="return validateForm()" method="POST">
      <fieldset class="registration-form">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="control-group">
          <!-- Username -->
          <div class="controls">
            <input type="text" id="username" name="username" placeholder="Username" required="required" class="input-xlarge">                       
          </div>
          <div><span id="user-result" class="pull-left"></span></div>
          <div><p class="text text-error" id="uName_err"></p></div>
        </div>

        <div class="control-group">
          <!-- First Name -->
          <div class="controls">
            <input type="text" id="firstname" name="firstname" placeholder="First Name" class="input-xlarge">
          </div>
          <div><p class="text text-error" id="fName_err"></p></div>
        </div>

        <div class="control-group">
          <!-- Last Name -->
          <div class="controls">
            <input type="text" id="lastname" name="lastname" placeholder="Last Name" class="input-xlarge">
          </div>
          <div><p class="text text-error" id="lName_err"></p></div>
        </div>

        <div class="control-group">
          <!-- Gender--> 
          <label>
            <input type="radio" id="sex" name="sex" value="Male" class="input-xlarge">
            &nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" id="sex" name="sex" value="Female" class="input-xlarge"> 
            &nbsp;Female&nbsp;&nbsp;
          </label>
        </div>      
        
        <div class="control-group">
          <!-- Password-->
          <div class="controls">
            <input type="password" id="password" name="password" placeholder="Password" class="input-xlarge">
          </div>
          <div><p class="text text-error" id="pwd_err"></p></div>
        </div>

        <div class="control-group">
          <!-- Password -->
          <div class="controls">
            <input type="password" id="password_confirm" name="password_confirm" placeholder="Password (Confirm)" class="input-xlarge">
          </div>
          <div><p class="text text-error" id="cpwd_err"></p></div>
        </div>

        <div class="control-group">
          <!-- E-mail -->
          <div class="controls">
            <input type="email" id="email" name="email" placeholder="E-mail" class="input-xlarge">
          </div>
          <div><p class="text text-error" id="email_err"></p></div>
        </div>

        <div class="control-group">
          <!-- Telephone Number -->
          <div class="controls">
            <input type="text" id="phoneno" name="phoneno" placeholder="Mobile Number" class="input-xlarge">
          </div>
          <div><p class="text text-error" id="phoneNum_err"></p></div>
        </div>

        <div class="control-group">
          <!-- Address -->
          <div class="controls">
            <input type="text" id="address" name="address" placeholder="Address" class="input-xlarge">
          </div>
          <div><p class="text text-error" id="address_err"></p></div>
        </div>
     
        <div class="control-group">
          <!-- Button -->
          <div class="controls">
            <button class="btn btn-success btn-large btn-block" name="submit">Register</button>
          </div>
        </div>
      </fieldset>
    </div>
    <div class="col-md-2">
    </div>
    </form>
  </section>
  <!-- /#registration-page -->
<?php
	if(isset($_POST["submit"])){
  $uname=$_POST["username"];
  $fname=$_POST["firstname"];
  $lname=$_POST["lastname"];
  $gender=$_POST["sex"];
  $pword=$_POST["password"];
  $email=$_POST["email"];
  $pno=$_POST["phoneno"];
  $add=$_POST["address"];

  $link=mysql_connect("localhost","root","") or die("Sorry. Did not connect");
  mysql_select_db("slaas") or die("Database not found");
  $sql="INSERT INTO user(user_name,first_name,last_name,gender,password,email,tel_num,address,photo)
  VALUES ('$uname','$fname','$lname', '$gender', '$pword','$email','$pno','$add','photos/def.jpg')";
  mysql_query($sql,$link);
  
  mysql_close($link);
}
?>

<?php include"includes/footer.php";?> 

    <script src="js/jquery.min.js"></script>
    <script src="js/vendor/jquery-1.9.1.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js1/validate.js"></script>
    <script src="js1/valid.js"></script>


</body>
</html>
