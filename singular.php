<?php get_header(); ?>
		<!-- ====== Header ======  -->
		<section id="home" class="min-header bg-img" data-scroll-index="0" data-overlay-dark="5" data-background="<?php echo get_template_directory_uri(); ?>/assets/img/2.jpg" data-stellar-background-ratio="0.5">
			<div class="container-fluid">
				<div class="row">
					<div class="v-middle mt-30">
						<div class="text-center col-md-12">
							<h5><?php the_title(); ?></h5>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ====== End Header ======  -->

		<!--====== Blog ======-->
		<section class="blogs section-padding">
			<div class="container">
				<div class="row">
					
					<div class="col-md-8">
						<div class="posts">
							<?php while(have_posts()) : the_post(); ?>
							<div class="post mb-80">
								<div class="post-img">
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="content">
									<div class="post-meta">
										<div class="post-title">
											<h5>
												<?php the_title(); ?>
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
												<?php the_time('F j, Y') ?>
											</li>
											<li>
												<i class="fa fa-tags" aria-hidden="true"></i>
												<?php the_tags(''); ?>
											</li>
											<li>
												<i class="fa fa-comments" aria-hidden="true"></i>
												<?php comments_number(); ?>
											</li>
										</ul>
									</div>

									<div class="post-cont">
										<?php the_content(); ?>
									</div>

									<div class="share-post">
										<span>Share Post</span>
										<ul>
											<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="icofont icofont-social-facebook"></i></a></li>
											<li><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>"><i class="icofont icofont-social-twitter"></i></a></li>
											<li><a href="http://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>"><i class="icofont icofont-social-linkedin"></i></a></li>
											<li><a href="https://pinterest.com/pin/create/bookmarklet/?url=<?php the_permalink(); ?>"><i class="icofont icofont-social-pinterest"></i></a></li>
										</ul>
									</div>

								</div>
							</div>

							<?php endwhile; ?>

							<?php comments_template(); ?>

						</div>
					</div>

					<div class="col-md-4">
						<?php get_sidebar(); ?>
					</div>

				</div>
			</div>
		</section>
		<!--====== End Blog ======-->

<?php get_footer(); ?>