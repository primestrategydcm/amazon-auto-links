<?php
class AmazonAutoLinks_AdminPageFramework_FieldType_default extends AmazonAutoLinks_AdminPageFramework_FieldType {
    public $aDefaultKeys = array();
    public function _replyToGetField($aField) {
        return $aField['before_label'] . "<div class='amazon-auto-links-input-label-container'>" . "<label for='{$aField['input_id']}'>" . $aField['before_input'] . ($aField['label'] && !$aField['repeatable'] ? "<span class='amazon-auto-links-input-label-string' style='min-width:" . $this->sanitizeLength($aField['label_min_width']) . ";'>" . $aField['label'] . "</span>" : "") . $aField['value'] . $aField['after_input'] . "</label>" . "</div>" . $aField['after_label'];
    }
}