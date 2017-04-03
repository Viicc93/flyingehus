<?php get_header(); ?>

	<div class="col-xs-12 col-md-9">
	<?php if (have_posts()): ?>
		<?php	while ( have_posts() ) : the_post(); ?>
			<?php if (has_post_thumbnail()): ?>
				<?php
					$filename = get_the_post_thumbnail_url();
					$size = getimagesize($filename);
					$image_size = "horizontal-image";
					if ($size[0] < $size[1]) {
						$image_size = "vertical-image";
					}
				?>
			<?php endif; ?>

			<button class="flyingehus-button" value="" onclick="history.back(-1)" /><span class="fa fa-arrow-left" aria-hidden="true"></span></button>
				<article class="h-entry full-post">
					<p class="post-date dt-published">Postad: <?php the_date(); ?></p>
				<?php if (has_post_thumbnail()): ?>
					<div class="single-img <?php echo  $image_size; ?>">
						<img class="u-photo" src="<?php the_post_thumbnail_url(); ?>"></img>
						<p class="image-text"><?php the_field('bildtext'); ?></p>
					</div>
				<?php endif; ?>
					<h1 class="p-name post-title"><?php the_title(); ?></h1>
  				<div class="e-content"><?php the_content(); ?></div>
					<span class="categories">Kategorier: <?php the_category(); ?></span>
				</article>
		<?php endwhile; else: ?>
				<div class="not-found">
					<p><?php _e( 'Hoppsan! Här var det tomt!' , 'flyingehus'); ?></p>
				</div>
	<?php endif; ?>
</div>
  <aside id="news-sidebar" class="sidebar col-xs-12 col-md-3">
  	<?php if ( is_active_sidebar( 'news-sidebar' ) ) : ?>
			<ul>
  			<?php dynamic_sidebar( 'news-sidebar' ); ?>
			</ul>
  	<?php endif; ?>
	</aside>


<?php get_footer(); ?>
