<!-- Copyright (c) Settings (https://github.com/Mihapro/Settings) -->
<?php
error_reporting(0);
include 'include/config.php';
include 'include/mysql.php';
include 'header.php';

sql_connect();

$game = $_GET['g'];
$build = $_GET['v'];

if(isset($game)) {
	echo '<title>'.$games[$game][0].' settings</title>';
	echo '<div id="navigation">Back to: <a href="index.php">game selection</a>'.(isset($build) ? ', <a href="index.php?g='.$game.'">build listing</a>' : '').'</div>';
}
if(!isset($game)) {	
	echo '<div style="padding:3px;">
			<form name="name" method="get">
				Game:&nbsp;<select name="g">';
	foreach($games as $key => $value) { 
		echo '<option value="'.$key.'">'.$value[0].'</option>';
	} 
	echo '</select><input type="submit" value="Submit" /></form></div>';
	echo '<table cellpadding=2>';
	foreach($games as $key => $value) {
		$query = "SELECT build, date, accessed FROM versions WHERE game='$key' ORDER BY build DESC LIMIT 1";
		$result = mysql_query($query);		
		while ($row = mysql_fetch_assoc($result)) {
			echo '<tr>
					<td><img src="'.$images[$key][1].'" height=20 alt="'.$value[0].'" title="'.$value[0].'" /></td>
					<td><a href="index.php?g='.$key.'&v='.$row['build'].'">'.$row['build'].' </a></td>
					<td>Accessed '.$row['accessed'].' times since '.$row['date'].'.</td>
				</tr>';
		}
	}
	echo '</table>';
} elseif(!isset($build)) {
	// Game logo
	echo '<div><img src="'.$images[$game][0].'" height=110 alt="Game selected: <b>'.$games[$game][0].'</div>';
	// Input form
	echo '<div style="padding:3px;">
			<form name="version" method="get">
				<input type="hidden" name="g" value="'.$game.'">
				<center><table>
				<tr><td>Game:</td><td><b>'.$games[$game][0].'</b></td></tr>
				<tr><td>Version:</td><td><input type="text" name="v" /></td></tr>
				</table></center>
				<input type="submit" value="Submit" />
			</form>
		</div>';
	// Listing known build numbers
	$query = "SELECT build, date, accessed FROM versions WHERE game='$game' ORDER BY date DESC LIMIT 5";
	$result = mysql_query($query);
	echo '<center><table cellpadding=2>';
	while ($row = mysql_fetch_assoc($result)) {
		echo '<tr><td><a href="index.php?g='.$game.'&v='.$row['build'].'">'.$row['build'].' </a></td><td>Accessed '.$row['accessed'].' times since '.$row['date'].'.</td></tr>';
	}
	echo '</table></center>';
} else { // both $game and $build are set
	$check = $urls[$game].$build.'/'.$files[$game][0];
	if (fopen($check, "r")) {
		$result = mysql_query("SELECT * FROM versions WHERE game='$game' AND build='$build'");
		if (mysql_num_rows($result) == 0)
			mysql_query("INSERT INTO versions (game, build, date, accessed) VALUES ('$game','$build', NOW(), '1')");
		else
			mysql_query("UPDATE versions SET accessed = accessed + 1 WHERE game='$game' AND build='$build'");
	} else header('Location: index.php');

	echo '<img src="'.$images[$game][0].'" height=110 alt="Game selected: <b>'.$games[$game][0].'</b>" /><br/>';
	echo '<center><table cellpadding=2>';
	echo '<tr><th>'.$games[$game][0].' files ('.$build.')</th></tr>';
	if ($game_messages[$game]) echo '<tr><td><center><font size=2>'.$game_messages[$game].'</font></center></td></tr>';
	echo '<tr><td><center>';
	foreach($files[$game] as $i => $file) {
		echo '<a href="'.($game == 3 ? 'decode.php?g='.$game.'&v='.$build.'&f='.$file : $urls[$game].$build.'/'.$file).'">'.$file.'</a>';
		if($i < count($files[$game])-1) echo ', ';
	}
	echo '</center></td></tr>';
	echo '</table></center>';
	echo '<center><table>
			<tr><th>MPRO Image Downloader</th></tr>
			<tr><td>'.($game == 3 ? '<font color=red>not available</font>' : '<a href="hash.php?g='.$game.'&v='.$build.'">Hash'.$games[$game][1].'.txt</a> (save target as, rename to <i>Hash'.$games[$game][1].'.txt</i>)').'</td></tr>
		</table></center>';
}
include 'footer.php';
?>