<?php




//Tyler's BuddyPress additions
define ( 'BP_AVATAR_THUMB_WIDTH', 50 );
define ( 'BP_AVATAR_THUMB_HEIGHT', 50 );
define ( 'BP_AVATAR_FULL_WIDTH', 150 );
define ( 'BP_AVATAR_FULL_HEIGHT', 150 );
define ( 'BP_AVATAR_ORIGINAL_MAX_WIDTH', 640 );
//define ( 'BP_AVATAR_ORIGINAL_MAX_FILESIZE', 500000 );



//end Tyler's additions


/**
 * Redirect non-admins to the homepage after logging into the site.
 *
 * @since   1.0
 */


function acme_login_redirect( $redirect_to, $request, $user  ) {
    return ( is_array( $user->roles ) && in_array( 'administrator', $user->roles ) ) ? admin_url() : site_url('/home-feed/');
}
add_filter( 'login_redirect', 'acme_login_redirect', 10, 3 );




//Redirect users to Index after logout
add_action('wp_logout','go_home');
function go_home(){
  wp_redirect( site_url() );
  exit();
}



/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);












// REMOVE Defaults
// ---GoogleFonts OpenSans font, and older jquery
function my_deregister_styles() {
    wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false );
}
add_action( 'wp_enqueue_scripts', 'my_deregister_styles');

// ---Auto-loaded emoji scripts
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );



/**
 * Set title based on current view.
 *
 * @since Twenty Twelve 1.0
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function extra_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;

    // Add the site name.
    $title .= get_bloginfo( 'name' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'standrewshamble' ), max( $paged, $page ) );

    return $title;
}
add_filter( 'wp_title', 'extra_wp_title', 10, 2 );



// Theme Scripts
function theme_scripts() {
	wp_enqueue_script('jquery'); // default jQuery
}
add_action( 'wp_enqueue_scripts', 'theme_scripts');



?>