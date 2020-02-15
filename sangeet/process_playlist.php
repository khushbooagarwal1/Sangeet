<?php
require_once('global.php');
if(!isset($_SESSION['user_id']))
{
	header('Location: login.php');
	exit(0);
}

if(isset($_GET['opt']))
{
	$file_loc = "playlist/".$_SESSION['user_id']."/".$_GET['name'];
	if($_GET['opt'] == "download")
	{	
		if (file_exists($file_loc))
		{
			header("Content-type: application/data");
			header("Content-Disposition: attachment; filename=".$_GET['name']);
			header("Content-Description: Sangeet");
			header('Content-Length: '.filesize($file_loc));
			readfile($file_loc);
		}
	
	}
	if($_GET['opt'] == "delete")
	{
		$query = "DELETE FROM playlist WHERE file_name = '".$_GET['name']."' AND user_id = '".$_SESSION['user_id']."';";
		mysql_query($query, $conn);
		if (file_exists($file_loc))
		{
			unlink($file_loc);
						
		}	
	}
	if($_GET['opt'] == "fav")
	{
		$query1 = "SELECT * FROM playlist WHERE file_name = '".$_GET['name']."' AND user_id = ".$_GET['owner'].";";
		$res1 = mysql_query($query1, $conn);
		$output = mysql_fetch_assoc($res1);	
		$query = "INSERT INTO playlist (user_id, file_name, file_description, share, Date_added, file_type, owner) VALUES(".$_SESSION['user_id'].", '".$output['file_name']."', '".$output['file_description']."', '".$output['share']."', '".$output['Date_added']."', '".$output['file_type']."', ".$output['owner'].");";
		mysql_query($query, $conn);
	}
	if($_GET['opt'] == "share")
	{
		if($_GET['public'] == "Y")
		{
			$query = "UPDATE playlist set share = 'N' WHERE user_id = ".$_SESSION['user_id']." AND file_name = '".$_GET['name']."';";
			mysql_query($query, $conn);
			$id = mysql_insert_id($conn);
		}
		else if($_GET['public'] == "N")
		{
			$query = "UPDATE playlist set share = 'Y' WHERE user_id = ".$_SESSION['user_id']." AND file_name = '".$_GET['name']."';";
			mysql_query($query, $conn);
			$id = mysql_insert_id($conn);
		}
		
		
	}
		
}
header('Location: playlist.php');
exit(0);
?> 
