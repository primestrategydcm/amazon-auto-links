<?php
class AmazonAutoLinks_AdminPageFramework_Form_View___Attribute_Fieldrow extends AmazonAutoLinks_AdminPageFramework_Form_View___Attribute_FieldContainer_Base {
    public $sContext = 'fieldrow';
    protected function _getFormattedAttributes() {
        $_aAttributes = parent::_getFormattedAttributes();
        if ($this->aArguments['hidden']) {
            $_aAttributes['style'] = $this->getStyleAttribute($this->getElement($_aAttributes, 'style', array()), 'display:none');
        }
        return $_aAttributes;
    }
}