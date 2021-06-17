<?php 

add_action('admin_init', 'ads_scripts');
function ads_scripts()
{
    wp_register_style('style', plugins_url('/assets/css/style.css',__FILE__ ));
    wp_enqueue_style('style');
     wp_register_script( 'main', plugins_url('/assets/js/main.js',__FILE__ ));
    wp_enqueue_script('main');
    wp_localize_script('main','utechia_ads_reset',array('ajax_url' => admin_url('admin-ajax.php')));

}
add_action('wp_ajax_utechia_ads_reset', 'utechia_ads_reset');
add_action('wp_ajax_nopriv_utechia_ads_reset', 'utechia_ads_reset');
function utechia_ads_reset()
{
    if( isset($_POST['action']) &&  $_POST['action'] == 'utechia_ads_reset' ) {
        update_post_meta( $_POST['post_id'], 'Clicks', 0 );
        echo esc_html(get_post_meta( $_POST['post_id'], 'Clicks', true ));
       wp_die();
    }
}