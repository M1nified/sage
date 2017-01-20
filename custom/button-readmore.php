<?php namespace Roots\Sage\Custom\PostMeta;

add_action('save_post',__NAMESPACE__.'\metabox_save');
add_action('load-post.php',__NAMESPACE__.'\setup_boxes');
add_action('load-post-new.php',__NAMESPACE__.'\setup_boxes');

function setup_boxes(){
    add_action('add_meta_boxes',__NAMESPACE__.'\add_meta_boxes');
}

function add_meta_boxes(){
     add_meta_box(
         'sage-postmeta-metabox-readmore',
         esc_html__('Sage Buttons','Sage Buttons'),
         __NAMESPACE__.'\add_meta_box_readmore',
        //  ['post','page','attachment'],
         ['post','page'],
         'normal',
         'default'
     );
 }

 function add_meta_box_readmore($post,$box){
    wp_nonce_field( basename( __FILE__ ), 'linkclick_nonce_readmore' );
    $stored_meta = get_post_meta($post->ID);
    echo '<p>'.esc_attr( get_post_meta( $post->ID, 'sage-postmeta-metabox-readmore', true ) ).'</p>';
    ?>
    <h3>Read more</h3>

    <p><label><input type="checkbox" name="_sage-postmeta-metabox-readmore-state" <?php echo (isset($stored_meta['_sage-postmeta-metabox-readmore-state']) && $stored_meta['_sage-postmeta-metabox-readmore-state'][0] == 1) ? 'checked' : ''; ?>>Display read more button</label></p>
    <p><label>Text: <input type="text" name="_sage-postmeta-metabox-readmore-text" value="<?php echo $stored_meta['_sage-postmeta-metabox-readmore-text'][0]; ?>"></label></p>
    <p><label>Url:  <input type="text" name="_sage-postmeta-metabox-readmore-link" value="<?php echo $stored_meta['_sage-postmeta-metabox-readmore-link'][0]; ?>"></label></p>
    
    <?php
 }

 function metabox_save($post_id){
     // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'linkclick_nonce_readmore' ] ) && wp_verify_nonce( $_POST[ 'linkclick_nonce_readmore' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ '_sage-postmeta-metabox-readmore-state' ] )) {
        update_post_meta( $post_id, '_sage-postmeta-metabox-readmore-state', 1 );
    }else{
        update_post_meta( $post_id, '_sage-postmeta-metabox-readmore-state', 0 );
    }
    if( isset( $_POST[ '_sage-postmeta-metabox-readmore-text' ] )) {
        update_post_meta( $post_id, '_sage-postmeta-metabox-readmore-text', $_POST[ '_sage-postmeta-metabox-readmore-text' ] );
    }else{
        update_post_meta( $post_id, '_sage-postmeta-metabox-readmore-text', 0 );
    }
    if( isset( $_POST[ '_sage-postmeta-metabox-readmore-link' ] )) {
        update_post_meta( $post_id, '_sage-postmeta-metabox-readmore-link', $_POST[ '_sage-postmeta-metabox-readmore-link' ] );
    }else{
        update_post_meta( $post_id, '_sage-postmeta-metabox-readmore-link', 0 );
    }
 }
