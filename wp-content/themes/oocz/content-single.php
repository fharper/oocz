<div class="row-fluid eq2">

	<?php while ( have_posts() ) : the_post(); ?>
		<div class="span8 single-post">	
			<div class="entry">
				<?php edit_post_link(); ?>
				<p class="entry-date">
					<span class="day"><?php the_time('d'); ?></span>
					<span class="month"><?php the_time('M'); ?></span>
					<span class="category">
						<?php
							$category = get_the_category(get_the_ID());
							$nb = 0;
							if ($category[0]->slug == "fr" || $category[0]->slug == "en") {
								if (count($category) > 1) { $nb = 1; }
							}
							echo "<a href='".get_bloginfo('wpurl')."/category/".$category[$nb]->slug."/' class='cat-".$category[$nb]->slug."' title='View all posts filed under ".$category[$nb]->cat_name."'></a>";
						?>
					</span>
				</p>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> | <?php bloginfo('name'); ?>"><?php the_title(); ?></a></h2>
				<div class="entry-content"><?php the_content(); ?></div>

				<div id="share">
					<h3 id="sharing-title">Share the love</h3>
					<a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php urlencode(the_title()); ?>&via=fharper" target="_blank"><img src="https://outofcomfortzone.net/wp-content/themes/oocz/medias/images/icons/icon-twitter.png" alt="Twitter"></a>
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?> | <?php bloginfo('name'); ?>" target="_blank"><img src="https://outofcomfortzone.net/wp-content/themes/oocz/medias/images/icons/icon-facebook.png" alt="Facebook"></a>
					<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank"><img src="https://outofcomfortzone.net/wp-content/themes/oocz/medias/images/icons/icon-linkedin.png" alt="LinkedIn"></a>
					<a href="https://plus.google.com/share?&hl=en&url=<?php the_permalink(); ?>" target="_blank"><img src="https://outofcomfortzone.net/wp-content/themes/oocz/medias/images/icons/icon-googleplus.png" alt="Google Plus"></a>
				</div>

				<div class="tags"><?php the_tags('', ', ');?></div>

				<div class="nav-links">
					<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous Post', 'twentyeleven' ) ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', __( 'Next Post <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span>
				</div>
			</div>

			<?php comments_template( '', true ); ?>
		</div>
	

		<div class="span4 related-posts">
			<?php related_posts(); ?>
		</div>
	<?php endwhile; ?>


</div><!--/row-->
