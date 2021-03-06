<?php 
	namespace User\Controller;
	use Common\Controller\AuthController;

	class IndexController extends AuthController{
		private function checkCode($code,$id=""){
			$verify = new \Think\Verify();
			if(!$id){
				return false;
			}else{
				return $verify->check($code,$id);
			}
		}
		public function reg(){//注册
			switch ($this->_method){
				case 'post'://添加用户
					$name = \I("post.username","");
					$pwd = \I("post.pwd","");
					$code = \I("post.code","");
					$email = \I("post.email","");
					if(!$name or !$pwd or !$code or !$email){
						$this->response(array("flag"=>false,"content"=>"传参错误。"),"json",200);
					}elseif($code=="123"){//$this->checkCode($code,"reg")
						$userModel = new \User\Model\UserModel();
						$res = $userModel->addNewUser(array(
								"uname"=>$name,
								"upwd"=>$pwd,
								"email"=>$email
							));
						if(!$res){
							
							$this->response(array("flag"=>false,"content"=>"用户名已被注册"),"json",200);
						}else{
							$email = send_mail($email,$name,"YXL-blog","激活验证码：http://localhost/thinkphp-cms/v1/user/activeCode?username=".$name."&userid=".$res);
							$this->response(array("flag"=>true,"content"=>"注册成功","email"=>$email),"json",200);
						}
					}else{
						$this->response(array("flag"=>true,"content"=>"验证码错误"),"json",200);
					}
					break;
				default:
					$this->response(array("flag"=>true,"content"=>"操作不合法"),"json",200);
					break;
			}
			
		}

		public function activeCode(){
			$username = \I("get.username","");
			$userid = \I("get.userid","");
			if($userid){
				$userModel = M("user");
				$res = $userModel->where("uid=".$userid)->save(array("useable"=>1));
				if($res){
					echo $username." 用户已经激活";
				}
			}
		}

		public function login(){//登陆
			switch ($this->_method){
				case 'post':	
					$name = \I("post.username","");
					$pwd = \I("post.pwd","");
					$code = \I("post.code","");
					if(!$name or !$pwd){
						$this->response(array("flag"=>true,"content"=>"参数错误"),"json",200);
					}elseif($code=="123"){//$this->checkCode($code,"login")

						$userModel = new \User\Model\UserModel();
						$res = $userModel->loginCheck($name,$pwd);
						if($res){
							$this->response(array("flag"=>true,"content"=>"登录成功"),"json",200);
						}else{
							$this->response(array("flag"=>true,"content"=>"用户名或密码错误"),"json",200);
						}
					}else{
						$this->response(array("flag"=>true,"content"=>"验证码错误"),"json",200);
					}
					
					break;
				default:
					$this->response(array("flag"=>true,"content"=>"操作不合法"),"json",200);
					break;
			}
		}


		public function logout(){//登出
			switch ($this->_method){
				case 'post':
					session(null);
					$this->response(array("flag"=>true,"content"=>"登出成功"),"json",200);
					break;
				default:
					$this->response(array("flag"=>true,"content"=>"操作不合法"),"json",200);
					break;
			}
		}


	}
 ?>