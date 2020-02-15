<?php
//Start the Session
session_start(); //for everyone

//Database details
define('SERVER_NAME','localhost'); //Name of the server.
define('USER_NAME', 'root'); //User name for connecting width database.
define('PASSWORD', 'password'); //Password for connecting width database.

//Decide the database based on parent folder
$dbname = 'music';

define('DATABASE_NAME', $dbname); //Name of the Database.
//Open a connection to the database
if(!(($conn = @mysql_connect(SERVER_NAME, USER_NAME, PASSWORD)) && @mysql_select_db(DATABASE_NAME)))
{
	echo "Error connecting to database. Please contact Administrator.";
	exit(0);
}
?>
