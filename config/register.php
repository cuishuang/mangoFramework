<?php

/**
 * 框架注册类配置文件
 */
return [
	'db' => [
		'model' => 'static',
		'object' => \app\framework\Database\Db::getIntance()
	]
	// 'pdo' => [
	// 	'model' => 'new',
	// 	'object' => "app\\framework\\Database\\Pdo"

	// ]
];


