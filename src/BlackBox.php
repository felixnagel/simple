<?php 
namespace LuckyNail\Simple;
class BlackBox{
	protected static $_aBox = [];
	protected $_sKey;
	public function __construct($sKey){
		self::_ensure_existence($sKey);
		$this->_sKey = $sKey;
	}
	private static function _ensure_existence($sKey){
		if(!isset(self::$_aBox[$sKey])){
			self::$_aBox[$sKey] = [];
		}
	}
	public static function global_insert($sKey, $mVal){
		self::_ensure_existence($sKey);
		self::$_aBox[$sKey][] = $mVal;
	}
	public function insert($mVal){
		self::global_insert($this->_sKey, $mVal);
	}
	public function get(){
		return self::$_aBox[$this->_sKey];
	}
	public function truncate(){
		$mResult = $this->get();
		unset(self::$_aBox[$this->_sKey]);
		return $mResult;
	}
}
