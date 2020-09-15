		<!--====== Footer ======-->
		<footer class="text-center">
            <div class="container">

                <!-- Logo -->
                <a class="logo footer-logo" href="<?php echo esc_url(home_url()); ?>">
                    <img src="<?php $footer_logo = wp_get_attachment_image_src(get_theme_mod('footer_logo', get_template_directory_uri() . '/assets/img/logo-light.png')); echo $footer_logo[0]; ?>" alt="<?php bloginfo('name'); ?>">
                </a>
                
                <div class="social">
                    <?php if(!empty(get_theme_mod('facebook'))) : ?>
                        <a class="facebook" href="<?php echo get_theme_mod('facebook'); ?>"><i class="icofont icofont-social-facebook"></i></a>
                    <?php endif; ?>

                    <?php if(!empty(get_theme_mod('twitter'))) : ?>                    
                        <a class="twitter" href="<?php echo get_theme_mod('twitter'); ?>"><i class="icofont icofont-social-twitter"></i></a>
                    <?php endif; ?>

                    <?php if(!empty(get_theme_mod('instagram'))) : ?>
                        <a class="instagram" href="<?php echo get_theme_mod('instagram'); ?>"><i class="icofont icofont-social-instagram"></i></a>
                    <?php endif; ?>

                    <?php if(!empty(get_theme_mod('linkedin'))) : ?>
                        <a class="linkedin" href="<?php echo get_theme_mod('linkedin'); ?>"><i class="icofont icofont-brand-linkedin"></i></a>
                    <?php endif; ?>

                    <?php if(!empty(get_theme_mod('behance'))) : ?>
                        <a class="behance" href="<?php echo get_theme_mod('behance'); ?>"><i class="icofont icofont-social-behance"></i></a>
                    <?php endif; ?>
                </div>

                <p class="copyright"><?php echo get_theme_mod('copyright'); ?></p>

            </div>
        </footer>
		<!--====== End Footer ======-->

		<?php wp_footer(); ?>
    </body>
</html>
