<?PHP
/*
Plugin Name: All in One Webmaster
Plugin URI: http://arpitshah.com/plugins/all-in-one-webmaster/
Description: All in One Webmaster allow you to add Google, Bing, Yahoo Webmaster Meta Tag into Header of your theme and also you can add Google Analytics into theme footer.
Version: 0.9.2
Author: Arpit Shah
Author URI: http://arpitshah.com
*/

/*
    Copyright (C) 2009 Arpit Shah.

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//some default value

add_option('all_in_one_google_webmaster', '');
add_option('all_in_one_bing_webmaster', '');
add_option('all_in_one_yahoo_webmaster', '');
add_option('all_in_one_google_analytics', '');

function all_in_one_webmaster_head()
{
	$google_wm = get_option('all_in_one_google_webmaster');
	$bing_wm = get_option('all_in_one_bing_webmaster');
	$yahoo_wm = get_option('all_in_one_yahoo_webmaster');

	$google_wm_meta = '<meta name="google-site-verification" content="' . $google_wm . '" /> ';
	$bing_wm_meta = '<meta name="msvalidate.01" content="' . $bing_wm . '" />';
	$yahoo_wm_meta = '<META name="y_key" content="' . $yahoo_wm . '">';

    echo $google_wm_meta;
    echo $bing_wm_meta;
    echo $yahoo_wm_meta;
}

function all_in_one_webmaster_footer()
{

	$google_an = get_option('all_in_one_google_analytics');

	echo '<script type="text/javascript">'."\n";
	echo "\t".'var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");'."\n";
	echo "\t".'document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));'."\n";
	echo '</script>'."\n";
	echo '<script type="text/javascript">'."\n";
	echo "\t".'try {'."\n";
	echo "\t\t".'var pageTracker = _gat._getTracker("'.$google_an.'");'."\n";
	echo "\t\t".'pageTracker._trackPageview();'."\n";
	echo "\t".'} catch(err) {}'."\n";
	echo '</script>'."\n";

}

function all_in_one_webmaster_options_page() {
if (isset($_POST['info_update1']))
	{
		update_option('all_in_one_google_webmaster', (string)$_POST["all_in_one_google_webmaster"]);
		update_option('all_in_one_bing_webmaster', (string)$_POST["all_in_one_bing_webmaster"]);
		update_option('all_in_one_yahoo_webmaster', (string)$_POST['all_in_one_yahoo_webmaster']);
		update_option('all_in_one_google_analytics', (string)$_POST['all_in_one_google_analytics']);

		echo '<div id="message" class="updated fade"><p><strong>Settings saved.</strong></p></div>';
		echo '</strong></p></div>';
}

	?>

   <div class=wrap>

    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
    <input type="hidden" name="info_update1" id="info_update1" value="true" />


    <u><h2>All in One Webmaster Options</h2></u>

    <p>
		There are more to come in next releases. Stay tuned.
	</p>

	<div id="poststuff" class="metabox-holder has-right-sidebar">

	<div style="float:left;width:60%;">

		<div class="postbox">
		<h3>Webmaster Options</h3>
			<div>
			<table class="form-table">

			<tr valign="top" class="alternate">
					<th scope="row" style="width:25%;"><label style="font-weight:bold;">Google WebMaster</label></th>
				<td>
				 <input name="all_in_one_google_webmaster" type="text" size="55" value="<?php echo get_option('all_in_one_google_webmaster'); ?>" /> <br />(only content value)<br />

				</td>
			</tr>
			<tr valign="top">
					<th scope="row" style="width:25%;"><label style="font-weight:bold;">Bing WebMaster</label></th>
				<td>
				 <input name="all_in_one_bing_webmaster" type="text" size="55" value="<?php echo get_option('all_in_one_bing_webmaster'); ?>" /><br />(only content value)<br />

				</td>
			</tr>

			<tr valign="top" class="alternate">
					<th scope="row" style="width:25%;"><label style="font-weight:bold;">Yahoo WebMaster</label></th>
				<td>
				 <input name="all_in_one_yahoo_webmaster" type="text" size="55" value="<?php echo get_option('all_in_one_yahoo_webmaster'); ?>" /> <br />(only content value)<br />

				</td>
			</tr>


			</table>

			</div>
		</div>


		<div class="postbox">
		<h3>Analytics Options</h3>
			<div>
			<table class="form-table">

			<tr valign="top" class="alternate">
					<th scope="row" style="width:25%;"><label style="font-weight:bold;">Google Analytics</label></th>
				<td>
					<input name="all_in_one_google_analytics" type="text" size="55" value="<?php echo get_option('all_in_one_google_analytics'); ?>" /> <br />(starting with UA-)<br />
				</td>
			</tr>

			</table>
			</div>
		</div>

		<div class="postbox">
				<h3>Automatic sitemap submission to Google, Bing, Yahoo and Ask</h3>
					<div>
					<table class="form-table">

					<tr valign="top" class="alternate">
							<th scope="row" style="width:25%;"><label style="font-weight:bold;">Stay Tuned (in a month or so)</label></th>

					</tr>

					</table>
					</div>
		</div>

		<div class="submit">
				<input type="submit" name="info_update1" class="button-primary" value="<?php _e('Update options'); ?> &raquo;" />
		</div>


		</form>



	</div>
	 <div id="side-info-column" class="inner-sidebar">
				<div class="postbox">
				  <h3 class="hndle"><span>All in One Webmaster</span></h3>
				  <div class="inside">
	                <ul>
	                <li><a href="http://arpitshah.com/plugins/all-in-one-webmaster/" title="All in One Webmaster" target="_blank">Plugin Homepage</a></li>
	                <li><a href="http://arpitshah.com" title="Visit Arpit's Personal Site" target="_blank">Arpit's Website</a></li>
					<li><a href="http://arpitshah.com/plugins/" title="wpBurn Blue Wordpress Theme" target="_blank">My Other WP Plugins</a></li>
	                </ul>
	              </div>
				</div>
     </div>
     <br>
     <div id="side-info-column" class="inner-sidebar">
	 				<div class="postbox">
	 				  <h3 class="hndle"><span>Google, Bing, Yahoo Links</span></h3>
	 				  <div class="inside">
	 	                <ul>
	 	                <li><a href="http://www.google.com/webmasters/" title="All in One Webmaster" target="_blank">Google Webmaster Central</a></li>
	 	                <li><a href="http://www.bing.com/webmaster" title="Visit Arpit's Personal Site" target="_blank">Bing Webmaster Center</a></li>
	 					<li><a href="http://siteexplorer.search.yahoo.com/" title="wpBurn Blue Wordpress Theme" target="_blank">Yahoo Site Explorer</a></li>
	 					<li><a href="http://www.google.com/analytics/" title="wpBurn Blue Wordpress Theme" target="_blank">Google Analytics</a></li>
	 	                </ul>
	 	              </div>
	 				</div>
     </div>
	</div>

</div>


	<?php

}

function all_in_one_webmaster_admin() {

	add_options_page('All in One Webmaster', 'All in One Webmaster', 10, __FILE__, 'all_in_one_webmaster_options_page');

}

// admin stuff
add_action('admin_menu', 'all_in_one_webmaster_admin');

// do the work of this plugin!
add_action('wp_head', 'all_in_one_webmaster_head');
add_action('wp_footer', 'all_in_one_webmaster_footer');

?>