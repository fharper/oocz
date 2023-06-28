<?php 
	get_header();
	wp_enqueue_style('talks', get_bloginfo('template_url') . '/medias/css/talks.css');
?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="row-fluid eq">

	<div class="span6 speaking">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="entry-title">Work with me</h1>

			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
			<footer class="entry-meta">
				<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->
		</article><!-- #post-<?php the_ID(); ?> -->
	</div>


	<div class="span6 experience">
	<?php
		$args=array(
			'pagename' => 'speaking-experience'
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
	</div>

</div>

<?php endwhile; // end of the loop. ?>

<?php
	wp_enqueue_script('talks', get_bloginfo('template_url') . '/medias/js/talks.js'); 
	get_footer();
?>