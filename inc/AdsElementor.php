<?php


use Elementor\Plugin;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

// The Widget_Base class is not available immediately after plugins are loaded, so
// we delay the class' use until Elementor widgets are registered
add_action('elementor/widgets/widgets_registered', function () {

    require(__DIR__. "/elementor/AdsElementor.php");
    $AdsElementor = new AdsElementor();
    // Let Elementor know about our widget
    Plugin::instance()->widgets_manager->register_widget_type($AdsElementor);


});
