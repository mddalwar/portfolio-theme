<?php 
	// Add Shortcode
function portfolio_video_icon( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'title_text' 		=> '',
			'video_url'			=> '',
			'show_title'		=> '',
			'portfolio_class' 	=> ''
		),
		$atts
	);
	extract($atts);

	ob_start();
	?>

	<?php if(!empty($title_text) || !empty($video_url)) : ?>
		<a  class="vid <?php echo $portfolio_class; ?>" href="<?php echo $video_url; ?>">
	        <i class="icofont icofont-ui-play"></i>
	        <?php if($show_title != "no") : ?>
	        	<span class="small-text"><?php echo $title_text; ?></span>
	    	<?php endif; ?>
	    </a>
	<?php endif; ?>
	
	<?php return ob_get_clean();

}
add_shortcode( 'video_icon', 'portfolio_video_icon' );


if(function_exists('vc_map')){
	$title_params = array(
		'name'			=> __('Video Icon', 'portfolio'),
		'base'			=> 'video_icon',
		'category'		=> __('Portfolio', 'portfolio'),
		'icon'			=> THEME_DIR . '/assets/img/favicon.ico',
		'description'	=> __('Video icon to link a video.', 'portfolio'),
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
				"heading" 		=> __( "Video URL", "portfolio" ),
				"param_name" 	=> "video_url",
				"description" 	=> __( "Enter your video url to show the video.", "portfolio" ),
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
	vc_map($title_params);
}
?>