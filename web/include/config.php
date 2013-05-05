<?php // Copyright (c) Settings (https://github.com/Mihapro/Settings)
// Admin CP ( ../admin/)
// Website will not be available to visitors until the password is set.
$admin_password = "";
$footer_links_visible = true;

$games = array(
// Add more games below
//	# => array("GameName","GN"),		<=(example)
	0 => array("CityVille", "HashCV"),
	1 => array("Empires & Allies", "HashEA"),
	2 => array("Treasure Isle", "HashTI"),
	3 => array("FarmVille", "HashFV"),
	4 => array("Adventure World", "HashAW"),
	5 => array("Mafia Wars 2", "HashMW2"),
	6 => array("CastleVille", "HashCaV"),
	7 => array("Hidden Chronicles", "HashHC"),
//	? => array("Café World", "HashCW"),
//	? => array("Pioneer Trail", "HashPT"),
);

$colors_enabled = true; // You can toggle this: true (enabled) or false (disabled)
$colors = array(
//	# => array("i_start:i_end" => "htmlcolor", "i2_start:i2_end" => "htmlcolor2"),		<=(example)
//	Empires & Allies
//	0123456789012345
	0 => array('0:3' => "Gold", '4:8' => "CornflowerBlue"),
	1 => array('0:6' => "CornflowerBlue", '10:15' => "Orange"),
	2 => array('0:7' => "Blue", '9:12' => "SeaGreen"),
	3 => array('0:3' => "Brown", '4:8' => "RoyalBlue"),
	4 => array('0:14' => "LightBlue"),
	5 => array('0:4' => "Gray", '6:9' => "RoyalBlue", '11:11' => "Orange"),
	6 => array('0:5' => "Gold", '6:10' => "Purple"),
	7 => array('0:16' => "Brown")
);

$images_enabled = true; // You can toggle this: true (enabled) or false (disabled)
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
 	7 => array("images/hidden-chronicles.jpg", "images/hc_icon.gif"),
);

$messages = array( // These will be displayed on main page
//	# => "New version is available!",		<=(example)
	1 => "<div style='border:2px dashed #00CC66;'><b><font color=#00CC66>New version of MPRO Image Downloader (v6.3.0) is available!</font></b><br/>FarmVille URL updated, FarmVille 2 added</div>",
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
 	7 => "http://hog.assets.zgncdn.com/",
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
 	7 => array("gameSettings.xml"),
);

$hash_unavailable = array(
// Only games we cannot get hashes from.
//	# => 'message',		<=(example)
	3 => "Unknown location of hashed strings.",
);
?>

