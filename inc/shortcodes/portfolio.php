<?php 
	// Add Shortcode
function portfolio_works( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'post_count' 		=> '',
			'disable_nav'		=> '',
			'portfolio_class' 	=> ''
		),
		$atts
	);
	extract($atts);

	ob_start();
	?>

	<!-- =====================================
	==== Start Portfolio -->
	<div class="portfolio <?php if(!empty($portfolio_class)){echo $portfolio_class;} ?>">

		<?php if($disable_nav != 'Yes') : ?>
	    <!-- filter links -->
	    <div class="filtering col-sm-12">
	        <span data-filter='*' class="active">All</span>
	        <?php 
	        	$cats = get_terms('portfolio_cats');
	        	foreach ($cats as $cat) :
	        ?>
	        <span data-filter='.<?php echo $cat->slug; ?>'><?php echo $cat->name; ?></span>
	        <?php endforeach; ?>
	    </div>
		<?php endif; ?>

	    <div class="gallery row text-center full-width">

	    	<?php 
	    		$works = new WP_Query(array(
	    			'post_type'			=> 'portfolio',
	    			'posts_per_page'	=> $post_count
	    		));

	    		while($works->have_posts()) : $works->the_post();

	    		$post_cats = get_the_terms(get_the_id(), 'portfolio_cats');
	    	?>
	        <!-- gallery item -->
	        <div class="col-md-4 items 
	        	<?php 
	        		foreach ($post_cats as $post_cat) {
	        			echo $post_cat->slug . ' ';
	        		}
	        	?>
	        ">
	            <div class="item-img">
	                <?php the_post_thumbnail(); ?>
	                <div class="item-img-overlay valign">
	                    <div class="overlay-info full-width vertical-center">
	                        <h6><?php the_title(); ?></h6>
	                        <?php the_content(); ?>
	                    </div>
	                    <a href="<?php echo get_the_post_thumbnail_url(); ?>" class="popimg">
	                        <i class="icofont icofont-image"></i>
	                    </a>
	                </div>
	            </div>
	        </div>
	    	<?php endwhile; ?>
	    </div>
    </div>


	<!-- End Portfolio ====
	======================================= -->
	
	<?php return ob_get_clean();

}
add_shortcode( 'works', 'portfolio_works' );


if(function_exists('vc_map')){
	$params = array(
		'name'			=> __('Portfolio', 'portfolio'),
		'base'			=> 'works',
		'category'		=> __('Portfolio', 'portfolio'),
		'icon'			=> THEME_DIR . '/assets/img/favicon.ico',
		'description'	=> __('Designed iconbox to show.', 'portfolio'),
		'params'		=> array(
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Total Post Count", "portfolio" ),
				"param_name" 	=> "post_count",
				"description" 	=> __( "Enter your total post amount.", "portfolio" ),
				"admin_label"	=> true
		    ),
		    array(
				"type" 			=> "dropdown",
				"heading" 		=> __( "Disable Navigation", "portfolio" ),
				"param_name" 	=> "disable_nav",
				"value"			=> array(
					"Default"	=> "Default",
					"Yes"		=> "Yes",
					"No"		=> "No"
				),
				"description" 	=> __( "Choose option for disable navigation.", "portfolio" ),
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