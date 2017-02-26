<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php	while ( have_posts() ) : the_post(); ?>
		<article class="h-entry">
			<div class="e-content"><?php the_content(); ?></div>
		</article>
	<?php endwhile; else : ?>
		<div class="not-found">
			<p><?php _e( 'No page was found here' , 'flyingehus'); ?></p>
		</div>
<?php endif; ?>

<?php get_footer(); ?>
