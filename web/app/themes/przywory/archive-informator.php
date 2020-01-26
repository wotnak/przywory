<?php 

	get_header();

		echo '<h1>Przyworski Informator Gospodarczy</h1>';

		echo '<p class="informator-info">Jeśli dane Twojej firmy są nieaktualne/błędne, jest zaznaczona na mapie w złym miejscu albo nie znajduje się jeszcze w informatorze - zapoznaj się z treścią <a href="http://przywory.eu/aktualnosci/853-przyworski-informator-gospodarczy.html">tego wpisu</a> i napisz do nas na: <a href="mailto:admin@przywory.eu">admin@przywory.eu</a></p>';

		echo '<div class="informator-list">';

		$args = array(
			'orderby'           => 'name', 
			'order'             => 'ASC',
			'hide_empty'        => false, 
		); 
		$terms = get_terms( 'informator-kategorie', $args ); 
		foreach ($terms  as $term ) {
			echo '<h2 id="'. $term->slug .'">'. $term->name .'</h2>';
			echo '<ul class="informator-elements-list">';

			$args = array(
				'post_type' => 'informator',
				'posts_per_page' => -1,
				'tax_query' => array(
					array(
						'taxonomy' => 'informator-kategorie',
						'field'    => 'slug',
						'terms'    => $term->slug
					),
				),
			);
			$query = new WP_Query( $args );
			while ($query->have_posts()) : $query->the_post(); ?>
				<li>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</li>
			<?php 
			endwhile;

			echo '</ul>';
		}
		echo '</div>';

		echo '<nav class="informator-menu">';
		echo '<p>Kategorie:</p>';
		echo '<ul>';
		foreach ($terms  as $term ) {
			echo '<li><a href="#'. $term->slug .'">'. $term->name .'</a></li>';
		}
		echo '</ul>';
		echo '</nav>';

	get_footer();