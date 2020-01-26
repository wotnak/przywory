<?php



add_theme_support( 'automatic-feed-links' );



// post thumbails

add_theme_support( 'post-thumbnails', array( 'post' ) );

//function to call first uploaded image in functions file

function main_image() {

	$the_title=get_the_title();

	$img = '<img src="'.get_bloginfo('template_directory').'/images/default-thumbail.png" alt="'.$the_title.'" class="thumbail" width="150" height="150">';

	return $img;

}





// menus

function register_my_menus() {

	register_nav_menus(

		array(

			'main-menu' => __( 'Menu główne' ),

			'przedszkole' => __( 'Przedszkole' ),

			'biblioteka' => __( 'Bilbioteka' ),

			'kategorie' => __( 'Kategorie' ),

			'stopka' => __( 'Stopka' ),

		)

	);

}

add_action( 'init', 'register_my_menus' );





// sidebar

function custom_sidebar() {



	$args = array(

		'id' => 'boczny',

		'name' => __( 'Pasek boczny')

	);

	register_sidebar( $args );



}

add_action( 'widgets_init', 'custom_sidebar' );







// page to strona w linkach

function page_to_strona(){

	global $wp_rewrite;

	$wp_rewrite->pagination_base = 'strona';

	$wp_rewrite->flush_rules();

}

add_action( 'wp_loaded','page_to_strona' );





// excerpt

function new_excerpt_length($length) { return 30; }

add_filter('excerpt_length', 'new_excerpt_length');

function new_excerpt_more( $more ) { return ' ...'; }

add_filter('excerpt_more', 'new_excerpt_more');









function is_section( $section ) {



	if (!is_home()) {

		switch ( $section ) {

			case 'biblioteka':
				if (is_category(9)) return false;
				if ( is_category( 2 ) ) { return true; break; }

				foreach((get_the_category()) as $category) {

					if ($category->cat_ID == 2 || cat_is_ancestor_of( 2, $category->cat_ID ) ) {

						return true;

						break;

					}

				}

				return false;

				break;



			case 'przedszkole':

				if ( is_category( 3 ) ) { return true; break; }

				foreach((get_the_category()) as $category) {

					if ($category->cat_ID == 3 || cat_is_ancestor_of( 3, $category->cat_ID ) ) {

						return true;

						break;

					}

				}

				return false;

				break;

			

			default:

				return false;

				break;

		}

	} else {

		return false;

	}



}









function section_body_class($classes = '') {



	if (is_section('przedszkole')) { $classes[] = 'przedszkole'; }



	if (is_section('biblioteka')) { $classes[] = 'biblioteka'; }



	return $classes;

}

add_filter('body_class','section_body_class');







function has_next_page() {

    global $wp_query;



    echo $wp_query->max_num_pages;

    echo $wp_query->get_query_var('paged');



    if ($wp_query->max_num_pages < $wp_query->get_query_var('paged')) {

    	return true;

    } else {

    	return false;

    }



}



function has_prev_page() {

    global $wp_query;



    if ($wp_query->max_num_pages > $wp_query->get_query_var('paged')) {

    	return true;

    } else {

    	return false;

    }



}







add_action( 'admin_init', 'my_remove_menu_pages' );

function my_remove_menu_pages() {



    global $user_ID;



    if ( $user_ID == 6 ) {

		remove_menu_page( 'admin.php?page=jetpack' );

		remove_menu_page( 'admin.php?page=sharing' );

        remove_menu_page( 'tools.php' );

        remove_menu_page( 'jetpack' );

        remove_menu_page( 'sharing' );

    }

}









// breadcrumbs

function the_breadcrumb() {

	if (!is_home()) {

		echo '<div class="breadcrumbs">';

		echo '<a href="';

		echo get_option('home');

		echo '">';

		bloginfo('name');

		echo "</a>  ";

		if (is_category() || is_single()) {

			$cats = wp_get_post_categories(get_the_ID());

			foreach ($cats as $cat) {

				if ($cat != 1) {

					echo '<a href="'. get_category_link($cat) .'" rel="category tag">'. get_cat_name($cat) .'</a> ';

				}

			}

		}

		echo '</div>';

	}

}





function przywory_the_category() {

	echo '<ul class="post-categories">';



	$cats = wp_get_post_categories(get_the_ID());

	foreach ($cats as $cat) {

		if ($cat == 48) echo '<li><a href="https://naszeprzywory.wordpress.com" rel="category tag" target="_blank">'. get_cat_name($cat) .'</a></li>';

		else if ($cat == 1) echo '<li><a href="https://przywory.eu" rel="category tag">'. get_cat_name($cat) .'</a></li>';

		else if ($cat == 32) echo '<li><a href="http://gok.tarnowopolski.pl" rel="category tag" target="_blank">'. get_cat_name($cat) .'</a></li>';

		else echo '<li><a href="'. get_category_link($cat) .'" rel="category tag">'. get_cat_name($cat) .'</a></li>';

	}



	echo '</ul>';

}







