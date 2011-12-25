<?php
include 'config.php';
$game = $_GET['g'];
$build = $_GET['v'];
if (!isset($game) || !isset($build)) header('Location: index.php');
?><title>Hash<?php echo $games[$game][1]; ?></title><?php
hashes($game,$urls[$game].$build.'/'.$files[$game][0]);
?>