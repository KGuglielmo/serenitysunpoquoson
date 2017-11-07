<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package serenitysun
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		if ( has_post_thumbnail() ) : ?>
		  <div class="entry-image"><?php the_post_thumbnail(); ?></div>
	<?php endif; ?>

	<div class="entry-wrapper">
		<header class="entry-header">
			<?php 
			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php serenitysun_posted_on(); ?>
				<?php if ( get_edit_post_link() ) : ?>
					<?php serenitysun_entry_edit(); ?>
				<?php endif; ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>

			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php
			if ( is_home() || is_front_page() ) {
		  	the_excerpt(); ?>
		  	<div class="continue-reading">
					<?php 
					$read_more_link = sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Read more %s', 'humescores' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					);
					?>
					<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark" class="btn btn-primary">
						<?php echo $read_more_link; ?>
					</a>
				</div>
			<?php
			} else if ( is_archive() ) {
				the_excerpt();
				serenitysun_entry_footer(); ?>
		  	<div class="continue-reading">
					<?php 
					$read_more_link = sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Read more %s', 'humescores' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					);
					?>
					<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark" class="btn btn-primary">
						<?php echo $read_more_link; ?>
					</a>
				</div>
			<?php
		  } else { 
		  	the_content();
		  	serenitysun_entry_footer();
		  }
		  ?>
		</div><!-- .entry-content -->
		
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
