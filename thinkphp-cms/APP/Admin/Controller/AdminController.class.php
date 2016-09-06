<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
class AdminController extends AuthController {

	function index(){
		function generateTree($items){
		    $tree = array();
		    foreach($items as $item){
		        if(isset($items[$item['authpid']])){
		            $items[$item['authpid']]['son'][] = &$items[$item['authid']];
		        }else{
		            $tree[] = &$items[$item['authid']];
		        }
		    }
		    return $tree;
		}
		if(session("id")){
			//当用户登录之后查询权限
			$userRoleid = M()->table(array("user"=>"u"))->where("uid=".session("id")) ->field("u.roleid")->find();
			// exit("没有权限访问");
			$userRoleid = explode(",", $userRoleid["roleid"]);
			$map["roleid"] = array("in",$userRoleid);
			$res = M("role")->where($map)->select();

			$len = 0;
			$authId  = "";
			foreach($res as $v){//res为role数组
				if(!$authId){
					$authId =  $authId.$v['role'];
				}else{
					$authId =  $authId.",".$v['role'];
				}
			}
			$authId = explode(",", $authId);
			$condition["authid"] = array("in",$authId);
			$res = M("auth")->where($condition)->where("authlevel!=0")->getField("authid,authname,authpid,authpath");
			$res  = generateTree($res);
			$this->response(array("flag"=>true,"content"=>$res),"json",200);
		}
	}

}
?>