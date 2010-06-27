=== Plugin Name ===
Contributors: arpitshah
Tags: all in one webmaster, arpitshah, arpit, google webmaster, yahoo webmaster, bing webmaster, google analytics, meta tag generator, header, meta, footer, yahoo site explorer, Clicky, getClicky, 103Bees, compete.com, analytics, meta tag, Alexa, Alexa rank, BlogCatalog, Blog Catalog, Headers, Header, Footers, Footer, header and footer, header-footer
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=10641755
Requires at least: 2.6	
Tested up to: 3.0
Stable tag: 6.1.5

Sitemap submission to Google,Bing,Yahoo & Ask. Webmaster option for Google,Bing,Alexa,Yahoo & BlogCatalog. Analytics option for Google,Quantcast,Clicky,compete.com.Header/Footer.

== Description ==

If you are a webmaster you probably heard of `Google Webmaster Tool`. Both Yahoo and Bing have their own versions called `Yahoo SiteExplorer` and `Bing Webmaster Central`. With them you can check how your site is indexed (`Webmaster Tool`), get detailed statistics (`Analytics Tool`), earn money (`Google AdSense`) and more. 

This plugin allows you to easily integrate them with your blog. It has option to add `Google, Bing, Alexa, Blog Catalog, Yahoo's` Webmaster and Analytics code (`meat tags`). `Single click sitemap submission` to `Google`, `Bing`, `Yahoo` and `Ask`. In addition to that it has option to add tracking code for Clicky, Quantcast, Compete.com analytics!! Site-Verification-Option, Google XML sitemap submission. There are more to come in next releases. Stay tuned.

**Features**

* Sitemap Submission Option to Google, Bing, Yahoo and Ask.com
* Manual HTML `Header / Footer` section added
* Now no need to install more plugins. You can just copy the code of any services in a textarea. No more things to do.

**Webmaster Option for**

* Google, Yahoo, Bing, Alexa Ranks (new), BlogCatalog (new)

**Analytics Option for**

* Google, Quantcast (new), GetClicky, compete.com (new)
* NEW: Updates the `Asynchronous Tracking` snippet to the latest version provided by Google
* Warning/Success/Failure messages added

**My other plugins**

* WP Google-buzz
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
* Visit links provided in `Settings -> All in One Webmaster` to get your META tag. This is an easiest way to authenticate your sites.

= Google Analytics Account ID =
* Find an Account ID, starting with UA- in your Google Analytics's Account overview page.

= I have updated all my options but why am I not able to authenticate to site or don't see analytics? =
* I assume that `wp_head()` and `wp_footer()` are there in your theme. According to the WordPress documentation both functions are theme-dependent which means that it is up to the author of each WordPress theme to include it. If one of the hooks is not in your theme, you could add it yourself by adding `<? php wp_head(); ?>` to your header.php file of your theme or `<? php wp_footer(); ?>` to footer.php. 

* If you still have problem then try to clear your browser cache, update Admin Panel option and retry.

= How can I add more service meta tags which are not listed here? =
* No worries. You can add those service's HTML code into text area provided in admin panel. 

= Still have a question? =
* Please report all you bug on Plugin Homepage.

== Screenshots ==
1. All WebMaster Options
2. All Analytics Options
3. Header/Section Option and Sitemap submission option to Google, Bing, Yahoo and Ask.com
4. New Google Asynchronous Tracking Code
5. Sitemap submission result in Admin Panel

== Changelog ==

= 6.1.5 =
* NEW: Most popular compete.com analytics option added
* Remvoed 103Bees analytics as it reached the Dead Pool
* New and improved Admin Panel. Now more visibility

= 5.6.5 =
* Fixed minor bug

= 5.1.5 =
* `Header/Footer` section added `(MOST requested feature)`
* Now no need to install more plugins. You can just copy the code of any services in a textarea. No more things to do.
* More cleaner code
* Fully WordPress 3.0 compatible
* Removed old unnecessary versions from repository

= 4.5.5 =
* As requested added `Quantcast` Web Analytics option
* Changes to Admin Panel UI
* More robust code

= 4.1.5 =
* Added `BlogCatalog` meta tag option
* META -> meta(lowercase) for Alexa and Yahoo meta tag option 
