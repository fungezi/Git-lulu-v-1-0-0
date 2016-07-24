<?php 
	namespace Common\Controller;
	use \Think\Controller;
	use \Thunk\Model;

	class AuthController extends Controller\restController{
		public function _initialize(){

			$now_am = CONTROLLER_NAME."-".ACTION_NAME."-".$this->_method;//group表里存的应该是对应的控制器和请求的方法
			$no_check = array(
				"Article-index-post","Code-loginCode-get","Code-regCode-get","Index-login-post","Role-index-delete"
				);
			if(!in_array($now_am,$no_check)){
				//为登陆的时候，就看看是不是默认的访问节点
				if(session("id")){
					//当用户登录之后查询权限
					$userRoleid = M()->table(array("user"=>"u"))->field("u.roleid")->find();
					// exit("没有权限访问");
					$userRoleid = explode(",", $userRoleid["roleid"]);
					$map["roleid"] = array("in",$userRoleid);
					$res = M("role")->field("roleam")->where($map)->select();
					$len = 0;
					echo $now_am;
					foreach($res as $v){
						if(!in_array($now_am,explode(",", $v["roleam"]))){
							$len++;
						}
						if($len >= count($res)){
							exit("没有权限访问");
						}
					}
				}else{
					exit("没有权限访问");
				}

			}
		}
	}

 ?>