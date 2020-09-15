<div class="comments-area mb-80">
	<div class="title-g mb-50">
		<h3><?php comments_number(); ?></h3>
	</div>

	<?php 
		wp_list_comments(array(
			'walker'		=> new Portfolio_Comment_Walker(),
			'style'			=> 'div'
		));
	?>
</div>

<div class="comment-form">

	<?php 
		$args = array(
			'class_form'			=> 'form',
			'comment_field'        	=> sprintf('<div class="row"><div class="col-md-12"><div  class="form-group">%s</div></div></div>', '<textarea id="comment"  placeholder="Your Comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea>'
			),
			'submit_button'        	=> '<button name="%1$s" type="submit" id="%2$s" class="%3$s"><span>%4$s</span></button>',
			'submit_field'         	=> '<div class="row"><div class="col-md-12"><div  class="form-group">%1$s %2$s</div></div></div>',
			'title_reply_before'	=> '<div class="title-g mb-30"><h3>',
			'title_reply_after'		=> '</div></h3>',
			'title_reply'			=> 'Write a Comment'
		);
		comment_form($args);
	?>
</div>