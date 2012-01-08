<!-- Copyright (c) Settings (https://github.com/Mihapro/Settings) -->
<?php
function assemble_link($game,$build,$file,$urls) {
	switch($game) {
		case 3:
			return 'decode.php?g='.$game.'&v='.$build.'&f='.$file;
		default:
			return $urls[$game].$build.'/'.$file;
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
		// (assetIndex,assetPackIndex)
			$xml = simplexml_load_file($url);
			echo $xml->assetIndex.'<br/>'.$xml->assetPackIndex;
			break;
		case 1: // Empires & Allies (https://zynga1-a.akamaihd.net/empire/assets/40463/gameSettings.xml)
		case 2: // Treasure Isle (https://assets.treasure.zgncdn.com/prod/v31852/gameSettings.xml)
		case 4: // Adventure Isle (https://zynga1-a.akamaihd.net/adventure/1340/gameSettings.xml)
		case 5: // Mafia Wars 2 (http://mw2.static.zgncdn.com/v84768/gameSettings.xml)
		case 6: // CastleVille (http://assets.castle.zgncdn.com/17433/gameSettings.xml)
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