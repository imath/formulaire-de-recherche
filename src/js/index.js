const { createElement, Fragment } = wp.element;
const { PanelBody, Disabled, TextControl } = wp.components;
const { InspectorControls, BlockAlignmentToolbar, BlockControls, ServerSideRender } = wp.editor;
const { registerBlockType } = wp.blocks;
const { __ } = wp.i18n;

registerBlockType( 'formulaire-de-recherche/recherche', {
    title: __( 'Formulaire de recherche', 'formulaire-de-recherche' ),

    description: __( 'Un bloc pour intégrer un formulaire de recherche dans vos publications WordPress.', 'formulaire-de-recherche' ),

    icon: "search",

    category: "widgets",

    attributes: {
        title: {
            type: 'string',
        },
        align: {
            type: 'string',
        },
    },

    edit: function( props ) {
        const { title, align } = props.attributes;

        const setAttributes = function( attrs ) {
            props.setAttributes( attrs );
        }

        return (
            <Fragment>
                <InspectorControls>
                    <PanelBody title={ __( 'Réglages du formulaire', 'formulaire-de-recherche' ) }>
                        <TextControl
                            label={ __( 'Titre', 'formulaire-de-recherche' ) }
                            value={ title || '' }
                            onChange={ ( nextTitle ) => {
                                setAttributes( { title: nextTitle } );
                            } }
                        />
                    </PanelBody>
                </InspectorControls>
                <BlockControls>
                    <BlockAlignmentToolbar
                        value={ align }
                        onChange={ ( nextAlign ) => {
                            setAttributes( { align: nextAlign } );
                        } }
                        controls={ [ 'left', 'center', 'right' ] }
                    />
                </BlockControls>
                <Disabled>
                    <ServerSideRender block="formulaire-de-recherche/recherche" attributes={ props.attributes } />
                </Disabled>
            </Fragment>
        );
    },

    save: function() {
        return null;
    }
} );
