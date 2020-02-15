<?php
require_once('global.php');
if(!isset($_SESSION['user_id']))
{
	header('Location: login.php');
	exit(0);
}
$_SESSION['error'] = 0;
if(isset($_POST["submit"]))
{
	$target_file = basename($_FILES['file']['name']);
	$ext = pathinfo($target_file, PATHINFO_EXTENSION);
	if (!file_exists($_FILES['file']['tmp_name']))
	{
		$_SESSION['error'] = 1;
	}
	else if ($_FILES["file"]["size"] > 10000000){
		$_SESSION['error'] = 2;
	}
	if(isset($_GET['opt']) && $_GET['opt'] == 'profile')
	{
		$target_Path = "assets/img/".$_SESSION['user_id'].".".jpeg;
		if(file_exists("assets/img/".$_SESSION['user_id'].".".jpeg))
		{
			unlink($target_Path);
		}	
		move_uploaded_file( $_FILES['file']['tmp_name'], $target_Path);
		chmod($target_Path, 0777);
		header('Location:profile.php');
		exit(0);
			
	}
	else
	{
		
		$target_file = basename($_FILES["file"]["name"]);
		if($_POST['fname'])
		{
			$fname = $_POST['fname'].".".$ext;		
		}
		else
		{
			$fname = $target_file;
		}
		if(file_exists("playlist/".$_SESSION['user_id']."/".$fname))
		{
			$_SESSION['error'] = 3;
		}
		else
		{
			$directoryName = "./playlist/".$_SESSION['user_id'];
			$target_Path = "playlist/".$_SESSION['user_id']."/".$fname;
			//Check if the directory already exists.
			if(!is_dir($directoryName)){
				//Directory does not exist, so lets create it.
				mkdir($directoryName, 0777, true);
			}
			if (move_uploaded_file( $_FILES['file']['tmp_name'], $target_Path )) {
				chmod($target_Path, 0777);
				$finfo = finfo_open(FILEINFO_MIME_TYPE);
				$mime = finfo_file($finfo, $target_Path);
				$query = "INSERT INTO playlist SET";
				$query .= " user_id = ".$_SESSION['user_id'];
				$query .= ", file_name = '$fname'";
				$query .= ", file_description = '".$_POST['description']."'";
				$query .= ", date_added = '".date("Y/m/d")."'";
				$query .= ", owner = '".$_SESSION['user_id']."'";
				$query .= ", file_type = '".$mime."'";
				$query .= ", share = '".$_POST['share']."';";
				$res = mysql_query($query, $conn);
				$_SESSION['error'] = 0;
				header('Location: playlist.php');				
				exit(0);				
			}
			 else {
				$_SESSION['error'] = 4;
							
			}	
		}
	}
	header('Location: upload.php');
exit(0);				

}
	
?>
