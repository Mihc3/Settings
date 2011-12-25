<html>
<head>
</head>
<body>
<center>
<?php
error_reporting(0);
include 'include/mysql.php';
include 'include/config.php';

sql_connect();

$game = $_GET['g'];
$build = $_GET['v'];

if (!isset($game) || !isset($build)) header('Location: index.php');

echo '<title>'.$games[$game][0].' settings</title>';

$check = $urls[$game].$build.'/'.$files[$game][0];
if (fopen($check, "r")) {
	$result = mysql_query("SELECT * FROM versions WHERE game='$game' AND build='$build'");
	if (mysql_num_rows($result) == 0)
		mysql_query("INSERT INTO versions (game, build, date, accessed) VALUES ('$game','$build', NOW(), '1')");
	else
		mysql_query("UPDATE versions SET accessed = accessed + 1 WHERE game='$game' AND build='$build'");
} else header('Location: index.php');

echo '<a href="index.php">Back to <b>game selection page</b></a><br/><br/>';
echo '<img src="'.$images[$game][0].'" height=110 alt="Game selected: <b>'.$games[$game][0].'</b>" /><br/>';
echo '<table width=350 cellpadding=2>';
echo '<tr><th>'.$games[$game][0].' files ('.$build.')</th></tr>';
if ($game == 3) echo "<tr><td><center><font size=2><i>Save target/page as <b>*.xml</b></i> file and open it with your text editor.</font></center></td></tr>";
foreach($files[$game] as $file) {
	echo '<tr><td><a href="'.($game == 3 ? 'decode.php?g='.$game.'&v='.$build.'&f='.$file : $urls[$game].$build.'/'.$file).'">'.$file.'</a></td></tr>';
}
echo '<tr><th>MPRO Image Downloader</th></tr>
		<tr><td>'.($game == 3 ? '<font color=red>not available</font>' : '<a href="hash.php?g='.$game.'&v='.$build.'">Hash'.$games[$game][1].'.txt</a> (save target as, rename to <i>Hash'.$games[$game][1].'.txt</i>)').'</td></tr>
	<table>';
?>
</center>
</body>
</html>