// fix for jetpack galleries

if ( ! isset( $content_width ) )

    $content_width = 740;



function tweakjp_rm_comments_att( $open, $post_id ) {

    $post = get_post( $post_id );

    if( $post->post_type == 'attachment' ) {

        return false;

    }

    return $open;

}

add_filter( 'comments_open', 'tweakjp_rm_comments_att', 10 , 2 );





// informator

function create_post_type() {

  $labels = array(

    'name'               => __( 'Informator gospodarczy'             , 'informator' ),

    'singular_name'      => __( 'Informacja'                         , 'informator' ),

    'menu_name'          => __( 'Informator'                         , 'informator' ),

    'name_admin_bar'     => __( 'Informator'                         , 'informator' ),

    'add_new'            => __( 'Dodaj element'                      , 'informator' ),

    'add_new_item'       => __( 'Dodaj element'                      , 'informator' ),

    'new_item'           => __( 'Nowy element'                       , 'informator' ),

    'edit_item'          => __( 'Edytuj element'                     , 'informator' ),

    'view_item'          => __( 'Zobacz'                             , 'informator' ),

    'all_items'          => __( 'Lista firm i instytucji'            , 'informator' ),

    'search_items'       => __( 'Szukaj elementów'                   , 'informator' ),

    'parent_item_colon'  => __( 'Parent Project'                     , 'informator' ),

    'not_found'          => __( 'Lista firm i instytucji jest pusta' , 'informator' ),

    'not_found_in_trash' => __( 'Kosz jest pusty'                    , 'informator' )

  );



  $args = array(

    'labels'              => $labels,

    'public'              => true,

    'exclude_from_search' => false,

    'publicly_queryable'  => true,

    'show_ui'             => true,

    'show_in_nav_menus'   => true,

    'show_in_menu'        => true,

    'show_in_admin_bar'   => true,

    'menu_position'       => 5,

    'menu_icon'           => 'dashicons-location',

    'capability_type'     => 'page',

    'hierarchical'        => false,

    'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),

    'has_archive'         => true,

    'rewrite'             => array( 'slug' => 'informator' ),

    'query_var'           => true

  );



  register_post_type( 'informator', $args );

}



add_action( 'init', 'create_post_type' );









add_action( 'init', 'informator_taxonomies', 0 );

function informator_taxonomies() {

	$labels = array(

		'name'                       => __( 'Kategoria', 'informator' ),

		'singular_name'              => __( 'Kategorie', 'taxonomy singular name' ),

		'search_items'               => __( 'Przeszukaj kategorie', 'informator' ),

		'popular_items'              => __( 'Popularne kategorie', 'informator' ),

		'all_items'                  => __( 'Wszystkie kategorie', 'informator' ),

		'parent_item'                => null,

		'parent_item_colon'          => null,

		'edit_item'                  => __( 'Eytuj kategorię', 'informator' ),

		'update_item'                => __( 'Aktualizuj', 'informator' ),

		'add_new_item'               => __( 'Nowa kategoria', 'informator' ),

		'new_item_name'              => __( 'New Writer Name', 'informator' ),

		'separate_items_with_commas' => __( 'Separate writers with commas', 'informator' ),

		'add_or_remove_items'        => __( 'Add or remove writers', 'informator' ),

		'choose_from_most_used'      => __( 'Choose from the most used writers', 'informator' ),

		'not_found'                  => __( 'No writers found.', 'informator' ),

		'menu_name'                  => __( 'Kategorie', 'informator' ),

	);



	$args = array(

		'hierarchical'          => true,

		'labels'                => $labels,

		'show_ui'               => true,

		'show_admin_column'     => true,

		'update_count_callback' => '_update_post_term_count',

		'query_var'             => false,

		'rewrite'               => array( 'slug' => 'typ' ),

	);



	register_taxonomy( 'informator-kategorie', 'informator', $args );

}







add_filter( 'manage_edit-informator_columns', 'informator_columns' ) ;

function informator_columns( $columns ) {

	unset($columns['date']);

	unset($columns['scategory_permalink']);

	$columns['title'] = "Nazwa";

	return $columns;

}



















// disable unecesary w3 total cache comments

add_filter( 'w3tc_can_print_comment', function( $w3tc_setting ) { return false; }, 10, 1 );















function the_informator_breadcrubs() {

	if (is_singular('informator')) {

		echo '<div class="breadcrumbs">';

		echo '<a href="https://przywory.eu/informator">Przyworski Informator Gospodarczy</a> ';



		$cats = get_the_terms( get_the_ID(), 'informator-kategorie' );

		foreach ($cats as $cat) {

			echo '<a href="https://przywory.eu/informator">'. $cat->name .'</a> ';

		}



		echo '</div>';

	}

}





add_theme_support( 'post-formats', array( 'link' ) );

function get_first_url($string) {

	$regex = '/https?\:\/\/[^\" ]+/i';

	preg_match($regex, $string, $matches);

	return $matches[0];

}