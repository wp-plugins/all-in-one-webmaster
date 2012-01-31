=== All in One Webmaster ===
Contributors: netcrunched
Tags: All in One Webmaster
Requires at least: 3.2
Tested up to: 3.3.1
Stable tag: 7.5.3

Sitemap submission to Google,Bing,Yahoo & Ask. Webmaster option for Google,Bing,Alexa,Yahoo,Facebook & BlogCatalog. Analytics option for Google,Quantcast,Clicky,compete.com.Header/Footer.

== Description ==

<a href="http://netcrunched.com/plugins/all-in-one-webmaster/" target="_blank">Homepage</a> 
<a href="http://www.facebook.com/pages/NetCrunched/310777122307297" target="_blank">Facebook Page</a>. 

If you are a webmaster you probably heard of `Google Webmaster Tool`. Both Yahoo and Bing have their own versions called `Yahoo SiteExplorer` and `Bing Webmaster Central`. With them you can check how your site is indexed (`Webmaster Tool`), get detailed statistics (`Analytics Tool`), earn money (`Google AdSense`) and more. 

This is very simple plugin with out any complicated code. It adds your requested meta tags into header and java script code to footer of your blog. You are most welcome to advise on any improvement or bug. I created this plugin as of my personal interest only. 

This plugin allows you to easily integrate them with your blog. It has option to add `Google, Bing, Alexa, Blog Catalog, Yahoo's` Webmaster and Analytics code (`meat tags`). `Single click sitemap submission` to `Google`, `Bing`, `Yahoo` and `Ask`. In addition to that it has option to add tracking code for Clicky, Quantcast, Compete.com, SiteMeter.com analytics!! Site-Verification-Option, Google XML sitemap submission. There are more to come in next releases. Stay tuned.

**Features**

1) Sitemap Submission Option to Google, Bing, Yahoo and Ask.com
2) Manual HTML Header / Footer section
3) Now no need to install more plugins. You can just copy the code of any services in a textarea. No more things to do.
4) NEW: Updates the Asynchronous Tracking snippet to the latest version provided by Google
5) Warning/Success/Failure messages on sitemap submission`

**New in PRO version**

1) Most popular StatCounter analytics option.
2) Option to Exclude login user's click/hit for Google Analytics.
3) Facebook Insight option for your Pages and Apps.

**Analytics Option for**

1) Google
2) Quantcast
3) GetClicky
4) Compete.com
5) SiteMeter.com`

**Webmaster Option for**

1) Google
2) Yahoo
3) Bing
4) Alexa Ranks (new)
5) BlogCatalog (new)
6) Facebook Insights

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
* Please report all your bug on Plugin <a href="http://netcrunched.com/plugins/all-in-one-webmaster/" target="_blank">Homepage</a> and stay tuned on NetCrunched <a href="http://www.facebook.com/pages/NetCrunched/310777122307297" target="_blank">Facebook Page</a>. 
* NOTE: This is very simple plugin with out any complicated code. It adds your requested meta tags into header and java script code to footer of your blog. You are most welcome to advise on any improvement. I created this plugin as of my personal interest only. 

== Screenshots ==
1. All WebMaster Options
2. All Analytics Options
3. Header/Section Option and Sitemap submission option to Google, Bing, Yahoo and Ask.com
4. Sitemap submission result in Admin Panel
