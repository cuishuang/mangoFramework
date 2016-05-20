<?php

namespace app\controllers;

use app\models\db;
use app\config\Config;
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

		// $sqlDelete = "DELETE FROM `t1` WHERE id=10";

		// $res4 = $db->delete($sqlDelete);

		// var_dump($res4);




	}


	public function transaction()
	{
		$db = db::getIntance();
		$tsk = $db::$pdo;
		//事务测试
		try{
			$tsk->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			$tsk->beginTransaction();

			$sql = "INSERT `t1`(name,create_time) VALUES('bbb',NOW())";
			$db->execute($sql);

			$sqlUpdate = "INSERT `t1`(title,create_time) VALUES('111',NOW())";
			$db->execute($sqlUpdate);

			$tsk->commit();

		}catch (Exception $e) {
			$tsk->rollBack();
			echo $e->getMessage();
			
		}		


		





		// try {
			
		// 	$sql = "DROP TABLE t2";
		// 	$db->execute($sql);

		// 	$sqlUpdate = "UPDATE `t2` SET title = '王大锤' WHERE id=:id;";
		// 	$db->update($sqlUpdate,array(':id'=>'2'));

		// 	$tsk->commit();

		// } catch (Exception $e) {
		// 	echo $e->getMessage();
		// 	$tsk->rollBack();
		// }		

	}


	public function test()
	{
		// echo "just test";

		$obj = new Config;

		var_dump($obj['one']);
	}

}