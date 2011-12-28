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

function hashes($game,$urls)
{
	$url = $urls[$game].$build.'/'.$files[$game][0];
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
			echo 'Sorry, getting hash strings from '.($games[$game_index][0] ? $games[$game_index][0] : 'unknown').' is not available.';
			return;
	}
}
?>