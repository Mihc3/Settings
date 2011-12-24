<?php
error_reporting(0);
include './mysql.php';
include './config.php';

sql_connect();

$game = $_GET['g'];
$build = $_GET['v'];

if (!isset($game) || !isset($build)) header('Location: index.php');

$check = $urls[$game].$build.'/'.$files[$game][0];
if (fopen($check, "r")) {
	$result = mysql_query("SELECT * FROM versions WHERE game='$game' AND build='$build'");
	if (mysql_num_rows($result) == 0)
		mysql_query("INSERT INTO versions (game, build, date, accessed) VALUES ('$game','$build', NOW(), '1')");
	else
		mysql_query("UPDATE versions SET accessed = accessed + 1 WHERE game='$game' AND build='$build'");
} else header('Location: index.php');

echo '<center>';
echo '<a href="index.php">Back to <b>game selection page</b></a><br/><br/>';
echo '<img src="'.$games[$game][2].'" alt="Game selected: <b>'.$games[$game][0].'</b>" /><br/>';
echo '<b>Displaying settings ('.$build.'):</b><br />';
foreach($files[$game] as $file) {
	echo '<a href="'.$urls[$game].$build.'/'.$file.'">'.$file.'</a><br />';
}
echo '<b>MPRO Image Downloader</b><br />';
echo '<a href="hash.php?g='.$game.'&v='.$build.'">Hash'.$games[$game][1].'.txt</a> (save target as,rename to <i>Hash'.$games[$game][1].'.txt</i>)';
echo '</center>';
?>