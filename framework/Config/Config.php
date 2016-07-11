<?php
namespace app\framework\Config;


/**
 * 配置基类
 * @author roy.cai
 */

class Config implements \arrayaccess
{
	private $container = [];
	public function __construct()
	{
		$this->container = [];
	}

	public function offsetSet($offset,$value)
	{
		if (is_null($offset)) {
			$this->container[] = $value;
		}else{
			$this->container[$offset] = $value;		
		}
	}
	
	public function offsetExists($offset)
	{
		return isset($this->container[$offset]);
	}

	public function offsetUnset($offset)
	{
		unset($this->container[$offset]);
	}

	public function offsetGet($offset)
	{
		return isset($this->container[$offset]) ? $this->container[$offset] : null;
	}

}
