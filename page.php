<?php
get_header();
global $post;
$id = $post->ID;
$title = $post->post_title;
$page_slug = $post->post_name;
switch( $page_slug ) {
	case 'about':
		get_template_part( 'pages/about' );
		break;
	case 'art-design':
		get_template_part( 'pages/art-design' );
		break;
	default:
		if( have_rows( 'rows', $id ) ) {
			while ( have_rows( 'rows', $id ) ) : the_row();
				$title = get_sub_field( 'title', $id );
				$text = get_sub_field( 'text', $id );
				echo '<div class="row thirds">';
					if( $title ) {
						echo '<div class="cell ' . ( !$text ? 'full' : 'one' ) . '">';
							echo '<h2>' . $title . '</h2>';
						echo '</div>';
					}
					if( $text ) {
						echo '<div class="cell ' . ( !$title ? 'full' : 'two' ) . '">';
							echo '<div class="text">';
								echo $text;
							echo '</div>';
						echo '</div>';
					}
				echo '</div>';
				echo '<div class="vine"></div>';
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
				}
			endwhile;
		} else {
			$content = $post->post_content;
			echo '<div class="row">';
				echo '<div class="text">';
					echo $content;
				echo '</div>';
			echo '</div>';
		}
		break;
}
get_footer();
?>