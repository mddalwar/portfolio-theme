<?php 
	// Add Shortcode
function portfolio_testimonial( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'comment' 			=> '',
			'client_name'		=> '',
			'designation'		=> '',
			'company'			=> '',
			'portfolio_class' 	=> ''
		),
		$atts
	);
	extract($atts);

	ob_start();
	?>

	<div class="text-center quote">
		<?php if(!empty($comment)) : ?>
	        <p>
	        	<span class="icon"><i class="icofont icofont-quote-left"></i></span><?php echo $comment; ?><span class="icon"><i class="icofont icofont-quote-right"></i></span>
	        </p>
    	<?php endif; ?>

    	<?php if(!empty($client_name)) : ?>
        	<h5><?php echo $client_name; ?></h5>
    	<?php endif; ?>

    	<?php if(!empty($designation) || !empty($company)) : ?>
        	<h6><?php echo $designation; ?>, and lead designer of <?php echo $company; ?></h6>
    	<?php endif; ?>
    </div>
	
	<?php return ob_get_clean();

}
add_shortcode( 'testimonial', 'portfolio_testimonial' );


if(function_exists('vc_map')){
	$params = array(
		'name'			=> __('Tesitimonial', 'portfolio'),
		'base'			=> 'testimonial',
		'category'		=> __('Portfolio', 'portfolio'),
		'icon'			=> THEME_DIR . '/assets/img/favicon.ico',
		'description'	=> __('Animated progress bar.', 'portfolio'),
		'params'		=> array(
		    array(
				"type" 			=> "textarea",
				"heading" 		=> __( "Comment", "portfolio" ),
				"param_name" 	=> "comment",
				"description" 	=> __( "Enter your testimonial comment.", "portfolio" ),
				"admin_label"	=> true
		    ),
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Client Name", "portfolio" ),
				"param_name" 	=> "client_name",
				"description" 	=> __( "Enter client name.", "portfolio" ),
				"admin_label"	=> true
		    ),array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Company", "portfolio" ),
				"param_name" 	=> "company",
				"description" 	=> __( "Enter company name.", "portfolio" ),
				"admin_label"	=> true
		    ),array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Designation", "portfolio" ),
				"param_name" 	=> "designation",
				"description" 	=> __( "Enter client designation.", "portfolio" ),
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