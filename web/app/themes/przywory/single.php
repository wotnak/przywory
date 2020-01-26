<?php

	if (get_post_format(get_the_ID()) == "link") {
		if ( have_posts() ):
			while (have_posts()) : the_post();
				$link = get_first_url(get_the_content());
				header('Location: '.$link);
				exit();
			endwhile;
		endif;
	}

	get_header();

	the_breadcrumb();

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