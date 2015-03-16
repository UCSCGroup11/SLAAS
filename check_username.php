<?php
###### db ##########
$db_username = 'root';
$db_password = '';
$db_name = 'slaas';
$db_host = 'localhost';
################


//check we have username post var
if(isset($_POST["username"]))
{
	//check if its ajax request, exit script if its not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
		die();
	}
	
	//make connection
	$conn = mysql_connect($db_host, $db_username, $db_password)or die('could not connect to database');
	
	//select the db
	mysql_select_db($db_name) or die ("Couldn't select the database");
	
	//trim and lowercase username
	$username =  strtolower(trim($_POST["username"])); 

	//sanitize username
	$username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);

	//check username in db
	$results = mysql_query("SELECT user_id FROM user WHERE user_name='$username'",$conn);
	
	//return total count
	$username_exist = mysql_num_rows($results); //total records
	
	//if value is more than 0, username is not available
	if($username_exist) {
		echo "<p class='text text-error pull-right' style='text-indent: 1em;''>User Name is already exists. Try another.</p>";
		die("");	

	}else{
		die("");
	}
	
	//close db connection
	mysql_close($conn);
}
?>

