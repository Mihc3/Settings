<center><?php
// LEAVE THIS FILE, IT'S NOT SUPPORTED YET
error_reporting(0);
include 'mysql.php';
$pass = $_POST['pwd'];
$cnf = $_POST['cnf'];
if (!isset($pass) || $pass != $password || !isset($cnf) || $cnf != 'yes') {
	echo '<form name="input" action="empty_db.php" method="post">
			Password: <input type="password" name="pwd" /> (see <i>config.php</i> file)<br/>
			You are about to empty the <i>versions</i> table. All data will be lost.<br/>
			<input type="checkbox" name="cnf" value="yes" /> I understand. 
			<input type="submit" value="Submit" />
		</form>';
} else {
	$result = mysql_query("SELECT * FROM versions");
	if (mysql_num_rows($result) == 0) {
		echo "Table 'versions' is already empty.";
	} else {
		mysql_query("DELETE FROM versions");
		$result = mysql_query("SELECT * FROM versions");
		echo (mysql_num_rows($result) == 0 ? "Table 'versions' is now empty." : "Table 'versions' is not empty, something went wrong.");
	}
} ?></center>