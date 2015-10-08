<?php if ( ! defined( 'ABSPATH' ) ) exit;

/*
 * Plugin Name: Ninja Forms - Enqueue JS/CSS on All Pages
 * Plugin URI: http://kylebjohnson.me
 * Description: Enqueue the Ninja Forms JS and CSs on All Pages.
 * Version: 0.1.0
 * Author: Kyle B. Johnson
 * Author URI: http://kylebjohnson.me
 */

add_action( 'wp_enqueue_scripts', 'nf_enqueue_all_the_things' );

function nf_enqueue_all_the_things()
{
    if( ! defined( 'NF_PLUGIN_VERSION' ) || version_compare( NF_PLUGIN_VERSION, '3.0.0', '>' ) ) return;

    $forms = Ninja_Forms()->forms()->get_all();

    foreach( $forms as $key => $form_id ){
        ninja_forms_display_js( $form_id );
    }

    ninja_forms_display_css();

}
