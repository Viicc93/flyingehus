<?php /* Template Name: Sidebar Page*/ ?>
<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php	while ( have_posts() ) : the_post(); ?>
		<article class="h-entry col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<div class="e-content"><?php the_content(); ?></div>
		</article>
    <aside id="sidebar" class="sidebar col-xs-12 col-md-4">
      <?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
        <ul>
          <?php dynamic_sidebar( 'sidebar' ); ?>
        </ul>
      <?php endif; ?>
    </aside>
	<?php endwhile; else : ?>
		<div class="not-found">
			<p><?php _e( 'Hoppsan! Här var det tomt!' , 'flyingehus'); ?></p>
		</div>
<?php endif; ?>

<?php get_footer(); ?>
