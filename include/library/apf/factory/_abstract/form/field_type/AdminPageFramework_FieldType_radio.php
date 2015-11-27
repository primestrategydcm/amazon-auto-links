<?php
class AmazonAutoLinks_AdminPageFramework_FieldType_radio extends AmazonAutoLinks_AdminPageFramework_FieldType {
    public $aFieldTypeSlugs = array('radio');
    protected $aDefaultKeys = array('label' => array(), 'attributes' => array(),);
    protected function getStyles() {
        return <<<CSSRULES
/* Radio Field Type */
.amazon-auto-links-field input[type='radio'] {
    margin-right: 0.5em;
}     
.amazon-auto-links-field-radio .amazon-auto-links-input-label-container {
    padding-right: 1em;
}     
.amazon-auto-links-field-radio .amazon-auto-links-input-container {
    display: inline;
}     
.amazon-auto-links-field-radio .amazon-auto-links-input-label-string  {
    display: inline; /* radio labels should not fold(wrap) after the check box */
}
CSSRULES;
        
    }
    protected function getScripts() {
        return '';
    }
    protected function getField($aField) {
        $_aOutput = array();
        foreach ($this->getAsArray($aField['label']) as $_sKey => $_sLabel) {
            $_aOutput[] = $this->_getEachRadioButtonOutput($aField, $_sKey, $_sLabel);
        }
        $_aOutput[] = $this->_getUpdateCheckedScript($aField['input_id']);
        return implode(PHP_EOL, $_aOutput);
    }
    private function _getEachRadioButtonOutput(array $aField, $sKey, $sLabel) {
        $_oRadio = new AmazonAutoLinks_AdminPageFramework_Input_radio($aField['attributes']);
        $_oRadio->setAttributesByKey($sKey);
        $_oRadio->setAttribute('data-default', $aField['default']);
        return $this->getElement($aField, array('before_label', $sKey)) . "<div class='amazon-auto-links-input-label-container amazon-auto-links-radio-label' style='min-width: " . $this->sanitizeLength($aField['label_min_width']) . ";'>" . "<label " . $this->getAttributes(array('for' => $_oRadio->getAttribute('id'), 'class' => $_oRadio->getAttribute('disabled') ? 'disabled' : null,)) . ">" . $this->getElement($aField, array('before_input', $sKey)) . $_oRadio->get($sLabel) . $this->getElement($aField, array('after_input', $sKey)) . "</label>" . "</div>" . $this->getElement($aField, array('after_label', $sKey));
    }
    private function _getUpdateCheckedScript($sInputID) {
        $_sScript = <<<JAVASCRIPTS
jQuery( document ).ready( function(){
    jQuery( 'input[type=radio][data-id=\"{$sInputID}\"]' ).change( function() {
        // Uncheck the other radio buttons
        jQuery( this ).closest( '.amazon-auto-links-field' ).find( 'input[type=radio][data-id=\"{$sInputID}\"]' ).attr( 'checked', false );

        // Make sure the clicked item is checked
        jQuery( this ).attr( 'checked', 'checked' );
    });
});                 
JAVASCRIPTS;
        return "<script type='text/javascript' class='radio-button-checked-attribute-updater'>" . '/* <![CDATA[ */' . $_sScript . '/* ]]> */' . "</script>";
    }
}