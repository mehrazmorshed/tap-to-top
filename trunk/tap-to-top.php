<?php

/**
 * Plugin Name:       Tap To Top - Scroll Up Button for Back To Top
 * Plugin URI:        https://wordpress.org/plugins/tap-to-top/
 * Description:       Tap the button and scroll to top immediately.
 * Version:           1.4.4
 * Tested Up to:      6.3.2
 * Requires at least: 4.4
 * Requires PHP:      7.0
 * Author:            Mehraz Morshed
 * Author URI:        https://profiles.wordpress.org/mehrazmorshed/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       tap-to-top
 * Domain Path:				/languages
 */

/**
 * Tap To Top is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Tap To Top is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

if( ! defined( 'ABSPATH' ) ) {

    exit;
}

function taptotop_load_textdomain() {

	load_plugin_textdomain( 'tap-to-top', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}
add_action( 'init', 'taptotop_load_textdomain' );

function taptotop_option_page() {

	add_menu_page( 'Tap To Top Option', 'Tap To Top', 'manage_options', 'tap-to-top', 'taptotop_create_page', 'dashicons-admin-plugins', 101 );
}
add_action( 'admin_menu', 'taptotop_option_page' );

function taptotop_style_settings() {

	wp_enqueue_style( 'taptotop-settings', plugins_url( 'css/taptotop-settings.css', __FILE__ ), false, "1.0.0" );
}
add_action( 'admin_enqueue_scripts', 'taptotop_style_settings' );

function taptotop_create_page() {
	?>
	<div class="taptotop_main">
		<div class="taptotop_body taptotop_common">
			<h1 id="page-title"><?php esc_attr_e( 'Tap To Top Settings', 'tap-to-top' ); ?></h1>
			<form action="options.php" method="post">
				<?php wp_nonce_field( 'update-options' ); ?>
				<!-- Primary Color -->
				<label for="taptotop-primary-color" name="taptotop-primary-color"><?php esc_attr_e( 'Primary Color', 'tap-to-top' ); ?></label>
				<input type="color" id="taptotop-primary-color" name="taptotop-primary-color" value="<?php print get_option( 'taptotop-primary-color' ); ?>">
				<br><br>
				<!-- Border Color -->
				<label for="taptotop-border-color" name="taptotop-border-color"><?php esc_attr_e( 'Border Color', 'tap-to-top' ); ?></label>
				<input type="color" id="taptotop-border-color" name="taptotop-border-color" value="<?php print get_option( 'taptotop-border-color' ); ?>">
				<br><br>
				<!-- Button Position -->
				<label for="taptotop-rounded-corner"><?php esc_attr_e( 'Button Position', 'tap-to-top' ); ?></label>
				<label class="radios">
					<input type="radio" name="taptotop-button-position" id="taptotop-button-position-no" value="false" <?php if( get_option(' taptotop-button-position' ) == 'false' ) { echo 'checked="checked"'; } ?>>
					<span><?php _e( 'Right', 'tap-to-top' ); ?></span>
				</label>
				<label class="radios">
					<input type="radio" name="taptotop-button-position" id="taptotop-button-position-yes" value="true" <?php if( get_option(' taptotop-button-position' ) == 'true' ) { echo 'checked="checked"'; } ?>>
					<span><?php _e( 'Left', 'tap-to-top' ); ?></span>
				</label>
				<!-- Button Shape -->
				<label for="taptotop-rounded-corner"><?php esc_attr_e( 'Button Shape', 'tap-to-top' ); ?></label>
				<label class="radios">
					<input type="radio" name="taptotop-rounded-corner" id="taptotop-rounded-corner-no" value="false" <?php if( get_option( 'taptotop-rounded-corner' ) == 'false' ) { echo 'checked="checked"'; } ?>>
					<span><?php _e( 'Circular', 'tap-to-top' ); ?></span>
				</label>
				<label class="radios">
					<input type="radio" name="taptotop-rounded-corner" id="taptotop-rounded-corner-yes" value="true" <?php if( get_option( 'taptotop-rounded-corner' ) == 'true' ) { echo 'checked="checked"'; } ?>>
					<span><?php _e( 'Square', 'tap-to-top' ); ?></span>
				</label>
				<!--  -->
				<input type="hidden" name="action" value="update">
				<input type="hidden" name="page_options" value="taptotop-primary-color, taptotop-border-color, taptotop-button-position, taptotop-rounded-corner">
				<br>
				<input class="button button-primary" type="submit" name="submit" value="<?php _e( 'Save Changes', 'tap-to-top' ) ?>">
			</form>
		</div>
		<div class="taptotop_aside taptotop_common">
			<!-- about plugin author -->
			<h2 class="aside-title"><?php esc_attr_e( 'About Plugin Author', 'tap-to-top' ); ?></h2>
			<div class="author-card">
				<a class="link" href="https://profiles.wordpress.org/mehrazmorshed/" target="_blank">
					<img class="center" src="<?php print plugin_dir_url( __FILE__ ) . '/img/author.png'; ?>" width="128px">
					<h3 class="author-title"><?php esc_attr_e( 'Mehraz Morshed', 'tap-to-top' ); ?></h3>
					<h4 class="author-title"><?php esc_attr_e( 'WordPress Developer', 'tap-to-top' ); ?></h4>
				</a>
				<h1 class="author-title">
					<a class="link" href="https://www.facebook.com/mehrazmorshed" target="_blank"><span class="dashicons dashicons-facebook"></span></a>
					<a class="link" href="https://twitter.com/mehrazmorshed" target="_blank"><span class="dashicons dashicons-twitter"></span></a>
					<a class="link" href="https://www.linkedin.com/in/mehrazmorshed" target="_blank"><span class="dashicons dashicons-linkedin"></span></a>
					<a class="link" href="https://www.youtube.com/@mehrazmorshed" target="_blank"><span class="dashicons dashicons-youtube"></span></a>
				</h1>
			</div>
			<!-- other useful plugins -->
			<h3 class="aside-title"><?php esc_attr_e( 'Other Useful Plugins', 'tap-to-top' ); ?></h3>
			<div class="author-card">
				<a class="link" href="https://wordpress.org/plugins/customized-login/" target="_blank">
					<span class="dashicons dashicons-admin-plugins"></span> <b><?php _e( 'Customized Login', 'tap-to-top' ) ?></b>
				</a>
				<hr>
				<a class="link" href="https://wordpress.org/plugins/hide-admin-navbar" target="_blank">
					<span class="dashicons dashicons-admin-plugins"></span> <b><?php _e( 'Hide Admin Navbar', 'tap-to-top' ) ?></b>
				</a>
				<hr>
				<a class="link" href="https://wordpress.org/plugins/dynamic-backdrop" target="_blank">
					<span class="dashicons dashicons-admin-plugins"></span> <b><?php _e( 'Dynamic Backdrop', 'tap-to-top' ) ?></b>
				</a>
				<hr>
				<a class="link" href="https://wordpress.org/plugins/unlink-comment-author" target="_blank">
					<span class="dashicons dashicons-admin-plugins"></span> <b><?php _e( 'Unlink Comment Author', 'tap-to-top' ) ?></b>
				</a>
			</div>
			<!-- donate to this plugin -->
			<h3 class="aside-title"><?php esc_attr_e( 'Tap To Top', 'tap-to-top' ); ?></h3>
			<a class="link" href="https://www.buymeacoffee.com/mehrazmorshed" target="_blank">
				<button class="button button-primary btn"><?php esc_attr_e( 'Donate To This Plugin', 'tap-to-top' ); ?></button>
			</a>
		</div>
	</div>
	<?php
}

function taptotop_enqueue_style() {

	wp_enqueue_style( 'taptotop-style', plugins_url( 'css/taptotop-style.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'taptotop_enqueue_style' );

function taptotop_enqueue_script() {

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'taptotop-script', plugins_url( 'js/taptotop-script.js', __FILE__ ), array(), '1.0.0', 'true' );
}
add_action( 'wp_enqueue_scripts', 'taptotop_enqueue_script' );

function taptotop_activate_plugin() {
	?>
	<script>
		jQuery(document).ready(function(){
			jQuery.scrollUp();
		});
	</script>
	<?php
}
add_action( 'wp_footer', 'taptotop_activate_plugin' );

function taptotop_customize_css(){
  ?>
  <style>
    #scrollUp {
    background-color: <?php print get_option('taptotop-primary-color'); ?> !important;
    border: 1px solid <?php print get_option('taptotop-border-color'); ?> !important;
    <?php if(get_option('taptotop-button-position') == 'true') {echo "left: 10px; right: auto"; } else {echo "right: 10px";}?>;
    <?php if(get_option('taptotop-rounded-corner') == 'true') {echo "border-radius: 0 !important";} else {echo "border-radius: 50px !important";}?>;
  }
  </style>
  <?php 
}
add_action( 'wp_head', 'taptotop_customize_css' );

function taptotop_plugin_activation() {

	add_option( 'taptotop_plugin_do_activation_redirect', true );
}
register_activation_hook( __FILE__, 'taptotop_plugin_activation' );

function taptotop_plugin_redirect() {

	if( get_option( 'taptotop_plugin_do_activation_redirect', false ) ) {

		delete_option( 'taptotop_plugin_do_activation_redirect' );

		if ( !isset( $_GET['active-multi'] ) ) {

			wp_safe_redirect( admin_url( 'admin.php?page=tap-to-top' ) );
			exit;
		}
	}
}
add_action( 'admin_init', 'taptotop_plugin_redirect' );
