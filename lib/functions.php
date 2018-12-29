<?php
/**
 * Formulaire de Recherche functions.
 *
 * @package Formulaire de Recherche\lib
 *
 * @since 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function formulaire_de_recherche_load_translations() {
    wp_set_script_translations(
        // JavaScript handle
        'formulaire-de-recherche-block',

        // Text domain
        'formulaire-de-recherche',

        // Path to the block's language folder
        trailingslashit( dirname( __FILE__,  2 ) ) . 'languages'
    );
}
add_action( 'admin_init', 'formulaire_de_recherche_load_translations', 20 );

/**
 * Renders the Search form Block Type.
 *
 * @since 1.0.0
 *
 * @param array $attributes The Block attributes.
 */
function formulaire_de_recherche_render_callback( $attributes = array() ) {
    return '';
}
