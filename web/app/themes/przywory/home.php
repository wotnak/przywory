<?php

	get_header();

	$args = array(
		'post_type' => array( 'post' ),
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'term_id',
				'terms'    => 1,
			)
		) 
	); 

	$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

	// The Query
	$news = new WP_Query( $args );

	// The Loop
	if ( $news->have_posts() ) {
		while ( $news->have_posts() ) {
			$news->the_post();

			$link = get_post_format(get_the_ID()) == "link" ? get_first_url(get_the_content()) : get_permalink();

			?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
								<span class="category">
								<?php
									przywory_the_category();
								?>
								</span>
							</div>
							<h3 class="title">
								<a href="<?php echo $link; ?>"<?php echo get_post_format(get_the_ID()) == "link" ? ' target="_blank"':'' ?>><?php the_title(); ?></a>
							</h3>
						</header>
						<?php
							if (get_post_format(get_the_ID()) == "link") {
								if (has_excerpt()) {
									the_excerpt();
								}
							}
							else {
								the_excerpt();
							}
						?>
						<div class="info">
							<span class="date"><?php the_time('j F Y'); ?></span>
							<a href="<?php echo $link;  ?>"<?php echo get_post_format(get_the_ID()) == "link" ? ' target="_blank"':'' ?>>Czytaj dalej...</a>
						</div>
					</div>
				</article>

			<?php
		}
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

	} else { ?>

		<article>
			<h2>Nic tu nie ma.</h2>
		</article>

	<?php }
	/* Restore original Post Data */
	wp_reset_postdata();


	get_footer();