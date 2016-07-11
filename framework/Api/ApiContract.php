<?php
namespace app\framework\Api;

/**
* 接口约束
*/
interface ApiContract
{
	public function success($msg="操作成功！", $data=array());

	public function error($msg="操作失败！");

	public function notifyLog();
}