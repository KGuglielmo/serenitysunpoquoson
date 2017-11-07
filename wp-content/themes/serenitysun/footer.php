<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package serenitysun
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			
			<div class="row">
				<!-- <div class="col-sm-3 widget">
					<h4 class="widget-title">Contact Us</h4>
					<div class="contact-field">
						<div>
							<i class="fa fa-map-marker" aria-hidden="true"></i>
						</div>
						<div>
							<?php the_field('address'); ?>
						</div>
					</div>
					<div class="contact-field">
						<div>
							<i class="fa fa-phone" aria-hidden="true"></i>
						</div>
						<div>
							<?php the_field('phone_number'); ?>
						</div>
					</div>
				</div> -->
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
