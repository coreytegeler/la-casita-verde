<?php
global $post;
$id = $post->ID;
$title = $post->post_title;
$content = $post->post_content;
echo '<div class="row">';
	echo '<div class="text">';
		echo $content;
	echo '</div>';
echo '</div>';
?>