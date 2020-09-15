<?php 
	// Add Shortcode
function portfolio_counter( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'title_text' 		=> '',
			'icon_type' 		=> '',
			'icon_fw' 			=> '',
			'icon_op' 			=> '',
			'icon_ty' 			=> '',
			'icon_ent' 			=> '',
			'icon_ln' 			=> '',
			'icon_ms' 			=> '',
			'icon_mat' 			=> '',
			'count_number'		=> '',
			'portfolio_class' 	=> ''
		),
		$atts
	);
	extract($atts);

	$icon_class = '';
	if (!empty($icon_type)) {
		vc_icon_element_fonts_enqueue($icon_type);
		if ($icon_type == 'fontawesome' && !empty($icon_fw)) {
			$icon_class = $icon_fw;
		} elseif ($icon_type == 'openiconic' && !empty($icon_op)) {
			$icon_class = $icon_op;
		} elseif ($icon_type == 'typicons' && !empty($icon_ty)) {
			$icon_class = $icon_ty;
		} elseif ($icon_type == 'entypo' && !empty($icon_ent)) {
			$icon_class = $icon_ent;
		} elseif ($icon_type == 'linecons' && !empty($icon_ln)) {
			$icon_class = $icon_ln;
		} elseif ($icon_type == 'monosocial' && !empty($icon_ms)) {
			$icon_class = $icon_ms;
		} else {
			$icon_class = $icon_mat;
		}
	}

	ob_start();
	?>
	<div class="counter">
		<!-- icofont icofont-users-alt-3  -->
		<div class="item text-center mb-md50 <?php if(!empty($portfolio_class)){echo $portfolio_class;} ?>">
			<?php if(!empty($icon_class)) : ?>
	        	<span class="icon"><i class="<?php echo $icon_class; ?>"></i></span>
	    	<?php endif; ?>

	    	<?php if(!empty($count_number)) : ?>
	        	<h2 class="count"><?php echo $count_number; ?></h2>
	    	<?php endif; ?>

	    	<?php if(!empty($title_text)) : ?>
	        	<h6><?php echo $title_text; ?></h6>
	    	<?php endif; ?>
	    </div>
    </div>
	
	<?php return ob_get_clean();

}
add_shortcode( 'counter', 'portfolio_counter' );

if(function_exists('vc_map')){
	$params = array(
		'name'			=> __('Counter', 'portfolio'),
		'base'			=> 'counter',
		'category'		=> __('Portfolio', 'portfolio'),
		'icon'			=> THEME_DIR . '/assets/img/favicon.ico',
		'description'	=> __('Designed counter to show.', 'portfolio'),
		'params'		=> array(
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Title Text", "portfolio" ),
				"param_name" 	=> "title_text",
				"description" 	=> __( "Enter your text for title.", "portfolio" ),
				"admin_label"	=> true
		    ),
		    array(
				"type" 			=> "dropdown",
				"admin_label" 	=> TRUE,
				"heading" 		=> esc_html__("Icon Type", "portfolio"),
				"param_name" 	=> "icon_type",
				"value" 		=> array(
					esc_html__("Select Icon Type", "portfolio") => "noicon",
					esc_html__("Font Aweseme", "portfolio") 	=> "fontawesome",
					esc_html__("Open Icon", "portfolio") 		=> "openiconic",
					esc_html__("Typicon", "portfolio") 			=> "typicons",
					esc_html__("Entypo", "portfolio") 			=> "entypo",
					esc_html__("Line Icon", "portfolio") 		=> "linecons",
					esc_html__("Mono Social", "portfolio") 		=> "monosocial",
					esc_html__("Material", "portfolio") 		=> "material"
				),
				"description" 	=> esc_html__("Select your desired icon type.", "portfolio"),
			),
			array(
				"type" 			=> "iconpicker",
				"admin_label" 	=> TRUE,
				"heading" 		=> esc_html__("Icon", "portfolio"),
				"param_name" 	=> "icon_fw",
				"settings" 		=> array(
					"type" 			=> "fontawesome",
					"iconPerPage" 	=> "1000"
				),
				"dependency" 	=> array(
					"element" 		=> "icon_type",
					"value" 		=> "fontawesome"
				),
				"description" 	=> esc_html__("Select your visual composer font awesome icon.", "portfolio")
			),
			array(
				"type" 			=> "iconpicker",
				"admin_label" 	=> TRUE,
				"heading" 		=> esc_html__("Icon", "portfolio"),
				"param_name" 	=> "icon_op",
				"settings" 		=> array(
					"type" 			=> "openiconic",
					"iconPerPage" 	=> "300"
				),
				"dependency" 	=> array(
					"element" 		=> "icon_type",
					"value" 		=> "openiconic"
				),
				"description" 	=> esc_html__("Select your desired openicon icon.", "portfolio")
			),
			array(
				"type" 			=> "iconpicker",
				"admin_label" 	=> TRUE,
				"heading" 		=> esc_html__("Icon", "portfolio"),
				"param_name" 	=> "icon_ty",
				"settings" 		=> array(
					"type" 			=> "typicons",
					"iconPerPage" 	=> "1000"
				),
				"dependency" 	=> array(
					"element" 		=> "icon_type",
					"value" 		=> "typicons"
				),
				"description" 	=> esc_html__("Select your desired typicon icon.", "portfolio")
			),
			array(
				"type" 			=> "iconpicker",
				"admin_label" 	=> TRUE,
				"heading" 		=> esc_html__("Icon", "portfolio"),
				"param_name" 	=> "icon_ent",
				"settings" 		=> array(
					"type"			=> "entypo",
					"iconPerPage" 	=> "300"
				),
				"dependency" 	=> array(
					"element" 		=> "icon_type",
					"value" 		=> "entypo"
				),
				"description" 	=> esc_html__("Select your desired entypo icon.", "portfolio")
			),
			array(
				"type" 			=> "iconpicker",
				"admin_label" 	=> TRUE,
				"heading" 		=> esc_html__("Icon", "portfolio"),
				"param_name" 	=> "icon_ln",
				"settings" 		=> array(
					"type" 			=> "linecons",
					"iconPerPage" 	=> "1000"
				),
				"dependency" 	=> array(
					"element" 		=> "icon_type",
					"value" 		=> "linecons"
				),
				"description" 	=> esc_html__("Select your desired lineicon icon.", "portfolio")
			),
			array(
				"type" 			=> "iconpicker",
				"admin_label" 	=> TRUE,
				"heading" 		=> esc_html__("Icon", "portfolio"),
				"param_name" 	=> "icon_ms",
				"settings" 		=> array(
					"type" 			=> "monosocial",
					"iconPerPage" 	=> "300"
				),
				"dependency" 	=> array(
					"element" 		=> "icon_type",
					"value" 		=> "monosocial"
				),
				"description" 	=> esc_html__("Select your desired monosocial icon.", "portfolio")
			),
			array(
				"type" 			=> "iconpicker",
				"admin_label" 	=> TRUE,
				"heading" 		=> esc_html__("Icon", "portfolio"),
				"param_name" 	=> "icon_mat",
				"settings" 		=> array(
					"type" 			=> "material",
					"iconPerPage" 	=> "300"
				),
				"dependency" 	=> array(
					"element" 		=> "icon_type",
					"value" 		=> "material"
				),
				"description" 	=> esc_html__("Select your desired material icon.", "portfolio")
			),
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Count Number", "portfolio" ),
				"param_name" 	=> "count_number",
				"description" 	=> __( "Enter some count number.", "portfolio" )
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