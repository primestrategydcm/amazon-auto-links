<?php
abstract class AmazonAutoLinks_AdminPageFramework_Form_View___Generate_Section_Base extends AmazonAutoLinks_AdminPageFramework_Form_View___Generate_Base {
    public $hfCallback = null;
    public $sIndexMark = '___i___';
    public function __construct() {
        $_aParameters = func_get_args() + array($this->aArguments, $this->hfCallback,);
        $this->aArguments = $_aParameters[0];
        $this->hfCallback = $_aParameters[1];
    }
    public function getModel() {
        return '';
    }
    protected function _getFiltered($sSubject) {
        return is_callable($this->hfCallback) ? call_user_func_array($this->hfCallback, array($sSubject, $this->aArguments,)) : $sSubject;
    }
    protected function _getInputNameConstructed($aParts) {
        $_sName = array_shift($aParts);
        foreach ($aParts as $_sPart) {
            $_sName.= '[' . $_sPart . ']';
        }
        return $_sName;
    }
}