<!-- Copyright (c) Settings (https://github.com/Mihapro/Settings) -->
<html>
<head>
<title>Settings</title>
<meta http-equiv="refresh" content="3,?">
<style type="text/css">
body,td {
	font-family: Arial, Sans-Serif;
	font-size: 10pt;
}
table.header {
	width: 400px;
	border-width: 3px;
	border-spacing: 0px;
	border-color: black;
	border-style: outset;
	border-collapse: separate;
	background-color: white;
}
th {
	padding-top: 5px;
	font-size: 13px;
}
th.header {
	padding: 3px;
	font-size: 12px;
	background-color: #0088FF;
}
td.main {
	text-align: center;
}
td.footer {
	padding: 2px;
	font-size: 9px;
	background-color: #DDD;
}
a:link {
	text-decoration: none;
	color: #0044DD;
}
a:visited {
	text-decoration: none;
	color: #0044DD;
}
a:active {
	text-decoration: none;
	color: #0044DD;
}
a:hover {
	text-decoration: underline;
}
</style>
</head>
<body>
<?php
$time = microtime(); 
$time = explode(" ", $time); 
$time = $time[1] + $time[0]; 
$start = $time;
?>
<center>
<table class="header">
<tr><th class="header">
	<div>Settings - a PHP-based project</div>
	<div><a class="link" href="https://github.com/Mihapro/Settings">https://github.com/Mihapro/Settings</a></div>
</th></tr>
<tr><td class="main">