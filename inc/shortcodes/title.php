<?php 
	// Add Shortcode
function portfolio_title( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'thin_text' 		=> '',
			'bold_text'			=> '',
			'title_type'		=> '',
			'title_des'			=> '',
			'enable_break'		=> '',
			'portfolio_class' 	=> ''
		),
		$atts
	);
	extract($atts);

	ob_start();
	?>

	<?php if($title_type == 'type2') : ?>
		<div class="section-head <?php echo $portfolio_class; ?>">
	        <h4>
	        	<?php if(!empty($thin_text)) : ?>
	        		<span><?php echo $thin_text; ?></span>
	        	<?php endif; ?>

	        	<?php if(!empty($enable_break)) : ?>
	        		<br>
	        	<?php endif; ?>

	        	<?php if(!empty($bold_text)) : ?>
	            	<?php echo $bold_text; ?>
	        	<?php endif; ?>
	        </h4>
	    </div>
	<?php endif; ?>

	<?php if($title_type != 'type2') : ?>
	    <div class="text-center <?php echo $portfolio_class; ?>">
	        <h4 class="extra-text">
	        	<?php if(!empty($thin_text)) : ?>
		        	<?php echo $thin_text; ?>
		        <?php endif; ?>

		        <?php if(!empty($bold_text)) : ?>
		        	<span><?php echo $bold_text; ?></span>
		        <?php endif; ?>
	        </h4>

	        <?php if($title_des) : ?>
	        	<p><?php echo $title_des; ?></p>
	    	<?php endif; ?>
	    </div>
	<?php endif; ?>
	
	<?php return ob_get_clean();

}
add_shortcode( 'title', 'portfolio_title' );


if(function_exists('vc_map')){
	$params = array(
		'name'			=> __('Title', 'portfolio'),
		'base'			=> 'title',
		'category'		=> __('Portfolio', 'portfolio'),
		'icon'			=> THEME_DIR . '/assets/img/favicon.ico',
		'description'	=> __('Customizable portfolio title element', 'portfolio'),
		'params'		=> array(
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Thin Text", "portfolio" ),
				"param_name" 	=> "thin_text",
				"description" 	=> __( "Enter your thin text for title.", "portfolio" ),
				"admin_label"	=> true
		    ),
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Bold Text", "portfolio" ),
				"param_name" 	=> "bold_text",
				"description" 	=> __( "Enter your bold text for title.", "portfolio" ),
				"admin_label"	=> true
		    ),
		    array(
				"type" 			=> "dropdown",
				"heading" 		=> __( "Title Type", "portfolio" ),
				"param_name" 	=> "title_type",
				"value"			=> array(
					"Default"	=> "default",
					"Type 1"	=> "type1",
					"Type 2"	=> "type2"
				),
				"description" 	=> __( "Choose option for this row.", "portfolio" )
			),
			array(
		      "type" 			=> "textarea",
		      "heading" 		=> __( "Description", "portfolio" ),
		      "param_name" 		=> "title_des",
		      "description" 	=> __( "Description only shown for title type 2.", "portfolio" )
		    ),
		    array(
				"type" 			=> "checkbox",
				"heading" 		=> __( "Break between thin and bold?", "portfolio" ),
				"param_name" 	=> "enable_break",
				"description" 	=> __( "Choose option for down icon.", "portfolio" )
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