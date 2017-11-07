<?php /* Template Name: Contact Page Template */ ?>


<?php get_header(); ?>

<?php if ( get_field('hero_image') ) : ?>
  <section class="hero internal-page" style="background-image: url('<?php the_field('hero_image'); ?>');">
		<div class="container">
			<?php the_title( '<h2>', '</h2>' ); ?>
		</div>
	</section>
<?php else : ?>
	<section class="hero internal-page no-feature-image">
		<div class="container">
			<?php the_title( '<h2>', '</h2>' ); ?>
		</div>
	</section>
<?php endif; ?>

<section class="content-area">
	<div class="container">
		<?php
		while ( have_posts() ) : the_post(); ?>
		<div class="row">
			<div class="col-sm-6">
				<div class="contact-module">
					<h3><?php the_field('page_subtitle'); ?></h3>
					<div class="contact-field">
						<div>
							<i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
						</div>
						<div>
							<?php the_field('address'); ?>
						</div>
					</div>
					<div class="contact-field">
						<div>
							<i class="fa fa-phone fa-2x" aria-hidden="true"></i>
						</div>
						<div>
							<?php the_field('phone_number'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="contact-form">
					<?php get_template_part( 'template-parts/content', 'page' ); ?>
				</div>
			</div>
		</div>
		<?php endwhile; // End of the loop. ?>
	</div>
</section>

<?php
get_footer();
