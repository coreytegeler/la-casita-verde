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

<body <?php body_class( $page_slug ); ?>>
<header>
	<div class="inner">
		<div class="circle"></div>
		<div class="text">
			<div class="wrap">
				<a class="logo" href="<?php echo site_url() ?>"></a>
				<nav role="navigation">
					<?php
					$nav_links = array_reverse( wp_get_nav_menu_items( 'nav' ) );
					foreach ( (array) $nav_links as $key => $link ) {
						echo '<a href="' . $link->url . '">' . $link->title . '</a>';
					}
					?>
				</nav>
			</div>
			<a class="logotext" href="<?php echo site_url() ?>">
				<h2>La Casita Verde</h2>
			</a>
		</div>
	</div>
</header>
<?php
$about = get_page_by_path( 'about' );
if( have_rows( 'open_hours', $about ) ) {
  while ( have_rows( 'open_hours', $about ) ) : the_row();
    $day = get_sub_field( 'day' );
    $open = get_sub_field( 'open' );
    $close = get_sub_field( 'close' );
    $hours = [$open => $close];
    if( $day && $open && $close ) {
	    $openHoursArray[$day][$open] = $close;
	  }
  endwhile;
}

$timestamp = time();
$status = 'Closed';
$currentTime = ( new DateTime() )->setTimestamp( $timestamp );
// loop through time ranges for current day
foreach ( $openHoursArray[date( 'D', $timestamp )] as $startTime => $endTime ) {
  $startTime = DateTime::createFromFormat( 'h:i A', $startTime );
  $endTime   = DateTime::createFromFormat( 'h:i A', $endTime );
  if ( ( $startTime < $currentTime ) && ( $currentTime < $endTime ) ) {
    $status = 'Open';
    break;
  }
}
?>
<div class="sign" data-status="<?php echo $status; ?>">We're <?php echo $status; ?></div>
<main>