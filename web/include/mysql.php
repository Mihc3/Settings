<!-- Copyright (c) Settings (https://github.com/Mihapro/Settings) -->
<?php

// Database Configuration
$db_host = "localhost";  // Server
$db_user = "";  // Username
$db_pass = "";  // Password
$db_name = "";  // Database

function sql_connect()
{
	global $db_host, $db_user, $db_pass, $db_name, $ldb_name, $adb_name;
	mysql_connect($db_host,$db_user,$db_pass);
	mysql_select_db($db_name);
}

?>

