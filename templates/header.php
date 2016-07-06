<header class="banner">
  <div class="container header-logos">
    <?php /*<a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a> */ ?>
    
    <?php dynamic_sidebar('header-logos'); ?>
  </div>
  <div class="nav-top-bar-container">
    <div class="nav-top-bar container">
    <nav>
      <?php
      if(has_nav_menu('top_navigation')) :
        wp_nav_menu([
          'theme_location' => 'top_navigation',
          'menu_class' => 'menu-bar'
        ]);
      endif;
      ?>
    </nav>
    <div class="nav-top-bar-right">
      <?php dynamic_sidebar('nav-top-bar-right'); ?>
    </div>
    </div>
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
