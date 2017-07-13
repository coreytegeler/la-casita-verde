</main>
<?php wp_footer(); ?>
	<footer>
		<div class="inner">
			<div class="cell">© La Casita Verde 2013 – <?php echo date( 'Y' ) ?></div>
			<div class="cell social">
				<div class="icon facebook">
					<a href="https://www.facebook.com/lacastiaverdenyc/" target="_blank">
						<?php echo file_get_contents( get_template_directory_uri() . '/images/facebook.svg'	); ?>
					</a>
				</div>
				<div class="icon instagram">
					<a href="https://www.instagram.com/lacasitaverdebklyn" target="_blank">
						<?php echo file_get_contents( get_template_directory_uri() . '/images/instagram.svg'	); ?>
					</a>
				</div>
				<div class="icon flickr">
					<a href="https://www.flickr.com/photos/127220128@N02/" target="_blank">
						<?php echo file_get_contents( get_template_directory_uri() . '/images/flickr.svg'	); ?>
					</a>
				</div>
			</div>
		</div>
	</footer>
	<div id="palette">
		<div class="light"></div>
		<div class="medium"></div>
		<div class="dark"></div>
		<div class="green"></div>
	</div>
</body>
</html>