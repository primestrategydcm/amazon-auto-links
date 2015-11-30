<?php
class AmazonAutoLinks_AdminPageFramework_FieldType_section_title extends AmazonAutoLinks_AdminPageFramework_FieldType_text {
    public $aFieldTypeSlugs = array('section_title',);
    protected $aDefaultKeys = array('label_min_width' => 30, 'attributes' => array('size' => 20, 'maxlength' => 100,),);
    protected function getStyles() {
        return <<<CSSRULES
/* Section Tab Field Type */
.amazon-auto-links-section-tab .amazon-auto-links-field-section_title {
    padding: 0.5em;
}
 .amazon-auto-links-section-tab .amazon-auto-links-field-section_title .amazon-auto-links-input-label-string {     
    vertical-align: middle; 
    margin-left: 0.2em;
} 
 .amazon-auto-links-section-tab .amazon-auto-links-fields {
    display: inline-block;
} 
.amazon-auto-links-field.amazon-auto-links-field-section_title {
    float: none;
} 
.amazon-auto-links-field.amazon-auto-links-field-section_title input {
    background-color: #fff;
    color: #333;
    border-color: #ddd;
    box-shadow: inset 0 1px 2px rgba(0,0,0,.07);
    border-width: 1px;
    border-style: solid;
    outline: 0;
    box-sizing: border-box;
    vertical-align: middle;
}
CSSRULES;
        
    }
    protected function getField($aField) {
        $aField['attributes'] = array('type' => 'text') + $aField['attributes'];
        return parent::getField($aField);
    }
}