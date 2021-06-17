  
<?php
add_filter( 'manage_edit-ads_columns',  'ads_utechia_add_new_columns' );
add_filter( 'manage_edit-ads_sortable_columns', 'ads_utechia_register_sortable_columns' );
add_filter( 'request', 'ads_utechia_hits_column_orderby' );
add_action( 'manage_posts_custom_column' , 'ads_utechia_custom_columns' );
/**
* Add new columns to the post table
*
* @param Array $columns - Current columns on the list post
*/
function ads_utechia_add_new_columns($columns){

    $column_meta = array( 'Clicks' => 'Clicks' );
    $columns = array_slice( $columns, 0, 2, true ) + $column_meta + array_slice( $columns, 2, NULL, true );
    return $columns;

}

// Register the columns as sortable
function ads_utechia_register_sortable_columns( $columns ) {
    $columns['Clicks'] = 'Clicks';
    return $columns;
}

//Add filter to the request to make the hits sorting process numeric, not string
function ads_utechia_hits_column_orderby( $vars ) {
    if ( isset( $vars['orderby'] ) && 'Clicks' == $vars['orderby'] ) {
        $vars = array_merge( $vars, array(
            'meta_key' => 'Clicks',
            'orderby' => 'meta_value_num'
        ) );
    }

    return $vars;
}

/**
* Display data in new columns
*
* @param  $column Current column
*
* @return Data for the column
*/
function ads_utechia_custom_columns($column) {

    global $post;

    switch ( $column ) {
        case 'Clicks':
            $hits = get_post_meta( $post->ID, 'Clicks', true );
            echo ' <span value='.get_the_ID().'  id="ads_count" class="dashicons dashicons-welcome-view-site">' .esc_html($hits) .'</span>';
            echo " &nbsp; &nbsp;<reset value='".get_the_ID()."' class='dashicons dashicons-image-rotate'></reset>";

        break;
    }
}
  

add_filter( 'manage_edit-ads_columns',  'add_new_columns_shortcode' );
add_filter( 'manage_edit-ads_sortable_columns', 'register_sortable_columns_shortcode' );
add_filter( 'request', 'hits_column_orderby_shortcode' );
add_action( 'manage_posts_custom_column' , 'custom_columns_shortcode' );
/**
* Add new columns to the post table
*
* @param Array $columns - Current columns on the list post
*/
function add_new_columns_shortcode($columns){

    $column_meta = array( 'ShortCode' => 'ShortCode' );
    $columns = array_slice( $columns, 0, 2, true ) + $column_meta + array_slice( $columns, 2, NULL, true );
    return $columns;

}

// Register the columns as sortable
function register_sortable_columns_shortcode( $columns ) {
    $columns['ShortCode'] = 'ShortCode';
    return $columns;
}

//Add filter to the request to make the hits sorting process numeric, not string
function hits_column_orderby_shortcode( $vars ) {
    if ( isset( $vars['orderby'] ) && 'Clicks' == $vars['orderby'] ) {
        $vars = array_merge( $vars, array(
            'meta_key' => 'ShortCode',
            'orderby' => 'meta_value_num_ShortCode'
        ) );
    }

    return $vars;
}

/**
* Display data in new columns
*
* @param  $column Current column
*
* @return Data for the column
*/
function custom_columns_shortcode($column) {

    global $post;
    $value = get_post_meta($post->ID, '_utechia_Adress_date_meta_key', true);
    $value=esc_html($value);
    $nowtime= date('Y-m-d');
    switch ( $column ) {
        case 'ShortCode':
            $hits = get_post_meta( $post->ID, 'ShortCode', true );
            $hits=esc_html($hits);
            $id ="[ads_show_post_id ".get_the_id()."]";
            if($value <= $nowtime ){
                echo esc_html_e("<input style='background-color:#ef8686' type='text' readonly value= '$id' >");
                echo  esc_html_e("<a><span class='dashicons dashicons-trash'></span> </a>");
            }else{
                echo  esc_html_e("<input style='background-color:#7af17a' type='text' readonly value= '$id' >");
            }
         

        break;
    }
}
  
  