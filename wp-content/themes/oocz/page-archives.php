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

<div class="row-fluid archives eq">

	<div class="span6">
		<section id="latest-50-posts">
			<h1 class="entry-title">Latest 50 posts</h1>
			<ul class="archives-list">
				<?php query_posts('showposts=50'); ?>
				<?php if (have_posts()) : ?>	
				<?php while (have_posts()) : the_post(); ?>
				<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Link for <?php the_title(); ?>"><?php the_title(); ?></a></li>	
				<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		</section>
	</div>

	<div class="span6">

	<section id="series">
		<?php
			$args=array(
				'orderby' =>'post__in',
				'post_type' =>'page',
				'post__in' => array(12555),
			);
			$page_query = new WP_Query($args); ?>

		<?php while ($page_query->have_posts()) : $page_query->the_post(); ?>
			<article id="<?php echo($post->post_name) ?>">
			   	<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
				<footer class="entry-meta">
					<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
				</footer><!-- .entry-meta -->
			</article>
		<?php endwhile; ?>
	</section>

		<section id="tags-list">
			<h1 class="entry-title">Most popular tags</h1>
			<?php wp_tag_cloud('smallest=22&largest=22&separator=, '); ?>
		</section>

		<section id="months-list">
			<h1 class="entry-title">Archives</h1>
			<ul>
			<?php
				global $wpdb;
				$limit = 0;
				$year_prev = null;
				$months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,  YEAR( post_date ) AS year, COUNT( id ) as post_count FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' GROUP BY month , year ORDER BY post_date DESC");
				foreach($months as $month) :
			    	$year_current = $month->year;
			    	if ($year_current != $year_prev) {
			        	if ($year_prev != null) { ?>
				 			</ul></li>
			        	<?php } ?>
			    		<li class="archive-year"><span class="year"><?php echo $month->year; ?></span>
			    		<ul>
			 
			    	<?php } ?>

			    	<li>
			    		<a href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>">
			    			<span class="archive-month"><?php echo date("F", mktime(0, 0, 0, $month->month, 1, $month->year)) ?></span>
			    		</a>
			    		<span class="archive-month-count">&lt;<?php echo $month->post_count; ?>&gt;</span>
			    	</li>
					<?php $year_prev = $year_current;
			 
					if(++$limit >= 100) { break; }
				endforeach;
			?>
			</ul></li></ul>
		</section>
	</div>

</div>


<?php get_footer(); ?>