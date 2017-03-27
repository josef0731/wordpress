<?php
/**
 * Premium Theme Options displayed in admin
 *
 * @package    Hoot
 * @subpackage Divogue
 * @return array Return Hoot Options array to be merged to the original Options array
 */

$hoot_options_premium = array();
$imagepath =  HYBRIDEXTEND_INCURI . 'admin/images/';
$hoot_cta_top = '<a class="button button-primary button-buy-premium" href="http://wphoot.com/themes/divogue/" target="_blank">' . __( 'Click here to know more', 'divogue' ) . '</a>';
$hoot_cta_top = $hoot_cta = '<a class="button button-primary button-buy-premium" href="http://wphoot.com/themes/divogue/" target="_blank">' . __( 'Buy Divogue Premium', 'divogue' ) . '</a>';
$hoot_cta_demo = '<a class="button button-secondary button-view-demo" href="http://demo.wphoot.com/divogue/" target="_blank">' . __( 'View Demo Site', 'divogue' ) . '</a>';

$hoot_intro = array(
	'name' => __('Upgrade to Divogue Premium', 'divogue'),
	'desc' => __("If you've enjoyed using Divogue, you're going to love Divogue Premium.<br>It's a robust upgrade to Divogue that gives you many useful features.", 'divogue'),
	);

$hoot_options_premium[] = array(
	'name' => __('Complete Style Customization', 'divogue'),
	'desc' => __('Divogue Premium lets you select unlimited colors for different sections of your site.<hr>Select pre-existing backgrounds for site sections like header, footer etc or upload your own background images/patterns.', 'divogue'),
	'img' => $imagepath . 'premium-style.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Fonts and Typography Control', 'divogue'),
	'desc' => __('Assign different typography (fonts, text size, font color) to menu, topbar, logo, content headings, sidebar, footer etc.', 'divogue'),
	'img' => $imagepath . 'premium-typography.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Unlimites Sliders, Unlimites Slides', 'divogue'),
	'desc' => __('Divogue Premium allows you to create unlimited sliders with as many slides as you need.<hr>You can use these sliders on your Frontpage, or add them anywhere using shortcodes - like in your Posts, Sidebars or Footer.', 'divogue'),
	'img' => $imagepath . 'premium-sliders.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('600+ Google Fonts', 'divogue'),
	'desc' => __("With the integrated Google Fonts library, you can find the fonts that match your site's personality, and there's over 600 options to choose from.", 'divogue'),
	'img' => $imagepath . 'premium-googlefonts.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Shortcodes with Easy Generator', 'divogue'),
	'desc' => __('Enjoy the flexibility of using shortcodes throughout your site with Divogue premium. These shortcodes were specially designed for this theme and are very well integrated into the code to reduce loading times, thereby maximizing performance!<hr>Use shortcodes to insert buttons, sliders, tabs, toggles, columns, breaks, icons, lists, and a lot more design and layout modules.<hr>The intuitive Shortcode Generator has been built right into the Edit screen, so you dont have to hunt for shortcode syntax.', 'divogue'),
	'img' => $imagepath . 'premium-shortcodes.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Image Carousels', 'divogue'),
	'desc' => __('Add carousels to your post, in your sidebar, on your frontpage or in your footer. A simple drag and drop interface allows you to easily create and manage carousels.', 'divogue'),
	'img' => $imagepath . 'premium-carousels.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __("Floating 'Sticky' Header &amp; 'Goto Top' button (optional)", 'divogue'),
	'desc' => __("The floating header follows the user down your page as they scroll, which means they never have to scroll back up to access your navigation menu, improving user experience.<hr>Or, use the 'Goto Top' button appears on the screen when users scroll down your page, giving them a quick way to go back to the top of the page.", 'divogue'),
	'img' => $imagepath . 'premium-header-top.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('One Page Scrolling Website / Landing Page', 'divogue'),
	'desc' => __("Make One Page websites with menu items linking to different sections on the page. Watch the scroll animation kick in when a user clicks a menu item to jump to a page section.<hr>Create different landing pages on your site. Change the menu for each page so that the menu items point to sections of the page being displayed.", 'divogue'),
	'img' => $imagepath . 'premium-scroller.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('3 Blog Layouts (including pinterest type mosaic)', 'divogue'),
	'desc' => __('Divogue Premium gives you the option to display your post archives in 3 different layouts including a mosaic type layout similar to pinterest.', 'divogue'),
	'img' => $imagepath . 'premium-blogstyles.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Custom Widgets', 'divogue'),
	'desc' => __('Custom widgets crafted and designed specifically for Divogue Premium Theme to give you the flexibility of adding stylized content.', 'divogue'),
	'img' => $imagepath . 'premium-widgets.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Menu Icons', 'divogue'),
	'desc' => __('Select from over 500 icons for your main navigation menu links.', 'divogue'),
	'img' => $imagepath . 'premium-menuicons.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Premium Background Patterns (CC0)', 'divogue'),
	'desc' => __('Divogue Premium comes with many additional premium background patterns. You can always upload your own background image/pattern to match your site design.', 'divogue'),
	'img' => $imagepath . 'premium-backgrounds.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Automatic Image Lightbox and WordPress Gallery', 'divogue'),
	'desc' => __('Automatically open image links on your site with the integrates lightbox in Divogue Premium.<hr>Automatically convert standard WordPress galleries to beautiful lightbox gallery slider.', 'divogue'),
	'img' => $imagepath . 'premium-lightbox.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Developers love {LESS}', 'divogue'),
	'desc' => __('CSS is passe. Developers love the modularity and ease of using LESS, which is why Divogue Premium comes with properly organized LESS files for the main stylesheet. You can even turn on less.js during development to increase productivity.', 'divogue'),
	'img' => $imagepath . 'premium-lesscss.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Easy Import/Export', 'divogue'),
	'desc' => __('Moving to a new host? Or applying a new child theme? Easily import/export your customizer settings with just a few clicks - right from the backend.', 'divogue'),
	'img' => $imagepath . 'premium-import-export.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Custom Javascript &amp; Google Analytics', 'divogue'),
	'std' => __("Easily insert any javascript snippet to your header without modifying the code files. This helps in adding scripts for Google Analytics, Adsense or any other custom code.", 'divogue'),
	);

$hoot_options_premium[] = array(
	'name' => __('Custom CSS', 'divogue'),
	'std' => __("Add custom CSS to your theme right from the backend. If you are not a developer yourself, you can count on our support staff to help you with CSS snippets to get the look you're after. Best of all, your changes will persist across theme updates.", 'divogue'),
	);

$hoot_options_premium[] = array(
	'name' => __('Continued Updates', 'divogue'),
	'std' => __("You'll help support the continued development of Divogue - ensuring it works with future versions of WordPress for years to come.", 'divogue'),
	);

$hoot_options_premium[] = array(
	'name' => __('Premium Priority Support', 'divogue'),
	'desc' => __('Need help setting up Divogue? Upgrading to Divogue Premium gives you prioritized support. We have a growing support team ready to help you with your questions.', 'divogue'),
	'img' => $imagepath . 'premium-support.jpg',
	);