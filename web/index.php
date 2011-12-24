<?php
error_reporting(0);
include 'config.php';
include 'mysql.php';
sql_connect();
$game = $_GET['g'];
?>
<html>
<head>
<title>Settings</title>
</head>
<body>
<center>
<?php if(isset($game)) { ?>
<a href="index.php">Back to <b>game selection page</b></a><br/><br/>
<?php }
if(!isset($game)) { ?>
<form name="input" action="" method="get">
Game:&nbsp;
<select name="g">
<?php foreach($games as $key => $value) {
	echo '<option value="'.$key.'">'.$value[0].'</option>';
} ?>
</select>
<input type="submit" value="Submit" />
</form>
<?php
	echo '<table cellpadding=2>';
	foreach($games as $key => $value) {
		$query = "SELECT build, date, accessed FROM versions WHERE game='$key' ORDER BY build DESC LIMIT 1";
		$result = mysql_query($query);		
		while ($row = mysql_fetch_assoc($result))
		{
			echo '<tr>
					<td><img src="'.$images[$key][1].'" height=20 alt="'.$value[0].'" title="'.$value[0].'" /></td>
					<td><a href="list.php?g='.$key.'&v='.$row['build'].'">'.$row['build'].' </a></td>
					<td>Accessed '.$row['accessed'].' times since '.$row['date'].'.</td>
				</tr>';
		}
	}
	echo '</table>';
} else { ?>
<img src="<?php echo $images[$game][0]; ?>" alt="Game selected: <b><?php echo $games[$game][0]; ?></b>" />
<form name="input" action="list.php" method="get">
<input type="hidden" name="g" value="<?php echo $game; ?>">
Game:&nbsp;<input name="game" value="<?php echo $games[$game][0]; ?>" disabled="disabled" /><br/>
Version:&nbsp;<input type="text" name="v" /><br/>
<input type="submit" value="Submit" />
</form>
<?php
	$query = "SELECT build, date, accessed FROM versions WHERE game='$game' ORDER BY date DESC LIMIT 5";
	$result = mysql_query($query);
	echo '<table>';
	while ($row = mysql_fetch_assoc($result))
	{
		echo '<tr><td><a href="list.php?g='.$game.'&v='.$row['build'].'">'.$row['build'].' </a></td><td>Accessed '.$row['accessed'].' times since '.$row['date'].'.</td></tr>';
	}
	echo '</table>';
}
?>
</center>
</body>
</html>