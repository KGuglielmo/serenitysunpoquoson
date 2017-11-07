<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package serenitysun
 */

get_header(); ?>

<section class="content-area">
	<div class="container">

		<section class="error-404 not-found">
			<header>
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'serenitysun' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'serenitysun' ); ?></p>

				<div class="search-bar-wrapper">
					<?php
						get_search_form();
					?>
				<div>

				<?php
					the_widget( 'WP_Widget_Recent_Posts' );
				?>

<!-- 				<div class="widget widget_categories">
					<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'serenitysun' ); ?></h2>
					<ul>
					<?php
						wp_list_categories( array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 10,
						) );
					?>
					</ul>
				</div> -->

<!-- 				<?php
					$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'serenitysun' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
				?> -->

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</div><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
