<?php
global $post;
$id = $post->ID;
$title = $post->post_title;
$slug = $post->post_name;
$events = get_projects();
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
?>