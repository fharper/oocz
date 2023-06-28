<?php
/**
* The Template for displaying single posts, customized to pull in a unique post template on a per-post basis.
*/
	get_header(); 
?>	

<?php if ( have_posts() ) : ?>

<?php get_template_part('content', 'single'); ?>

<?php else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
		
<?php get_footer(); ?>