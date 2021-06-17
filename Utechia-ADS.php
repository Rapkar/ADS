<?php
/*
 * @wordpress-plugin
 * Plugin Name:       Utechia ADS
 * Plugin URI:        https://Utechia.com
 * Description:       ADS FOR WP 
 * Version:           1.0
 * Requires at least: 5
 * Requires PHP:      5.6
 * Author:           Utechia(Hossein Soltanian)
 * Author URI:        https://techroot.ir
 * Text Domain:       Utechia ADS
 * Domain Path:       /languages
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 *
HTML Forms
Copyright (C) 2017-2020, Danny van Kooten, danny@ibericode.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */


// load Style
require_once(__DIR__.'/inc/Style.php');
// load Style

 //Custom Post Type function

require_once(__DIR__.'/inc/AdsPost.php');

//add link meta box 

require_once(__DIR__.'/inc/AdsMeta.php');

//Click Manage

require_once(__DIR__.'/inc/Adsmange.php');

//Change Permalink

require_once(__DIR__.'/inc/AdsAdress.php');

//update Click ajax

require_once(__DIR__.'/inc/AdsClick.php');

//update Click ajax

require_once(__DIR__.'/inc/AdsElementor.php');


?>