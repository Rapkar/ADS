<?php 
function Utechia_ads_add_custom_box() {
    $screens = [ 'ADS', 'wporg_cpt' ];
    foreach ( $screens as $screen ) {
        add_meta_box(
            'wporg_box_id',            // Unique ID
            'Advertising',             // Box title
            'wporg_custom_box_html',  // Content callback, must be of type callable
            $screen                   // Post type
        );
    }
}
function wporg_custom_box_html( $post ) {
    $value = get_post_meta( $post->ID, '_utechia_Adress_meta_key', true );
    ?>
    
    <label for="Adress">Your Advertising address ▒▒▒=></label>
    <input style="width:50%" type="text" name="Utechia_Ads_Adress"  placeholder="http://utechia.com" value="<?= $value; ?>"></input>
    <?php
}

add_action( 'add_meta_boxes', 'Utechia_ads_add_custom_box' );


function utechia_ads_custom_box_html_link( $post_id ) {

    if ( isset($_POST['Utechia_Ads_Adress']) ) {        
      update_post_meta($post_id, '_utechia_Adress_meta_key', sanitize_text_field( $_POST['Utechia_Ads_Adress']));      
    }  
  
  
  }
  add_action('save_post', 'utechia_ads_custom_box_html_link');


