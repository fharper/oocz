<?php

/**
 * Coopetition theme setup
 */
function coop_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	register_nav_menu( 'sidebar-top', __('Top Navigation Menu', 'coop') );
}
add_action( 'after_setup_theme', 'coop_setup' );


/**
 * Initialize sidebars and widgets areas
 */
function coop_init() {

	// Workaround for problem with custom menus
	register_sidebar(array(
		'name' => __('Top Navigation Links', 'coop'),
		'id' => 'sidebar-top',
		'before_title' => '',
		'after_title' => ''
	));


	register_sidebar(array(
		'name' => __('Main Sidebar', 'coop'),
		'id' => 'main-sidebar',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	
}
add_action( 'widgets_init', 'coop_init', 1 );

/**
 * Based on work by mono-lab
 * <http://www.mono-lab.net>
 * @package piano-black
 * @since version 1.0.0
 */
function get_first_post_year() {
	
	global $wpdb;
	
	$post_datetimes = $wpdb->get_row(
		$wpdb->prepare( "SELECT YEAR(min(post_date_gmt)) AS firstyear, YEAR(max(post_date_gmt)) AS lastyear FROM $wpdb->posts WHERE post_date_gmt > 1970" )
		);

	if ( $post_datetimes ) {
		$firstpost_year = $post_datetimes->firstyear;
	}

	return $firstpost_year;
}

/**
 * @since version 1.0.0
 */
function display_copyright_date_span() {
	
	$first_year = get_first_post_year();
	$current_year = date( 'Y' );

	if ( $first_year != $current_year ) {
		echo $first_year . '-' . $current_year;
	}
	else { echo $current_year; }
}


/**
 * Lower Bootstrap header position if user is logged in
 */
function coop_fix_sidebar_top_position() {
	if (is_user_logged_in()) {
?>
	<style type="text/css" media="screen">
		body { padding-top: 60px; }
		.navbar-fixed-top { top: 28px; border-top: 1px solid #666; }
	</style>
<?php
	}
}

/**
 * @todo Abstraction + Refactoring
 */
function coop_bootstrap_list_pages() {
	
	$args = array(
	    'child_of' => 0,
	    'sort_order' => 'ASC',
	    'sort_column' => 'post_title',
	    'hierarchical' => 1,
	    'exclude' => '',
	    'include' => '',
	    'meta_key' => '',
	    'meta_value' => '',
	    'authors' => '',
	    'parent' => 0,
	    'exclude_tree' => '',
	    'number' => '',
	    'offset' => 0,
	    'post_type' => 'page',
	    'post_status' => 'publish'
	);
	
	$pages = get_pages( $args );

	$query = new WP_Query();
	$all_pages = $query->query(array('post_type' => 'page'));
	
	foreach ($pages as $page) {

		$childs = get_page_children($page->ID, $all_pages);
		$grand_childs = get_page_children($childs->ID, $all_pages);
		
		if ($childs[0] != '') {
			echo '<li class="dropdown"><a href="';
			echo get_permalink($page->ID);
			echo '" class="dropdown-toggle" data-toggle="dropdown">'. $page->post_title .' <b class="caret"></b></a>' . "\n";
			echo '<ul class="dropdown-menu">' . "\n";
			foreach ($childs as $child) {
				echo '<li><a href="';
				echo get_permalink($child->ID);
				echo '">'. $child->post_title .'</a>';
				echo "</li>\n";
			}
			echo "</ul>\n</li>\n";
		} else {
			echo '<li><a href="';
			echo get_permalink($page->ID);
			echo '">'. $page->post_title .'</a>';
			echo "</li>\n";
		}
	}
}

/**
 * @todo Abstraction + Refactoring
 */
function coop_navbar_submenu_list_parents() {
	
	$args = array(
	    'child_of' => 0,
	    'sort_order' => 'ASC',
	    'sort_column' => 'post_title',
	    'hierarchical' => 1,
	    'exclude' => '',
	    'include' => '',
	    'meta_key' => '',
	    'meta_value' => '',
	    'authors' => '',
	    'parent' => 0,
	    'exclude_tree' => '',
	    'number' => '',
	    'offset' => 0,
	    'post_type' => 'page',
	    'post_status' => 'publish'
	);
	
	$pages = get_pages( $args );

	$query = new WP_Query();
	$all_pages = $query->query(array('post_type' => 'page'));
	
	foreach ($pages as $page) {

		$childs = get_page_children($page->ID, $all_pages);
		$grand_childs = get_page_children($childs->ID, $all_pages);
		
		if ($childs[0] != '') {
		?>
			<div class="btn-group">
				<button class="btn"><a href="<?php echo get_permalink($page->ID); ?>" title="<?php echo $page->post_title; ?> | <?php bloginfo('name');?>"><?php echo $page->post_title; ?></a></button>
				<button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
			</div><!-- /btn-group -->
		<?php
		} else {
			?>
				<div class="btn-group">
					<button class="btn"><a href="<?php echo get_permalink($page->ID); ?>" title="<?php echo $page->post_title; ?> | <?php bloginfo('name');?>"><?php echo $page->post_title; ?></a></button>
				</div><!-- /btn-group -->
			<?php
		}
	}
}

// Puts link in excerpts more tag
function new_excerpt_more($more) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');



if ( ! function_exists( 'twentyeleven_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyeleven_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><span>Trackback:</span> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?></p>
		<p class="comment-excerpt"><?php comment_excerpt(); ?></p>
		<p class="comment-author-url"><a href="<?php comment_author_url(); ?>"><?php comment_author_url(); ?></a></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 39;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size, get_bloginfo('template_url').'/medias/images/architecture/avatar-default.jpg' );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s', 'twentyeleven' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'twentyeleven' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyeleven' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>
			<div class="comment-date">
				<span class="date"><?php comment_time('m/d/Y h:iA'); ?></span>
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply ', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => 10 ) ) ); ?>
					<img src="<?php bloginfo('template_url'); ?>/medias/images/architecture/reply.jpg" alt="">
				</div><!-- .reply -->
			</div>
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for twentyeleven_comment()


// Surround content in [embed] shortcode	
function add_video_embed_note($html, $url, $attr) {
	return "<!-- Embed Container -->
	<div class='embed-container'>" . $html . "</div>
	<!--//end embed-container-->";
}
add_filter('embed_oembed_html', 'add_video_embed_note', 10, 3);

//Responsive image avec caption
add_filter( 'img_caption_shortcode', 'dap_responsive_img_caption_filter', 10, 3 );function dap_responsive_img_caption_filter( $val, $attr, $content = null ) {	extract(shortcode_atts( array(		'id' => '',		'align' => '',		'width' => '',		'caption' => ''		), 	$attr));		if ( 1 > (int) $width || empty($caption) )		return $val;	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';	return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="max-width: 100% !important; height: auto; width: ' . (10 + (int) $width) . 'px">'	. do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';}


//Custom admin login logo
function custom_login_logo() {
	echo '<style type="text/css">
	.login h1 a { background-image: url('.get_bloginfo('template_directory').'/medias/images/logos/logo-oocz-admin.png) !important; width: 323px; height: 69px; background-size: 323px 69px !important; }
	</style>';
}
add_action('login_head', 'custom_login_logo');

//Whitelist SVG file for media upload
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

//Remove self pingbacks
function no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );

//Remove TinyMCE shortcuts
function myformatTinyMCE($in)
{
	$in['custom_shortcuts']=false;
	return $in;
}
add_filter('tiny_mce_before_init', 'myformatTinyMCE' );

//Force the upload tab from media to open first
function media_manager_default() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            wp.media.controller.Library.prototype.defaults.contentUserSetting=false;
        });
    </script>
    <?php
}
add_action('admin_footer-post-new.php', 'media_manager_default');
add_action('admin_footer-post.php', 'media_manager_default');
add_action('post-thumbnail-template.php', 'media_manager_default');


//Adding a shortcode for template_url
function my_template_url($atts, $content = null) {
  return get_bloginfo('template_url'); 
}
add_shortcode("template_url", "my_template_url");

//Remove the comments feed
remove_action( 'wp_head', 'feed_links', 2 ); 


//Remove YARPP custom CSS
add_action( 'wp_print_styles', 'tj_deregister_yarpp_header_styles' );
function tj_deregister_yarpp_header_styles() {
   wp_dequeue_style('yarppWidgetCss');
   // Next line is required if the related.css is loaded in header when disabled in footer.
   wp_deregister_style('yarppRelatedCss'); 
}

add_action( 'wp_footer', 'tj_deregister_yarpp_footer_styles' );
function tj_deregister_yarpp_footer_styles() {
   wp_dequeue_style('yarppRelatedCss');
}