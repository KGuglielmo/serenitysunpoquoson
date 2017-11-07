<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package serenitysun
 */

get_header(); ?>

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

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="col-sm-8">
		<?php endif; ?>

			<?php while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile; ?>

		<?php if ( has_post_thumbnail() ) : ?>
			</div>
		<?php endif; ?>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="col-sm-4 feature-image">
		    <?php the_post_thumbnail(); ?>
		  </div>
		<?php endif; ?>

	</div>
</section>

<?php
get_footer();
