<?php

$games = array(
// Add more games below
//	# => array("GameName","GN","images/GameLogo.png"),		<=(example)
	0 => array("CityVille", "CV", "images/cityville.png"),
	1 => array("Empires & Allies", "EA", "images/empires-and-allies.png"),
	2 => array("Treasure Isle", "TI", "images/treasure-isle.jpg"),
//	3 => array("FarmVille", "FV", "images/farmville.png"), // Unavailable, unknown settings file format (*.xml.gz).
	4 => array("Adventure World", "AW", "images/adventure-world.png"),
//	5 => array("MafiaWars2", "MW2", "images/mafiawars2.png"), // Unavailable, file format not supported (*.swf).
	6 => array("CastleVille", "CV", "images/castleville.png"),
);

$urls = array(
// Add more url addresses below	(make sure url ends with a slash ( / ).
//  # => "http://www.zynga.com/"		<=(example)
	0 => "http://cityvillefb.static.zgncdn.com/",
	1 => "http://zynga1-a.akamaihd.net/empire/assets/",
	2 => "http://assets.treasure.zgncdn.com/prod/",
//	3 => "http://zynga1-a.akamaihd.net/farmville/xml/gz/",
	4 => "http://assets.adventure-zc.zgncdn.com/",
//	5 => "http://mw2.static.zgncdn.com/",
	6 => "http://assets.castle.zgncdn.com/",
);

$files = array(
// Add more files below (first file must be the one that contains assets information!!)
//	# => array("gameSettings.xml", "file_2", "file_3" ...)		<=(example)
	0 => array("gameSettings.xml", "questSettings.xml", "en_US.xml", "effectsConfig.xml"),
	1 => array("gameSettings.xml", "questSettings.xml", "en_US.xml"),
	2 => array("gameSettings.xml"),
//	3 => array("gameSettings.xml.gz"),
	4 => array("gameSettings.xml", "questSettings.xml", "en_US.xml"),
//	5 => array("gameSettings.swf","en_US.swf"),
	6 => array("gameSettings.xml"),
);

function hashes($game_index,$url)
{
	switch ($game_index)
	{
		case 0: // CityVille (http://cityvillefb.static.zgncdn.com/42773/gameSettings.xml)
		// (assetIndex,assetPackIndex)
			$xml = simplexml_load_file($url);
			echo $xml->assetIndex;
			echo '<br>';
			echo $xml->assetPackIndex;
			break;
		case 1: // Empires & Allies (https://zynga1-a.akamaihd.net/empire/assets/40463/gameSettings.xml)
		case 2: // Treasure Isle (https://assets.treasure.zgncdn.com/prod/v31852/gameSettings.xml)
		case 4: // Adventure Isle (https://zynga1-a.akamaihd.net/adventure/1340/gameSettings.xml)
		case 6: // CastleVille (http://assets.castle.zgncdn.com/17433/gameSettings.xml)
		// (assetIndex)
			$xml = simplexml_load_file($url);
			echo $xml->assetIndex;
			break;			
		default:
			echo 'Sorry, getting hash strings from '.$games[$game_index][0].' is not available.';
			return;
	}
}
	
?>

