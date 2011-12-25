<?php

// Set the password for 'empty_db.php' file.
//$password = "1234"; NOT SUPPORTED YET

// Database Configuration
$db_host = "localhost";  // Server
$db_user = "root";  // Username
$db_pass = "emo";  // Password
$db_name = "web";  // Database

function sql_connect()
{
	global $db_host, $db_user, $db_pass, $db_name, $ldb_name, $adb_name;
	mysql_connect($db_host,$db_user,$db_pass);
	mysql_select_db($db_name);
}

?>

