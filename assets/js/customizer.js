(function($){
	$(document).ready(function(){
		wp.customize('copyright', function(copyright){
			copyright.bind(function(text_value){
				$('.copyright').html(text_value);
			});
		});

		wp.customize('facebook', function(link){
			link.bind(function(link_text){
				$('.social a.facebook').src(link_text);
			});
		});
		wp.customize('twitter', function(link){
			link.bind(function(link_text){
				$('.social a.twitter').src(link_text);
			});
		});
		wp.customize('instagram', function(link){
			link.bind(function(link_text){
				$('.social a.instagram').src(link_text);
			});
		});
		wp.customize('linkedin', function(link){
			link.bind(function(link_text){
				$('.social a.linkedin').src(link_text);
			});
		});
		wp.customize('behance', function(link){
			link.bind(function(link_text){
				$('.social a.behance').src(link_text);
			});
		});
		
	});
}(jQuery))