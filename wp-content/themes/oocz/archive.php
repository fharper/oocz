<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
<div class="row-fluid">
	<h1 class="page-title archive-title">
		<?php 
			if ( is_day() ) :
				printf( __( 'Daily Archives: %s', 'cudazi' ), get_the_date() );
			elseif ( is_month() ) :
				printf( __( 'Monthly Archives: %s', 'cudazi' ), get_the_date( 'F Y' ) );
			elseif ( is_year() ) :
				printf( __( 'Yearly Archives: %s', 'cudazi' ), get_the_date( 'Y' ) );
			endif;
		?>
	</h1>
</div>


<?php get_template_part('content', 'post'); ?>

<?php else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>