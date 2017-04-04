<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php	while ( have_posts() ) : the_post(); ?>
		<article class="h-entry">
			<div class="e-content"><?php the_content(); ?></div>
		</article>
	<?php endwhile; else : ?>
		<div class="not-found">
			<p><?php _e( 'Hoppsan! Här var det tomt!' , 'flyingehus'); ?></p>
		</div>
<?php endif; ?>

<?php get_footer(); ?>
