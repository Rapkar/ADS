<?php
//change permalink to meta box link
add_filter( 'post_type_link', 'utc_ads_custom_permalinks', 10, 2 );
function utc_ads_custom_permalinks( $permalink, $post ) {
    $value = get_post_meta( $post->ID, '_utechia_Adress_meta_key', true );
    $value= esc_url($value);
      return str_replace(  $permalink,$value, $permalink );
}
