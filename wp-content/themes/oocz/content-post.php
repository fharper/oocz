<div class="row-fluid posts-list eq">
	
	<?php $i == 0; ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="span6<?php if ($i % 2 == 0) { echo " even"; } ?>">
		<div class="entry<?php if (is_sticky()) { echo " sticky"; } ?>">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> | <?php bloginfo('name'); ?>"><?php the_title(); ?></a><?php if (! has_post_thumbnail()) : ?><span>_</span><?php endif; ?></h2>
			<?php if ( has_post_thumbnail()) : ?>
			<div class="entry-image"><?php the_post_thumbnail('large'); ?></div>
			<?php endif; ?>
		</div>
	</div>
	<?php $i++; ?>
	<?php endwhile; ?>

</div><!--/row-->

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>
