<!-- Copyright (c) Settings (https://github.com/Mihapro/Settings) -->
<?php
//error_reporting(0);
session_start(); 

include '../include/config.php';
include '../include/functions.php';
include '../include/mysql.php';


if (isset($_POST['password'])) $password = $_POST['password'];

if (!isset($admin_password) or $admin_password == "") {
	include '../header.php';
	echo '<div style="padding:5px;">Set the password in <b>include/config.php</b> file first and then refresh this page.';
} elseif (!isset($_SESSION['password'])) { 
	if (!isset($password)) {
		include '../header.php';
		echo '<div class="navigation"><a href="..">Main Page</a> > <b>Admin CP (login)</b></div>';
		?><div style="padding-top:10px;"><form method="POST">
			Password: <input type="password" name="password" size="20"> 
			<input type="submit" value="Login">
		</form></div><?php
	} elseif (empty($password) or $password != $admin_password) {
		include '../header.php';
		echo '<div style="padding:5px;">Incorrect login password. <a href="index.php">Try again?</a></div>';
	} else {
		$_SESSION['password'] = $password;
		include 'redirect-header.php';
		?>Welcome! Page will refresh in 3 seconds. <a href='index.php'>Refresh now!</a><?php
	}
} else {
	sql_connect();
	if (isset($_GET['action'])) {
		switch ($_GET['action']) {
			case 'logout':
				unset($_SESSION['password']);
				include 'redirect-header.php';
				?>You have successfully logged out. Page will refresh in 3 seconds. <a href='index.php'>Refresh now!</a><?php
				break;	
			case 'list':
				if (!isset($_GET['game'])) header('Location: index.php');
				$game = $_GET['game'];
				include '../header.php';
				echo '<div class="navigation"><a href="..">Main Page</a> > <a href="?">Admin CP</a> > <b>'.colored($game,$games,$colors,$colors_enabled).'</b></div>';
				$result = mysql_query("SELECT * FROM versions WHERE game=".$_GET['game']." ORDER BY id DESC"); 
				$num = $result ? mysql_num_rows($result) : 0;
				if($num > 0){
					echo '<center><div style="padding:2px; font-size:8pt;">Builds with highest ID will always appear on top!</div>
							<table width="100%" class=list><tr>
								<th class=list>id</th>
								<th class=list>build</th>
								<th class=list>date</th>
								<th class=list>action</th>
							</tr>';
					while ($build = mysql_fetch_assoc($result)) {
						$i = isset($i) ? $i + 1 : 1;
						$higherIds = mysql_query("SELECT id FROM versions WHERE game=$game AND id>".$build['id']);
						$highestId = mysql_num_rows($higherIds) == 0;
						$lowerIds = mysql_query("SELECT id FROM versions WHERE game=$game AND id<".$build['id']);
						$lowestId = mysql_num_rows($lowerIds) == 0;
						echo '<tr>
								<td style="background-color: '.($i % 2 == 0 ? 'lightblue' : 'white').';" class=list>'.$build['id'].'</td>
								<td style="background-color: '.($i % 2 == 0 ? 'lightblue' : 'white').';" class=list><b>'.$build['build'].'</b></td>
								<td style="background-color: '.($i % 2 == 0 ? 'lightblue' : 'white').';" class=list>'.$build['date'].'</td>
								<td style="background-color: '.($i % 2 == 0 ? 'lightblue' : 'white').';" class=list><b>
									'.($highestId ? '<font color=gray>M&#8593;</font>' : '<a id="m" href="?action=moveup&game='.$_GET['game'].'&id='.$build['id'].'" title="Move up">M&#8593;</a>').'&nbsp;
									'.($lowestId ? '<font color=gray>M&#8595;</font>' : '<a id="m" href="?action=movedown&game='.$_GET['game'].'&id='.$build['id'].'" title="Move down">M&#8595;</a>').'&nbsp;
									<a id="e" href="?action=edit&game='.$_GET['game'].'&id='.$build['id'].'" title="Edit">E</a>&nbsp;
									<a id="d" href="?action=delete&game='.$_GET['game'].'&id='.$build['id'].'" title="Delete">D</a>
								</b></td>
							</tr>';
					}
					echo '</table></center>';
				} else {
					echo 'No builds found.';
				}
				break;
			case 'edit':
				if (!isset($_GET['game']) or !isset($_GET['id'])) header('Location: index.php');
				if (isset($_GET['newbuild'])) {
					mysql_query("UPDATE versions SET build='".$_GET['newbuild']."' WHERE game=".$_GET['game']." AND id=".$_GET['id']);
					header('Location: index.php?action=list&game='.$_GET['game']);
				}
				$result = mysql_query("SELECT build FROM versions WHERE game=".$_GET['game']." AND id=".$_GET['id']);
				$result = mysql_fetch_assoc($result);
				$build = $result['build'];
				$game = $_GET['game'];
				include '../header.php';
				echo '<div class="navigation"><a href="..">Main Page</a> > <a href="?">Admin CP</a> > <a href="index.php?action=list&game='.$_GET['game'].'">'.colored($game,$games,$colors,$colors_enabled).'</a> > <b>Build ID '.$_GET['id'].'</b></div>';
				echo '<center><table>
						<tr><td>
							<form name="edit" method="get">
								<input type="hidden" name="action" value="'.$_GET['action'].'">
								<input type="hidden" name="game" value="'.$_GET['game'].'">
								<input type="hidden" name="id" value="'.$_GET['id'].'">
								<center><table>
								<tr><td align=right>Game:</td><td><b>'.colored($game,$games,$colors,$colors_enabled).'</b></td></tr>
								<tr><td align=right>ID:</td><td><b>'.$_GET['id'].'</b></td></tr>
								<tr><td align=right>Build:</td><td><input type="text" name="newbuild" value="'.$build.'" size="11" /></td></tr>
								</table>
								<input type="submit" value="Edit" /></center>
							</form>
						</td></tr>
					</table></center>';
				break;
			case 'delete':
				if (!isset($_GET['game']) or !isset($_GET['id'])) header('Location: index.php');
				$game = $_GET['game'];
				$id = $_GET['id'];
				mysql_query("DELETE FROM versions WHERE game=$game AND id=$id");
				header('Location: index.php?action=list&game='.$_GET['game']);
				break;
			case 'moveup':
			case 'movedown':
				$moveup = $_GET['action'] == 'moveup';
				if (!isset($_GET['game']) or !isset($_GET['id'])) header('Location: index.php');
				$game = $_GET['game'];
				$id_this = $_GET['id'];
				$result = mysql_query("SELECT * FROM versions WHERE game=$game AND id=$id_this"); 
				$num = mysql_num_rows($result);
				if ($num < 1) header('Location: index.php?error=1');
				$build_this = mysql_fetch_array($result);
				$result = mysql_query("SELECT id FROM versions WHERE game=$game AND id".($moveup ? '>' : '<')."$id_this ORDER BY id ".($moveup ? 'ASC' : 'DESC')." LIMIT 1");
				$num = mysql_num_rows($result);
				if ($num < 1) header('Location: index.php?error=2');
				$build_target = mysql_fetch_assoc($result);
				$id_target = $build_target['id'];
				mysql_query("DELETE FROM versions WHERE game=$game AND id=$id_this");
				mysql_query("UPDATE versions SET id='$id_this' WHERE game=$game AND id=$id_target");
				mysql_query("INSERT INTO versions (game, id, build, date, accessed) VALUES ('$game', '$id_target', '".$build_this['build']."', '".$build_this['date']."','".$build_this['accessed']."')");
				header('Location: index.php?action=list&game='.$game);
				break;
		}
	} elseif (isset($_GET['error'])) {
		include '../header.php';
		switch ($_GET['error']) {
			case 1: echo "ERROR #1: The build you're trying to move was not found."; break;
			case 2: echo "ERROR #2: Cannot find next/previous build."; break;
		}
	} else {
		include '../header.php';
		echo '<div class="navigation"><a href="..">Main Page</a> > <b>Admin CP</b>';
		?><div align="left" style="font-size: 9pt; padding:3px;"><b>MySQL build records:<ul><?php
		foreach ($games as $g_index => $g_name) {
			$result = mysql_query("SELECT * FROM versions WHERE game=$g_index");
			$records = $result ? mysql_num_rows($result) : 0;
			echo '<li><a href="?action=list&game='.$g_index.'">'.colored($g_index,$games,$colors,$colors_enabled).'</a></b> ('.$records.' records)<b></li>';
		}
		?></ul></b></div><?php
	}
}

include '../footer.php';
?>