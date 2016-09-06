<?php 
	namespace Common\Controller;
	use \Think\Controller;
	use \Thunk\Model;

	class AuthController extends Controller\restController{
		public function _initialize(){

			$now_am = CONTROLLER_NAME."-".ACTION_NAME."-".$this->_method;//group表里存的应该是对应的控制器和请求的方法
			$no_check = array(
				"Code-loginCode-get","Code-regCode-get","Index-login-post","Article-sendMail-get","Article-category-get","Article-index-delete","Article-category-post","Article-category-put","Article-category-delete","Comment-index-get","Comment-index-post","Index-index-get","Index-single-get","Index-category-get","Admin-index-get","Index-reg-post","Index-activeCode-get",
				);
			if(!in_array($now_am,$no_check)){
				//为登陆的时候，就看看是不是默认的访问节点
				if(session("id")){
					//当用户登录之后查询权限
					$userRoleid = M()->table(array("user"=>"u"))->where("uid=".session("id"))->field("u.roleid")->find();
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
					$res = M("auth")->where($condition)->select();
					// var_dump($res);
					foreach($res as $v){
						
						if($v["authcar"] == $now_am && $v["authcar"]){
							$len++;
						}
					}
					if(!$len){
						exit("没有权限访问");
					}
				}else{
					exit("没有权限访问");
				}

			}
		}
	}

 ?>