<?php 
	namespace User\Model;
	use Think\Model;

	class UserModel extends Model{
		public function addNewUser($data){//检验是不是新用户,这里的密码是采用md5加盐 来加密的
			$data["salt"] = $this->addSalt();
			$data["upwd"] = md5(md5($data["upwd"]).$data["salt"]);
			$res = $this->data($data)->add();
			return $res;//返回插入的结果
		}

		public function loginCheck($name,$pwd){
			//对用户名进行验证－－－唯一
			//核验密码－－存的是md5加密的密码。
			$salt = $this->where(array("uname"=>$name))->getField("salt");
			$pwd = md5(md5($pwd).$salt);
			$res = $this->where(array("uname"=>$name,"upwd"=>$pwd))->find();
			if(is_null($res) or ($res==false)){
				return false;
			}else{//否侧将查询到的数据存到session
				session("username",$res["uname"]);
				session("id",$res["uid"]);
				return true;
			}
		}

		public function addSalt(){
			$salt = "";
	        $strs = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', ':', ';', '<', '=',
	            '>', '?', '@', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
	            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '[', '\\', ']',
	            '^', '_', '`', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
	            'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '{', '|', '}');
	        for ($a = 0; $a < 8; $a++) {
	            $tmp = mt_rand(1, 76);
	            $salt .= $strs[$tmp];
	        }
	        return $salt;
		}
	}
 ?>