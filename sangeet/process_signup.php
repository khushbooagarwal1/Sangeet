<?php
//Include Global Settings
require_once('global.php');
$login_error = ''; //Initialize
if(isset($_POST['Signup']))
{
	//Check username & password from database
	$query = "SELECT * FROM user_detail WHERE email = '".$_POST['emailaddress']."';";

	$res = mysql_query($query, $conn) or die(mysql_error());
	if(mysql_num_rows($res) != 0) //i.e. user is authenticated
	{
		$_SESSION['error']=1;
		
	}
	else
	{
		$query = "INSERT into user_detail set first_name = '".$_POST['firstname']."' , last_name = '".$_POST['lastname']."', email = '".$_POST['emailaddress']."' , password = '".$_POST['newpassword']."';";
	
	$_SESSION['error']=0;		
	$res = mysql_query($query, $conn);
	}
}
	header('Location: login.php');
?>
