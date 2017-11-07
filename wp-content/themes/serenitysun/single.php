<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package serenitysun
 */

get_header(); ?>

<section class="hero internal-page single-hero">
	<div class="container">
		<h2>Featured Product</h2>
	</div>
</section>

<section class="content-area">
	<div class="container">
		
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation( array(
        'prev_text'                  => __( '<i class="fa fa-chevron-left" aria-hidden="true"></i> <span>%title</span>' ),
        'next_text'                  => __( '<span>%title</span> <i class="fa fa-chevron-right" aria-hidden="true"></i>' ),
      ) );

		endwhile; // End of the loop.
		?>

	</div><!-- container -->
</section>

<?php
get_footer();
