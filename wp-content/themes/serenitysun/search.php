<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package serenitysun
 */

get_header(); ?>

<section class="hero internal-page search-hero">
	<div class="container">
		<h2>Search Results</h2>
	</div>
</section>

<section class="content-area">
	<div class="search-bar-wrapper">
		<div class="container">
			<?php get_search_form(); ?>	
		</div>
	</div>
	<div class="container">

		<?php
		if ( have_posts() ) : ?>
			<div class="search-results">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );
				endwhile; ?>
			</div>

			<?php the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
	</div>
</section><!-- #primary -->

<?php
get_footer();
