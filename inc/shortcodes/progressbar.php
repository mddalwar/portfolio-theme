<?php 
	// Add Shortcode
function portfolio_progressbar( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'title_text' 		=> '',
			'progress_value'	=> '',
			'show_title'		=> '',
			'portfolio_class' 	=> ''
		),
		$atts
	);
	extract($atts);

	ob_start();
	?>

	<?php if(!empty($title_text) || !empty($progress_value)) : ?>
		<div class="prog-item">
			<?php if($show_title != "no") : ?>
            	<p><?php echo $title_text; ?></p>
        	<?php endif; ?>
            <div class="skills-progress"><span data-value='<?php echo $progress_value; ?>%'></span></div>
        </div>
	<?php endif; ?>
	
	<?php return ob_get_clean();

}
add_shortcode( 'progressbar', 'portfolio_progressbar' );


if(function_exists('vc_map')){
	$params = array(
		'name'			=> __('Progress Bar', 'portfolio'),
		'base'			=> 'progressbar',
		'category'		=> __('Portfolio', 'portfolio'),
		'icon'			=> THEME_DIR . '/assets/img/favicon.ico',
		'description'	=> __('Animated progress bar.', 'portfolio'),
		'params'		=> array(
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Title Text", "portfolio" ),
				"param_name" 	=> "title_text",
				"description" 	=> __( "Enter your text for title.", "portfolio" ),
				"admin_label"	=> true
		    ),
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Progress Value", "portfolio" ),
				"param_name" 	=> "progress_value",
				"description" 	=> __( "Enter progress a value 1 to 100.", "portfolio" ),
				"admin_label"	=> true
		    ),
		    array(
				"type" 			=> "dropdown",
				"heading" 		=> __( "Show Title", "portfolio" ),
				"param_name" 	=> "show_title",
				"value"			=> array(
					"Default"	=> "default",
					"Yes"		=> "yes",
					"No"		=> "no"
				),
				"description" 	=> __( "Choose option for this row.", "portfolio" )
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