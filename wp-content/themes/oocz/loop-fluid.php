<div class="row-fluid">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div>
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> | <?php bloginfo('name'); ?>"><?php the_title(); ?></a></h2>
			<?php the_content();?>
		</div><!--/span-->

	<?php endwhile; ?>

</div><!--/row-->

<?php else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>