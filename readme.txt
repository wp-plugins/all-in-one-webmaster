=== Plugin Name ===
Contributors: arpitshah
Tags: all in one webmaster, arpitshah, arpit, google webmaster, yahoo webmaster, bing webmaster, google analytics, meta tag generator, header, meta, footer, yahoo site explorer, Clicky, getClicky, 103Bees, analytics
Requires at least: 2.6	
Tested up to: 2.8.6
Stable tag: 0.9.7

Sitemap submission option for Google, Bing, Yahoo & Ask. Webmaster option for Google, Bing, Yahoo. Analytics option for Google, Clicky, 103Bees.

== Description ==
If you are a webmaster you probably heard of Google Webmaster Tool. Both Yahoo and Bing have their own versions called "Yahoo SiteExplorer" and "Bing Webmaster Central". This plugin has option to add Google, Bing, Yahoo Webmaster Meta-Tags. Single click sitemap submission to Google, Bing, Yahoo and Ask. Add tracking code for Google, Clicky, 103Bees analytics. It uses the wp_head() and wp_footer() hooks built in to WordPress to add content to your header and/or footer. There are more to come in next releases. Stay tuned.

**Features**

* NEW: getClicky.com analytics option added (in v0.9.7)
* NEW: 103Bees.com analytics option added
* NEW: XML Sitemap submission to Google.com, Yahoo.com and Ask.com (in v0.9.5)
* NEW: Warning/Success/Failure messages added
* Option to add Google, Bing, Yahoo Webmaster Meta-Tag
* Option to add Google Analytics code

**My other plugins**

* Twitter Goodies
* WP Archive-Sitemap Generator

== Installation ==
1. Unpack the `download-package`.
2. Upload the file to the `/wp-content/plugins/` directory.
3. Activate the plugin through the `Plugins` menu in WordPress.
4. Configure the options under Admin Panel `Settings -> All in one Webmaster`.
5. Done and Ready.

== Frequently Asked Questions ==

= Where to find Google, Bing, Yahoo webmaster META tag? =
Visit links provided in `Settings -> All in One Webmaster` to get your META tag. This is an easiest way to authenticate your sites.

= Google Analytics Account ID =
Find an Account ID, starting with UA- in your Google Analytics's Account overview page.

= I have updated all my options but why am I not able to authenticate to site or don't see analytics? =
I assume that `wp_head()` and `wp_footer()` are there in your theme. According to the WordPress documentation both functions are theme-dependent which means that it is up to the author of each WordPress theme to include it. If one of the hooks is not in your theme, you could add it yourself by adding <?php wp_head(); ?> to your header.php file of your theme or <?php wp_footer(); ?> to footer.php.

= Found Bug? =
Please report all you bug on Plugin Homepage.

== Screenshots ==
1. All in one Webmaster Admin page
2. Warning message
3. Success notification
4. Failure message

== Change Log ==

= 0.9.7 =
* NEW: getClicky.com analytics option added
* NEW: 103Bees.com analytics option added
* Added help image

= 0.9.5 = 
* NEW: XML Sitemap submission to Google.com, Yahoo.com and Ask.com (alpha release, report your bugs)
* NEW: Validation/Warning/Success/Failure message status
* Some minor UI changes

= 0.9.2 =
* Changed Google Analytics option. (Now user has to add only ID field)

= 0.9.1 =
* Initial release
* Option to add Google, Bing, Yahoo Webmaster META tag
* Option to add Google Analytics code into blog
* More options into next releases
