<div class="widget search">
	<form action="<?php echo esc_url(home_url()); ?>" method="get" id="searchform">
		<input type="search" value="<?php get_search_query(); ?>" name="s" id="s" placeholder="Type here ...">
		<button type="submite"><i class="fa fa-search" aria-hidden="true"></i></button>
	</form>
</div>