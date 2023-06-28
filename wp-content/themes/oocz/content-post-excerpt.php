<div class="row-fluid">
	<div class="span6 border">
	
		<ul class="posts-list">
		<?php while ( have_posts() ) : the_post(); ?>
			<li class="entry">
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
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> | <?php bloginfo('name'); ?>"><?php the_title(); ?></a><span>_</span></h2>
				<div class="entry-content"><?php the_excerpt();?></div>
				<p class="entry-comments-tags">
					<span class="comments">/* Comments */ &lt;<span class="comments-number"><?php comments_number('0', '1', '%'); ?></span>&gt;</span> 
					<span class="tags"><?php the_tags('', ', ');?></span>
				</p>
			</li>
		<?php endwhile; ?>
		</ul>

	</div>
</div><!--/row-->
