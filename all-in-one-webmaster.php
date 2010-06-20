<?PHP
/*
Plugin Name: All in One Webmaster
Plugin URI: http://arpitshah.com/plugins/all-in-one-webmaster/
Description: 1) Sitemap Submission option to Google, Yahoo, Bing and Ask.com. 2) Options to add Google, Bing, Yahoo, Alexa, Blogcatalog Webmaster Meta Tag. 3) Options to add Google, Quantcast, Clicky, 103Bees Analytics scripts for your blogs. Please go to <code>Settings -> All in One Webmaster</code> for more and detailed options.
Version: 5.1.5
Author: Arpit Shah
Author URI: http://arpitshah.com
*/

/*
    Copyright (C) 2009-10 Arpit Shah.

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
add_option('all_in_one_alexa_webmaster', '');
add_option('all_in_one_bcatalog_webmaster', '');

add_option('all_in_one_google_analytics', '');
add_option('sitemap_URL', '');
add_option('all_in_one_clicky_analytics', '');
add_option('all_in_one_103bee_analytics', '');
add_option('all_in_one_103fid_analytics', '');
add_option('all_in_one_quantcast_analytics', '');

add_option('all_in_one_head_section', '');
add_option('all_in_one_footer_section', '');

function all_in_one_webmaster_head()
{
	$google_wm = get_option('all_in_one_google_webmaster');
	$alexa_wm = get_option('all_in_one_alexa_webmaster');
	$bcatalog_wm = get_option('all_in_one_bcatalog_webmaster');

	$bing_wm = get_option('all_in_one_bing_webmaster');
	$yahoo_wm = get_option('all_in_one_yahoo_webmaster');
	$google_an = get_option('all_in_one_google_analytics');
	$quantcast_an = get_option('all_in_one_quantcast_analytics');

	$head_section = get_option('all_in_one_head_section');

	if (!($head_section == ""))
	{
			echo $head_section . "\n";
	}

	if (!($google_wm == ""))
	{
		$google_wm_meta = '<meta name="google-site-verification" content="' . $google_wm . '" /> ';
		echo $google_wm_meta . "\n";
	}

	if (!($bing_wm == ""))
	{
		$bing_wm_meta = '<meta name="msvalidate.01" content="' . $bing_wm . '" />';
		echo $bing_wm_meta . "\n";
	}

	if (!($yahoo_wm == ""))
	{
		$yahoo_wm_meta = '<meta name="y_key" content="' . $yahoo_wm . '" />';
		echo $yahoo_wm_meta . "\n";
	}
	if (!($alexa_wm == ""))
	{
		$alexa_wm_meta = '<meta name="alexaVerifyID" content="' . $alexa_wm . '" />';
		echo $alexa_wm_meta . "\n";
	}
	if (!($bcatalog_wm == ""))
	{
		$bcatalog_wm_meta = '<meta name="blogcatalog" content="' . $bcatalog_wm . '" />';
		echo $bcatalog_wm_meta . "\n";
	}

	if (!($google_an == ""))
	{
		echo '<script type="text/javascript">'."\n";
		echo 'var _gaq = _gaq || [];'."\n";
		echo '_gaq.push([\'_setAccount\', \'' . $google_an . '\']);'."\n";
		echo '_gaq.push([\'_trackPageview\']);'."\n";
		echo '(function() {'."\n";
		echo 'var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;'."\n";
		echo 'ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';'."\n";
		echo '(document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0]).appendChild(ga);'."\n";
		echo ' })();'."\n";
		echo '</script>'."\n";
	}

	if (!($quantcast_an == ""))
	{
		echo '<script type="text/javascript">'."\n";
		echo '_qoptions={qacct:"' . $quantcast_an . '"};'."\n";
		echo '</script>'."\n";
		echo '<script type="text/javascript" src="http://edge.quantserve.com/quant.js"></script>'."\n";
	}

}

function all_in_one_webmaster_footer()
{

	$clicky_an = get_option('all_in_one_clicky_analytics');
	$bee103_an = get_option('all_in_one_103bee_analytics');
	$fid103_an = get_option('all_in_one_103fid_analytics');

	$footer_section = get_option('all_in_one_footer_section');

	if (!($footer_section == ""))
	{
		echo $footer_section . "\n";
	}

	if (!($clicky_an == ""))
	{
		echo '<script src="http://static.getclicky.com/js" type="text/javascript"></script>'."\n";
		echo '<script type="text/javascript">clicky.init('.$clicky_an.');</script>'."\n";
	}

	if (!($bee103_an == ""))
	{
		echo '<script type="text/javascript" src="http://103bees.com/bees/?bee='.$bee103_an.'&amp;fid='.$fid103_an.'"></script>' . "\n";
	}
}

function all_in_one_webmaster_sitemap_submit($sitemap_URL1,$search_engine,$OKmessage,$NOmessage)
{

	$DONE_MSG = 'DONE';
	$NOPE_MSG = 'NOPE';

	$pingurl = $search_engine.$sitemap_URL1;
	$source = @file_get_contents($pingurl);

	if ($source != false) {

		$source = strip_tags($source);
		$source = "WEBMASTER".$source;

		$isOKmessage = stripos($source,$OKmessage);
		$isNOmessage = stripos($source,$NOmessage);

		if (($isOKmessage != false)&&($isNOmessage == false))
		{
			$finalMessage = $DONE_MSG.$OKmessage;
		}
		if (($isOKmessage == false)&&($isNOmessage != false))
		{
			$finalMessage = $NOPE_MSG.$NOmessage;
		}
		if (($isOKmessage == false)&&($isNOmessage == false))
		{
			$finalMessage = $NOPE_MSG.'Submission error';
		}
	}
	else if ($source == false) {$finalMessage = $NOPE_MSG.'search_engine error';}
	return array($source, $finalMessage);
}

function all_in_one_webmaster_options_page() {

	if (isset($_POST['info_update1']))
	{
		update_option('all_in_one_google_webmaster', (string)$_POST["all_in_one_google_webmaster"]);
		update_option('all_in_one_alexa_webmaster', (string)$_POST["all_in_one_alexa_webmaster"]);
		update_option('all_in_one_bcatalog_webmaster', (string)$_POST["all_in_one_bcatalog_webmaster"]);
		update_option('all_in_one_bing_webmaster', (string)$_POST["all_in_one_bing_webmaster"]);
		update_option('all_in_one_yahoo_webmaster', (string)$_POST['all_in_one_yahoo_webmaster']);
		update_option('all_in_one_google_analytics', (string)$_POST['all_in_one_google_analytics']);
		update_option('all_in_one_clicky_analytics', (string)$_POST['all_in_one_clicky_analytics']);
		update_option('all_in_one_103bee_analytics', (string)$_POST['all_in_one_103bee_analytics']);
		update_option('all_in_one_103fid_analytics', (string)$_POST['all_in_one_103fid_analytics']);
		update_option('all_in_one_quantcast_analytics', (string)$_POST['all_in_one_quantcast_analytics']);

		update_option('all_in_one_head_section', stripslashes_deep((string)$_POST['all_in_one_head_section']));
		update_option('all_in_one_footer_section', stripslashes_deep((string)$_POST['all_in_one_footer_section']));

		echo '<div id="message" class="updated fade"><p><strong>Settings updated.</strong></p></div>';
		echo '</strong></p></div>';

	}

	if (isset($_POST['info_update2']))
	{
		update_option('sitemap_URL', (string)$_POST['sitemap_URL']);
		$sitemap_URL1 = get_option('sitemap_URL');

		$show_sitemap = '';
		$last3 = substr($sitemap_URL1, -1, 3);
		$last5 = substr($sitemap_URL1, -1, 5);
		$check1 = "xml";
		$icon_url = get_bloginfo( 'wpurl' );

		if($sitemap_URL1 == "")
		{
			$show_sitemap .= '<div id="message" class="updated fade"><p>'."Oops!! Blank field. Please provide sitemap URL" . '<br /><br /> Sitemap must ends with .xml or .xml.gz';
			$show_sitemap .= '</p></div>';
		}

		else
		{
				$webmasterlink = array(

					'goo' => array (
						'webmaster_engine' => 'Google',
						'search_engine' => 'http://www.google.com/webmasters/sitemaps/ping?sitemap=',
						'OKmessage' => 'Sitemap Notification Received',
						'NOmessage' => 'Bad Request'
					),

					'yah' => array (
						'webmaster_engine' => 'Yahoo!',
						'search_engine' => 'http://search.yahooapis.com/SiteExplorerService/V1/ping?sitemap=',
						'OKmessage' => 'Update notification has successfully submitted',
						'NOmessage' => 'The following errors were detected'
					),

					'bin' => array (
							'webmaster_engine' => 'Bing',
							'search_engine' => 'http://www.bing.com/webmaster/ping.aspx?siteMap=',
							'OKmessage' => 'Thanks for submitting your sitemap',
							'NOmessage' => 'Bad Request'
					),

					'ask' => array (
						'webmaster_engine' => 'Ask.com',
						'search_engine' => 'http://submissions.ask.com/ping?sitemap=',
						'OKmessage' => 'Your Sitemap submission was successful',
						'NOmessage' => 'Your Sitemap submission was not successful'
					),

				);

				$show_sitemap .= '<div id="message" class="updated fade"><p>';

				foreach ($webmasterlink as $siln => $myArray1 )
				{

				$webmaster_engine	= $myArray1['webmaster_engine'];
				$search_engine	= $myArray1['search_engine'];
				$OKmessage	= $myArray1['OKmessage'];
				$NOmessage	= $myArray1['NOmessage'];

				list ($source, $finalMessage) =  all_in_one_webmaster_sitemap_submit($sitemap_URL1,$search_engine,$OKmessage,$NOmessage);

				$statusTag = substr($finalMessage,0,4);
				if ($statusTag == 'DONE') {
					$icon = '<img border="0" src="'.$icon_url.'/wp-content/plugins/all-in-one-webmaster/yes.jpg" /> ';
					$alter_link = '<br />';
					}
				else if ($statusTag == 'NOPE') {
					$icon = '<img border="0" src="'.$icon_url.'/wp-content/plugins/all-in-one-webmaster/fail.jpg" /> ';
					$submission_URL1 = $search_engine.$sitemap_URL1;
					$alter_link = '<a href="'.$submission_URL1.'" target="_blank"> (Try manually)</a><br /><br />';
					}
				else {
					$icon = '';
					$alter_link = '';
					}

				$finalMessage = substr($finalMessage,4);

				$insert_sitemap = "\n".$icon."<b>".$webmaster_engine.":  </b><i>".$finalMessage."</i><br />".$alter_link ;
				$show_sitemap .= $insert_sitemap;

				}

				$show_sitemap .= '</p></div>';
			}

	}

	$icon_url = get_bloginfo( 'wpurl' );
	$help_icon = '<img border="0" src="'.$icon_url.'/wp-content/plugins/all-in-one-webmaster/help.gif" /> ';
	$new_icon = '<img border="0" src="'.$icon_url.'/wp-content/plugins/all-in-one-webmaster/new.gif" /> ';

	?>
   <div class=wrap>

    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
    <input type="hidden" name="info_update1" id="info_update1" value="true" />


    <u><h2>All in One Webmaster Options</h2></u>

    <p>
		There are more to come in next releases. Stay tuned. <a href="http://arpitshah.com/plugins/all-in-one-webmaster/" title="All in One Webmaster" target="_blank">Homepage</a>
	</p>

	<div id="poststuff" class="metabox-holder has-right-sidebar">

	<div style="float:left;width:63%;">

		<div class="postbox">
		<h3>Webmaster Options</h3>
			<div>
			<table class="form-table">

			<tr valign="top" class="alternate">
					<th scope="row" style="width:32%;"><label>1) <b>Google</b> WebMaster Central</label></th>
				<td>
				 <input name="all_in_one_google_webmaster" type="text" size="55" value="<?php echo get_option('all_in_one_google_webmaster'); ?>" /> <a href="http://www.google.com/webmasters/" target="_blank" title="Click to visit Google Webmaster Central"><?=$help_icon?></a><br />(meta tag: enter content value)<br />

				</td>
			</tr>
			<tr valign="top">
					<th scope="row" style="width:32%;"><label>2) <b>Bing</b> WebMaster Center</label></th>
				<td>
				 <input name="all_in_one_bing_webmaster" type="text" size="55" value="<?php echo get_option('all_in_one_bing_webmaster'); ?>" /> <a href="http://www.bing.com/webmaster/" target="_blank" title="Click to visit Bing Webmaster Center"><?=$help_icon?></a><br />(meta tag: enter content value)<br />

				</td>
			</tr>
			<tr valign="top" class="alternate">
					<th scope="row" style="width:32%;"><label>3) <b>Yahoo</b> Site Explorer</label></th>
				<td>
				 <input name="all_in_one_yahoo_webmaster" type="text" size="55" value="<?php echo get_option('all_in_one_yahoo_webmaster'); ?>" /> <a href="http://siteexplorer.search.yahoo.com/" target="_blank" title="Click to visit Yahoo Site Explorer"><?=$help_icon?></a><br />(meta tag: enter content value)
				</td>
			</tr>
			<tr valign="top">
					<th scope="row" style="width:32%;"><label>4) <b>Alexa</b> Rank</label><?=$new_icon?></th>
				<td>
				 <input name="all_in_one_alexa_webmaster" type="text" size="55" value="<?php echo get_option('all_in_one_alexa_webmaster'); ?>" /> <a href="http://www.alexa.com/" target="_blank" title="Click to visit Alexa.com Rank Site"><?=$help_icon?></a><br />(meta tag: enter content value)
				</td>
			</tr>
			<tr valign="top" class="alternate">
					<th scope="row" style="width:32%;"><label>5) <b>BlogCatalog</b></label><?=$new_icon?></th>
				<td>
				 <input name="all_in_one_bcatalog_webmaster" type="text" size="55" value="<?php echo get_option('all_in_one_bcatalog_webmaster'); ?>" /> <a href="http://www.blogcatalog.com/" target="_blank" title="Click to visit BlogCatalog.com"><?=$help_icon?></a><br />(meta tag: enter content value)
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
					<th scope="row" style="width:32%;"><label>1) <b>Google</b> Analytics</label></th>
				<td>
					<input name="all_in_one_google_analytics" type="text" size="55" value="<?php echo get_option('all_in_one_google_analytics'); ?>" /> <a href="http://www.google.com/analytics/" target="_blank" title="Click to visit Google Analytics"><?=$help_icon?></a>
					<br />(starting with UA- i.e. <b>UA-9234372-9</b>)<br />
				</td>
			</tr>

			<tr valign="top">
					<th scope="row" style="width:32%;"><label>2) <b>Quantcast</b> Analytics</label><?=$new_icon?></th>
				<td>
					<input name="all_in_one_quantcast_analytics" type="text" size="55" value="<?php echo get_option('all_in_one_quantcast_analytics'); ?>" /> <a href="http://www.quantcast.com/" target="_blank" title="Click to visit Quantcast Analytics"><?=$help_icon?></a>
					<br />(qacct value. i.e. <b>p-a8SWEoiOWPo5Q</b>)<br />
				</td>
			</tr>

			<tr valign="top" class="alternate">
					<th scope="row" style="width:32%;"><label>3) <b>Clicky</b> Analytics</label></th>
				<td>
					<input name="all_in_one_clicky_analytics" type="text" size="55" value="<?php echo get_option('all_in_one_clicky_analytics'); ?>" /> <a href="http://getclicky.com/user/" target="_blank" title="Please go to this link and click Preferences under the name of the domain, you will find the Site ID. "><?=$help_icon?></a>
					<br />(site ID)<br />
				</td>
			</tr>

			<tr valign="top">
					<th scope="row" style="width:32%;"><label>4) <b>103bees</b> Analytics</label></th>
				<td>
					bee=<code>10637</code><input name="all_in_one_103bee_analytics" type="text" size="10" value="<?php echo get_option('all_in_one_103bee_analytics'); ?>" />&nbsp;&nbsp;&nbsp;
					fid=<code>18728</code><input name="all_in_one_103fid_analytics" type="text" size="10" value="<?php echo get_option('all_in_one_103fid_analytics'); ?>" /> <a href="http://103bees.com/" target="_blank" title="Please go to Manage Projects and click on Code. Try to get bee and fid value from code"><?=$help_icon?></a>
					<br />
					Enter only value (don't add `bee` and `fid`)
				</td>
			</tr>

			</table>
			</div>
		</div>

		<div class="postbox">
		<h3>Extra HTML code to be inserted in to Header or Footer Section</h3>
			<div>
			<table class="form-table">

			<tr valign="top" class="alternate">

				<th scope="row" style="width:32%;"><label>1) <b>Header</b> Section</label><?=$new_icon?><br><br>Add <b>ONLY HTML</b> code to the <code>head</code> of your blog</th>

				<td><textarea name="all_in_one_head_section" cols="60" rows="5"><?php echo get_option('all_in_one_head_section'); ?></textarea></td>
			</tr>
			<tr valign="top">
				<th scope="row" style="width:32%;"><label>2) <b>Footer</b> Section</label><?=$new_icon?><br><br>Add <b>ONLY HTML</b> code to the <code>footer</code> of your blog</th>

				<td><textarea name="all_in_one_footer_section" cols="60" rows="5"><?php echo get_option('all_in_one_footer_section'); ?></textarea></td>
			</tr>

			</table>
			</div>
		</div>

		<div class="submit">
				<input type="submit" name="info_update1" class="button-primary" value="<?php _e('Update options'); ?> &raquo;" />
		</div>
		</form>

		<form method="post" mame="info_update2" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
			<input type="hidden" name="info_update2" id="info_update2" value="true" />

			<div class="postbox">
							<h3>Automatic sitemap submission to Google, Bing, Yahoo and Ask.com</h3>
								<div>
								<table class="form-table">

								<tr valign="top" class="alternate">
										<th scope="row" style="width:29%;"><label>Please provide existing Sitemap URL</label></th>
										<td>
											<input name="sitemap_URL" type="text" size="75" value="<?php echo get_option('sitemap_URL'); ?>" />
											<br />
											(example: http://arpitshah.com/my/sitemap.xml)
										</td>
								</tr>

								</table>

								</div>
					</div>

					<div class="submit">
						<input type="submit" name="info_update2" class="button-primary" value="<?php _e('Submit to Google, Bing, Yahoo, Ask'); ?> &raquo;" />

					</div>


<?=$show_sitemap?> <div align="right"> Brought to you by <a href="http://arpitshah.com" target="_blank">Arpit Shah</a></div>
   			</form>


	</div>
	 <div id="side-info-column" class="inner-sidebar">
				<div class="postbox">
				  <h3 class="hndle"><span>All in One Webmaster by Arpit Shah</span></h3>
				  <div class="inside">
	                <ul>
	                <li><a href="http://arpitshah.com/plugins/all-in-one-webmaster/" title="All in One Webmaster" target="_blank">Plugin Homepage</a></li>
	                <li><a href="http://arpitshah.com" title="Visit Arpit's Personal Site" target="_blank">Arpit's Website</a></li>
	                </ul>
	              </div>
				</div>
     </div>
     <br>
			<div id="side-info-column" class="inner-sidebar">
				<div class="postbox">
				  <h3 class="hndle"><span>My Other Plugins</span></h3>
				  <div class="inside">
					<ul>
					<li>1) <a href="http://arpitshah.com/plugins/twitter-goodies/" title="Twitter Goodies" target="_blank">Twitter Goodies</a></li>
					<li>2) <a href="http://arpitshah.com/plugins/wp-google-buzz/" title="WP Google-buzz" target="_blank">WP Google-buzz</a></li>
					<li>3) <a href="http://arpitshah.com/plugins/wp-archive-sitemap-generator/" title="WP Archive-Sitemap Generator" target="_blank">WP Archive-Sitemap Generator</a></li>
					</ul>
				  </div>
				</div>
		     </div>
		     <br>
  <div id="side-info-column" class="inner-sidebar">
	 	 				<div class="postbox">
	 	 				  <h3 class="hndle"><span>Thanks for your support</span></h3>
	 	 				  <div class="inside">
	 	 	                <ul>
	 	 	                If you like this plugin and find it useful, help keep this plugin free and actively developed by clicking the donate button.<br><br>
	 	 	                <form action="https://www.paypal.com/cgi-bin/webscr" target="_blank" method="post">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="10641755">
							<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
							<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
							</form>
	 	 	                </ul>
	 	 	              </div>
	 	 				</div>
     		</div>

     <br>
     <div id="side-info-column" class="inner-sidebar">
	 				<div class="postbox">
	 				  <h3 class="hndle"><span>Different Webmaster and Analytics Site Homepage</span></h3>
	 				  <div class="inside">
	 	                <ul>
	 	                <li>1) <a href="http://www.google.com/webmasters/" target="_blank">Google Webmaster Central</a></li>
	 	                <li>2) <a href="http://www.bing.com/webmaster" target="_blank">Bing Webmaster Center</a></li>
	 					<li>3) <a href="http://siteexplorer.search.yahoo.com/" target="_blank">Yahoo Site Explorer</a></li>
	 					<li>4) <a href="http://www.alexa.com/" target="_blank">Alexa Rank Site</a></li>
	 					<li>5) <a href="http://www.blogcatalog.com/" target="_blank">BlogCatalog Site</a></li>
	 					<li>6) <a href="http://www.quantcast.com/" target="_blank">Quantcast Site</a></li>
	 					<li>7) <a href="http://www.google.com/analytics/" target="_blank">Google Analytics</a></li>
	 					<li>8) <a href="http://getclicky.com/" target="_blank">Web Analytics in Real Time | Clicky</a></li>
	 					<li>9) <a href="http://103bees.com/" target="_blank">103Bees | Search engine traffic analysis and statistics tool</a></li>
	 	                </ul>
	 	              </div>
	 				</div>
     </div>


	</div>

</div>
	<?php
}

function all_in_one_webmaster_admin() {
	add_options_page('All in One Webmaster', 'All in One Webmaster', 8, __FILE__, 'all_in_one_webmaster_options_page');
}

// admin stuff
add_action('admin_menu', 'all_in_one_webmaster_admin');

// do the work of this plugin!
add_action('wp_head', 'all_in_one_webmaster_head');
add_action('wp_footer', 'all_in_one_webmaster_footer');

?>