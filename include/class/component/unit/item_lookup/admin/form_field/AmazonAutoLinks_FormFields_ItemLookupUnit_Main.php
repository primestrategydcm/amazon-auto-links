<?php
/**
 * Provides the definitions of form fields.
 * 
 * @since           3  
 */
class AmazonAutoLinks_FormFields_ItemLookupUnit_Main extends AmazonAutoLinks_FormFields_SearchUnit_Base {

    /**
     * Returns field definition arrays.
     * 
     * Pass an empty string to the parameter for meta box options. 
     * 
     * @return      array
     */    
    public function get( $sFieldIDPrefix='', $aUnitOptions=array() ) {
            
        $_oOption      = $this->oOption;
        $aUnitOptions  = $aUnitOptions + array( 'country' => null );
        $_bUPCAllowed  = 'CA' !== $aUnitOptions[ 'country' ];
        $_bISBNAllowed = 'US' === $aUnitOptions[ 'country' ];
         
        $_aFields       =  array(
            array(
                'field_id'      => $sFieldIDPrefix . 'unit_type',
                'type'          => 'hidden',
                'hidden'        => true,
                'value'         => 'item_lookup',
            ),        
            array(
                'field_id'      => $sFieldIDPrefix . 'unit_title',
                'type'          => 'text',
                'title'         => __( 'Unit Name', 'amazon-auto-links' ),
            ),            
            array(
                'field_id'      => $sFieldIDPrefix . 'ItemId',
                'type'          => 'textarea',
                'title'         => __( 'Item ID', 'amazon-auto-links' ),
                'attributes'    => array(
                    'size' => version_compare( $GLOBALS['wp_version'], '3.8', '>=' ) 
                        ? 40 
                        : 60,
                ),
                'description'   => __( 'Enter the ID(s) of the product per line or use the <code>,</code> (comma) characters to delimit the items.', 'amazon-auto-links' ) 
                    . ' e.g. <code>B009ZVO3H6, B0043D2DZA</code>',
            ),
            array(
                'field_id'      => $sFieldIDPrefix . 'search_per_keyword',
                'type'          => 'checkbox',
                'title'         => __( 'Query per Term', 'amazon-auto-links' ),
                'tip'           => __( 'Although Amazon API allows multiple search terms to be set per request, when one of them returns an error, the entire result becomes an error. To prevent it, check this option so that the rest will be returned.', 'amazon-auto-links' ),
                'label'         => __( 'Perform search per item.', 'amazon-auto-links' ),
                'default'       => false,
            ),
            array(
                'field_id'      => $sFieldIDPrefix . 'IdType',
                'type'          => 'radio',
                'title'         => __( 'ID Type', 'amazon-auto-links' ),
                'label'         => array(
                    'ASIN'  => 'ASIN',
                    'SKU'   => 'SKU',
                    'UPC'   => '<span class="' . ( $_bUPCAllowed ? "" : "disabled" ) . '">UPC <span class="description">(' . __( 'Not available in the CA locale.', 'amazon-auto-links' ) . ')</span></span>',
                    'EAN'   => 'EAN',
                    'ISBN'  => '<span class="' . ( $_bISBNAllowed ? "" : "disabled" ) . '">ISBN <span class="description">(' . __( 'The US locale only, when the search index is Books.', 'amaozn-auto-links' ) .')</span></span>',
                ),
                'attributes' => array(              
                    'UPC' => array(
                        'disabled' => $_bUPCAllowed 
                            ? null 
                            : 'disabled',
                    ),                
                    'ISBN' => array(
                        'disabled' => $_bISBNAllowed 
                            ? null 
                            : 'disabled',
                    ),                                    
                ),
                'default'       => 'ASIN',
            ),                                    
            array(
                'field_id'      => $sFieldIDPrefix . 'Operation',
                'type'          => 'hidden',
                'hidden'        => true,
                'value'         => 'ItemLookup',
            ),
            array(
                'field_id'      => $sFieldIDPrefix . 'country',
                'type'          => 'text',
                'title'         => __( 'Locale', 'amazon-auto-links' ),
                'attributes'    => array(
                    'readonly' => true,
                ),
            ),                          
            array(
                'field_id'      => $sFieldIDPrefix . 'SearchIndex',
                'type'          => 'select',
                'title'         => __( 'Categories', 'amazon-auto-links' ),            
                'label'         => AmazonAutoLinks_Property::getSearchIndexByLocale( 
                    isset( $aUnitOptions['country'] ) 
                        ? $aUnitOptions['country'] 
                        : null 
                    ),
                'default'       => 'All',
                'tip'           => __( 'Select the category to limit the searching area.', 'amazon-auto-links' ),
                'description'   => __( 'If the above ID Type is ISBN, this will be automatically set to Books.', 'amazon-auto-links' )
                    . ' ' . __( 'If the ID Type is ASIN this option will not take effect.', 'amazon-auto-links' ),
            ),                      
            array(
                'field_id'      => $sFieldIDPrefix . 'description_length',
                'type'          => 'number',
                'title'         => __( 'Description Length', 'amazon-auto-links' ),
                'tip'           => __( 'The allowed character length for the description.', 'amazon-auto-links' ) . '&nbsp;'
                    . __( 'Set -1 for no limit.', 'amazon-auto-links' ),
                'description'   => __( 'Default', 'amazon-auto-links' ) . ": <code>250</code>",
                'default'       => 250,
            ),        
        
        );
        return $_aFields; 
        
    }
          
}