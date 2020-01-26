<?php

	get_header();

	echo '<h1><a href="//przywory.eu/informator">Przyworski Informator Gospodarczy</a></h1>';

	echo '<p class="informator-info">Jeśli dane Twojej firmy są nieaktualne/błędne, jest zaznaczona na mapie w złym miejscu albo nie znajduje się jeszcze w informatorze - zapoznaj się z treścią <a href="http://przywory.eu/aktualnosci/853-przyworski-informator-gospodarczy.html">tego wpisu</a> i napisz do nas na: <a href="mailto:admin@przywory.eu">admin@przywory.eu</a></p>';

	if ( have_posts() ):
		while (have_posts()) : the_post();

			the_informator_breadcrubs(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="post-header">
					<h3 class="title">
						<?php
							if( get_field('logo') ):
								echo '<img src="'. get_field('logo') .'" alt="'. get_the_title() .'" title="'. get_the_title() .'">';
							else:
								the_title();
							endif;
						?>
					</h2>
				</header>
				<?php the_content(); ?>

				<div class="informator-contacts">
					<?php if( get_field('email') ):
						$field = get_field('email');
						echo '<a href="mailto:'. $field .'"><i class="fa fa-envelope"></i><span>'. $field .'</span></a>';
					endif; ?>
					<?php if( get_field('strona') ):
						$field = get_field('strona');
						echo '<a href="//'. $field .'" target="_blank"><i class="fa fa-link"></i><span>'. $field .'</span></a>';
					endif; ?>
					<?php if( get_field('google-plus') ):
						$field = get_field('google-plus');
						echo '<a href="'. $field .'" target="_blank"><i class="fa fa-google-plus"></i><span>G+</span></a>';
					endif; ?>
					<?php if( get_field('facebook') ):
						$field = get_field('facebook');
						echo '<a href="'. $field .'" target="_blank"><i class="fa fa-facebook"></i><span>FB</span></a>';
					endif; ?>
				</div>

				<iframe style="border: 0; max-width: 100%; max-height: 300px;" src="<?php the_field('mapa'); ?>&key=AIzaSyC1CpvhV1AIlUfFxAsayMiTHzf5cGy2yS0" width="1068" height="300" frameborder="0" allowfullscreen="allowfullscreen"></iframe>

			</article>
			<?php 
			if ( comments_open() ) {
				comments_template();
			} ?>

		<?php 
		endwhile;
	else: ?>

		<article>
			<h2>Nic tu nie ma.</h2>
		</article>

	<?php endif;

	get_footer();