<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

function meta_title_callback($post,$box){
    wp_nonce_field( basename( __FILE__ ), 'sage_post_meta_nonce' );
    $stored_meta = get_post_meta($post->ID);
    // print_r($stored_meta);
    ?>
    <p><label><input type="checkbox" name="_sage-meta-title-hide" id="_sage-meta-title-hide" <?php echo (isset($stored_meta['_sage-meta-title-hide']) && $stored_meta['_sage-meta-title-hide'][0] == 1) ? 'checked' : ''; ?> > Hide title</label></p>
    
    <p><label><input type="checkbox" name="_sage-meta-tags-hide" id="_sage-meta-tags-hide" <?php echo (isset($stored_meta['_sage-meta-tags-hide']) && $stored_meta['_sage-meta-tags-hide'][0] == 1) ? 'checked' : ''; ?> > Hide tags</label></p>
    <?php
}

add_action('save_post',__NAMESPACE__.'\meta_title_save');
function meta_title_save($post_id){
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'sage_post_meta_nonce' ] ) && wp_verify_nonce( $_POST[ 'sage_post_meta_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ '_sage-meta-title-hide' ] )) {
        update_post_meta( $post_id, '_sage-meta-title-hide', 1 );
    }else{
        update_post_meta( $post_id, '_sage-meta-title-hide', 0 );
    }
    if( isset( $_POST[ '_sage-meta-tags-hide' ] )) {
        update_post_meta( $post_id, '_sage-meta-tags-hide', 1 );
    }else{
        update_post_meta( $post_id, '_sage-meta-tags-hide', 0 );
    }
}
