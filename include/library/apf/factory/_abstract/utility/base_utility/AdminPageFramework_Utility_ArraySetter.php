<?php
abstract class AmazonAutoLinks_AdminPageFramework_Utility_ArraySetter extends AmazonAutoLinks_AdminPageFramework_Utility_ArrayGetter {
    static public function sortArrayByKey($a, $b, $sKey = 'order') {
        return isset($a[$sKey], $b[$sKey]) ? $a[$sKey] - $b[$sKey] : 1;
    }
    static public function unsetDimensionalArrayElement(&$mSubject, array $aKeys) {
        $_sKey = array_shift($aKeys);
        if (!empty($aKeys)) {
            if (isset($mSubject[$_sKey]) && is_array($mSubject[$_sKey])) {
                self::unsetDimensionalArrayElement($mSubject[$_sKey], $aKeys);
            }
            return;
        }
        if (is_array($mSubject)) {
            unset($mSubject[$_sKey]);
        }
    }
    static public function setMultiDimensionalArray(&$mSubject, array $aKeys, $mValue) {
        $_sKey = array_shift($aKeys);
        if (!empty($aKeys)) {
            if (!isset($mSubject[$_sKey]) || !is_array($mSubject[$_sKey])) {
                $mSubject[$_sKey] = array();
            }
            self::setMultiDimensionalArray($mSubject[$_sKey], $aKeys, $mValue);
            return;
        }
        $mSubject[$_sKey] = $mValue;
    }
    static public function numerizeElements(array $aSubject) {
        $_aNumeric = self::getIntegerKeyElements($aSubject);
        $_aAssociative = self::invertCastArrayContents($aSubject, $_aNumeric);
        foreach ($_aNumeric as & $_aElem) {
            $_aElem = self::uniteArrays($_aElem, $_aAssociative);
        }
        if (!empty($_aAssociative)) {
            array_unshift($_aNumeric, $_aAssociative);
        }
        return $_aNumeric;
    }
    public static function castArrayContents(array $aModel, array $aSubject) {
        $_aCast = array();
        foreach ($aModel as $_isKey => $_v) {
            $_aCast[$_isKey] = self::getElement($aSubject, $_isKey, null);
        }
        return $_aCast;
    }
    public static function invertCastArrayContents(array $aModel, array $aSubject) {
        $_aInvert = array();
        foreach ($aModel as $_isKey => $_v) {
            if (array_key_exists($_isKey, $aSubject)) {
                continue;
            }
            $_aInvert[$_isKey] = $_v;
        }
        return $_aInvert;
    }
    public static function uniteArrays() {
        $_aArray = array();
        foreach (array_reverse(func_get_args()) as $_aArg) {
            $_aArray = self::uniteArraysRecursive(self::getAsArray($_aArg), $_aArray);
        }
        return $_aArray;
    }
    public static function uniteArraysRecursive($aPrecedence, $aDefault) {
        if (is_null($aPrecedence)) {
            $aPrecedence = array();
        }
        if (!is_array($aDefault) || !is_array($aPrecedence)) {
            return $aPrecedence;
        }
        foreach ($aDefault as $sKey => $v) {
            if (!array_key_exists($sKey, $aPrecedence) || is_null($aPrecedence[$sKey])) {
                $aPrecedence[$sKey] = $v;
            } else {
                if (is_array($aPrecedence[$sKey]) && is_array($v)) {
                    $aPrecedence[$sKey] = self::uniteArraysRecursive($aPrecedence[$sKey], $v);
                }
            }
        }
        return $aPrecedence;
    }
    static public function dropElementsByType(array $aArray, $aTypes = array('array')) {
        foreach ($aArray as $isKey => $vValue) {
            if (in_array(gettype($vValue), $aTypes)) {
                unset($aArray[$isKey]);
            }
        }
        return $aArray;
    }
    static public function dropElementByValue(array $aArray, $vValue) {
        foreach (self::getAsArray($vValue, true) as $_vValue) {
            $_sKey = array_search($_vValue, $aArray, true);
            if ($_sKey === false) {
                continue;
            }
            unset($aArray[$_sKey]);
        }
        return $aArray;
    }
    static public function dropElementsByKey(array $aArray, $asKeys) {
        foreach (self::getAsArray($asKeys, true) as $_isKey) {
            unset($aArray[$_isKey]);
        }
        return $aArray;
    }
}