<?php

/**
 * Plugin Name:       Tap To Top
 * Plugin URI:        https://wordpress.org/plugins/tap-to-top/
 * Description:       Tap the button and scroll to top immidiately.
 * Version:           1.0.0
 * Tested Up to:      6.1.1
 * Author:            Mehraz Morshed
 * Author URI:        https://profiles.wordpress.org/mehrazmorshed/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       taptotop
 */

/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

// enqueue style
function taptotop_enqueue_style() {
	wp_enqueue_style('taptotop-style', plugins_url('css/taptotop-style.css', __FILE__));
}
add_action( "wp_enqueue_scripts", "taptotop_enqueue_style" );

// enqueue script
function taptotop_enqueue_script() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('taptotop-script', plugins_url('js/taptotop-script.js', __FILE__), array(), '1.0.0', 'true');
}
add_action( "wp_enqueue_scripts", "taptotop_enqueue_script" );

// activate plugin
function taptotop_activate_plugin() {
	?>
	<script>
		jQuery(document).ready(function(){
			jQuery.scrollUp();
		});
	</script>
	<?php
}
add_action( "wp_footer", "taptotop_activate_plugin" );
