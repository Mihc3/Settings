<?php
error_reporting(0);
include 'include/config.php';
$game = $_GET['g'];
$build = $_GET['v'];
if (!isset($game) || !isset($build)) header('Location: index.php');
echo '<title>Hash'.$games[$game][1].'</title>';
hashes($game,$urls[$game].$build.'/'.$files[$game][0]);
?>