const { createElement } = wp.element;
const { registerBlockType } = wp.blocks;
const { __ } = wp.i18n;

registerBlockType( "formulaire-de-recherche/recherche", {
    title: __( 'Formulaire de recherche', 'formulaire-de-recherche' ),

    description: __( 'Un bloc pour intégrer un formulaire de recherche dans vos publications WordPress.', 'formulaire-de-recherche' ),

    icon: "search",

    category: "widgets",

    attributes: {
        title: {
            type: 'string',
        }
    },

    edit: function( props ) {
        return <p>{ __( 'Formulaire de recherche', 'formulaire-de-recherche' ) }</p>;
    },

    save: function() {
        return null;
    }
} );
