<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <?php /*<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span> */ ?>
        <input type="search" class="search-field"
            placeholder="<?php echo str_replace(':','',esc_attr_x( 'Search for:', 'label' )); ?>"
            value="<?php echo get_search_query() ?>" name="s"
            <?php /*title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" */ ?> />
    </label>
    <button type="submit" class="search-submit">
        <span class="glyphicon glyphicon-search"></span>
    </button>
    <?php /*<input type="submit" class="search-submit"
        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" /> */ ?>
</form>