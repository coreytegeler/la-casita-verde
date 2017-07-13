<?php
global $post;
$id = $post->ID;
$title = $post->post_title;
$slug = $post->post_name;
$lead = get_field( 'lead_text', $id );
$about = get_field( 'about_text', $id );
$steering_committee = get_field( '', $id );
echo '<div class="row thirds">';
	echo '<div class="cell one">';
		echo '<div class="text">';
			echo '<h3>' . $lead . '</h3>';
		echo '</div>';
	echo '</div>';
	echo '<div class="cell two">';
		echo '<div class="text">';
			echo $about;
		echo '</div>';
	echo '</div>';
echo '</div>';

if( have_rows( 'open_hours', $id ) ) {
	echo '<div class="row thirds">';
		echo '<div class="cell two">';
			echo '<div class="text">';
				echo '<h3>Visit La Casita Verde during our open hours. Or stop by whenever to peek through the fence, maybe you\'ll see us working!</h3>';
			echo '</div>';
		echo '</div>';
		echo '<div class="cell one">';
			echo '<div class="text">';
				echo '<ul>';
				  while ( have_rows( 'open_hours', $id ) ) : the_row();
				    $day = get_sub_field( 'day' );
				    $open = get_sub_field( 'open' );
				    $close = get_sub_field( 'close' );
				    $hours = [$open => $close];
				    if( $day && $open && $close ) {
					    $openHoursArray[$day][$open] = $close;
					    echo '<li>';
								echo $day . ': ' . $open . '—' .  $close;
							echo '</li>';
					  }
				  endwhile;
			  echo '</ul>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}

echo '<div class="row thirds">';
	echo '<div class="cell one">';
		echo '<div class="text">';
			echo '<h3>La Casita Verde Steering Committee</h3>';
		echo '</div>';
	echo '</div>';
	echo '<div class="cell two">';
		echo '<div class="text">';
			echo '<ul>';
				while ( have_rows( 'steering_committee', $id ) ) : the_row();
					$name = get_sub_field( 'name', $id );
					$role = get_sub_field( 'role', $id );
					echo '<li>' . $name . ', ' . $role .  '</li>';
				endwhile;
			echo '</ul>';
		echo '</div>';
	echo '</div>';
echo '</div>';
?>