<?PHP
/*
Plugin Name: All in One Webmaster
Plugin URI: http://Crunchify.com/all-in-one-webmaster/
Description: Sitemap Submission option to Google, Bing. Options to add Google, Bing, Alexa, Facebook Insights, Facebook, SEO, Blogcatalog Webmaster Meta Tag. Options to add Google, Quantcast.com, GetClicky.com, Compete.com Analytics scripts for your blogs.
Version: 8.3.0
Author: Crunchify
Author URI: http://Crunchify.com 
*/

/*
    Copyright (C) 2012-2013 Crunchify.com 

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
add_option('all_in_one_alexa_webmaster', '');
add_option('all_in_one_bcatalog_webmaster', '');
add_option('all_in_one_fbinsights_webmaster', '');

add_option('all_in_one_google_analytics', '');
add_option('all_in_one_google_analytics_domain', '');
add_option('sitemap_URL', '');
add_option('all_in_one_clicky_analytics', '');
add_option('all_in_one_compete_analytics', '');
add_option('all_in_one_quantcast_analytics', '');
add_option('all_in_one_sitemeter_analytics', '');

add_option('all_in_one_banner', '-1');


function all_in_one_webmaster_head()
{
	$google_wm = get_option('all_in_one_google_webmaster');
	$alexa_wm = get_option('all_in_one_alexa_webmaster');
	$bcatalog_wm = get_option('all_in_one_bcatalog_webmaster');
	$fbinsights_wm = get_option('all_in_one_fbinsights_webmaster');

	$bing_wm = get_option('all_in_one_bing_webmaster');
	$google_an = get_option('all_in_one_google_analytics');
	$google_an_domain = get_option('all_in_one_google_analytics_domain');
	$quantcast_an = get_option('all_in_one_quantcast_analytics');
	
	echo "<!-- All in One Webmaster plugin by Crunchify.com -->";
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
	if (!($fbinsights_wm == ""))
	{
		$fbinsights_wm_meta = '<meta property="fb:admins" content="' . $fbinsights_wm . '" />';
		echo $fbinsights_wm_meta . "\n";
	}

	if (!($google_an == ""))
	{
		echo '<script>'."\n";
		echo '(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){'."\n";
		echo '  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),'."\n";
		echo 'm=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)'."\n";
		echo '})(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');'."\n";
		echo 'ga(\'create\', \'' . $google_an . '\', \'' . $google_an_domain . '\');'."\n";
		echo 'ga(\'send\', \'pageview\');'."\n";
		echo '</script>'."\n";
	}
	
	if (!($quantcast_an == "")) 
	{
		echo '<script type="text/javascript">'."\n";
		echo '_qoptions={qacct:"' . $quantcast_an . '"};'."\n";
		echo '</script>'."\n";
		echo '<script type="text/javascript" src="http://edge.quantserve.com/quant.js"></script>'."\n";
	}
		
	echo "<!-- /All in One Webmaster plugin -->";

}

function all_in_one_webmaster_footer()
{

	$clicky_an = get_option('all_in_one_clicky_analytics');
	$compete_an = get_option('all_in_one_compete_analytics');

	$sitemeter_an = get_option('all_in_one_sitemeter_analytics');

	if (!($clicky_an == ""))
	{
		echo '<script src="http://static.getclicky.com/js" type="text/javascript"></script>'."\n";
		echo '<script type="text/javascript">clicky.init('.$clicky_an.');</script>'."\n";
	}

    if (!($compete_an == ""))
    {
            list ($compete_code, $compete_token) = explode("/", $compete_an);
            $compete_stub = str_split($compete_code, 6);
            echo '<!-- Compete CrossPoint Tag for compete.com -->'."\n";
            echo '<script type="text/javascript">'."\n";
            echo '__compete_code = \'' . $compete_code . '\';'."\n";
            echo '/* Set control variables below this line. */'."\n";
            echo '</script>'."\n";
            echo '<script type="text/javascript" src="//c.compete.com/bootstrap/s/' . $compete_code . '/' . $compete_token . '/bootstrap.js"></script>'."\n";
    } 
	
	if (!($sitemeter_an == ""))
	{
		echo '<script type="text/javascript" src="'.$sitemeter_an.'"></script>'."\n";
	}

	$all_in_one_banner1 = get_option('all_in_one_banner');

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

	
	if (isset($_POST['info_update2'])) 
	{	
		if (!isset($_POST['my_aiowz_update_setting'])) die("Hmm .. looks like you didn't send any credentials.. No CSRF for you! ");
		if (!wp_verify_nonce($_POST['my_aiowz_update_setting'],'aiowz-update-setting')) die("Hmm .. looks like you didn't send any credentials.. No CSRF for you! ");
		
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

					'bin' => array (
							'webmaster_engine' => 'Bing',
							'search_engine' => 'http://www.bing.com/webmaster/ping.aspx?siteMap=',
							'OKmessage' => 'Thanks for submitting your sitemap',
							'NOmessage' => 'Bad Request'
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
					$icon = '<img border="0" src="'.$icon_url.'/wp-content/plugins/all-in-one-webmaster/images/yes.jpg" /> ';
					$alter_link = '<br />';
					}
				else if ($statusTag == 'NOPE') {
					$icon = '<img border="0" src="'.$icon_url.'/wp-content/plugins/all-in-one-webmaster/images/fail.jpg" /> ';
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
	
	if (isset($_POST['info_update1']))
	{
		if (!isset($_POST['my_aiowz_update_setting'])) die("Hmm .. looks like you didn't send any credentials.. No CSRF for you! ");
		if (!wp_verify_nonce($_POST['my_aiowz_update_setting'],'aiowz-update-setting')) die("Hmm .. looks like you didn't send any credentials.. No CSRF for you! ");
		
		update_option('all_in_one_google_webmaster', (string)$_POST["all_in_one_google_webmaster"]);
		update_option('all_in_one_alexa_webmaster', (string)$_POST["all_in_one_alexa_webmaster"]);
		update_option('all_in_one_bcatalog_webmaster', (string)$_POST["all_in_one_bcatalog_webmaster"]);
		update_option('all_in_one_bing_webmaster', (string)$_POST["all_in_one_bing_webmaster"]);
		update_option('all_in_one_google_analytics', (string)$_POST['all_in_one_google_analytics']);
		update_option('all_in_one_google_analytics_domain', (string)$_POST['all_in_one_google_analytics_domain']);
		update_option('all_in_one_clicky_analytics', (string)$_POST['all_in_one_clicky_analytics']);
		update_option('all_in_one_compete_analytics', (string)$_POST['all_in_one_compete_analytics']);
		update_option('all_in_one_quantcast_analytics', (string)$_POST['all_in_one_quantcast_analytics']);
		update_option('all_in_one_fbinsights_webmaster', (string)$_POST["all_in_one_fbinsights_webmaster"]);
		update_option('all_in_one_sitemeter_analytics', stripslashes_deep((string)$_POST['all_in_one_sitemeter_analytics']));
		update_option('all_in_one_banner', ($_POST['all_in_one_banner']=='1') ? '1':'-1' );
		
		echo '<div id="message" class="updated fade"><p><strong>Settings updated.</strong></p></div>';
		echo '</strong>';

	}else{
	}
	
	
	$icon_url = get_bloginfo( 'wpurl' );
	$help_icon = '<img border="0" src="'.$icon_url.'/wp-content/plugins/all-in-one-webmaster/images/help.gif" /> ';
	$new_icon = '<img border="0" src="'.$icon_url.'/wp-content/plugins/all-in-one-webmaster/images/new.gif" /> ';
 
	$aiow_google_web = '<img border="0" id="aioweast1" value="Tip" title="Visit http://www.google.com/webmasters/ to get detailed info." src="' . $icon_url . '/wp-content/plugins/all-in-one-webmaster/images/tip.png" /> ';

    $aiow_bing_web = '<img border="0" id="aioweast2" value="Tip" title="Visit http://www.bing.com/webmaster/ to get detailed info." src="' . $icon_url . '/wp-content/plugins/all-in-one-webmaster/images/tip.png" /> ';

	$aiow_alexa_web = '<img border="0" id="aioweast3" value="Tip" title="Visit http://www.alexa.com/" to get detailed info." src="' . $icon_url . '/wp-content/plugins/all-in-one-webmaster/images/tip.png" /> ';

    $aiow_blogcatalog_web = '<img border="0" id="aioweast4" value="Tip" title="Visit http://www.blogcatalog.com/ to get detailed info." src="' . $icon_url . '/wp-content/plugins/all-in-one-webmaster/images/tip.png" /> ';

    $aiow_fbinsight_web = '<img border="0" id="aioweast5" value="Tip" title="Visit http://www.facebook.com/insights/" to get detailed info." src="' . $icon_url . '/wp-content/plugins/all-in-one-webmaster/images/tip.png" /> ';

    $aiow_google_ana = '<img border="0" id="aioweast6" value="Tip" title="Visit http://www.google.com/analytics/ to get detailed info." src="' . $icon_url . '/wp-content/plugins/all-in-one-webmaster/images/tip.png" /> ';

    $aiow_quantcast_ana = '<img border="0" id="aioweast7" value="Tip" title="Visit http://www.quantcast.com/" to get detailed info." src="' . $icon_url . '/wp-content/plugins/all-in-one-webmaster/images/tip.png" /> ';

    $aiow_clicky_ana = '<img border="0" id="aioweast8" value="Tip" title="Visit http://getclicky.com/user/" to get detailed info." src="' . $icon_url . '/wp-content/plugins/all-in-one-webmaster/images/tip.png" /> ';

    $aiow_compete_ana = '<img border="0" id="aioweast9" value="Tip" title="Visit http://www.compete.com/" to get detailed info." src="' . $icon_url . '/wp-content/plugins/all-in-one-webmaster/images/tip.png" /> ';

    $aiow_sitemeter_ana = '<img border="0" id="aioweast10" value="Tip" title="Visit http://sitemeter.com" to get detailed info." src="' . $icon_url . '/wp-content/plugins/all-in-one-webmaster/images/tip.png" /> ';

	?>
	
	<?php
    require_once (dirname(__FILE__) . '/includes/settings-page.php');
    ?>
	
	<?php
}

function all_in_one_webmaster_admin() {
	add_options_page('All in One Webmaster', 'All in One Webmaster', 8, __FILE__, 'all_in_one_webmaster_options_page');
}

function aiow_plugin_admin_init()
{
	wp_enqueue_script('jquery');                    // Enque Default jQuery
	wp_enqueue_script('jquery-ui-core');            // Enque Default jQuery UI Core
	wp_enqueue_script('jquery-ui-tabs');            // Enque Default jQuery UI Tabs
	
    wp_register_script('aiow-plugin-script3', plugins_url('/js/myscript.js', __FILE__));
    wp_enqueue_script('aiow-plugin-script3');

    wp_register_script('aiow-plugin-script4', plugins_url('/js/jquery.powertip.js', __FILE__));
    wp_enqueue_script('aiow-plugin-script4');

    wp_register_style('aiow-plugin-css', plugins_url('/css/jquery-ui.css', __FILE__));
    wp_enqueue_style('aiow-plugin-css');

    wp_register_style('aiow-tip-plugin-css', plugins_url('/css/jquery.powertip.css', __FILE__));
    wp_enqueue_style('aiow-tip-plugin-css');

    wp_register_style('aiow-member-plugin-css', plugins_url('/css/all-in-one-webmaster.css', __FILE__));
    wp_enqueue_style('aiow-member-plugin-css');
}


add_action('admin_menu', 'aiow_plugin_admin_init');
add_action('admin_menu', 'all_in_one_webmaster_admin');
add_action('wp_head', 'all_in_one_webmaster_head');
add_action('wp_footer', 'all_in_one_webmaster_footer');

?>