<?php 
	// Add Shortcode
function portfolio_blogs( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'blog_count' 		=> '',
			'item_per_row'		=> '',
			'excerpt_count'		=> 20,
			'portfolio_class' 	=> ''
		),
		$atts
	);
	extract($atts);

	ob_start();
	?>

	<div class="blog">
		<div class="row">
			<?php 
				$blogs = new WP_Query(array(
					'post_type'			=> 'post',
					'posts_per_page'	=> $blog_count
				));
				while($blogs->have_posts()) : $blogs->the_post();
			?>
			<div class="col-lg-<?php if($item_per_row == 2){echo 6;}elseif($item_per_row == 4){echo 3;}else{echo 4;} ?>">
		        <div class="item text-center mb-md50">
		            <div class="post-img">
		                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
		                <div class="date">
		                    <span><?php the_time('d'); ?></span>
		                    <span><?php the_time('M'); ?></span>
		                </div>
		            </div>
		            <div class="content">
		                <span class="tag">
		                	<?php the_tags(''); ?>
		                </span>
		                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		                <p><?php echo wp_trim_words(get_the_content(), $excerpt_count); ?></p>
		            </div>
		        </div>
		    </div>
			<?php endwhile; ?>
		</div>		
	</div>
	
	<?php return ob_get_clean();

}
add_shortcode( 'blogs', 'portfolio_blogs' );


if(function_exists('vc_map')){
	$params = array(
		'name'			=> __('Blog Posts', 'portfolio'),
		'base'			=> 'blogs',
		'category'		=> __('Portfolio', 'portfolio'),
		'icon'			=> THEME_DIR . '/assets/img/favicon.ico',
		'description'	=> __('Blog posts to show the posts.', 'portfolio'),
		'params'		=> array(
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Post Count", "portfolio" ),
				"param_name" 	=> "blog_count",
				"description" 	=> __( "Enter your total post amount.", "portfolio" ),
				"admin_label"	=> true
		    ),
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Excerpt Count", "portfolio" ),
				"param_name" 	=> "excerpt_count",
				"description" 	=> __( "Enter word count amount for post excerpt.", "portfolio" ),
				"admin_label"	=> true
		    ),
		    array(
				"type" 			=> "dropdown",
				"heading" 		=> __( "Post Per Row", "portfolio" ),
				"param_name" 	=> "item_per_row",
				"value"			=> array(
					"Default"	=> "Default",
					"2"			=> "2",
					"3"			=> "3",
					"4"			=> "4"
				),
				"description" 	=> __( "Choose option for per row.", "portfolio" )
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