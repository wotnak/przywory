			</main>
			<?php if( !is_post_type_archive('informator') && !is_singular('informator') ){ get_sidebar(); } ?>
		</div>

		<footer role="complementary" class="footer">
			<?php 

				$stopka = array(
					'theme_location'  => 'stopka',
					'container'       => 'nav',
					'container_class' => 'footer-menu',
					'menu_class'      => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'link_before'     => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				);

				wp_nav_menu( $stopka );

			?>
			<p><?php echo date('Y') ?> &copy; <a href="//przywory.eu">Przywory.eu</a></p>
		</footer>


	</div>


	<a href="#0" class="cd-top">Top</a>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/cookies.js"></script>
<script type="text/javascript">

jQuery("document").ready(function($){
	
	var nav = $('.main-menu');
	var height = nav.height();
	var top = nav.offset().top - 32;

	<?php
		if ( is_user_logged_in() ) {
			echo 'var bar = 32;';
		} else {
			echo 'var bar = 0;';
		}
	?>

	var top = nav.offset().top - bar;

	if ($(window).scrollTop() >= top) { // fix for page refresh
		stickMenu();
	};

	var lastScrollTop = 0;
	
	$(window).scroll(function () {
		if ($(this).scrollTop() > top) {
			// stick menu at top of the screen
			stickMenu();
		} else {
			// unstick menu from top of the screen
			unstickMenu();
		}
	});

	function stickMenu () {
		nav.addClass("nav--sticky");
		nav.css( "top", bar );
		$(this).scrollTop()
	}

	function unstickMenu () {
		nav.removeClass("nav--sticky");
		nav.css( "top", "" )
	}

});

</script>
<?php if (is_post_type_archive('informator')) { ?>
<script type="text/javascript">
jQuery("document").ready(function($){
	

	var nav = $('.main-menu');

	<?php
		if ( is_user_logged_in() ) {
			echo 'var bar = 81;';
		} else {
	 		echo 'var bar = 49;';
		}
	?>

	// var top = nav.offset().top - bar - 59;

	// if ($(window).scrollTop() >= top) { // fix for page refresh
	// 	stickMenu();
	// };
	
	// $(window).scroll(function () {
	// 	if ($(this).scrollTop() >= top) {
	// 		// stick menu at top of the screen
	// 		stickMenu();
	// 	} else {
	// 		// unstick menu from top of the screen
	// 		unstickMenu();
	// 	}
	// });

	// function stickMenu () {
	// 	nav.addClass("nav--sticky");
	// 	nav.css( "top", bar );
	// }

	// function unstickMenu () {
	// 	nav.removeClass("nav--sticky");
	// 	nav.css( "top", "" )
	// }

	$('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	        var target = $(this.hash);
	        target = target.length ? target : $('[id=' + this.hash.slice(1) +']');
	        if (target.length) {
	        	pos = target.offset().top - bar;
	        	if (!nav.hasClass("nav--sticky")) { pos -= 49; }
	            $('html,body').animate({
	                scrollTop: pos
	            }, 500);
	            return false;
	        }
	    }
	});

});
</script>


<?php } ?>
<?php wp_footer(); ?>
</body>
</html>