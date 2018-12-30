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

/**
 * Loads the Block Type Translations.
 *
 * @since 1.0.0
 */
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
 * @return string The HTML Output.
 */
function formulaire_de_recherche_render_callback( $attributes = array() ) {
    $sidebar_args = array();

    // Try to get the First sidebar args to build the containers.
    if ( isset( $GLOBALS['wp_registered_sidebars'] ) && $GLOBALS['wp_registered_sidebars'] ) {
        $sidebar_args = reset( $GLOBALS['wp_registered_sidebars'] );
    }

    $block_args = wp_parse_args( array_merge( $sidebar_args, $attributes ), array(
        'title'         => '',
        'align'         => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => "</div>\n",
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => "</h2>\n",
    ) );

    $class = 'widget_search formulaire-de-recherche-block-recherche';
    if ( $block_args['align'] ) {
        $class .= ' align' . sanitize_html_class( $block_args['align'] );
    }

    if ( 0 === strpos( $block_args['before_widget'], '<li' ) ) {
        $block_args['before_widget'] = '<ul>' . $block_args['before_widget'];
        $block_args['after_widget'] .= '</ul>';
    }

    $output = sprintf( $block_args['before_widget'], esc_attr( uniqid( 'bloc-formulaire-de-recherche-' ) ), $class );

    if ( $block_args['title'] ) {
        $output .=  $block_args['before_title'] . esc_html( $block_args['title'] ) . $block_args['after_title'];
    }

    // Use current theme search form if it exists
    $output .= get_search_form( false );
    $output .= $block_args['after_widget'];

    return $output;
}
