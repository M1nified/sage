<?php $stored_meta = get_post_meta($post->ID); ?>
<article <?php post_class(); ?>>
  <header>
    <a name="post_<?php echo get_the_ID(); ?>"></a>
    <h2 class="entry-title"><?php /*<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>*/
    // print_r(!isset($stored_meta['sage-meta-title-hide']));
    if(!isset($stored_meta['sage-meta-title-hide']) || $stored_meta['sage-meta-title-hide'][0] != 1){
      the_title();
    }
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
  <div class="clearfix"></div>
  <footer class="article-footer"><?php
  if(!isset($stored_meta['sage-meta-tags-hide']) || $stored_meta['sage-meta-tags-hide'][0] != 1){
    the_tags('<p class="tags"><span class="glyphicon glyphicon-tags icon-tag">&nbsp;</span>'," ","</p>");
  }?></footer>
</article>
<div class="clearfix article-separator"></div>
