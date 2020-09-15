<?php 
	// Add Shortcode
function portfolio_pricing( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'title_text' 		=> '',
			'icon_class'		=> '',
			'price_amount'		=> '',
			'price_validity'	=> '',
			'pricing_features'	=> '',
			'btn_text'			=> '',
			'btn_url'			=> '',
			'portfolio_class' 	=> ''
		),
		$atts
	);
	extract($atts);

	ob_start();
	?>
	<div class="price">
		<div class="item text-center mb-md50">
            <div class="type">
                <span class="icon"><i class="icofont icofont-briefcase"></i></span>
                <h4><?php echo $title_text; ?></h4>
            </div>

            <div class="value">
                <h3><?php echo $price_amount; ?><span>$</span></h3>
                <span class="per">Per <?php echo $price_validity; ?></span>
            </div>

            <div class="features">
                <ul>
                	<?php 
                		$features = explode(',', $pricing_features);
                		foreach ($features as $feature) {
                			echo '<li>' . $feature . '</li>';
                		}
                	?>
                </ul>
            </div>

            <div class="order">
                <a href="<?php echo $btn_url; ?>">
                    <span><?php echo $btn_text; ?></span>
                </a>
            </div>
        </div>
    </div>
	
	<?php return ob_get_clean();

}
add_shortcode( 'pricing', 'portfolio_pricing' );

if(function_exists('vc_map')){
	$params = array(
		'name'			=> __('Pricing', 'portfolio'),
		'base'			=> 'pricing',
		'category'		=> __('Portfolio', 'portfolio'),
		'icon'			=> THEME_DIR . '/assets/img/favicon.ico',
		'description'	=> __('Design pricing box to show.', 'portfolio'),
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
				"heading" 		=> __( "Icon Class", "portfolio" ),
				"param_name" 	=> "icon_class",
				"description" 	=> __( "Enter Icofont class to show icon. <a href='https://icofont.com/icons'>Icon List</a>", "portfolio" ),
				"admin_label"	=> true
		    ),
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Price Amount", "portfolio" ),
				"param_name" 	=> "price_amount",
				"description" 	=> __( "Enter some count number.", "portfolio" )
			),
			array(
				"type" 			=> "dropdown",
				"heading" 		=> __( "Validity for Price", "portfolio" ),
				"param_name" 	=> "price_validity",
				"value"			=> array(
					"Day"		=> "Day",
					"Week"		=> "Week",
					"Month"		=> "Month",
					"Year"		=> "Year"
				),
				"description" 	=> __( "Choose option for price validity.", "portfolio" )
			),
			array(
				"type" 			=> "exploded_textarea",
				"heading" 		=> __( "Features", "portfolio" ),
				"param_name" 	=> "pricing_features",
				"description" 	=> __( "Enter each feature in new line.", "portfolio" )
		    ),			
		    array(
		      "type" 			=> "textfield",
		      "heading" 		=> __( "Button Text", "portfolio" ),
		      "param_name" 		=> "btn_text",
		      "description" 	=> __( "Enter text for button.", "portfolio" )
		    ),
		    array(
		      "type" 			=> "textfield",
		      "heading" 		=> __( "Button URL", "portfolio" ),
		      "param_name" 		=> "btn_url",
		      "description" 	=> __( "Enter link for button.", "portfolio" )
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