<?php
namespace app\framework\Service;

use app\framework\Service\Register;
use app\framework\Config\Config;

/**
 * 框架入口类
 */
class Mango
{
	
	/**
	 * 框架使用类入口
	 */	
	public static function app($registerKey)
	{
		$registers = self::registerClass();	

		$preObj = $registers[$registerKey];

		if ($preObj['model'] == 'static') {
			$registerKey = $preObj['object'];
		} else {
			$registerKey = new $preObj['object'];
		}

		return $registerKey;
	}


	/**
	 * 注册类
	 */
	public static function registerClass()
	{
		$config = new Config();
		$config['registers'] = require '../config/register.php';
		return $registers = $config['registers'];
	}

}