<?php get_header(); ?>
<div class="flexbox">
	<aside id="news-sidebar" class="sidebar flexpos-2 col-xs-12 col-md-3">
		<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
			<ul>
				<?php dynamic_sidebar( 'main-sidebar' ); ?>
			</ul>
		<?php endif; ?>
	</aside>

	<section class="posts flexpos-1 col-xs-12 col-md-9">
	<?php if ( have_posts() ) : ?>
		<?php	while ( have_posts() ) : the_post(); ?>
				<article class="post h-entry">
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="post-img">
							<img class="u-photo" src="<?php the_post_thumbnail_url(); ?>"></img>
						</div>
						<div class="content">
					<?php else: ?>
						<div class="content-wide">
					<?php endif; ?>
						<h2 class ="post-title p-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="p-summary"><?php the_excerpt(); ?></div>
						<div class="exc-footer">
							<a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Read More &raquo;' , 'flyingehus' ); ?></a>
						</div>
						<div>
							<span class="post-date"><?php the_date(); ?></span>
						</div>
					</div>
				</article>
	<?php endwhile; ?>
	<?php if( get_next_posts_link() ) :
				next_posts_link( __('Older Entries »', 'flyingehus'), 0 );
			endif;
			if( get_previous_posts_link() ) :
				previous_posts_link( __('« Newer Entries', 'flyingehus') );
			endif; ?>
		<?php else : ?>
			<div class="not-found">
				<h5><?php _e( 'Ouups, nothing found here!' , 'flyingehus'); ?></h5>
			</div>
		<?php endif; ?>
	</section>
</div>

<?php get_footer(); ?>
