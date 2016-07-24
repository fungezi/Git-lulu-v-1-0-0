<?php 
	//这个文件放着的是验证码
	namespace User\Controller;
	use Common\Controller\AuthController;

	class CodeController extends AuthController{
		//验证码设置
	    private $conf = array(
	        'expire' => 120,
	        'length' => 4,
	        'imageW' => 140,
	        'imageH' => 32,
	        'fontSize' => 16,
	        'useCurve' => false,
	    );

	    public function loginCode(){//登陆验证码
	    	$verify =  new \Think\verify($this->conf);
	    	$verify->entry("verifyCode");
	    }

	    public function regCode(){//注册验证码
	    	$verify =  new \Think\verify($this->conf);
	    	$verify->entry("verifyCode");
	    }
	}
	
 ?>