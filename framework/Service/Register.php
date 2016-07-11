<?php
namespace app\framework\Service;

/**
 * 注册树类
 */
class Register
{
	
	protected static $objects = [];

	public function set($alias, $object)
	{
		self::$objects[$alias] = $object;
	}

	public function _unset($alias)
	{
		unset(self::$objects[$alias]);
	}
}
