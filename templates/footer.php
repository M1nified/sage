<footer class="content-info">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer-upper'); ?>
  </div>
  <div class="footer-wide">
    <nav class="container">
      <?php
      if(has_nav_menu('footer_navigation')) :
        wp_nav_menu([
          'theme_location' => 'footer_navigation',
          'menu_class' => 'footer-menu-bar',
          'container' => null
        ]);
      endif;
      ?>
      <div class="sidebar-footer-nav-right-container">
      <?php dynamic_sidebar('sidebar-footer-nav-right'); ?>
      </div>
    </nav>
  </div>
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
</footer>
