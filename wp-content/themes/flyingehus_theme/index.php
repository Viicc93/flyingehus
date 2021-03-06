<?php get_header(); ?>
<?php $latestPost = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1)); ?>
<?php $latestPostID; ?>
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
<?php $allPosts = new WP_Query( array('post_type' => 'post', 'paged' => $paged,)); ?>

<?php
  if ($latestPost->have_posts()):
    while ( $latestPost->have_posts() ) : $latestPost->the_post();
    $latestPostID =  get_the_ID();
    endwhile;
  endif;
?>

<div class="main-content flexbox">
  <aside id="main-sidebar" class="sidebar flexpos-2 col-xs-12 col-md-4">
    <?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
      <ul>
        <?php dynamic_sidebar( 'main-sidebar' ); ?>
      </ul>
    <?php endif; ?>
  </aside>

	<?php if ( have_posts() ) : ?>
	<section class="posts flexpos-1 col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<?php	while ( have_posts() ) : the_post(); ?>
        <?php if (get_the_ID() === $latestPostID ): ?>

          <article id="post-<?php the_ID(); ?>" class="hero-post h-entry">
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="hero-img">
                <img class="u-photo" src="<?php the_post_thumbnail_url(); ?>"></img>
              </div>
            <?php endif; ?>
            <div class="content">
              <h2 class ="post-title p-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <div class="p-summary"><?php the_content(); ?></div>
              <span class="categories"><?php the_category(); ?></span>
              <div class="exc-footer">
                <a class="read-more" href="<?php the_permalink(); ?>"> <?php _e('Läs Mer &raquo;' , 'flyingehus' ); ?></a>
              </div>
              <div>
                <span class="post-date"><?php the_date(); ?></span>
              </div>
            </div>
          </article>

        <?php else: ?>

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
                <a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Läs Mer &raquo;' , 'flyingehus' ); ?></a>
              </div>
              <div>
                <span class="post-date"><?php the_date(); ?></span>
              </div>

						</div>
					</article>

<?php endif ?>
			<?php endwhile; ?>
      <?php if ($allPosts->max_num_pages > 1) {  ?>
			  <nav class="prev-next-posts">
			    <span class="next-posts-link">
			      <?php echo get_previous_posts_link( __('&laquo; Senare inlägg') ); ?>
			    </span>

          <span class="prev-posts-link">
            <?php echo get_next_posts_link( __('Tidigare inlägg &raquo;'), $allPosts->max_num_pages ); ?>
          </span>
			  </nav>
			<?php } ?>
		<?php else : ?>
				<div class="not-found">
					<h5><?php _e( 'Hoppsan! Här var det tomt!' , 'flyingehus' ); ?></h5>
				</div>
		<?php endif; ?>
	</section>

</div>

<?php get_footer(); ?>
