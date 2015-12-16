<?php
/**
 * Amazon Auto Links
 * 
 * http://en.michaeluno.jp/amazon-auto-links/
 * Copyright (c) 2013-2015 Michael Uno
 * 
 */

/**
 * Loads the units component.
 *  
 * @package     Amazon Auto Links
 * @since       3.3.0
*/
class AmazonAutoLinks_UnitLoader_similarity_lookup {
    
    /**
     * Loads necessary components.
     */
    public function __construct( $sScriptPath ) {
        
        if ( is_admin() ) {

            // Post meta boxes
            $this->_registerPostMetaBoxes( $sScriptPath );
            
        }
        
        
    }    
    
        /**
         * Adds post meta boxes.
         * @since       3.3.0
         */
        private function _registerPostMetaBoxes( $sScriptPath ) {
            
            new AmazonAutoLinks_PostMetaBox_SimilarityLookupUnit_Main(
                null,   // meta box ID - null for auto-generate
                __( 'Similarity Look-up Main', 'amazon-auto-links' ),
                array( // post type slugs: post, page, etc.
                    AmazonAutoLinks_Registry::$aPostTypes[ 'unit' ] 
                ),                 
                'normal', // context - e.g. 'normal', 'advanced', or 'side'
                'core'  // priority - e.g. 'high', 'core', 'default' or 'low'
            );   
            new AmazonAutoLinks_PostMetaBox_SimilarityLookupUnit_Advanced(
                null,   // meta box ID - null for auto-generate
                __( 'Similarity Look-up Advanced', 'amazon-auto-links' ),
                array( // post type slugs: post, page, etc.
                    AmazonAutoLinks_Registry::$aPostTypes[ 'unit' ] 
                ),                 
                'normal', // context - e.g. 'normal', 'advanced', or 'side'
                'low' // priority - e.g. 'high', 'core', 'default' or 'low'
            );                         
            
                    
        }    
    
}