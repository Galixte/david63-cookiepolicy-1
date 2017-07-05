<?php
/**
*
* @package Cookie Policy Extension
* @copyright (c) 2014 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'COOKIE_ACCEPT_TEXT'	=> 'This board uses cookies to give you the best and most relevant experience. To use this board this means that you need accept the policy.<br />You can find out more about the cookies used by clicking the "Cookie policy" on the main page or the link below.<br />',
	'COOKIE_ACCEPT'			=> '[ I accept ]',
	'COOKIE_ACCESS'			=> 'Cookie Access',

	'COOKIE_BLOCK'			=> 'You cannot access links on this board until you have accepted the Cookie Policy.',

	'COOKIE_TEXT'			=> '<h3>How do we use cookies on this board?</h3>
	<p>We use files known as cookies on %1$s to improve its performance and to enhance your user experience. By using %1$s you agree that we can place these types of files on your device.</p>
<h3>What are cookies?</h3><p>Cookies are small text files that a website may put on your computer, or mobile device, when you first visit that site or one of its pages.<br /><br />
There are many functions that a cookie can serve. For example, a cookie will help the website, or another website, to recognise your device the next time you visit it. %1$s uses the term "cookies" in this policy to refer to all files that collect information in this way.<br /><br />
Certain cookies contain personal information – for example, if you click on "remember me" when logging on, a cookie will store your username. Most cookies will not collect information that identifies you, but will instead collect more general information such as how users arrive at and use %1$s, or a user’s general location.</p>
<h3>What sort of cookies does %1$s use?</h3><p>Cookies can perform several different functions:</p>
<p><b>1. Necessary Cookies</b><br />Some cookies are essential for the operation of %1$s. These cookies enable services you have specifically asked for.</p>
<p><b>2. Performance Cookies</b><br />These cookies may collect anonymous information on the pages visited. For example, we might use performance cookies to keep track of which pages are most popular, which method of linking between pages is most effective and to determine why some pages are receiving error messages.</p>
<p><b>3. Functionality Cookies</b><br />These cookies remember choices you make to improve your experience.</p>
<p>%1$s may also allow third parties to serve cookies that fall into any of the categories above. For example, like many sites, we may use Google Analytics to help us monitor our website traffic.</p>
<h3>Can a board user block cookies?</h3><p>To find out how to manage which cookies you allow, see your browser’s help section or your mobile device manual - or you can visit one of the sites below, which have detailed information on how to manage, control or delete cookies.<br /><br />
<a href="http://www.aboutcookies.org" style="text-decoration:none">www.aboutcookies.org</a><br />
<a href="http://www.allaboutcookies.org" style="text-decoration:none">www.allaboutcookies.org</a></p>
<p>Please remember that if you do choose to disable cookies, you may find that certain sections of %1$s do not work properly.</p>
<h3>Cookies on %1$s from social networking sites</h3><p>%1$s may have links to social networking websites (e.g. Facebook, Twitter or YouTube). These websites may also place cookies on your device and %1$s does not control how they use their cookies, therefore %1$s suggests you check their website(s) to see how they are using cookies.',

	'COOKIE_POLICY'			=> 'Cookie Policy',

	'COOKIE_REQUIRE_ACCESS'	=> '<h3>Cookie Acceptance Required</h3>
	<p>You must accept the Cookie Policy of %1$s before you can either register on this site or, if you are already registered, before you can login to the site.</p>',
));
