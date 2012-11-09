<?php // Copyright (c) Settings (https://github.com/Mihapro/Settings)
function assemble_link($game,$build,$file,$urls) {
	switch($game) {
		case 3:
			return 'decode.php?g='.$game.'&v='.$build.'&f='.$file;
		default:
			return $urls[$game].$build.'/'.$file;
	}
}

function getTimeAgoString($postdate) {
	$nowdate = strtotime(date("Y:m:d H:i:s"));
	$diff = $nowdate - $postdate;
	
	if ($diff >= 60) {
		$diff = round($diff /= 60);
		if ($diff >= 60) {
			$diff = round($diff /= 60);
			if ($diff >= 24) {
				$diff = round($diff /= 24);
				if ($diff == 1) {
					return $diff." day ago";
				} else {
					return $diff." days ago";
				}
			} else {
				if ($diff == 1) {
					return $diff." hour ago";
				} else {
					return $diff." hours ago";
				}
			}
		} else {
			if ($diff == 1) {
				return $diff." minute ago";
			} else {
				return $diff." minutes ago";
			}
		}
	} else {
		if ($diff == 1) {
			return $diff." second";
		} else {
			return $diff." seconds";
		}
	}
}

function colored($game, $games, $colors, $enabled=true) {
	$game_name = $games[$game][0];
	if(!$enabled || !isset($colors[$game])) return $game_name;
	$i = 0;
	$game_str = '';
	foreach($colors[$game] as $range => $color) {
		$range = explode(":",$range);
		if($i < $range[0]) {
			$game_str .= substr($game_name,$i,$range[0]-$i);
			$i += $range[0]-$i;
		}
		$game_str .= "<font color='$color'>".substr($game_name,$range[0],$range[1]-$range[0]+1)."</font>";
		$i += $range[1]-$range[0]+1;
	}
	return $game_str;
}

function hashes($game,$url) {
	switch ($game) {
		case 0: // CityVille (http://cityvillefb.static.zgncdn.com/42773/gameSettings.xml)
			$lines = file($url);
			foreach ($lines as $line_num => $line) {
				$pos_start = strpos($line,'"assets/');
				if (!$pos_start)
					continue;
				$pos_end = strpos($line,'"',$pos_start+1);
				if (!$pos_end)
					echo "ERROR: URL ending not found (line $line_num)!\n";
				echo substr($line,$pos_start+1,$pos_end-$pos_start-1)."\n";
			}
			
			// (assetIndex)
			$xml = simplexml_load_file($url);	
			echo str_replace(",","",$xml->assetIndex);
			
			break;
		case 1: // Empires & Allies (https://zynga1-a.akamaihd.net/empire/assets/40463/gameSettings.xml)
		case 2: // Treasure Isle (https://assets.treasure.zgncdn.com/prod/v31852/gameSettings.xml)
		case 4: // Adventure Isle (https://zynga1-a.akamaihd.net/adventure/1340/gameSettings.xml)
		case 5: // Mafia Wars 2 (http://mw2.static.zgncdn.com/v84768/gameSettings.xml)
		case 6: // CastleVille (http://assets.castle.zgncdn.com/17433/gameSettings.xml)
		case 7: // Hidden Chronicles (http://hog.assets.zgncdn.com/25419/gameSettings.xml)
		// (assetIndex)
			$xml = simplexml_load_file($url);
			echo $xml->assetIndex;
			break;
//		case 3: // FarmVille (https://zynga1-a.akamaihd.net/farmville/xml/gz/v146514/gameSettings.xml.gz)
//			break;
		default:
			echo 'Sorry, getting hash strings from '.(isset($games[$game_index][0]) ? $games[$game_index][0] : 'unknown').' is not available.';
			return;
	}
}
?>