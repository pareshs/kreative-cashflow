<?php get_header(); ?>
<div style="max-width:1280px;margin:0 auto;padding:80px 40px;">
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<article style="margin-bottom:48px;">
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php the_excerpt(); ?>
</article>
<?php endwhile; the_posts_pagination(); else: ?>
<p>No posts found.</p>
<?php endif; ?>
</div>
<?php get_footer(); ?>
