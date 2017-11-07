<?php /* Template Name: Home Page Template */ ?>

<?php get_header(); ?>

<?php if ( get_field('hero_image') ) : ?>
  <section class="hero" style="background-image: url('<?php the_field('hero_image'); ?>');">
		<div class="container">
			<h2><?php bloginfo('description'); ?></h2>
		</div>
	</section>
<?php else : ?>
	<section class="hero no-feature-image">
		<div class="container">
			<h2><?php bloginfo('description'); ?></h2>
		</div>
	</section>
<?php endif; ?>

<section class="content-area">
	<div class="container">
		<?php if ( get_edit_post_link() ) : ?>
			<div class="clearfix">
				<div class="pull-right">
					<?php serenitysun_entry_edit(); ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-sm-6">
				<?php
				while ( have_posts() ) : the_post();
					the_content();
				endwhile; 
				?>
			</div>
			<div class="col-sm-push-2 col-sm-4">
				<?php the_field('salon_hours'); ?>
			</div>
		</div>
	</div>
</section>

<section class="promos-specials">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<?php the_field('specials_and_promotions'); ?>
			</div>
		</div>
	</div>
</section>

<section class="featured-product">
	<div class="container">
		<div class="row no-gutter feature-full">
			<div class="col-sm-4 feature-left">
				<?php if( get_field('featured_image_1') ): ?>
					<img src="<?php the_field('featured_image_1'); ?>" />
				<?php endif; ?>
			</div>
			<div class="col-sm-8">
				<div class="row no-gutter row-table feature-top">
					<div class="col-sm-6">
						<h3 class="widget-title"><?php the_field('featured_text'); ?></h3>
					</div>
					<div class="col-sm-6">
						<?php if( get_field('featured_image_2') ): ?>
							<img src="<?php the_field('featured_image_2'); ?>" />
						<?php endif; ?>
					</div>
				</div>
				<div class="row no-gutter feature-bottom">
					<div class="col-xs-12">
						<?php
							if ( have_posts() ) :

								$the_query = new WP_Query( 'posts_per_page=1' ); 

								while ($the_query -> have_posts()) : $the_query -> the_post(); 

									get_template_part( 'template-parts/content', get_post_format() );

								endwhile;

							else :
								get_template_part( 'template-parts/content', 'none' );
						endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="map-container">
	<div id="map"></div>
</section>

<?php get_footer(); ?>