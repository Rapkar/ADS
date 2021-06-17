<?php
// link of post
function Utechia_ads_add_custom_box()
{
    $screens = ['ADS', 'wporg_cpt'];
    foreach ($screens as $screen) {
        add_meta_box(
            'wporg_box_id',            // Unique ID
            'Advertising',             // Box title
            'utechia_custom_box_html',  // Content callback, must be of type callable
            $screen                   // Post type
        );
    }
}
function utechia_custom_box_html($post)
{
    $value = get_post_meta($post->ID, '_utechia_Adress_meta_key', true);
?>

    <label for="Adress">Your Advertising address ▒▒▒=></label>
    <input style="width:50%" type="text" name="Utechia_Ads_Adress" placeholder="http://utechia.com" value="<?php echo esc_html($value); ?>"></input>
<?php
}

add_action('add_meta_boxes', 'Utechia_ads_add_custom_box');


function utechia_ads_custom_box_html_link($post_id)
{

    if (isset($_POST['Utechia_Ads_Adress'])) {
        if( strpos( $_POST['Utechia_Ads_Adress'],'http://')==false ){
            $_POST['Utechia_Ads_Adress']='http://'.$_POST['Utechia_Ads_Adress'];
        }
        update_post_meta($post_id, '_utechia_Adress_meta_key', sanitize_text_field($_POST['Utechia_Ads_Adress']));
    }
}
add_action('save_post', 'utechia_ads_custom_box_html_link');
// link of post
// Date of post
function Utechia_ads_add_custom_box_date()
{
    $screens = ['ADS', 'wporg_cpt'];
    foreach ($screens as $screen) {
        add_meta_box(
            'utechia_box_date',            // Unique ID
            'Advertising',             // Box title
            'utechia_custom_box_html_date',  // Content callback, must be of type callable
            $screen                   // Post type
        );
    }
}
function utechia_custom_box_html_date($post)
{
    $value = get_post_meta($post->ID, '_utechia_Adress_date_meta_key', true);
?>

    <label for="Adress">Your Advertising End Time ▒▒▒=></label>
    <input style="width:50%" type="date" name="Utechia_Ads_Adress_date" placeholder="http://utechia.com" value="<?php echo esc_html($value); ?>"></input>
<?php
}

add_action('add_meta_boxes', 'Utechia_ads_add_custom_box_date');


function utechia_ads_custom_box_html_date($post_id)
{

    if (isset($_POST['Utechia_Ads_Adress_date'])) {
        update_post_meta($post_id, '_utechia_Adress_date_meta_key', sanitize_text_field($_POST['Utechia_Ads_Adress_date']));
    }
}
add_action('save_post', 'utechia_ads_custom_box_html_date');
// link of post
