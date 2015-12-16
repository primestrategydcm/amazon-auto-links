<?php
/**
 Admin Page Framework v3.7.4 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/amazon-auto-links>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
class AmazonAutoLinks_AdminPageFramework_Form_View___Script_Utility extends AmazonAutoLinks_AdminPageFramework_Form_View___Script_Base {
    static public function getScript() {
        return <<<JAVASCRIPTS
( function( $ ) {
    $.fn.reverse = [].reverse;

    $.fn.formatPrintText = function() {
        var aArgs = arguments;     
        return aArgs[ 0 ].replace( /{(\d+)}/g, function( match, number ) {
            return typeof aArgs[ parseInt( number ) + 1 ] != 'undefined'
                ? aArgs[ parseInt( number ) + 1 ]
                : match;
        });
    };
}( jQuery ));
JAVASCRIPTS;
        
    }
}