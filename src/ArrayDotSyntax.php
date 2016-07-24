<?php

namespace LuckyNail\Simple;

trait ArrayDotSyntax{
	protected function ads_get(&$aArr, $sKey){
	    $aKey = explode('.', $sKey);
	    foreach($aKey as $sKey){
	        if(!is_array($aArr) || !array_key_exists($sKey, $aArr)){
	            return null;
	        }
	        $aArr = &$aArr[$sKey];
	    }
	    return $aArr;
	}	
	protected function ads_set(&$aArr, $sKey, $aValue){
		$aKey = explode('.', $sKey);
		$aCurrent = &$aArr;
		foreach($aKey as $sKey) {
			$aCurrent = &$aCurrent[$sKey];
		}
		$aCurrent = $aValue;
	}
}
