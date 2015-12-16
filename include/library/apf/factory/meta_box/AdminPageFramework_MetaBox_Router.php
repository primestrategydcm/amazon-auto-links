<?php
/**
 Admin Page Framework v3.7.4 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/amazon-auto-links>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
abstract class AmazonAutoLinks_AdminPageFramework_MetaBox_Router extends AmazonAutoLinks_AdminPageFramework_Factory {
    public function __construct($sMetaBoxID, $sTitle, $asPostTypeOrScreenID = array('post'), $sContext = 'normal', $sPriority = 'default', $sCapability = 'edit_posts', $sTextDomain = 'amazon-auto-links') {
        if (empty($asPostTypeOrScreenID)) {
            return;
        }
        $_sClassName = get_class($this);
        parent::__construct(isset($this->oProp) ? $this->oProp : new AmazonAutoLinks_AdminPageFramework_Property_MetaBox($this, $_sClassName, $sCapability));
        $this->oProp->sMetaBoxID = $sMetaBoxID ? $this->oUtil->sanitizeSlug($sMetaBoxID) : strtolower($_sClassName);
        $this->oProp->sTitle = $sTitle;
        $this->oProp->sContext = $sContext;
        $this->oProp->sPriority = $sPriority;
        if ($this->oProp->bIsAdmin) {
            $this->oUtil->registerAction('current_screen', array($this, '_replyToDetermineToLoad'));
        }
    }
    public function _isInThePage() {
        if (!in_array($this->oProp->sPageNow, array('post.php', 'post-new.php'))) {
            return false;
        }
        if (!in_array($this->oUtil->getCurrentPostType(), $this->oProp->aPostTypes)) {
            return false;
        }
        return true;
    }
    protected function _isInstantiatable() {
        if (isset($GLOBALS['pagenow']) && 'admin-ajax.php' === $GLOBALS['pagenow']) {
            return false;
        }
        return true;
    }
    public function _replyToDetermineToLoad() {
        $_oScreen = get_current_screen();
        if (!$this->_isInThePage()) {
            return;
        }
        $this->oForm;
        $this->_setUp();
        $this->oUtil->addAndDoAction($this, "set_up_{$this->oProp->sClassName}", $this);
        add_action('add_meta_boxes', array($this, '_replyToAddMetaBox'));
        $this->_setUpValidationHooks($_oScreen);
    }
}