<?php 

namespace LuckyNail\Simple;

class BlackBox{
	protected static $_aTrunk = [];
	protected $_sKey;

	public function __construct($sKey){
		$this->_sKey = $sKey;
	}
	private static function _ensure_existing_key($sKey){
		if(!isset(self::$_aTrunk[$sKey])){
			self::$_aTrunk[$sKey] = [];
		}
	}
	public static function put($sKey, $mVal){
		self::_ensure_existing_key($sKey);
		self::$_aTrunk[$sKey][] = $mVal;
	}
	public static function lay_under($sKey, $mVal){
		self::_ensure_existing_key($sKey);
		array_unshift(self::$_aTrunk[$sKey], $mVal);
	}
	public function look(){
		if(!isset(self::$_aTrunk[$this->_sKey])){
			return null;
		}
		return self::$_aTrunk[$this->_sKey];
	}
	public function take(){
		$mResult = self::look($this->_sKey);
		unset(self::$_aTrunk[$this->_sKey]);
		return $mResult;
	}

}
