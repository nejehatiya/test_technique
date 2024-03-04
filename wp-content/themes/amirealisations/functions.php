<?php 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ami_realisation_setup()
{
    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
        'primary' => esc_html__('Primary', 'ami_realisation'),
    ));

}
add_action('after_setup_theme', 'ami_realisation_setup');
/***
 * ajout une feuille de style
 */
function ami_realisation_style() {
    wp_enqueue_style( 'style-custom', get_template_directory_uri() . '/assets/css/style-custom.css', array(  ) );
    wp_enqueue_style( 'style-responsive', get_template_directory_uri() . '/assets/css/style-responsive.css', array(  ) );
}
add_action( 'wp_enqueue_scripts', 'ami_realisation_style', 10 );


/**
 * ajouter rubik font par embed code
 */
function ami_realisation_custom_font(){
    ob_start();
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <?php
    return ob_get_clean();
}
add_action( 'wp_head', 'ami_realisation_custom_font' );