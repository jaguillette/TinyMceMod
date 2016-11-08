TinyMCE Mod
===========

This plugin for Omeka is set up to overwrite some TinyMCE settings, and was made out of a desire to change the behavior of TinyMCE to make it more permissive of different HTML tags without changing the globals.js file in core Omeka. This plugin removes globals.js from the queue of js files, and replaces it with tinyMCEmod.js. This file is a copy of globals.js, but with some modifications to the functionality of TinyMCE.
