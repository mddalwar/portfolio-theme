<?php 
	// Add Shortcode
function portfolio_members_slider( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'member_count' 		=> '',
			'show_dots'			=> '',
			'portfolio_class' 	=> ''
		),
		$atts
	);
	extract($atts);

	ob_start();
	?>
	<div class="team">
		<div class="owl-carousel owl-theme col-sm-12 <?php if(!empty($portfolio_class)){echo $portfolio_class;} ?>">
			<?php 
				$members = new WP_Query(array(
					'post_type'			=> 'members',
					'posts_per_page'	=> $member_count
				));
				while($members->have_posts()) : $members->the_post();

				$designation = get_post_meta(get_the_id(), '_member_designation_', true);
				$facebook_url = get_post_meta(get_the_id(), '_member_facebook_', true);
				$twitter_url = get_post_meta(get_the_id(), '_member_twitter_', true);
				$linkedin_url = get_post_meta(get_the_id(), '_member_linkedin_', true);
			?>
	        <div class="titem text-center">
	            <div class="team-img">
	                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
	            </div>
	            <div class="info">
	                <h6><?php the_title(); ?></h6>

	                <?php if(!empty($designation)) : ?>
	                	<span><?php echo $designation; ?></span>
	            	<?php endif; ?>

	                <div class="social">
	                	<?php if(!empty($facebook_url)) : ?>
	                    <a href="<?php echo $facebook_url; ?>"><i class="icofont icofont-social-facebook"></i></a>
	                    <?php endif; ?>

	                    <?php if(!empty($twitter_url)) : ?>
	                    <a href="<?php echo $twitter_url; ?>"><i class="icofont icofont-social-twitter"></i></a>
	                    <?php endif; ?>

	                    <?php if(!empty($linkedin_url)) : ?>
	                    <a href="<?php echo $linkedin_url ?>"><i class="icofont icofont-brand-linkedin"></i></a>
	                    <?php endif; ?>
	                </div>
	            </div>
	        </div>
	    	<?php endwhile; ?>
	    </div>
    </div>
	
	<?php return ob_get_clean();

}
add_shortcode( 'members_slider', 'portfolio_members_slider' );


if(function_exists('vc_map')){
	$params = array(
		'name'			=> __('Members Slider', 'portfolio'),
		'base'			=> 'members_slider',
		'category'		=> __('Portfolio', 'portfolio'),
		'icon'			=> THEME_DIR . '/assets/img/favicon.ico',
		'description'	=> __('Design members slider to show.', 'portfolio'),
		'params'		=> array(
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Total Members to Show", "portfolio" ),
				"param_name" 	=> "member_count",
				"description" 	=> __( "Enter number for total member count to show.", "portfolio" ),
				"admin_label"	=> true
		    ),
			array(
				"type" 			=> "dropdown",
				"heading" 		=> __( "Show Dots", "portfolio" ),
				"param_name" 	=> "show_dots",
				"value"			=> array(
					"Yes"		=> "yes",
					"No"		=> "no"
				),
				"description" 	=> __( "Choose option for this row.", "portfolio" ),
				"admin_label"	=> true
			),			
		    array(
		      "type" 			=> "textfield",
		      "heading" 		=> __( "Custom CSS class", "portfolio" ),
		      "param_name" 		=> "portfolio_class",
		      "description" 	=> __( "Enter a custom css class.", "portfolio" )
		    )
		)
	);
	vc_map($params);
}
?>