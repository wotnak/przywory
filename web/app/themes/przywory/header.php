<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1">



	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fonts/flaticon.css">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css?v=1544550716">

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fontawesome.css">



	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="<?php bloginfo('description'); ?>">



	<?php wp_head(); ?>



	<?php

		if ( is_user_logged_in() ) {

			echo '<style>.menu--sticky{top: 32px}</style>';

		}

	?>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->



    <?php

		// if ( is_single() ) {



		// 	$post = $wp_query->post;

		// 	$id = get_post_thumbnail_id($post->ID);

		// 	$image = wp_get_attachment_url($id);

		// 	if ($image == "") { $image = get_bloginfo('template_directory')."/images/default-thumbail.png"; }

		// 	echo '<meta property="og:image" content="'.$image.'"/>';

		// }

	?>



</head>

<body <?php body_class(); ?>>



	<script>

	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');



	  ga('create', 'UA-67434347-1', 'auto');

	  ga('send', 'pageview');

	</script>

	

	<div id="fb-root"></div>

	<script>(function(d, s, id) {

	  var js, fjs = d.getElementsByTagName(s)[0];

	  if (d.getElementById(id)) return;

	  js = d.createElement(s); js.id = id;

	  js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.4";

	  fjs.parentNode.insertBefore(js, fjs);

	}(document, 'script', 'facebook-jssdk'));</script>



	<div class="container">



		<header role="banner" class="header" style="position:relative">
			<h1>
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php echo( get_bloginfo( 'title' ) ); ?>">
				</a>
			</h1>
			<?php 
				$bip = '<a href="http://bip.przedszkole.przywory.eu" title="Biuletin Informacji Publicznej"><img src="https://przywory.eu/wp-content/uploads/2018/01/bip.png" alt="BIP" style="position:absolute;bottom:2px;right:10px;height:40px;"></a>';
				if (is_category(3) || is_category(14)) {
					echo $bip;
				} else if (is_single()){
					foreach((get_the_category()) as $category) {
						if ($category->cat_ID == 3 || cat_is_ancestor_of( 3, $category->cat_ID ) ) {
							echo $bip;
							break;
						}
					}
				}
			?>
		</header>


		<?php get_template_part( 'menu' ); ?>

		<div class="container-content">

			<main role="main" class="content">



			<?php

				if (is_category(6)) {

					echo '<a href="https://przywory.eu/biblioteka/dkk"><img src="https://przywory.eu/wp-content/themes/przywory/images/dkk.jpg" alt="Dyskusyjny Klub Książki" style="width:100%;margin-bottom:5px"></a>';

				} else {

					foreach((get_the_category()) as $category) {

						if ($category->cat_ID == 6 || cat_is_ancestor_of( 6, $category->cat_ID ) ) {

							echo '<a href="https://przywory.eu/biblioteka/dkk"><img src="https://przywory.eu/wp-content/themes/przywory/images/dkk.jpg" alt="Dyskusyjny Klub Książki" style="width:100%;margin-bottom:5px"></a>';

						}

					}

				}