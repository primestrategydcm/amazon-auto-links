<?php
/**
 Admin Page Framework v3.7.7b02 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/amazon-auto-links>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
class AmazonAutoLinks_AdminPageFramework_Form_View___CSS_Form extends AmazonAutoLinks_AdminPageFramework_Form_View___CSS_Base {
    protected function _get() {
        $_sSpinnerURL = esc_url(admin_url('/images/wpspin_light-2x.gif'));
        return <<<CSSRULES
.amazon-auto-links-form-warning {
    font-weight: bold;
    color: red;
    font-size: 1.32em;
}
CSSRULES;
        
    }
}