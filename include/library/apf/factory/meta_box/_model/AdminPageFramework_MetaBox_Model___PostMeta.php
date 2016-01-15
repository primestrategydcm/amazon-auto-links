<?php 
/**
	Admin Page Framework v3.7.11 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/amazon-auto-links>
	Copyright (c) 2013-2016, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
class AmazonAutoLinks_AdminPageFramework_MetaBox_Model___PostMeta extends AmazonAutoLinks_AdminPageFramework_FrameworkUtility {
    public $iPostID = array();
    public $aFieldsets = array();
    public function __construct() {
        $_aParameters = func_get_args() + array($this->iPostID, $this->aFieldsets,);
        $this->iPostID = $_aParameters[0];
        $this->aFieldsets = $_aParameters[1];
    }
    public function get() {
        if (!$this->iPostID) {
            return array();
        }
        return $this->_getSavedDataFromFieldsets($this->iPostID, $this->aFieldsets);
    }
    private function _getSavedDataFromFieldsets($iPostID, $aFieldsets) {
        $_aMetaKeys = $this->getAsArray(get_post_custom_keys($iPostID));
        $_aMetaData = array();
        foreach ($aFieldsets as $_sSectionID => $_aFieldsets) {
            if ('_default' == $_sSectionID) {
                foreach ($_aFieldsets as $_aFieldset) {
                    if (!in_array($_aFieldset['field_id'], $_aMetaKeys)) {
                        continue;
                    }
                    $_aMetaData[$_aFieldset['field_id']] = get_post_meta($iPostID, $_aFieldset['field_id'], true);
                }
            }
            if (!in_array($_sSectionID, $_aMetaKeys)) {
                continue;
            }
            $_aMetaData[$_sSectionID] = get_post_meta($iPostID, $_sSectionID, true);
        }
        return $_aMetaData;
    }
}
