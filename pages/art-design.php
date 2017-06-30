<?php
global $post;
$id = $post->ID;
$title = $post->post_title;
$slug = $post->post_name;
query_posts( array(
  'post_type' => 'project',
  'posts_per_page' => -1,
  'orderby' => 'post_date',
  'order' => 'ASC',
  'post_status' => 'publish'
) );

echo '<div class="blocks">';
	while (have_posts()) : the_post();
		$id = get_the_ID();
		$title = get_the_title();
		$url = get_permalink( $id );
		echo '<div class="block">';
			echo '<a href="' . $url . '" ' . ( has_post_thumbnail() ? 'style="background-image:url(' . get_the_post_thumbnail_url() . ')"' : '' ) . '">';
				// var_dump( $project );
				echo '<div class="title">';
					echo '<div class="center">';
						echo '<h1>' . $title . '</h1>';
					echo '</div>';
				echo '</div>';
			echo '</a>';
		echo '</div>';
	endwhile;
echo '</div>';
?>