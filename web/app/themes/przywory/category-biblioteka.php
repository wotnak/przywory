<?php

	get_header();

		$args = array (
			'p' => '296',
		);

		$query = new WP_Query( $args );
		while ($query->have_posts()) : $query->the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_content(); ?>
			</article>
		<?php 
		endwhile;

	get_footer();