<?php
	get_header();

		$args = array (
			'category__in' => '13',
		);

		$query = new WP_Query( $args );

	if ( $query->have_posts() ):
		while ($query->have_posts()) : $query->the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php// the_post_thumbnail('thumbnail'); ?>
				<?php
					if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
						echo the_post_thumbnail('thumbnail');
					} else {
						echo main_image();
					}
				?>
				<div>
					<header class="post-header">
						<div class="meta">
							<span class="category"><?php the_category() ?></span>
						</div>
						<h3 class="title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
					</header>
					<?php the_excerpt(); ?>
					<div class="info">
						<span class="date"><?php the_time('j F Y'); ?></span>
						<a href="<?php the_permalink(); ?>">Czytaj dalej...</a>
					</div>
				</div>
			</article>

		<?php 
		endwhile;

		?>

		<div class="navigation">
			<?php

			if (get_query_var('paged') > 0) {
				echo '<div class="prev-posts">';
				previous_posts_link('&laquo; Nowsze wpisy');
				echo '</div>';
	    	}

	    	if ($news->max_num_pages > get_query_var('paged')) {
				echo '<div class="next-posts">';
				next_posts_link('Starsze wpisy &raquo;');
				echo '</div>';
			}

			?>
		</div>

		<?php
	else: ?>

		<article>
			<h2>Nic tu nie ma.</h2>
		</article>

	<?php endif;

	get_footer();