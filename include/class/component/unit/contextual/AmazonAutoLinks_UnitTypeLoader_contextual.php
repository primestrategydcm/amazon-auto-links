<?php
/**
 * Amazon Auto Links
 * 
 * http://en.michaeluno.jp/amazon-auto-links/
 * Copyright (c) 2013-2017 Michael Uno
 * 
 */

/**
 * Loads the `contextual` unit type.
 *  
 * @package     Amazon Auto Links
 * @since       3.5.0
*/
class AmazonAutoLinks_UnitTypeLoader_contextual extends AmazonAutoLinks_UnitTypeLoader_Base {
        
    /**
     * Stores the unit type slug.
     * @remark      Each extended class should assign own unique unit type slug here.
     * @since       3.5.0
     */
    public $sUnitTypeSlug = 'contextual';
    
    /**
     * Stores class names of form fields.
     */
    public $aFieldClasses = array(
//        'AmazonAutoLinks_FormFields_URLUnit_Main',
    );    
    
    /**
     * Stores protected meta key names.
     */    
    public $aProtectedMetaKeys = array(
    );    
    
    /**
     * Adds post meta boxes.
     * 
     * @since       3.5.0
     * @return      void
     */
    public function loadAdminComponents( $sScriptPath ) {

        // Admin pages
        new AmazonAutoLinks_ContextualUnitAdminPage(
            array(
                'type'      => 'transient',
                'key'       => $GLOBALS[ 'aal_transient_id' ],
                'duration'  => 60*60*24*2,
            ),
            $sScriptPath
        );         
              
        // Post meta boxes
        new AmazonAutoLinks_UnitPostMetaBox_Main_contextual(
            null,
            __( 'Main', 'amazon-auto-links' ), // meta box title
            array(     // post type slugs: post, page, etc.
                AmazonAutoLinks_Registry::$aPostTypes[ 'unit' ]
            ),
            'normal', // context (what kind of metabox this is)
            'high'    // priority - e.g. 'high', 'core', 'default' or 'low'
        );

    }

    /**
     * Determines the unit type from given arguments.
     * @since       3.5.0
     * @param       string      $sUnitType
     * @param       array       $aArguments
     * @param       null|string $_nsOperation
     * @return      string
     */
    public function replyToDetermineUnitType( $sUnitType, $aArguments ) {
        return isset( $aArguments[ 'criteria' ], $aArguments[ 'additional_keywords' ] )
            ? $this->sUnitTypeSlug
            : $sUnitType;
    }

}