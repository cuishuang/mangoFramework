<?php
namespace app\controllers\Home;

use app\controllers\BaseController;
use app\framework\Service\Mango;
use app\framework\Api\ApiBase;

/**
* 前台首页类
*/
class IndexController extends BaseController
{
	public $api;

	public function __construct()
	{
		$this->api = new ApiBase;
	}

	public function index()
	{	
		$sql = "SELECT * FROM `stu` where id = :id";
		$res = Mango::app('db')->queryOne($sql,array(':id'=>'50'));
		return $this->api->success('成功',$res);
	}

	public function create()
	{
		$name = $_POST['name'];
		$class = $_POST['class'];
		$score = $_POST['score'];

		$sql = "INSERT `stu` (name,class,score) VALUES (:name,:class,:score);";
		$res = Mango::app('db')->insert($sql,array(':name'=>$name,':class'=>$class,':score'=>$score));
		if ($res) {
			return $this->api->success('成功');
		} else {
			return $this->api->error('失败');
		}

	}


}