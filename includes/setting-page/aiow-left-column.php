<?php
/**
 * @author Crunchify.com
 * Plugin: All in One Webmaster
 */
?>

<div id="aiowtabs">
	<ul>
		<li><a href="#aiowtabs-1">Webmaster Options</a><?=$new_icon?></li>
		<li><a href="#aiowtabs-2">Analytics Options</a></li>
	</ul>

	<div id="aiowtabs-1">
        <?php
								require_once 'aiow-left-webmaster.php';
								?>
    </div>

	<div id="aiowtabs-2">
        <?php
								require_once 'aiow-left-analytics.php';
								?>
    </div>

</div>
<br>

<?php
require_once 'aiow-bottom-sitemapsubmission.php';
?>
