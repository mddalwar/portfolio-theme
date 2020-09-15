<?php 
	// Add Shortcode
function portfolio_banner( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'banner_title' 		=> '',
			'animated_title'	=> '',
			'visible_title'		=> '',
			'banner_subtitle' 	=> '',
			'banner_des' 		=> '',
			'btn1_text'			=> '',
			'btn1_url'			=> '',
			'btn2_text'			=> '',
			'btn2_url'			=> '',
			'enable_down'		=> '',
			'scroll_index'		=> '',
			'banner_bg'			=> ''
		),
		$atts
	);
	extract($atts);
	$banner_bg_elements = wp_get_attachment_image_src($banner_bg, 'full');

	ob_start();
	?>
	<!-- =====================================
	    	==== Start Header -->
	
	<header class="header valign bg-img" data-overlay-dark="5" data-background="<?php echo $banner_bg_elements[0]; ?>" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">
				<div class="full-width text-center caption mt-30">
					<h3><?php echo $banner_subtitle; ?></h3>
                    <h1 class="cd-headline clip">
                        <span class="blc"><?php echo $banner_title; ?> </span>
                        <span class="cd-words-wrapper">
	                      <b class="is-visible"><?php echo $visible_title; ?></b>
	                    	<?php 
	                    		$animated = explode(',', $animated_title);
	                    		foreach ($animated as $animate_title) {
	                    			echo '<b>' . $animate_title . '</b>';
	                    		}
	                    	?>
                        </span>
                    </h1>
                    <p><?php echo $banner_des; ?></p>

                    <?php if(!empty($btn1_text) && !empty($btn1_url)) : ?>
	                    <a href="<?php echo $btn1_url; ?>" class="butn butn-bord">
	                        <span><?php echo $btn1_text; ?></span>
	                    </a>
                	<?php endif; ?>

                	<?php if(!empty($btn2_text) && !empty($btn2_url)) : ?>
	                    <a href="<?php echo $btn2_url; ?>" class="butn butn-bg">
	                        <span><?php echo $btn2_text; ?></span>
	                    </a>
                	<?php endif; ?>
				</div>
			</div>
		</div>
		<?php if($enable_down != 'No') : ?>
		<div class="arrow">
			<a href="#" data-scroll-nav="<?php echo $scroll_index; ?>">
				<i class="fas fa-chevron-down"></i>
			</a>
		</div>
		<?php endif; ?>
	</header>

	<!-- End Header ====
	======================================= -->
	<?php return ob_get_clean();

}
add_shortcode( 'banner', 'portfolio_banner' );


if(function_exists('vc_map')){
	$params = array(
		'name'			=> __('Banner', 'portfolio'),
		'base'			=> 'banner',
		'category'		=> __('Portfolio', 'portfolio'),
		'icon'			=> THEME_DIR . '/assets/img/favicon.ico',
		'description'	=> __('Banner will be show as a hero section', 'portfolio'),
		'params'		=> array(
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Fixed Title", "portfolio" ),
				"param_name" 	=> "banner_title",
				"description" 	=> __( "Enter your fixed title.", "portfolio" ),
				"admin_label"	=> true
		    ),
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Visible Title", "portfolio" ),
				"param_name" 	=> "visible_title",
				"description" 	=> __( "Enter your visible title.", "portfolio" ),
				"admin_label"	=> true
		    ),
		    array(
				"type" 			=> "exploded_textarea",
				"heading" 		=> __( "Animated Title", "portfolio" ),
				"param_name" 	=> "animated_title",
				"description" 	=> __( "Enter each title in new line.", "portfolio" )
		    ),
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Subtitle", "portfolio" ),
				"param_name" 	=> "banner_subtitle",
				"description" 	=> __( "Enter your subtitle.", "portfolio" ),
				"admin_label"	=> true
		    ),
		    array(
				"type" 			=> "textarea",
				"heading" 		=> __( "Description", "portfolio" ),
				"param_name" 	=> "banner_des",
				"description" 	=> __( "Enter your visible title.", "portfolio" )
		    ),
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Button 1 Text", "portfolio" ),
				"param_name" 	=> "btn1_text",
				"description" 	=> __( "Enter button text.", "portfolio" ),
				"admin_label"	=> true
		    ),
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Button 1 URL", "portfolio" ),
				"param_name" 	=> "btn1_url",
				"description" 	=> __( "Enter button url.", "portfolio" )
		    ),
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Button 2 Text", "portfolio" ),
				"param_name" 	=> "btn2_text",
				"description" 	=> __( "Enter button text.", "portfolio" ),
				"admin_label"	=> true
		    ),
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Button 2 URL", "portfolio" ),
				"param_name" 	=> "btn2_url",
				"description" 	=> __( "Enter button url.", "portfolio" )
		    ),
		    array(
				"type" 			=> "dropdown",
				"heading" 		=> __( "Show Down Icon", "portfolio" ),
				"param_name" 	=> "enable_down",
				"value"			=> array(
					"Default"	=> "Default",
					"Yes"		=> "Yes",
					"No"		=> "No"
				),
				"description" 	=> __( "Choose option for down icon.", "portfolio" )
		    ),
		    array(
		      "type" 			=> "textfield",
		      "heading" 		=> __( "Scroll Index Number", "portfolio" ),
		      "param_name" 		=> "scroll_index",
		      "description" 	=> __( "Enter unique index number to scroll.", "portfolio" )
		    ),
		    array(
		      "type" 			=> "attach_image",
		      "heading" 		=> __( "Banner Background", "portfolio" ),
		      "param_name" 		=> "banner_bg",
		      "description" 	=> __( "Select an image for banner background.", "portfolio" )
		    )
		)
	);
	vc_map($params);
}
?>