<?php 
/**
	Admin Page Framework v3.8.10b01 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/amazon-auto-links>
	Copyright (c) 2013-2016, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
abstract class AmazonAutoLinks_AdminPageFramework_Form_View___Generate_Base extends AmazonAutoLinks_AdminPageFramework_FrameworkUtility {
    public $aArguments = array();
    public function __construct() {
        $_aParameters = func_get_args() + array($this->aArguments,);
        $this->aArguments = $_aParameters[0];
    }
    public function get() {
        return '';
    }
}
