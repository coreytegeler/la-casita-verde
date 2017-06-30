<?php
get_header();
$home_id = get_page_by_path( 'home' )->ID;
echo '<div class="blocks">';
	$events = get_upcoming_events();
	foreach ( (array) $events as $key => $event ) {
		$thumb = get_the_post_thumbnail_url( $event->object_id );
		$title = $event->post_title;
		$class = ( $thumb ? 'bg' : 'border' );
		echo '<div class="block ' . $class . '">';
			if( $thumb ) {
				echo '<a href="' . $event->url . '" style="background-image:url(' . $thumb . ')">';
			} else {
				echo '<a href="' . $event->url . '">';
			}
				echo '<div class="title">';
					echo '<div class="center">';
						echo '<h2>Upcoming</h2>';
						echo '<h1>' . $title . '</h1>';
					echo '</div>';
				echo '</div>';
			echo '</a>';
		echo '</div>';
	}

	$nav_links = wp_get_nav_menu_items( 'nav' );
	foreach ( (array) $nav_links as $key => $page ) {
		$thumb = get_the_post_thumbnail_url( $page->object_id );
		$tagline = get_field( 'tagline', $page->object_id );
		$title = ( sizeof( $tagline ) > 1 ? $tagline : $page->title );
		$class = ( $thumb ? 'bg' : 'border' );
		echo '<div class="block ' . $class . '">';
			if( $thumb ) {
				echo '<a class="bg" href="' . $page->url . '" style="background-image:url(' . $thumb . ')">';
			} else {
				echo '<a class="border" href="' . $page->url . '">';
			}
				echo '<div class="title">';
					echo '<div class="center"><h1>' . $title . '</h1></div>';
				echo '</div>';
			echo '</a>';
		echo '</div>';
	}
echo '</div>';
$address = get_field( 'address', $home_id );
echo '<div id="address">';
	echo '<h1>'.$address.'</h1>';
echo '</div>';
echo '<div id="map">';

echo '</div>';
get_footer();
?>