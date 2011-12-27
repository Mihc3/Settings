<!-- Copyright (c) Settings (https://github.com/Mihapro/Settings) -->
<?php
error_reporting(0);
include 'include/config.php';
include 'include/ZlibDecompress.php';
$game = $_GET['g'];
$build = $_GET['v'];
$file = $_GET['f'];
if (!isset($game) || !isset($build)) header('Location: index.php');
//echo '<title>Hash'.$games[$game][1].'</title>';
$xmlgz = file_get_contents($urls[$game].$build.'/'.($file ? $file : $files[$game][0]));		
$zlib = new ZlibDecompress;
$xml = $zlib->inflate(substr($xmlgz,2));
echo $xml;
?>