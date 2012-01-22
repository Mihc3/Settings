<?php // Copyright (c) Settings (https://github.com/Mihapro/Settings)
error_reporting(0);
include 'include/config.php';
include 'include/functions.php';
$game = $_GET['g'];
$build = $_GET['v'];
if (!isset($game) || !isset($build)) header('Location: index.php');
hashes($game,$urls[$game].$build.'/'.$files[$game][0]);
?>