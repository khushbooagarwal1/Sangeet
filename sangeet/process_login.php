<?php
//Include Global Settings
require_once('global.php');
$login_error = ''; //Initialize

//Check form posted
if(isset($_POST['login']) )
{
	//Check username & password from database
	$query = "SELECT * FROM user_detail WHERE email = '".$_POST['email']."' AND password = '".$_POST['password']."';";
	//echo $query; //Uncomment to print query
	$res = mysql_query($query, $conn) or die(mysql_error());
	if(mysql_num_rows($res) != 0) //i.e. user is authenticated
	{
		//Get the database row
		$row = mysql_fetch_assoc($res);
		//Store logged in user's info in session
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['first_name'] = $row['first_name'];
		$_SESSION['last_name'] = $row['last_name'];
		$_SESSION['email_addr'] = $row['email'];

		//Redirect to home page
		header('Location: index.php');
		exit(0);
	}
	else
	{	
		$_SESSION['error']=3;
	}
}
	header('Location: login.php');
?>
