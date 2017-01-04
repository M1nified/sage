<article <?php post_class(); ?>>
  <header>
    <a name="post_<?php echo get_the_ID(); ?>"></a>
    <h2 class="entry-title"><?php /*<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>*/
    the_title();
    ?>
  </header>
  <div class="featured-image"><?php the_post_thumbnail(); ?></div>
  <div class="entry-summary"><?php 
  if(has_excerpt()) {
    the_excerpt();
  }else{
    the_content();
  }
  ?></div>
  <footer><?php the_tags('<p class="tags">'.__('Tags: ')," ","</p>"); ?></footer>
</article>
<div class="clearfix article-separator"></div>
