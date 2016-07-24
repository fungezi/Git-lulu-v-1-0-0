<?php 
	namespace User\Model;
	use Think\Model;

	class RoleModel extends Model{

		public function addRole($data){
			return $this->data($data)->add();
		}
	}
 ?>