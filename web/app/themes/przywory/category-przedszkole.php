<?php



	get_header();



		$args = array(

			'posts_per_page' => 1,

			'cat' => 3,

			'post__in' => get_option('sticky_posts')

		);

		$query = new WP_Query( $args );

		while ($query->have_posts()) : $query->the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header>

					<h2 class="title">

						<?php the_title(); ?>

					</h2>

				</header>

				<?php the_content(); ?>

			</article>

		<?php 
		endwhile;
		/*
		echo '<section id="pnews"><h2>Aktualości</h2>';

		$args = array('posts_per_page' => 3, 'cat' => 14);
		$query = new WP_Query( $args );
		while ($query->have_posts()) : $query->the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
					if((function_exists('has_post_thumbnail')) && (has_post_thumbnail()))
						echo the_post_thumbnail('thumbnail');
					else echo main_image();
				?>
				<div>
					<header class="post-header">
						<div class="meta">
							<span class="category"><?php przywory_the_category(); ?></span>
						</div>
						<h3 class="title">
							<a href="<?php echo $link; ?>"<?php echo get_post_format(get_the_ID()) == "link" ? ' target="_blank"':'' ?>><?php the_title(); ?></a>
						</h3>
					</header>
						<?php
							if (get_post_format(get_the_ID()) == "link")
								if (has_excerpt()) the_excerpt();
							else the_excerpt();
						?>
					<div class="info">
						<span class="date"><?php the_time('j F Y'); ?></span>
						<a href="<?php echo $link;  ?>"<?php echo get_post_format(get_the_ID()) == "link" ? ' target="_blank"':'' ?>>Czytaj dalej...</a>
					</div>
				</div>
			</article>
		<?php 

		endwhile;
		echo '</section>';*/


	get_footer();