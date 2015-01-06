<?php
/**
 * Plugin Name: Zing!
 * Description: Turn your admin panel upside down. Literally.
 * Version: 0.1.0
 * Author: Frankie Jarrett
 * Author URI: http://frankiejarrett.com
 * License: GPLv2+
 * Text Domain: zing
 */

/**
 * Add a custom class to the body element
 *
 * @filter admin_body_class
 *
 * @return string
 */
function zing_admin_body_class( $classes ) {
	$classes .= ' zing ';

	return $classes;
}
add_filter( 'admin_body_class', 'zing_admin_body_class' );

/**
 * Modify the DOM on all admin screens
 *
 * @filter admin_head
 *
 * @return void
 */
function zing_admin_head() {
	?>
	<script>
	jQuery( document ).ready( function( $ ) {
		$( document ).keypress( function( e ) {
			if ( 122 === e.which ) {
				$( 'body' ).toggleClass( 'zing' );
			}
		});
	});
	</script>
	<style type="text/css">
	body.zing #wpbody {
		margin: 0 18px 0 -18px;

		    -ms-transform: rotate(180deg); /* IE 9 */
		   -moz-transform: rotate(180deg); /* Firefox */
		-webkit-transform: rotate(180deg); /* Chrome, Safari, Opera */
		        transform: rotate(180deg);
	}
	</style>
	<?php
}
add_action( 'admin_head', 'zing_admin_head' );
