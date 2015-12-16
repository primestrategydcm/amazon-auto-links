<?php
/**
 Admin Page Framework v3.7.4 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/amazon-auto-links>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
class AmazonAutoLinks_AdminPageFramework_Form_View___CSS_Field extends AmazonAutoLinks_AdminPageFramework_Form_View___CSS_Base {
    protected function _get() {
        return $this->_getFormFieldRules();
    }
    static private function _getFormFieldRules() {
        return <<<CSSRULES
/* Form Elements */
/* TD paddings when the field title is disabled */
td.amazon-auto-links-field-td-no-title {
    padding-left: 0;
    padding-right: 0;
}

/* Fields Container */
.amazon-auto-links-fields {
    display: table; /* the block property does not give the element the solid height */
    width: 100%;
    table-layout: fixed;    /* in Firefox, fix the issue that preview images cause the container element to expand */
}

/* Number Input */
.amazon-auto-links-field input[type='number'] {
    text-align: right;
}     

/* Disabled */
.amazon-auto-links-fields .disabled,
.amazon-auto-links-fields .disabled input,
.amazon-auto-links-fields .disabled textarea,
.amazon-auto-links-fields .disabled select,
.amazon-auto-links-fields .disabled option {
    color: #BBB;
}

/* HR */
.amazon-auto-links-fields hr {
    border: 0; 
    height: 0;
    border-top: 1px solid #dfdfdf; 
}

/* Delimiter */
.amazon-auto-links-fields .delimiter {
    display: inline;
}

/* Description */
.amazon-auto-links-fields-description {
    margin-bottom: 0;
}
/* Field Container */
.amazon-auto-links-field {
    float: left;
    clear: both;
    display: inline-block;
    margin: 1px 0;
}
.amazon-auto-links-field label{
    display: inline-block; /* for WordPress v3.7.x or below */
    width: 100%;
}
.amazon-auto-links-field .amazon-auto-links-input-label-container {
    margin-bottom: 0.25em;
}
@media only screen and ( max-width: 780px ) { /* For WordPress v3.8 or greater */
    .amazon-auto-links-field .amazon-auto-links-input-label-container {
        margin-bottom: 0.5em;
    }
}     

.amazon-auto-links-field .amazon-auto-links-input-label-string {
    padding-right: 1em; /* for checkbox label strings, a right padding is needed */
    vertical-align: middle; 
    display: inline-block; /* each (sub)field label can have a fix min-width */
}
.amazon-auto-links-field .amazon-auto-links-input-button-container {
    padding-right: 1em; 
}
.amazon-auto-links-field .amazon-auto-links-input-container {
    display: inline-block;
    vertical-align: middle;
}
.amazon-auto-links-field-image .amazon-auto-links-input-label-container {     
    vertical-align: middle;
}

.amazon-auto-links-field .amazon-auto-links-input-label-container {
    display: inline-block;     
    vertical-align: middle; 
}

/* Repeatable Fields */     
.repeatable .amazon-auto-links-field {
    clear: both;
    display: block;
}
.amazon-auto-links-repeatable-field-buttons {
    float: right;     
    margin: 0.1em 0 0.5em 0.3em;
    vertical-align: middle;
}
.amazon-auto-links-repeatable-field-buttons .repeatable-field-button {
    margin: 0 0.1em;
    font-weight: normal;
    vertical-align: middle;
    text-align: center;
}
@media only screen and (max-width: 960px) {
    .amazon-auto-links-repeatable-field-buttons {
        margin-top: 0;
    }
}

/* Sortable Section and Fields */
.amazon-auto-links-sections.sortable-section > .amazon-auto-links-section,
.sortable .amazon-auto-links-field {
    clear: both;
    float: left;
    display: inline-block;
    /* padding: 1em 1.2em 0.78em; @deprecated 3.7.1 */
    padding: 1em 1.32em 1em;
    margin: 1px 0 0 0;
    border-top-width: 1px;
    border-bottom-width: 1px;
    border-bottom-style: solid;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;     
    text-shadow: #fff 0 1px 0;
    -webkit-box-shadow: 0 1px 0 #fff;
    box-shadow: 0 1px 0 #fff;
    -webkit-box-shadow: inset 0 1px 0 #fff;
    box-shadow: inset 0 1px 0 #fff;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    background: #f1f1f1;
    background-image: -webkit-gradient(linear, left bottom, left top, from(#ececec), to(#f9f9f9));
    background-image: -webkit-linear-gradient(bottom, #ececec, #f9f9f9);
    background-image: -moz-linear-gradient(bottom, #ececec, #f9f9f9);
    background-image: -o-linear-gradient(bottom, #ececec, #f9f9f9);
    background-image: linear-gradient(to top, #ececec, #f9f9f9);
    border: 1px solid #CCC;
    background: #F6F6F6;    
}     
.amazon-auto-links-fields.sortable {
    margin-bottom: 1.2em; /* each sortable field does not have a margin bottom so this rule gives a margin between the fields and the description */
}         

/* Media Upload Buttons */
.amazon-auto-links-field .button.button-small {
    width: auto;
}
 
/* Fonts */
.font-lighter {
    font-weight: lighter;
}

/* Dashicons */ 
.amazon-auto-links-field .button.button-small.dashicons {
    font-size: 1.2em;
    padding-left: 0.2em;
    padding-right: 0.22em;

}
CSSRULES;
        
    }
    protected function _getVersionSpecific() {
        $_sCSSRules = '';
        if (version_compare($GLOBALS['wp_version'], '3.8', '<')) {
            $_sCSSRules.= <<<CSSRULES
.amazon-auto-links-field .remove_value.button.button-small {
    line-height: 1.5em; 
}
CSSRULES;
            
        }
        if (version_compare($GLOBALS['wp_version'], '3.8', '>=')) {
            $_sCSSRules.= <<<CSSRULES
                
/* Repeatable field buttons */
.amazon-auto-links-repeatable-field-buttons {
    margin: 2px 0 0 0.3em;
}

/* Fix Sortable fields drag&drop problem in MP6 */ 
    
@media screen and ( max-width: 782px ) {
	.amazon-auto-links-fieldset {
		overflow-x: hidden;
	}
}    
CSSRULES;
            
        }
        return $_sCSSRules;
    }
}