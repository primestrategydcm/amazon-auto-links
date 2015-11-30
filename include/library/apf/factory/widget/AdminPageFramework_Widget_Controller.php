<?php
abstract class AmazonAutoLinks_AdminPageFramework_Widget_Controller extends AmazonAutoLinks_AdminPageFramework_Widget_View {
    function __construct($oProp) {
        parent::__construct($oProp);
        if ($this->_isInThePage()):
            if (did_action('widgets_init')) {
                $this->setup_pre();
            } {
                add_action('widgets_init', array($this, 'setup_pre'));
            }
        endif;
    }
    public function setUp() {
    }
    public function load($oAdminWidget) {
    }
    public function enqueueStyles($aSRCs, $aCustomArgs = array()) {
        if (method_exists($this->oResource, '_enqueueStyles')) {
            return $this->oResource->_enqueueStyles($aSRCs, array($this->oProp->sPostType), $aCustomArgs);
        }
    }
    public function enqueueStyle($sSRC, $aCustomArgs = array()) {
        if (method_exists($this->oResource, '_enqueueStyle')) {
            return $this->oResource->_enqueueStyle($sSRC, array($this->oProp->sPostType), $aCustomArgs);
        }
    }
    public function enqueueScripts($aSRCs, $aCustomArgs = array()) {
        if (method_exists($this->oResource, '_enqueueScripts')) {
            return $this->oResource->_enqueueScripts($aSRCs, array($this->oProp->sPostType), $aCustomArgs);
        }
    }
    public function enqueueScript($sSRC, $aCustomArgs = array()) {
        if (method_exists($this->oResource, '_enqueueScript')) {
            return $this->oResource->_enqueueScript($sSRC, array($this->oProp->sPostType), $aCustomArgs);
        }
    }
    protected function setArguments(array $aArguments = array()) {
        $this->oProp->aWidgetArguments = $aArguments;
    }
}