<?php
/**
 * The template for displaying all sections (pages in Wordpress) of the about page.
 */

get_header(); ?>

<div class="row-fluid eq">

	<div class="span6">

	<?php
		$args=array(
			'orderby' =>'post__in',
			'post_type' =>'page',
			'post__in' => array(4486, 4801, 4626, 4631),
		);
		$page_query = new WP_Query($args); ?>

	<?php while ($page_query->have_posts()) : $page_query->the_post(); ?>
		<article id="<?php echo($post->post_name) ?>">
		   	<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="entry-content">
				<?php the_content(); ?>
			</div><!-- .entry-content -->
			<p class="updated">Last updated: <?php the_modified_date('Y-m-d'); ?></p>
			<footer class="entry-meta">
				<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->
		</article>
	<?php endwhile; ?>

	</div>

	<div class="span6">

	<?php
		$args=array(
			'orderby' =>'post__in',
			'post_type' =>'page',
			'post__in' => array(4506, 4623),
		);
		$page_query = new WP_Query($args); ?>

	<?php while ($page_query->have_posts()) : $page_query->the_post(); ?>
		<article id="<?php echo($post->post_name) ?>">
		   	<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="entry-content">
				<?php the_content(); ?>
			</div><!-- .entry-content -->
			<p class="updated">Last updated: <?php the_modified_date('Y-m-d'); ?></p>
			<footer class="entry-meta">
				<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->
		</article>
	<?php endwhile; ?>

	</div>

</div>

<?php get_footer(); ?>