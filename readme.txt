=== GData Importer ===
Contributors: ankit_sam
Donate link: http://www.ankitsharma.info/donate
Tags: Google, Spreadsheet, Data, Import
Requires at least: 2.0.2
Tested up to: 3.3.1
Stable tag: 1.0.1

A plugin imports Google Spreadsheet Data into the Wordpress Post using shortcode.

== Description ==

A wordpress plugin I created for a client which imports Google Spreadsheet Data into the Wordpress Post using shortcode.
You have to provide Sheet Url, Worksheet Name, Username and Password in shortcode.

Usage:
[gdata_import sheet="sheeturl" worksheet="workbookname" user="yourusername" pass="yourpassword"] 

Example:
[gdata_import sheet="https://spreadsheets.google.com/feeds/spreadsheets/0AqJJ6fnIoHPYdE1qTFF 0OWtFX2xfRHU1OC1oY0JIeVV"
worksheet="Sheet1" user="yourusername" pass="yourpassword"]

== Installation ==

1. Upload `gdata-importer` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place shortcode [gdata_import] in your post

== Frequently Asked Questions ==

= Where to get spreadsheet feed url? =

Copy the spreadsheet key and paste it in the sample URL.

Sample URL: https://spreadsheets.google.com/feeds/spreadsheets/[YOUR-SPREADSHEET-KEY-HERE]

Example: https://spreadsheets.google.com/feeds/spreadsheets/0AqJJ6fnIoHPYdE1qTFF 0OWtFX2xfRHU1OC1oY0JIeVV

= I am getting error "ERROR: Unable to Connect to ssl://docs.google.com:443. Error #110: Connection timed out" =

Some hosting providers do not allow https connections to be made from their servers, Contact your Hosting to assist & solve the problem.

Refer:https://developers.google.com/gdata/articles/php_client_lib#appendix_issues_proxy


== Screenshots ==

1. NA

== Changelog ==

= 1.0.1 =
Bug Fixes.

= 1.0.0 =
Initial Release.

== Upgrade Notice ==
= 1.0.1 =
Latest Version