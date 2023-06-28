<?php /*
Example template
Author: mitcho (Michael Yoshitaka Erlewine)
*/
?><h3>Related Posts</h3>
<?php if (have_posts()):?>
<ol>
	<?php while (have_posts()) : the_post(); ?>
	<li>
		<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><!-- (<?php the_score(); ?>)-->
		<?php $text = "<p>".get_the_excerpt()." <a class='moretag' href='".get_permalink()."'>Read more</a></p>"; echo $text; ?>
	</li>
	<?php endwhile; ?>
</ol>
<?php else: ?>
<p>No related posts.</p>
<?php endif; ?>
