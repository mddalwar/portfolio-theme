<?php 
	// Add Shortcode
function portfolio_contact( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'form_name' 		=> '',
			'portfolio_class' 	=> ''
		),
		$atts
	);
	extract($atts);

	ob_start();

	if(isset($_POST[$form_name])){
		$admin_email = get_option('admin_email');
		$user_name = strip_tags(isset($_POST['user_name']) ? $_POST['user_name'] : NULL);
		$user_email = strip_tags(isset($_POST['user_email']) ? $_POST['user_email'] : NULL);
		$subject = strip_tags(isset($_POST['subject']) ? $_POST['subject'] : NULL);
		$message = strip_tags(isset($_POST['message']) ? $_POST['message'] : NULL);
		$errors = array();

		if($user_name == NULL || $user_email == NULL || $subject == NULL || $message == NULL){
			$errors['blank'] = 'Some fields are blank';
		}

		if(count($errors) == 0){
			$send_mail = mail($admin_email, $subject, $message);

			if(isset($send_mail)){
				$mail_sent = "Your request has been submitted";
			}
		}
	}

	?>

	<div class="contact-form <?php if(!empty($portfolio_class)){echo $portfolio_class;} ?>">
        <form class="form" id="contact-form" method="post" action="">

            <div class="messages"></div>
            <?php 
            	if(isset($errors)){
            		foreach ($errors as $error) {
            			echo '<div class="alert alert-danger">' . $error . '</div>';
            		}
            	}
            	if(isset($mail_sent)){
            		echo '<div class="alert alert-success">' . $mail_sent . '</div>';
            	}
            ?>
            <div class="controls">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input id="form_name" type="text" name="user_name" placeholder="Name" required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input id="form_email" type="email" name="user_email" placeholder="Email" required="required">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input id="form_subject" type="text" name="subject" placeholder="Subject">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea id="form_message" name="message" placeholder="Message" rows="4" required="required"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit" name="<?php echo $form_name; ?>"><span>Send Message</span></button>
                    </div>

                </div>                             
            </div>
        </form>
    </div>
	
	<?php return ob_get_clean();

}
add_shortcode( 'contact', 'portfolio_contact' );


if(function_exists('vc_map')){
	$params = array(
		'name'			=> __('Contact Form', 'portfolio'),
		'base'			=> 'contact',
		'category'		=> __('Portfolio', 'portfolio'),
		'icon'			=> THEME_DIR . '/assets/img/favicon.ico',
		'description'	=> __('Blog posts to show the posts.', 'portfolio'),
		'params'		=> array(
		    array(
				"type" 			=> "textfield",
				"heading" 		=> __( "Form Name", "portfolio" ),
				"param_name" 	=> "form_name",
				"description" 	=> __( "Enter slug for submit name.", "portfolio" ),
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