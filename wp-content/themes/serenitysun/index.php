<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package serenitysun
 */

get_header(); ?>

<section>
	<div class="container">
		<?php get_sidebar(); ?>
	</div>
</section>

	<div class="container">
		<div>
			<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>

					<?php
					endif;

					$the_query = new WP_Query( 'posts_per_page=1' ); 

					/* Start the Loop */
					while ($the_query -> have_posts()) : $the_query -> the_post(); 

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

				else :
					get_template_part( 'template-parts/content', 'none' );
			endif; ?>
		</div>
	</div><!-- .container -->

<?php
get_footer();
