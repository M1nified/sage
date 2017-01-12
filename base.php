<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <div class="hidden-print">
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    </div>
    <div class="">
      <?php if (Setup\display_sidebar_wide_top()) : ?>
        <aside class="sidebar-wide-top">
          <?php include Wrapper\sidebar_wide_top_path(); ?>
        </aside>
      <?php endif; ?>
    </div>
    <div class="wrap container" role="document">
      <div class="content hidden-print hidden-xs hidden-sm">
        <?php if (Setup\display_sidebar_top()) : ?>
          <aside class="sidebar-top">
          <?php include Wrapper\sidebar_top_path(); ?>
          </aside>
        <?php endif; ?>
      </div>
      <div class="content row juice">
        <?php if (Setup\display_sidebar_left()) : ?>
          <aside class="sidebar-left hidden-print">
            <?php include Wrapper\sidebar_left_path(); ?>
          </aside>
        <?php endif; ?>
        <main class="main">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Setup\display_sidebar()) : ?>
          <aside class="sidebar-right">
            <?php include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <div class="hidden-print">
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
    </div>
  </body>
</html>
