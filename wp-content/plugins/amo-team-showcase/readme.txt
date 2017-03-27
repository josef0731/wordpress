=== AMO Team Showcase ===
Contributors: amothemo
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=V493YB5DQ5HVW
Tags: team, team widget, team member widget, teams, meet the team, meet the staff, team showcase, team grid, staff grid, team shortcode, about us, responsive team, team builder, team profile, members profile, members profiles, team members profile, our team, our staff, team member, team members, team member showcasing, team plugin, responsive team plugin, team member display, wordpress team, members, staff, employees, workers, people, cv, staff bio, member staff, команда, о компании, о нас, персонал, работники, профиль работника, участник команды, член команды, виджет команды
Requires at least: 4.6
Tested up to: 4.7.2
Stable tag: 1.0.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily showcase members of your team/company and their info in sleek, responsive and professional way.

== Description ==
[**Live DEMO**]( http://amothemo.com/amo-team-showcase-demo/ "Live plugin demo")

> **IMPORTANT SUPPORT NOTICE:**<br>
*From 7th March and until 18th March I will not be able to provide plugin support. Thank you for understanding.*

A powerful but an easy way to present your team/staff members and their profiles with beautifully styled descriptions, skills and links to social media.

The plugin is fully responsive.
Moreover, it is a highly customizable plugin. You can change colors, font sizes, spacings etc. from powerful, yet concise and super easy to use plugin options panel. Choose from 3 different styles for member thumbnails.

The plugin adds an “AMO Team” menu section to the admin panel. There you can easily create team members, assign them to categories, add their images, position, bios, skills, social links, set info panel format (image, link, standard or quote) and display them on any post or page, with a simple but powerful “team” or “member” shortcodes. Also there is a widget to show members in a sidebar/widget are.

**Quick Start Video:** (RECORDED WITHOUT SOUND)
https://www.youtube.com/watch?v=MtLALyZwluc

= A few unique features of the plugin: =
* Post formats for team member: image, quote, standard or link.
* Member info panel with styled “text block” and “skills” shortcodes/blocks. Can be turned off.
* 3 different styles for member thumbnails (more are coming).
* Fully and very easily customizable look by options panel.
* The plugin made with an accent on simplicity, and it is easy to use.
* Has a widget to show members in any sidebar/widget area.
* Sleek, clean and modern design.

= Fully Translatable =
* POT file included (/languages/), English.
* RTL languages supported.
* Russian translation included (PO/MO files).


= Usage: =
[**Plugin Documentation**]( http://amothemo.com/docs/amo-team-showcase-documentation/en/ "Plugin documentation, mostly for shortcodes, at the moment.")<br>
The documentation implemented in languages: English and Russian.

= Support for Users: =
*If you have any questions, information about bugs, or maybe some suggestions. Please feel free to ask or tell about them on the [**support forum**]( https://wordpress.org/support/plugin/amo-team-showcase).*

= Files, Sources and Credits =
[**See the list**]( http://amothemo.com/amo-team-showcase-demo/files-and-credits/) of images, fonts, JavaScript / PHP libraries, etc., which are used in the plugin and in its demo.<br>
The person icon in the banner is [designed by Freepik]( http://www.freepik.com ).

= Support the plugin if you like it =
If you like the plugin or it helped you someway, please leave a [**review**]( https://wordpress.org/support/plugin/amo-team-showcase/reviews/), or make a [**donation**]( https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=V493YB5DQ5HVW). That will also help to keep my interest in its further development and support. Thank you!


== Installation ==
1. Upload the entire `amo-team-showcase` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

You will find 'AMO Team' menu in your WordPress admin panel.


== Frequently Asked Questions ==

= Is there quick start video for the plugin and documentation? =
Yes, there is.
[**Quick Start Video**]( http://amothemo.com/docs/amo-team-showcase-documentation/en/#ds-quic-start "All the essentials one need to know to use the plugin") (recorded without sound).
[**Plugin Documentation**]( http://amothemo.com/docs/amo-team-showcase-documentation/en/ "Plugin documentation, mostly for shortcodes, at the moment.").

= Scrolling in member info panel doesn't work. What to do? =
You can try to enable alternative scrolling. Go to plugin Options -> Panel (tab) and turn on the Alternative Scrolling. Best looks with centered panel.

= How to display team members in a certain order? =
At the moment, there is only one way to do this. Use [Team Member]( http://amothemo.com/docs/amo-team-showcase-documentation/en/index.html#sc-member "Link to the plugin documentation, “Team Member” shortcode section.") shortcode. The order in which you specified members’ IDs in “id” attribute of the shortcode (for example, id=”31,10,241”), will be used to display the members.

= What themes or plugins don’t work with AMO Team Showcase? =
The plugin doesn’t work with Divi theme (for example), the theme uses MagnificPopup JS too and there is a conflict. The same issue may arise with other plugins or themes, which use MagnificPopup (a js plugin/library). If you click on member thumbnail and info panel doesn't appear, that's most probably the MagnificPopup JS conflict.

== Screenshots ==
1. Team members. Frontend view.
2. Opened info panel of a team member (on mouse click). Frontend view.
3. Plugin options / settings. Admin view.
4. Editing of a team member and his settings. Admin view.
5. List of all team members. Admin view.

== Changelog ==
= 1.0.8 =
* FEATURE – Alternative scrolling for member info panel.
* FEATURE – Added new "Style 1.1" variation of "Style 1".
* FIXED – A bunch of small CSS fixes, and a few little PHP and JavaScript fixes too.
<br>*(01 Mar, 2017)*

= 1.0.7 =
* FIXED – All the images in member info panel were replaced by the member image (image post type).
* FIXED – Plugin used WordPress reading settings (for posts) to determine max number of members to output with “Member” shortcode.
* FEATURE – Added widget – “AMO Team Members”.
<br>*(15 Feb, 2017)*

= 1.0.6 =
* FEATURE – Ability to choose alignment for title & subtitle block of member thumbnail, left or right. Plugin Options.
* FEATURE – Ability to load member image in the info panel (image post type) along with the page or on mouse hover over the member thumbnail (on click on mobile). Plugin Options.
* TWEAK – Ability to place shortcodes inside “Text Block” shortcode.
* TWEAK – Display "WP version" and "Regenerate Thumbnails" plugin's notices only on plugin activation, and not on update.
* DEV – Added a filter to hook to output of dynamic (compiled from plugin’s options) CSS.
* DEV – Added a few more social media icons and a generic site icon.
<br>*(08 Feb, 2017)*

= 1.0.5 =
* DEV – Now compiled / dynamic CSS is generated and new plugin options are merged with existing ones on plugin activation / update.
* DEV – Added a notice on required WP version for the plugin.
* DEV – Added loading animation for AJAX actions/events in admin part of the plugin.
* DEV – code refactoring related to admin part of the plugin
* FIXED – Prevented deletion of attachments / images info from database on plugin uninstall ( when “Delete Custom Post Type” option is enabled)
* FIXED – Small CSS fixes for member info panel
* FEATURE – Social icons in Team Member settings have become sortable now.
* DEV/LOCALIZATION  – RTL languages are now supported
<br>*(01 Feb, 2017)*

= 1.0.3 =
* FIXED – Wrong links to the documentation from plugin screens, the function responsible for that now has information about languages available in documentation (English, Russian).
* FIXED – Wrong compiled / dynamic CSS file was shipped with the plugin. (Uploaded it earlier without changing plugin's version.)
<br>*(29 Jan, 2017)*

= 1.0.2 =
* FIXED (CSS) – Now info panel shortcodes (Text block and Skills) look properly, not only in info panel but in post/page content too.
* FIXED (CSS) – A few little CSS fixes for shortcodes.
* FEATURE - Added 2 new settings in the plugin options: Title and subtitle font size settings for info panel shortcodes (currently Skills and Text block).
* TWEAK - “Team Member” shortcode, members ordering fix. Now members are ordered in the same order as they specified in the shortcode’s id=”” attribute / parameter.
<br>*(26 Jan, 2017)*

= 1.0.0 =
* Initial release *(23 Jan, 2017)*.