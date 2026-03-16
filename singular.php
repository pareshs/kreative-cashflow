<?php get_header(); ?>
<?php while(have_posts()): the_post(); ?>
<article style="max-width:900px;margin:0 auto;padding:80px 40px;">
<h1><?php the_title(); ?></h1>
<div class="entry-content">
<?php the_content(); ?>
</div>
</article>
<?php endwhile; ?>
<?php get_footer(); ?>
