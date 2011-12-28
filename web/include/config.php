<!-- Copyright (c) Settings (https://github.com/Mihapro/Settings) -->
<?php
$games = array(
// Add more games below
//	# => array("GameName","GN"),		<=(example)
	0 => array("CityVille", "CV"),
	1 => array("Empires & Allies", "EA"),
	2 => array("Treasure Isle", "TI"),
	3 => array("FarmVille", "FV"),
	4 => array("Adventure World", "AW"),
	5 => array("Mafia Wars 2", "MW2"),
	6 => array("CastleVille", "CaV"),
//	7 => array("Café World", "CW"),
//	8 => array("Pioneer Trail", "PT"),
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
// 	7 => array(),
//	8 => array(),
);

$game_messages = array(
//	# => "These files are compressed!",		<=(example)
	3 => "<i>Save target/page as an <b>XML</b></i> file and open it with your text editor to view it in proper format.",
);

$urls = array(
// Add more url addresses below	(make sure url ends with a slash ( / ).
//  # => "http://www.zynga.com/",		<=(example)
	0 => "http://cityvillefb.static.zgncdn.com/",
	1 => "http://zynga1-a.akamaihd.net/empire/assets/",
	2 => "http://assets.treasure.zgncdn.com/prod/",
	3 => "http://zynga1-a.akamaihd.net/farmville/xml/gz/",
	4 => "http://assets.adventure-zc.zgncdn.com/", // also: https://zynga1-a.akamaihd.net/adventure/
	5 => "http://mw2.static.zgncdn.com/",
	6 => "http://assets.castle.zgncdn.com/",
// 	7 => "",
//	8 => "",
);

$files = array(
// Add more files below (first file must be the one that contains assets information!!)
//	# => array("gameSettings.xml", "file_2", "file_3" ...),		<=(example)
	0 => array("gameSettings.xml", "questSettings.xml", "en_US.xml", "effectsConfig.xml"),
	1 => array("gameSettings.xml", "questSettings.xml", "en_US.xml"),
	2 => array("gameSettings.xml"),
	3 => array("gameSettings.xml.gz", "worldSettings.xml.gz", "questSettings.xml.gz", "quests.xml.gz",	"en_US.xml.gz",
				"AnimalBreeding.xml.gz", "MarketData.xml.gz", "dialogs.xml.gz", "StorageConfig.xml.gz", "collections.xml.gz",
				"yimf.xml.gz", "doobers.xml.gz", "items.xml.gz", "avatar.xml.gz", "crosspromo.xml.gz", "crafting.xml.gz"),
	4 => array("gameSettings.xml", "questSettings.xml", "en_US.xml"),
	5 => array("gameSettings.xml", "en_US.xml"),
	6 => array("gameSettings.xml", "en_US.xml"),
// 	7 => array(),
//	8 => array("dialogs.xmlgz"),
);

$hash_unavailable = array(
// Only games we cannot get hashes from.
//	# => 'message',		<=(example)
	3 => "Unknown location of hashed strings.",
);
?>

