<header class="banner">
  <div class="container">
    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
  </div>
  <div class="nav-top-bar-container">
    <nav class="nav-top-bar container">
      <?php
      if(has_nav_menu('top_navigation')) :
        wp_nav_menu([
          'theme_location' => 'top_navigation',
          'menu_class' => 'menu-bar'
        ]);
      endif;
      ?>
    </nav>
  </div>
  <div class="container">
    <nav class="nav-primary">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </nav>
  </div>
</header>
