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
	<h1 class="page-title tag-title">
		Tag: <?php printf( __( '#%s', 'twentyeleven' ), single_tag_title( '', false )); ?>
	</h1>
</div>


<?php get_template_part('content', 'post'); ?>


<?php else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>