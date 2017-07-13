<?php
/*
Template Name: Project
Template Post Type: project
*/
get_header();
global $post;
$id = $post->ID;
$title = $post->post_title;
echo '<div class="title">';
	echo '<h2>' . $title . '</h2>';
echo '</div>';
if( have_rows( 'images', $id ) ) {
	echo '<div class="row carousel">';
		echo '<div class="slides">';
			$i = 0;
			while ( have_rows( 'images', $id ) ) : the_row();
				$image = get_sub_field( 'image' );
				// var_dump( $image );
				$url = $image['url'];
				$title = $image['title'];
				$caption = $image['caption'];
				echo '<div class="slide" >';
					echo '<div class="image" title="' . $title . '" style="background-image:url(' . $url . ')"></div>';
					echo '<div class="caption"><div class="inner">' . $caption .  '</div></div>';
				echo '</div>';
				$i++;
			endwhile;
		echo '</div>';
		if( $i > 1 ) {
			echo '<div class="arrow left" data-direction="left"></div>';
			echo '<div class="arrow right" data-direction="right"></div>';
		}
	echo '</div>';
	echo '<div class="vine"></div>';
}
get_footer();
?>