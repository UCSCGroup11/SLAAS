<?php

$date=date("Y-m-d");
session_start();
$link=mysql_connect("localhost","root","") or die("Sorry. Did not connect");
	mysql_select_db("slaas") or die("Database not found");
	$adminname=$_SESSION["adminname"];
	$sql="update admin set last_login='$date' where admin_name='$adminname'";
	$quer=mysql_query($sql);



if(isset($_SESSION["adminname"])){
	unset($_SESSION["adminname"]);
}
header("location:../administrator.php");
?>