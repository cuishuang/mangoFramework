<?php

namespace app\models;

//use app\config\DbConfig;

/**
 * 数据库操作类
 * 待添加 1.事务 已完成 2.配置文件
 * @author roy.cai
 */

class db
{
	
	public static $instance;
	public static $pdo;

	private function __construct(){

		//数据库设置数组


		$this->pdo($configs);
		self::$pdo->exec("SET names utf8");
		//self::$pdo->setFetchMode(\PDO::FETCH_ASSOC);
	}

	private function __clone(){}

	public static function getIntance()
	{
		if (!(self::$instance instanceof self)) {
			self::$instance  = new self();
		}
		return self::$instance;

	}

	public function Test()
	{
		echo "db test";
	}

	public function pdo($configs)
	{
		if(!self::$pdo){
			// self::$pdo = new \PDO('mysql:host=localhost;dbname=test','root','');
			self::$pdo = new \PDO('mysql:host='.$configs['host'].';dbname='.$configs['dbname'].','.$configs['username'].','.$configs['password'].')';
		}
		return self::$pdo;
	}

	/**
	 * 查询一条记录
	 * @param $sql sql语句
	 * @param $params 参数数组
	 * @return 结果集数组
	 */
	public function queryOne($sql,$params=array())
	{
		//参数为空直接执行
		if (empty($params)) {
			$res = self::$pdo->query($sql);
			$res->setFetchMode(\PDO::FETCH_ASSOC);
			return $res->fetch();

		}else{
			if (is_array($params)) {
				//参数不为空就使用预处理方式
				$stmt = self::$pdo->prepare($sql);
				$stmt->setFetchMode(\PDO::FETCH_ASSOC);
				$this->bindParams($stmt,$params);
				$stmt->execute();
				return $stmt->fetch();
			}
			echo "参数应为数组";
			exit;
		}
	}

	/**
	 * 查询多条记录
	 * @param $sql sql语句
	 * @param $params 参数数组
	 * @return 结果集数组
	 */
	public function queryAll($sql,$params=array())
	{
		//参数为空直接执行
		if (empty($params)) {
			$res = self::$pdo->query($sql);
			$res->setFetchMode(\PDO::FETCH_ASSOC);
			return $res->fetchAll();

		}else{
			if (is_array($params)) {
				//参数不为空就使用预处理方式
				$stmt = self::$pdo->prepare($sql);
				$stmt->setFetchMode(\PDO::FETCH_ASSOC);
				$this->bindParams($stmt,$params);
				$stmt->execute();
				return $stmt->fetchAll();
			}
			echo "参数应为数组";
			exit;
		}
	}

	/**
	 * 插入记录
	 * @param $sql sql语句
	 * @param $params 参数数组
	 * @return 返回插入状态
	 */
	public function insert($sql,$params=array())
	{
		//参数为空直接执行
		if (empty($params)) {
			$count = self::$pdo->exec($sql);	
			return $count;
		}else{
			if (is_array($params)) {
				//参数不为空就使用预处理方式
				$stmt = self::$pdo->prepare($sql);
				$stmt->setFetchMode(\PDO::FETCH_ASSOC);
				$this->bindParams($stmt,$params);
				$stmt->execute();
				return $stmt->rowCount();
			}
			echo "参数应为数组";
			exit;
		}
	}


	/**
	 * 更新记录
	 * @param $sql sql语句
	 * @param $params 参数数组
	 * @return 结果集数组
	 */
	public function update($sql,$params=array())
	{
		//参数为空直接执行
		if (empty($params)) {
			$count = self::$pdo->exec($sql);	
			return $count;
		}else{
			if (is_array($params)) {
				//参数不为空就使用预处理方式
				$stmt = self::$pdo->prepare($sql);
				$stmt->setFetchMode(\PDO::FETCH_ASSOC);
				$this->bindParams($stmt,$params);
				$stmt->execute();
				return $stmt->rowCount();
			}
			echo "参数应为数组";
			exit;
		}
	}

	/**
	 * 执行sql
	 * @param $sql sql语句
	 * @param $params 参数数组
	 * @return 结果集数组
	 */
	public function execute($sql,$params=array())
	{
		//参数为空直接执行
		if (empty($params)) {
			$count = self::$pdo->exec($sql);	
			return $count;
		}else{
			if (is_array($params)) {
				//参数不为空就使用预处理方式
				$stmt = self::$pdo->prepare($sql);
				$stmt->setFetchMode(\PDO::FETCH_ASSOC);
				$this->bindParams($stmt,$params);
				$stmt->execute();
				return $stmt->rowCount();
			}
			echo "参数应为数组";
			exit;
		}
	}




	/**
	 * 删除记录
	 * @param $sql sql语句
	 * @param $params 参数数组
	 * @return 结果集数组
	 */
	public function delete($sql,$params=array())
	{
		//参数为空直接执行
		if (empty($params)) {
			$count = self::$pdo->exec($sql);	
			return $count;
		}else{
			if (is_array($params)) {
				//参数不为空就使用预处理方式
				$stmt = self::$pdo->prepare($sql);
				$stmt->setFetchMode(\PDO::FETCH_ASSOC);
				$this->bindParams($stmt,$params);
				$stmt->execute();
				return $stmt->rowCount();
			}
			echo "参数应为数组";
			exit;
		}
	}

	/**
	 * 绑定参数
	 * @param $stmt pdo prepare对象
	 * @param $params 参数数组
	 */
	public function bindParams($stmt,$params)
	{
		foreach ($params as $k=>$v) {
			$stmt->bindParam($k,$v,\PDO::PARAM_STR);
		}
	}





}