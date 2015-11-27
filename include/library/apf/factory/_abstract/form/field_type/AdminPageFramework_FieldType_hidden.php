<?php
class AmazonAutoLinks_AdminPageFramework_FieldType_hidden extends AmazonAutoLinks_AdminPageFramework_FieldType {
    public $aFieldTypeSlugs = array('hidden');
    protected $aDefaultKeys = array();
    protected function getField($aField) {
        return $aField['before_label'] . "<div class='amazon-auto-links-input-label-container'>" . "<label for='{$aField['input_id']}'>" . $aField['before_input'] . ($aField['label'] ? "<span class='amazon-auto-links-input-label-string' style='min-width:" . $this->sanitizeLength($aField['label_min_width']) . ";'>" . $aField['label'] . "</span>" : "") . "<input " . $this->getAttributes($aField['attributes']) . " />" . $aField['after_input'] . "</label>" . "</div>" . $aField['after_label'];
    }
}