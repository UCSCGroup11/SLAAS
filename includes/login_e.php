 <html>
<head>
	<link href="../cxx/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/sl-slide.css">
	
	

</head>

<?php
session_start();
if (isset($_POST["login"])){
	$username=$_POST["username"];
	$pass=$_POST["pass"];
	
	$link=mysql_connect("localhost","root","") or die("Sorry. Did not connect");
	mysql_select_db("slaas") or die("Database not found");

	$select="SELECT * FROM user WHERE user_name='$username' AND password='$pass'";
	$query=mysql_query($select);

	$check=mysql_num_rows($query);
	echo $check;
	
	if ($check>0){
	
	
	$_SESSION["username"]=$username;
	header("location:../index.php");
	
	}
	
	



echo"<div class=\"well\">
	<center>
        <h4>Login Form</h4>
		<h3><font color=\"red\">Invalid username or password</font></h3>
		
		
	 
    <!--Modal Body-->
        <form  action=\"\" method=\"post\" id=\"form-login\">
            <input type=\"text\" class=\"input-small\" placeholder=\"Username\" name=\"username\" required=\"required\"><br>
            <input type=\"password\" class=\"input-small\" placeholder=\"Password\" name=\"pass\" required=\"required\"><br>
            <label class=\"checkbox\">
                <input type=\"checkbox\"> Remember me
            </label>
            <button type=\"submit\" class=\"btn btn-primary\" name=\"login\">Sign in</button>
        </form>
        <a href=\"#\">Forgot your password?</a>
    </center>
    <!--/Modal Body-->
</div>";
}
?>