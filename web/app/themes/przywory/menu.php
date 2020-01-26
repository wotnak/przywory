<?php

$main = array(
	'theme_location'  => 'main-menu',
	'menu'            => '',
	'container'       => 'nav',
	'container_class' => 'nav main-menu',
	'container_id'    => '',
	'menu_class'      => 'menu',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
);

wp_nav_menu( $main );



if ( is_section('przedszkole') ) {

	$przedszkole = array(
		'theme_location'  => 'przedszkole',
		'container'       => 'nav',
		'container_class' => 'nav nav-second nav-przedszkole',
		'menu_class'      => 'menu',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'link_before'     => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	);

	wp_nav_menu( $przedszkole );

}

elseif ( is_section('biblioteka') ) {

	$przedszkole = array(
		'theme_location'  => 'biblioteka',
		'container'       => 'nav',
		'container_class' => 'nav nav-second nav-biblioteka',
		'menu_class'      => 'menu',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'link_before'     => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	);

	wp_nav_menu( $przedszkole );

}

else {

	$sections = array(
		'theme_location'  => 'kategorie',
		'container'       => 'nav',
		'container_class' => 'nav nav-second nav-kategorie',
		'menu_class'      => 'menu',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'link_before'     => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	);

	wp_nav_menu( $sections );

}