<div class="post">
	<div class="post-img">
		<a href="<?php the_permalink(); ?>" class="full-width">
			<?php the_post_thumbnail(); ?>
		</a>
	</div>
	<div class="content text-center">
		<div class="post-meta">
			<div class="post-title">
				<h5>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h5>
			</div>
			<ul class="meta">
				<li>
					<i class="fa fa-user" aria-hidden="true"></i>
					<?php echo get_the_author_posts_link(); ?>
				</li>
				<li>
					<i class="fa fa-folder-open" aria-hidden="true"></i>
					<?php the_category(); ?>
				</li>
				<li>
					<i class="fa fa-calendar" aria-hidden="true"></i>
					<?php the_time('F j, Y'); ?>
				</li>
				<li>
					<i class="fa fa-tags" aria-hidden="true"></i>
					<?php the_tags(''); ?>
				</li>
				<li>
					<a href="<?php comment_link(); ?>">
						<i class="fa fa-comments" aria-hidden="true"></i>
						<?php comments_number(); ?>
					</a>
				</li>
			</ul>
		</div>

		<div class="post-cont">
			<p><?php echo wp_trim_words(get_the_content(), 30, ''); ?></p>
		</div>

		<a href="<?php the_permalink(); ?>" class="butn">Read More</a>

	</div>
</div>