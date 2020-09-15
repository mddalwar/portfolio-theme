<?php 
	// Constants
	define('THEME_DIR', get_template_directory_uri());

	// Files Included
	require_once(dirname(__FILE__) . '/classes/portfolio-comment-walker.php');
	require_once(dirname(__FILE__) . '/classes/portfolio-nav-walker.php');
	require_once(dirname(__FILE__) . '/inc/customizer/customizer.php');
	require_once(dirname(__FILE__) . '/inc/plugins/activation.php');

	if ( function_exists( 'vc_map' ) ) {	    
		require_once(dirname(__FILE__) . '/inc/shortcodes/banner.php');
		require_once(dirname(__FILE__) . '/inc/shortcodes/title.php');
		require_once(dirname(__FILE__) . '/inc/shortcodes/video-play.php');
		require_once(dirname(__FILE__) . '/inc/shortcodes/progressbar.php');
		require_once(dirname(__FILE__) . '/inc/shortcodes/iconbox.php');
		require_once(dirname(__FILE__) . '/inc/shortcodes/testimonial.php');
		require_once(dirname(__FILE__) . '/inc/shortcodes/portfolio.php');
		require_once(dirname(__FILE__) . '/inc/shortcodes/counter.php');
		require_once(dirname(__FILE__) . '/inc/shortcodes/members-slider.php');
		require_once(dirname(__FILE__) . '/inc/shortcodes/pricing.php');
		require_once(dirname(__FILE__) . '/inc/shortcodes/blog.php');
		require_once(dirname(__FILE__) . '/inc/shortcodes/contact-form.php');



		$row_attr = array(
			array(
				"type" 			=> "dropdown",
				"heading" 		=> __( "Enable Container", "portfolio" ),
				"param_name" 	=> "enable_container",
				"value"			=> array(
					"Default"	=> "Default",
					"Yes"		=> "Yes",
					"No"		=> "No"
				),
				"description" 	=> __( "Choose option for this row.", "portfolio" )
			),
			array(
				"type" 			=> "dropdown",
				"heading" 		=> __( "Enable Overlay", "portfolio" ),
				"param_name" 	=> "enable_overlay",
				"value"			=> array(
					"Default"	=> "Default",
					"Yes"		=> "Yes",
					"No"		=> "No"
				),
				"description" 	=> __( "Choose option for this row.", "portfolio" )
			),
			array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Section Index Number", "portfolio" ),
				"param_name" 	=> "section_index",
				"description" 	=> __( "Put index number to smooth scroll.", "portfolio" )
			)
		);
		vc_add_params( 'vc_row', $row_attr );

		$inner_row_attr = array(
			"type" 			=> "dropdown",
			"heading" 		=> __( "Enable Container", "portfolio" ),
			"param_name" 	=> "enable_container",
			"value"			=> array(
				"Default"	=> "Default",
				"Yes"		=> "Yes",
				"No"		=> "No"
			),
			"description" 	=> __( "Choose option for this row.", "portfolio" )
		);
		vc_add_param( 'vc_row_inner', $inner_row_attr );

		$theme_icon = array (
			'icon'			=> THEME_DIR . '/assets/img/favicon.ico'
		);
		vc_map_update( 'vc_row', $theme_icon );
		vc_map_update( 'vc_empty_space', $theme_icon );
	}

	// Portfolio Theme Setup
	add_action('after_setup_theme', 'portfolio_theme_setup');

	function portfolio_theme_setup(){
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		load_theme_textdomain('portfolio', get_template_directory() . '/lang');

		// Add theme support for HTML5 Semantic Markup
		add_theme_support( 'html5', array( 'search-form', 'comment-list', 'gallery', 'caption' ) );

		// Register Navigation Menus

		$locations = array(
			'primary' => __( 'Primary Menu', 'portfolio' )
		);
		register_nav_menus( $locations );


		// Register Sidebars
		$right_sidebar_args = array(
			'id'            => 'right-sidebar',
			'name'          => __( 'Right Sidebar', 'portfolio' ),
			'description'   => __( 'This sidebar will be shown on the right side.', 'portfolio' ),
			'before_title'  => '<div class="widget-title"><h6>',
			'after_title'   => '</h6></div>',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
		);
		register_sidebar( $right_sidebar_args );

		// Register Portfolio Post Type
		$portfolio_labels = array(
			'name'                  => _x( 'Portfolios', 'Post Type General Name', 'portfolio' ),
			'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'portfolio' ),
			'menu_name'             => __( 'Portfolios', 'portfolio' ),
			'name_admin_bar'        => __( 'Portfolios', 'portfolio' ),
			'archives'              => __( 'Portfolio Archives', 'portfolio' ),
			'attributes'            => __( 'Portfolio Attributes', 'portfolio' ),
			'parent_item_colon'     => __( 'Parent Portfolio:', 'portfolio' ),
			'all_items'             => __( 'All Portfolios', 'portfolio' ),
			'add_new_item'          => __( 'Add New Portfolio', 'portfolio' ),
			'add_new'               => __( 'Add New', 'portfolio' ),
			'new_item'              => __( 'New Portfolio', 'portfolio' ),
			'edit_item'             => __( 'Edit Portfolio', 'portfolio' ),
			'update_item'           => __( 'Update Portfolio', 'portfolio' ),
			'view_item'             => __( 'View Portfolio', 'portfolio' ),
			'view_items'            => __( 'View Portfolios', 'portfolio' ),
			'search_items'          => __( 'Search Portfolio', 'portfolio' ),
			'not_found'             => __( 'Not found', 'portfolio' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'portfolio' ),
			'featured_image'        => __( 'Portfolio Image', 'portfolio' ),
			'set_featured_image'    => __( 'Set portfolio image', 'portfolio' ),
			'remove_featured_image' => __( 'Remove portfolio image', 'portfolio' ),
			'use_featured_image'    => __( 'Use as portfolio image', 'portfolio' ),
			'insert_into_item'      => __( 'Insert into portfolio', 'portfolio' ),
			'uploaded_to_this_item' => __( 'Uploaded to this portfolio', 'portfolio' ),
			'items_list'            => __( 'Portfolios list', 'portfolio' ),
			'items_list_navigation' => __( 'Portfolios list navigation', 'portfolio' ),
			'filter_items_list'     => __( 'Filter portfolios list', 'portfolio' ),
		);
		
		$portfolio_args = array(
			'label'                 => __( 'Portfolio', 'portfolio' ),
			'description'           => __( 'All works will be shown', 'portfolio' ),
			'labels'                => $portfolio_labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'portfolio', $portfolio_args );


		// Register Custom Taxonomy

		$type_labels = array(
			'name'                       => _x( 'Types', 'Types', 'portfolio' ),
			'singular_name'              => _x( 'Type', 'Type', 'portfolio' ),
			'menu_name'                  => __( 'Type', 'portfolio' ),
			'all_items'                  => __( 'All Types', 'portfolio' ),
			'parent_item'                => __( 'Parent Type', 'portfolio' ),
			'parent_item_colon'          => __( 'Parent Type:', 'portfolio' ),
			'new_item_name'              => __( 'New Type Name', 'portfolio' ),
			'add_new_item'               => __( 'Add New Type', 'portfolio' ),
			'edit_item'                  => __( 'Edit Type', 'portfolio' ),
			'update_item'                => __( 'Update Type', 'portfolio' ),
			'view_item'                  => __( 'View Type', 'portfolio' ),
			'separate_items_with_commas' => __( 'Separate types with commas', 'portfolio' ),
			'add_or_remove_items'        => __( 'Add or remove types', 'portfolio' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'portfolio' ),
			'popular_items'              => __( 'Popular types', 'portfolio' ),
			'search_items'               => __( 'Search Types', 'portfolio' ),
			'not_found'                  => __( 'Not Found', 'portfolio' ),
			'no_terms'                   => __( 'No types', 'portfolio' ),
			'items_list'                 => __( 'Types list', 'portfolio' ),
			'items_list_navigation'      => __( 'Types list navigation', 'portfolio' ),
		);
		$type_args = array(
			'labels'                     => $type_labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'portfolio_cats', array( 'portfolio' ), $type_args );


		// Register Member Post Type
		$members_labels = array(
			'name'                  => _x( 'Members', 'Post Type General Name', 'portfolio' ),
			'singular_name'         => _x( 'Member', 'Post Type Singular Name', 'portfolio' ),
			'menu_name'             => __( 'Members', 'portfolio' ),
			'name_admin_bar'        => __( 'Members', 'portfolio' ),
			'archives'              => __( 'Member Archives', 'portfolio' ),
			'attributes'            => __( 'Member Attributes', 'portfolio' ),
			'parent_item_colon'     => __( 'Parent Member:', 'portfolio' ),
			'all_items'             => __( 'All Members', 'portfolio' ),
			'add_new_item'          => __( 'Add New Member', 'portfolio' ),
			'add_new'               => __( 'Add New', 'portfolio' ),
			'new_item'              => __( 'New Member', 'portfolio' ),
			'edit_item'             => __( 'Edit Member', 'portfolio' ),
			'update_item'           => __( 'Update Member', 'portfolio' ),
			'view_item'             => __( 'View Member', 'portfolio' ),
			'view_items'            => __( 'View Members', 'portfolio' ),
			'search_items'          => __( 'Search Member', 'portfolio' ),
			'not_found'             => __( 'Not found', 'portfolio' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'portfolio' ),
			'featured_image'        => __( 'Member Image', 'portfolio' ),
			'set_featured_image'    => __( 'Set member image', 'portfolio' ),
			'remove_featured_image' => __( 'Remove member image', 'portfolio' ),
			'use_featured_image'    => __( 'Use as member image', 'portfolio' ),
			'insert_into_item'      => __( 'Insert into member', 'portfolio' ),
			'uploaded_to_this_item' => __( 'Uploaded to this member', 'portfolio' ),
			'items_list'            => __( 'Members list', 'member' ),
			'items_list_navigation' => __( 'Members list navigation', 'portfolio' ),
			'filter_items_list'     => __( 'Filter portfolios list', 'portfolio' ),
		);
		
		$members_args = array(
			'label'                 => __( 'Member', 'portfolio' ),
			'description'           => __( 'All members will be shown', 'portfolio' ),
			'labels'                => $members_labels,
			'supports'              => array( 'title', 'thumbnail' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'members', $members_args );

	}

	// Portfolio Styles
	add_action('wp_enqueue_scripts', 'portfolio_theme_styles');

	function portfolio_theme_styles(){
		wp_register_style('plugins-style', THEME_DIR . '/assets/css/plugins.css', array(), '1.0', 'all');
		wp_enqueue_style('plugins-style');

		wp_register_style('theme-style', THEME_DIR . '/assets/css/style.css', array('plugins-style'), '1.0', 'all');
		wp_enqueue_style('theme-style');

		wp_enqueue_style('default-style', get_stylesheet_uri(), array('theme-style'), '1.0', 'all');

		wp_enqueue_style('google-fonts', portfolio_theme_fonts_url(), array(), null, 'all');
		
	}

	// Google Fonts
	function portfolio_theme_fonts_url(){
		$fonts_link = '';
		$poppins = _x( 'on', 'Poppins font: on or off', 'portfolio' );
		$raleway = _x( 'on', 'Raleway font: on or off', 'portfolio' );

		if ( 'off' !== $poppins && 'off' !== $raleway) {
			$families = array();
			$families[] = 'Poppins:300,400,500,600';
			$families[] = 'Raleway:200,300,400,500,600,700,800';

			$fonts_query_args = array(
				'family'  => urlencode( implode( '|', $families ) ),
				'subset'  => urlencode( 'latin,latin-ext' ),
				'display' => urlencode( 'fallback' ),
			);

			$fonts_link = add_query_arg( $fonts_query_args, 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_link );
	}

	// Portfolio Scripts
	add_action('wp_enqueue_scripts', 'portfolio_theme_scripts');

	function portfolio_theme_scripts(){
		wp_register_script('migrate', THEME_DIR . '/assets/js/jquery-migrate-3.0.0.min.js', array('jquery'), null, true);
		wp_enqueue_script('migrate');

		wp_register_script('popper', THEME_DIR . '/assets/js/popper.min.js', array('migrate'), '1.0', true);
		wp_enqueue_script('popper');

		wp_register_script('bootstrap', THEME_DIR . '/assets/js/bootstrap.min.js', array('popper'), '1.0', true);
		wp_enqueue_script('bootstrap');

		wp_register_script('scrollIt', THEME_DIR . '/assets/js/scrollIt.min.js', array('bootstrap'), '1.0', true);
		wp_enqueue_script('scrollIt');

		wp_register_script('animated-headline', THEME_DIR . '/assets/js/animated.headline.js', array('scrollIt'), '1.0', true);
		wp_enqueue_script('animated-headline');

		wp_register_script('jquery-waypoints', THEME_DIR . '/assets/js/jquery.waypoints.min.js', array('animated-headline'), '1.0', true);
		wp_enqueue_script('jquery-waypoints');

		wp_register_script('jquery-counterup', THEME_DIR . '/assets/js/jquery.counterup.min.js', array('jquery-waypoints'), '1.0', true);
		wp_enqueue_script('jquery-counterup');

		wp_register_script('owl-carousel', THEME_DIR . '/assets/js/owl.carousel.min.js', array('jquery-counterup'), '1.0', true);
		wp_enqueue_script('owl-carousel');

		wp_register_script('magnific-popup', THEME_DIR . '/assets/js/jquery.magnific-popup.min.js', array('owl-carousel'), '1.0', true);
		wp_enqueue_script('magnific-popup');

		wp_register_script('stellar', THEME_DIR . '/assets/js/jquery.stellar.min.js', array('magnific-popup'), '1.0', true);
		wp_enqueue_script('stellar');

		wp_register_script('isotope-pkgd', THEME_DIR . '/assets/js/isotope.pkgd.min.js', array('stellar'), '1.0', true);
		wp_enqueue_script('isotope-pkgd');

		wp_register_script('YouTubePopUp', THEME_DIR . '/assets/js/YouTubePopUp.jquery.js', array('isotope-pkgd'), '1.0', true);
		wp_enqueue_script('YouTubePopUp');

		wp_register_script('validator', THEME_DIR . '/assets/js/validator.js', array('YouTubePopUp'), '1.0', true);
		wp_enqueue_script('validator');

		wp_register_script('scripts', THEME_DIR . '/assets/js/scripts.js', array('validator'), '1.0', true);
		wp_enqueue_script('scripts');

	}

	// Customize Comment Form
	add_filter('comment_form_default_fields', 'portfolio_comment_form_fields');

	function portfolio_comment_form_fields($fields){

		if ( null === $post_id ) {
			$post_id = get_the_ID();
		}

		if ( ! comments_open( $post_id ) ) {
			
			do_action( 'comment_form_comments_closed' );

			return;
		}

		$commenter     = wp_get_current_commenter();
		$user          = wp_get_current_user();
		$user_identity = $user->exists() ? $user->display_name : '';

		$args = wp_parse_args( $args );
		if ( ! isset( $args['format'] ) ) {
			$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
		}

		$req      = get_option( 'require_name_email' );
		$html_req = ( $req ? " required='required'" : '' );
		$html5    = 'html5' === $args['format'];

		$fields = array(
			'author' => sprintf(
				'<div class="row"><div class="col-md-6"><div class="form-group">%s</div></div>',
				sprintf(
					'<input id="author" placeholder="Your Name" name="author" type="text" value="%s" size="30" maxlength="245"%s />',
					esc_attr( $commenter['comment_author'] ),
					$html_req
				)
			),
			'email'  => sprintf(
				'<div class="col-md-6"><div class="form-group">%s</div></div></div>',
				sprintf(
					'<input id="email" placeholder="Your Email" name="email" %s value="%s" size="30" maxlength="100" aria-describedby="email-notes"%s />',
					( $html5 ? 'type="email"' : 'type="text"' ),
					esc_attr( $commenter['comment_author_email'] ),
					$html_req
				)
			),
			'url'    => sprintf('<div class="row"><div class="col-md-12"><div class="form-group">%s</div></div></div>',
						sprintf(
							'<input id="url" placeholder="Your Website" name="url" %s value="%s" size="30" maxlength="200" />',
							( $html5 ? 'type="url"' : 'type="text"' ),
							esc_attr( $commenter['comment_author_url'] )
						)
					),
		);

		return $fields;
	}

	// Menu Item Custom Fields
	add_action('wp_nav_menu_item_custom_fields', 'portfolio_menu_item_custom_fields');

	function portfolio_menu_item_custom_fields($menuid){
		$value = get_post_meta($menuid, '_data_scroll', true);
	?>
		<p class="description description-wide">
			<label for="data_scroll">Scroll Index Number
				<input type="number" name="data-scroll[<?php echo $menuid; ?>]" value="<?php echo $value; ?>" class="widefat" />
			</label>
		</p>
	<?php
	}

	// Menu Item Custom Field Save
	add_action('wp_update_nav_menu_item', 'portfolio_nav_item_update', 10, 2);

	function portfolio_nav_item_update($menuid, $menu_db_id){
		update_post_meta($menu_db_id, '_data_scroll', $_POST['data-scroll'][$menu_db_id]);
	}

	// Main Menu Fallback
	function portfolio_primary_menu_fallback(){
		echo '<ul class="navbar-nav ml-auto"><li class="nav-item"><a class="nav-link active" href="' . admin_url('nav-menus.php') . '">' . __('Create a Menu', 'portfolio') . '</a></li></ul>';
	}



	// Add Custom Metabox for Members
	add_action('add_meta_boxes', 'portfolio_member_custom_box');

	function portfolio_member_custom_box(){
	   $meta_screen = 'members';
	   add_meta_box(
            'member_meta',
            'Member Information',
            'portfolio_member_metas',
            $meta_screen
	    );

		function portfolio_member_metas(){
			$designation = get_post_meta(get_the_id(), '_member_designation_', true);
			$facebook_url = get_post_meta(get_the_id(), '_member_facebook_', true);
			$twitter_url = get_post_meta(get_the_id(), '_member_twitter_', true);
			$linkedin_url = get_post_meta(get_the_id(), '_member_linkedin_', true);
			?>
				<p>
					<label for="member_designation" style="display: block;">Member Designation</label>
					<input type="text" id="member_designation" class="widefat" name="member_designation" value="<?php if(!empty($designation)){echo $designation;} ?>" placeholder="Member Designation">
				</p>
				<p>
					<label for="member_facebook" style="display: block;">Facebook URL</label>
					<input type="text" id="member_facebook" class="widefat" name="member_facebook" value="<?php if(!empty($facebook_url)){echo $facebook_url;} ?>" placeholder="Facebook URL">
				</p>
				<p>
					<label for="member_twitter" style="display: block;">Twitter URL</label>
					<input type="text" id="member_twitter" class="widefat" name="member_twitter" value="<?php if(!empty($twitter_url)){echo $twitter_url;} ?>" placeholder="Twitter URL">
				</p>
				<p>
					<label for="member_linkedin" style="display: block;">Linkedin URL</label>
					<input type="text" id="member_linkedin" class="widefat" name="member_linkedin" value="<?php if(!empty($linkedin_url)){echo $linkedin_url;} ?>" placeholder="Linkedin URL">
				</p>
				
			<?php
		}
	}
	add_action('save_post', 'portfolio_member_meta_save');
	function portfolio_member_meta_save($post_id){
		update_post_meta($post_id, '_member_designation_', $_POST['member_designation']);
		update_post_meta($post_id, '_member_facebook_', $_POST['member_facebook']);			
		update_post_meta($post_id, '_member_twitter_', $_POST['member_twitter']);			
		update_post_meta($post_id, '_member_linkedin_', $_POST['member_linkedin']);			
	}

	

	function check_required_plugins() {
		if(is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' )){

			function portfolio_demo_imports() {
				return array(
					array(
						'import_file_name'             => 'Import Demo Data',
						'local_import_file'            => THEME_DIR  . '/inc/demo-content/portfolio.xml',
						'local_import_widget_file'     => THEME_DIR . '/inc/demo-content/widgets.wie',
						'local_import_customizer_file' => THEME_DIR . '/inc/demo-content/customizer.dat',
						'import_preview_image_url'     => THEME_DIR . '/assets/img/demo-preview.png',
						'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'portfolio' ),
						'preview_url'                  => 'http://localhost/portfolio/'
					)
				);
			}
			add_filter( 'pt-ocdi/import_files', 'portfolio_demo_imports' );

		}
	}
	add_action( 'admin_init', 'check_required_plugins' );

?>