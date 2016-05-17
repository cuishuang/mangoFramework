<?php

namespace app\controllers;

use app\models\db;
/**
* 前台Controller
*/
class HomeController
{
	
	public function index()
	{
		//echo "controller is work";
		$db = db::getIntance();
		//var_dump($db->Test());

		$sql = "SELECT * FROM `t1` WHERE id=:id;";
		$res = $db->queryOne($sql,array(':id'=>'2'));

		// $sql = "SELECT * FROM `t1` limit 1";
		// $res = $db->queryOne($sql);

		//var_dump($res);


		$sqlAll = "SELECT * FROM `t1` WHERE id != :id";

		$res1 = $db->queryAll($sqlAll,array(':id'=>2));

		var_dump($res1);

		$sqlInsert = "INSERT `t1`(name,create_time) VALUES(:name,NOW());";

		//$res2 = $db->insert($sqlInsert,array(':name'=>'hi'));
		
		//var_dump($res2);

		//更新操作
		// $sqlUpdate = "UPDATE `t1` SET name = '王大锤' WHERE id=:id;";

		// $res3 = $db->update($sqlUpdate,array(':id'=>'10'));

		//删除操作

		$sqlDelete = "DELETE FROM `t1` WHERE id=10";

		$res4 = $db->delete($sqlDelete);

		var_dump($res4);

	}

	public function test()
	{
		echo "just test";
	}

}