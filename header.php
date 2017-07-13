<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<title>
		<?php
		bloginfo('name');
		$page_slug = $post->post_type;
		if( !is_home() ) {
			echo ' — ';
			wp_title('',true);
		}
		?>
	</title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php echo body_class( $page_slug ) ?>>
<?php
echo '<header>';
	echo '<div class="inner">';
		echo '<div class="wrap">';
			echo '<a class="logo hover" href="' . site_url() . '">';
				$logoSvg = get_template_directory_uri() . '/images/logo.svg';
			  echo file_get_contents( $logoSvg );
			echo '</a>';
			echo '<nav role="navigation">';
				$nav_links = array_reverse( wp_get_nav_menu_items( 'nav' ) );
				foreach ( (array) $nav_links as $key => $link ) {
					echo '<a href="' . $link->url . '">' . $link->title . '</a>';
				}
			echo '</nav>';
		echo '</div>';
		echo '<a class="logotext hover" href="' .  site_url() . '">';
			echo '<h1>La Casita Verde</h1>';
		echo '</a>';
	echo '</div>';
	$about_url = get_permalink( get_page_by_path( 'about' ) );
	$svg = get_template_directory_uri() . '/images/' . is_open() . '.svg';
  echo '<div class="sign" data-status="' . is_open() . '">';
    echo '<a href="' . $about_url . '">' . file_get_contents( $svg ) . '</a>';
  echo '</div>';
  ?>
</header>
<main>