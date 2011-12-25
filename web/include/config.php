<?php

$games = array(
// Add more games below
//	# => array("GameName","GN"),		<=(example)
	0 => array("CityVille", "CV", "images/cityville.png"),
	1 => array("Empires & Allies", "EA", "images/empires-and-allies.png"),
	2 => array("Treasure Isle", "TI", "images/treasure-isle.jpg"),
	3 => array("FarmVille", "FV", "images/farmville.png"),
	4 => array("Adventure World", "AW", "images/adventure-world.png"),
	5 => array("Mafia Wars 2", "MW2", "images/mafia-wars-2.png"),
	6 => array("CastleVille", "CaV", "images/castleville.png"),
);

$images = array(
// Add more image urls below
//	# => array("images/Game-logo.png", "images/Game-icon.png"),		<=(example)
	0 => array("images/cityville.png", "images/cv_icon.png"),
	1 => array("images/empires-and-allies.png", "images/ea_icon.png"),
	2 => array("images/treasure-isle.jpg", "images/ti_icon.png"),
	3 => array("images/farmville.png", "images/fv_icon.png"),
	4 => array("images/adventure-world.png", "images/aw_icon.png"),
	5 => array("images/mafia-wars-2.png", "images/mw2_icon.png"),
	6 => array("images/castleville.png", "images/cav_icon.png"),
);

$urls = array(
// Add more url addresses below	(make sure url ends with a slash ( / ).
//  # => "http://www.zynga.com/"		<=(example)
	0 => "http://cityvillefb.static.zgncdn.com/",
	1 => "http://zynga1-a.akamaihd.net/empire/assets/",
	2 => "http://assets.treasure.zgncdn.com/prod/",
	3 => "http://zynga1-a.akamaihd.net/farmville/xml/gz/",
	4 => "http://assets.adventure-zc.zgncdn.com/", // also: https://zynga1-a.akamaihd.net/adventure/
	5 => "http://mw2.static.zgncdn.com/",
	6 => "http://assets.castle.zgncdn.com/",
);

$files = array(
// Add more files below (first file must be the one that contains assets information!!)
//	# => array("gameSettings.xml", "file_2", "file_3" ...)		<=(example)
	0 => array("gameSettings.xml", "questSettings.xml", "en_US.xml", "effectsConfig.xml"),
	1 => array("gameSettings.xml", "questSettings.xml", "en_US.xml"),
	2 => array("gameSettings.xml"),
	3 => array("gameSettings.xml.gz", "worldSettings.xml.gz", "questSettings.xml.gz", "quests.xml.gz",	"en_US.xml.gz",
				"AnimalBreeding.xml.gz", "MarketData.xml.gz", "dialogs.xml.gz", "StorageConfig.xml.gz", "collections.xml.gz",
				"yimf.xml.gz", "doobers.xml.gz", "items.xml.gz", "avatar.xml.gz", "crosspromo.xml.gz", "crafting.xml.gz"),
	4 => array("gameSettings.xml", "questSettings.xml", "en_US.xml"),
	5 => array("gameSettings.xml","en_US.xml"),
	6 => array("gameSettings.xml"),
);

function hashes($game_index,$url)
{
	switch ($game_index)
	{
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
		case 3: // FarmVille (https://zynga1-a.akamaihd.net/farmville/xml/gz/v146514/gameSettings.xml.gz)
			$file = file_get_contents($url);		
			$zlib = new ZlibDecompress;
			$xml = $zlib->inflate(substr($file,2));
			echo $xml;			
			break;
		default:
			echo 'Sorry, getting hash strings from '.($games[$game_index][0] ? $games[$game_index][0] : 'unknown').' is not available.';
			return;
	}
}
	
?>

