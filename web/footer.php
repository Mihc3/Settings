<!-- Copyright (c) Settings (https://github.com/Mihapro/Settings) -->
</td></tr>
<tr><td class="footer"><center><?php
if ($footer_links_visible) echo (isset($main_page) ? '<div style="padding-bottom:1px;"><a href="./admin/">Admin Control Panel</a>'	: '<div style="padding-bottom:1px;"><a href="../">Main page</a>');
if ($footer_links_visible and isset($_SESSION['password'])) echo ' - ';
if (isset($_SESSION['password'])) echo '<a href="index.php?action=logout">Logout</a>';
?></div>
<div>This site is not in any way affiliated with Zynga&reg;. All images are copyright of Zynga, Inc.</div>
<div>Copyright &copy; Settings (<a href="https://github.com/Mihapro/Settings">https://github.com/Mihapro/Settings</a>)</div>
</center></td></tr>
</table>
<span style="padding-top: 5px;">
	<script type="text/javascript"><!--
	google_ad_client = "ca-pub-3787025342320123";
	/* mptoolsn1 */
	google_ad_slot = "2149111366";
	google_ad_width = 468;
	google_ad_height = 60;
	//-->
	</script>
	<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
</span>
</center>
</body>
</html>