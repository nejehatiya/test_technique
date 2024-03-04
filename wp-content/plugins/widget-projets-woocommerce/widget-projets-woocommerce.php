<?php
/*

Plugin Name: Widget Projets Woocommerce

Description: widget permet de récupérer et afficher une liste des projets WooCommerce réalisés

Version: 6.1.0

Author: Nejeh Atiya

Text Domain: Widget Projets Woocommerce

*/

// Display Fields
add_action('woocommerce_product_options_general_product_data', 'woocommerce_product_custom_fields');

// Save Fields
add_action('woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save');


function woocommerce_product_custom_fields()
{
    global $woocommerce, $post;
    echo '<div class="product_custom_field">';
    // Custom Product Text Field
    woocommerce_wp_text_input(
        array(
            'id' => '_custom_product_budget',
            'placeholder' => 'Poduct Budget',
            'label' => __('Budget de produit', 'woocommerce'),
        )
    );
    //Custom Product  Textarea
    woocommerce_wp_textarea_input(
        array(
            'id' => '_custom_product_missions',
            'placeholder' => 'Product Missions',
            'label' => __('Missions des produits (séparées par |)', 'woocommerce')
        )
    );
    echo '</div>';

}

function woocommerce_product_custom_fields_save($post_id)
{
    // Custom Product Text Field
    $custom_product_budget = $_POST['_custom_product_budget'];
    if (!empty($custom_product_budget))
        update_post_meta($post_id, '_custom_product_budget', $custom_product_budget);
    // Custom Product Textarea Field
    $custom_product_missions = $_POST['_custom_product_missions'];
    if (!empty($custom_product_missions))
        update_post_meta($post_id, '_custom_product_missions', $custom_product_missions);
}


/**
 * Register projets woocomerce Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_projets_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/projets-widget.php' );

	$widgets_manager->register( new \Elementor_Projets_Widget() );

}
add_action( 'elementor/widgets/register', 'register_projets_widget' );


/***
 * ajout une feuille de style
 */
function widget_projets_woocommerce_style() {
    wp_enqueue_style( 'slick-css',  plugin_dir_url('__FILE__').'widget-projets-woocommerce/assets/css/slick.css', array(  ) );
    wp_enqueue_style( 'slick-theme-css',  plugin_dir_url('__FILE__').'widget-projets-woocommerce/assets/css/slick-theme.css', array(  ) );
    
    // add jquery 
    if ( ! wp_script_is( 'jquery', 'enqueued' )) {
        // Enqueue
        wp_enqueue_script( 'jquery' );
    }
    wp_enqueue_script("slick-js",  plugin_dir_url('__FILE__').'widget-projets-woocommerce/assets/js/slick.min.js',array(),FALSE,true);
    wp_enqueue_script("script-custom",  plugin_dir_url('__FILE__').'widget-projets-woocommerce/assets/js/script-custom.js',array(),FALSE,true);
}
add_action( 'wp_enqueue_scripts', 'widget_projets_woocommerce_style', 10 );