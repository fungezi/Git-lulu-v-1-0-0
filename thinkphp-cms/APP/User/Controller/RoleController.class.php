<?php 
	namespace User\Controller;
	use Common\Controller\AuthController;

	class RoleController extends AuthController{
		protected $allowMethod =  array('get','post','put','delete');

	//rbac认证流程 1.检查当前的操作是否需要认证。2.有权限？3.有（啥也不干）4.没有（1.检查是否登录若是没有就跳转到登陆页。2.没有权限就报错）
		public function index(){

			switch ($this->_method){
				case "post"://增
					$rolename = \I("post.rolename","");
					$role = \I("post.role","");
					$roleam = \I("post.roleam","");
					if(!$rolename or !$role or !$roleam){
						$this->response(array("flag"=>true,"content"=>"参数传递错误"),"json",200);
					}else{
						$roleModel = new \User\Model\RoleModel();
						$res = $roleModel->addRole(array(
								"rolename"=>$rolename,
								"role"=>$role,
								"roleam"=>$roleam,//传递的是一个字符串c－a－m，多个就用逗号隔开

							));
						if($res){
							$this->response(array("flag"=>true,"content"=>"角色添加成功"),"json",200);
						}else{
							$this->response(array("flag"=>true,"content"=>"角色添加失败"),"json",200);
						}
					}
					break;
				case "get"://查
					$pagenum = \I("get.page","1");
					$num = 2;//控制在两条数据的展示
					$data = $this->getpage($pagenum,$num);
					$this->response(array("flag"=>true,"content"=>$data),"json",200);
					break;
				case "put"://更新数据
					$roleid = \I("put.roleid","");
					$data = \I("put.");
					if(!$data or !$roleid){
						$this->response(array("flag"=>true,"content"=>"参数传递错误"),"json",200);
					}else{
						$roleModel = new \User\Model\RoleModel();
						$res = $roleModel->save($data);
						$this->response(array("flag"=>true,"content"=>$res),"json",200);
					}
					break;
				case "delete"://值得注意的是delete接受参数的方式
					parse_str(file_get_contents('php://input'), $input);
                    $input = array_map_recursive(C('DEFAULT_FILTER'), $input);
                    $roleid = ((int) ($input['roleid']));
                    // echo $roleid;
					if(!$roleid){
						$this->response(array("flag"=>true,"content"=>"参数传递错误"),"json",200);
					}else{
						$roleModel = new \User\Model\RoleModel();
						$res = $roleModel->where("roleid=".$roleid)->delete();
						if($res){
							$this->response(array("flag"=>true,"content"=>"删除成功"),"json",200);
						}else{
							$this->response(array("flag"=>true,"content"=>"删除失败"),"json",200);
						}
					}
					break;
				default:
					$this->response(array("flag"=>false,"content"=>"操作不合法"),"json",200);
					break;
			}
		}

		public function selectCourse(){
			//选课
			$cid = \I("post.courseId","");
			$uid = session("id");
			$courseId = M("user")->where("uid=".$uid)->field("courseId")->find();
			$ccid = $courseId["courseid"];
			// var_dump($courseId);

			$courseId = explode(",", $courseId["courseid"]);
			if(in_array($cid, $courseId) || !$cid){
				// return false;
			}else{
				$courseId = $ccid.",".$cid;
				M("user")->where("uid=".$uid)->save(array("courseId"=>$courseId));
			}
			$map['courseId'] = array('in',$courseId);
			$data = M("question")->where($map)->select();
			$this->response(array("flag"=>true,"content"=>$data),"json",200);
		}

		protected function getpage($pagenum=1,$num){//分页函数
			//利用limit来取得数据（limit(n,m)）
			$roleModel = new \User\Model\RoleModel();
			$data = $roleModel->limit($pagenum-1,$pagenum+$num-1)->select();//当查询的条件有多个匹配的时候用select来获取
			return $data;
		}
		
	}
 ?>