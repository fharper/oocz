<?php if(is_active_sidebar('main-sidebar')) : ?>

<div class="span3">
	<div class="well sidebar-nav">
		<ul class="nav nav-list">
			<?php dynamic_sidebar('main-sidebar'); ?>
		</ul>
	</div><!--/.well -->
</div><!--/span-->

<?php else : ?>

	<div class="span3">
		<div class="well sidebar-nav">
			<ul class="nav nav-list">
				<li><h3><?php _e('Pages', 'coop'); ?></h3>
					<ul>
						<?php wp_list_pages('title_li='); ?>
					</ul>
				<li>
				<li><h3><?php _e('Archives', 'coop'); ?></h3>
					<ul>
						<?php wp_get_archives(); ?>
					</ul>
				<li>
			</ul>
		</div><!--/.well -->
	</div><!--/span-->

<?php endif; ?>
