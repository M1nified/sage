<?php
/**
 * Template Name: Context Only
 */
?>
<div class="theloop-wrapper">
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
</div>