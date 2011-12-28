<!-- Copyright (c) Settings (https://github.com/Mihapro/Settings) -->
<?php
error_reporting(0);
include 'include/config.php';
include 'include/functions.php';
$game = $_GET['g'];
$build = $_GET['v'];
if (!isset($game) || !isset($build)) header('Location: index.php');
echo '<title>Hash'.$games[$game][1].'</title>';
hashes($game,$urls);
?>