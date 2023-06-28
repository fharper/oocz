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

<div class="row-fluid posts-list eq">
	
	<?php $i == 0; ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="span6<?php if ($i % 2 == 0) { echo " even"; } ?>">
		<div class="entry">
			<p class="entry-date">
				<span class="day"><?php the_time('d'); ?></span>
				<span class="month"><?php the_time('M'); ?></span>
			</p>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> | <?php bloginfo('name'); ?>"><?php the_title(); ?></a><?php if (! has_post_thumbnail()) : ?><span>_</span><?php endif; ?></h2>
			<?php if ( has_post_thumbnail()) : ?>
			<div class="entry-image"><?php the_post_thumbnail('large'); ?></div>
			<?php endif; ?>
			<div class="entry-content"><?php $text = "<p>".get_the_excerpt()." <a class='moretag' href='".get_permalink()."'>Read more</a></p>"; echo $text; ?></div>
			<p class="entry-comments-tags">
				<span class="comments"><a href="<?php the_permalink(); ?>/#comments">/* Comments */</a> &lt;<span class="comments-number"><?php comments_number('0', '1', '%'); ?></span>&gt;</span> 
				<span class="tags"><?php the_tags('', ', '); ?></span>
			</p>
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


<?php else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>