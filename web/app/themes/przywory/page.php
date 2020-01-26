<?php

	get_header();

	if ( have_posts() ):
		while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="post-header">
					<h3 class="title">
						<?php the_title(); ?>
					</h2>
				</header>
				<?php the_content(); ?>
			</article>

		<?php 
		endwhile;
	else: ?>

		<article>
			<h2>Nic tu nie ma.</h2>
		</article>

	<?php endif;

	get_footer();