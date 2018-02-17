<?php
/**
 * Plugin Name:    SB Posts Front Page
 * Plugin URI:     https://github.com/svenbrier/sb-posts-front-page
 * Description:    Display a different number of posts on the front page than defined in "<em>Settings › Reading › Blog pages show at most</em>".
 * Version:        1.0.0
 * Author:         Sven Brier
 * Author URI:     https://svenbrier.com
 * License:        GPLv2
 * License URI:    https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain:    sb-posts-front-page
 * Domain Path:    /languages
 */

declare( strict_types=1 );
// Supported >= PHP 5.3
namespace SbPostsFrontPage;

require_once __DIR__ . '/includes/Admin.php';

$admin = new Admin( __FILE__ );
$admin->actionWrapper();

add_action( 'pre_get_posts', function ( \WP_Query $query ) Use ( $admin ) {

	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( is_home() ) {
		$query->set( 'posts_per_page', get_option( $admin::OPTIONNAME ) );

		return;
	}

} );

