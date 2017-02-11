<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php	while ( have_posts() ) : the_post(); ?>
		<article class="h-entry">
			<h1 class="p-name page-title"><?php the_title(); ?></h1>
			<div class="e-content"><?php the_content(); ?></div>
		</article>
	<?php endwhile; else : ?>
		<div class="not-found">
			<p><?php _e( 'No page was found here' , 'flyingehus'); ?></p>
		</div>
<?php endif; ?>

<?php get_footer(); ?>
