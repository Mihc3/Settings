<!-- Copyright (c) Settings (https://github.com/Mihapro/Settings) -->
<?php
include 'include/config.php';
include 'include/functions.php';
include 'include/mysql.php';

include 'header.php';

sql_connect();

$game = (isset($_GET['g']) ? $_GET['g'] : null);
$build = (isset($_GET['v']) ? $_GET['v'] : null);

/*if(!is_null($game)) {
	echo '<title>'.$games[$game][0].' settings</title>';
	echo '<div id="navigation">Back to: <a href="index.php">game selection</a>'.(!is_null($build) ? ', <a href="index.php?g='.$game.'">build listing</a>' : '').'</div>';
}*/
if(is_null($game)) {	
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
					<td>Accessed '.$row['accessed'].' '.($row['accessed'] == 1 ? 'time' : 'times').' since '.$row['date'].'.</td>
				</tr>';
		}
	}
	echo '</table>';
} elseif(is_null($build)) {
	// Game logo
	echo '<div><img src="'.$images[$game][0].'" height=110 alt="Game selected: <b>'.$games[$game][0].'</div>';
	// Input form
	echo '<div style="padding:3px;">
			<form name="build" method="get">
				<input type="hidden" name="g" value="'.$game.'">
				<center><table>
				<tr><td align=right>Game:</td><td><b>'.$games[$game][0].'</b> (<a href="index.php">change</a>)</td></tr>
				<tr><td align=right>Build:</td><td><input type="text" name="v" size="11" /></td></tr>
				</table></center>
				<input type="submit" value="Submit" />
			</form>
		</div>';
	// Listing known build numbers
	$query = "SELECT build, date, accessed FROM versions WHERE game='$game' ORDER BY date DESC LIMIT 5";
	$result = mysql_query($query);
	echo '<center><table cellpadding=2>';
	while ($row = mysql_fetch_assoc($result)) {
		echo '<tr><td><a href="index.php?g='.$game.'&v='.$row['build'].'">'.$row['build'].' </a></td><td>Accessed '.$row['accessed'].' '.($row['accessed'] == 1 ? 'time' : 'times').' since '.$row['date'].'.</td></tr>';
	}
	echo '</table></center>';
} else { // both $game and $build are set
	$check = $urls[$game].$build.'/'.$files[$game][0];
	if($game == 3) {
		if(!file_exists($check)) {
			header('Location: ?');
			return;
		}
	} else {
		$xml = simplexml_load_file($check);
		if (!$xml || $xml->getName() == 'Error') {
			header('Location: index.php');
			return;
		}
	}
	
	$result = mysql_query("SELECT * FROM versions WHERE game='$game' AND build='$build'");
	if (mysql_num_rows($result) == 0)
		mysql_query("INSERT INTO versions (game, build, date, accessed) VALUES ('$game','$build', NOW(), '1')");
	else
		mysql_query("UPDATE versions SET accessed = accessed + 1 WHERE game='$game' AND build='$build'");

	echo '<img src="'.$images[$game][0].'" height=110 alt="Game selected: <b>'.$games[$game][0].'</b>" /><br/>';
	echo '<center><table>
			<tr><td align=right>Game:</td><td><b>'.$games[$game][0].'</b> (<a class="gray" href="index.php">change</a>)</td></tr>
			<tr><td align=right>Build:</td><td><b>'.$build.'</b> (<a class="gray" href="index.php?g='.$game.'">change</a>)</td></tr>
		</table></center>';
		
	if (in_array($game,$game_messages)) echo '<div><center><font size=2>'.$game_messages[$game].'</font></center></div>';
	echo '<center><table cellpadding=2><tr><td><center>';
	foreach ($files[$game] as $i => $file) {
		echo '<a href="'.assemble_link($game,$build,$file,$urls).'">'.$file.'</a>';
		if ($i < count($files[$game])-1) echo ', ';
	}
	echo '</center></td></tr>';
	echo '</table></center>';
	echo '<center><table>
			<tr><th>MPRO Image Downloader</th></tr>
			<tr><td>'.(in_array($game,$hash_unavailable) ? '<font color=red>Not available: </font>'.($hash_unavailable[$game] ? $hash_unavailable[$game] : '<no message given>') : '<a href="hash.php?g='.$game.'&v='.$build.'">Hash'.$games[$game][1].'.txt</a> (save target as, rename to <i>Hash'.$games[$game][1].'.txt</i>)').'</td></tr>
		</table></center>';
}

include 'footer.php';
?>