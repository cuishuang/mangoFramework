<?php
namespace app\framework\Api;

use app\framework\Api\ApiContract;

/**
* 接口基类
*/
class ApiBase implements ApiContract
{
	public function success($msg="操作成功！", $data=array()){
        header('Content-Type:application/json; charset=utf-8');
        exit(json_encode(array("status"=>1,"info"=>$msg, "data"=>(Object)$data)));
    }

    public function error($msg="操作失败！"){
        header('Content-Type:application/json; charset=utf-8');
        exit(json_encode(array("status"=>0,"info"=>$msg, "data"=>(Object)array())));
    }

	public function notifyLog()
	{

	}
}