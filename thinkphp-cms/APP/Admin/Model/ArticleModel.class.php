<?php
	namespace Admin\Model;
	use Think\Model;
	class ArticleModel extends Model{
		//添加文章$data为一个数组
		public function addart($data){
			$res = $this->add($data);
			return $res;
		}
	}