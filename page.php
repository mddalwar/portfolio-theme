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
							<?php 
								if(have_posts()){
									while (have_posts()) {
										the_post();

										the_content();
									}
								}
							?>

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