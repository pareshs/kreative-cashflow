<?php get_header(); ?>

<div class="container py-5 mt-5">
  <div class="row">
    <div class="col-lg-8 mx-auto">
      <h1 class="mb-4"><?php
        if ( is_home() ) echo 'Property <em>Insights</em>';
        else the_archive_title();
      ?></h1>

      <?php if ( have_posts() ) : ?>
        <div class="row g-4">
          <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-md-6">
              <div class="card h-100">
                <?php if ( has_post_thumbnail() ) : ?>
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'kc-blog', [ 'class' => 'card-img-top' ] ); ?>
                  </a>
                <?php endif; ?>
                <div class="card-body">
                  <div class="small text-gold mb-2"><?php the_category( ', ' ); ?></div>
                  <h3 class="h5 card-title">
                    <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark"><?php the_title(); ?></a>
                  </h3>
                  <p class="small text-muted"><?php the_excerpt(); ?></p>
                  <div class="small text-muted">
                    <i class="bi bi-calendar me-2"></i><?php the_date(); ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
        
        <div class="mt-5">
          <?php the_posts_pagination([ 'mid_size' => 2, 'class' => 'pagination justify-content-center' ]); ?>
        </div>
      <?php else : ?>
        <p class="lead text-muted">No posts found.</p>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
