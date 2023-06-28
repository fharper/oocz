<?php
/*
 * Plugin Name: Twitter Cards Meta - Summary Card with Large Image
 * Plugin URI: http://wpdeveloper.net/addons/twitter-cards-meta/summary-card-with-large-image/
 * Description: Summary Card with Large Image Addons for Twitter Cards Meta plugin.
 * Version: 1.0.2
 * Author: WPDeveloper.net
 * Author URI: http://wpdeveloper.net
 * License: GPLv2+
 * Text Domain: twitter-cards-meta
 * Min WP Version: 2.5.0
 * Max WP Version: 4.2
 */

if( ! defined( 'ABSPATH' ) ) wp_die( 'This is not your place!' );

add_filter( 'active_large_photo', 'active_large_photo_cb' );
function active_large_photo_cb() {
    return true;
}

add_action( 'tcm_addon_cmb', 'tcm_addon_cmb_cb' );
function tcm_addon_cmb_cb() {
    global $post;
    $twcm_options=twcm_get_options();
    $twitter_card_type=get_post_meta($post->ID,'_twcm_twitter_card_type', true);
    ?>
    <input type="radio" name="twitter_card_type" id="twitter_card_type_large_photo" value="summary_large_image" <?php echo ($twitter_card_type=="summary_large_image")?' checked="checked"':''; ?>/> <label for="twitter_card_type_large_photo">Summary Card with Large Image</label><br />
    <?php
}


/* Display a notice that can be dismissed */

add_action('admin_notices', 'twcmlsc_admin_notice');

function twcmlsc_admin_notice() {
if ( current_user_can( 'install_plugins' ) )
   {
	global $current_user ;
        $user_id = $current_user->ID;
        /* Check that the user hasn't already clicked to ignore the message */
	if ( ! get_user_meta($user_id, 'twcmlsc_ignore_notice') ) {
        echo '<div class="updated"><p>'; 
        printf(__('<b>[Notice]</b> Thanks for purchasing <strong><a href="http://wpdeveloper.net/addons/twitter-cards-meta/summary-card-with-large-image/" target="_blank">Summary Card with Large Image [Addon]</a></strong> addon! Please setup new Card type from <b><a href="options-general.php?page='.TWCM_PLUGIN_SLUG.'">Option Page</a></b>and setup your first individual Large Summary Card and go for <a href="https://cards-dev.twitter.com/validator" target="_blank">Twitter Card Validation</a> and ask for White-listing again <strong>separately</strong> for <strong>Summary Card with Large Image</strong>! <a href="%1$s">[Hide Notice]</a>'),  admin_url( 'admin.php?page=twitter-cards-meta&twcmlsc_nag_ignore=0' ));
        echo "</p></div>";
	}
    }
}

add_action('admin_init', 'twcmlsc_nag_ignore');

function twcmlsc_nag_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['twcmlsc_nag_ignore']) && '0' == $_GET['twcmlsc_nag_ignore'] ) {
             add_user_meta($user_id, 'twcmlsc_ignore_notice', 'true', true);
	}
}