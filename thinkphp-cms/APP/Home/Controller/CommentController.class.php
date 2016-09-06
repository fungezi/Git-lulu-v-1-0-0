<?php
namespace Home\Controller;
use Common\Controller\AuthController;

class CommentController extends AuthController{
	function index(){
		function generateTree($items){
		    $tree = array();
		    foreach($items as $item){
		        if(isset($items[$item['pid']])){
		            $items[$item['pid']]['son'][] = &$items[$item['cid']];
		        }else{
		            $tree[] = &$items[$item['cid']];
		        }
		    }
		    return $tree;
		}
		switch($this->_method){
			case "post":
				$pid = \I("post.pid",0);
				$content = \I("post.content","");
				$artid = \I("post.artid","");
				$user = \I("post.username","");
				if(!$content or !$artid or !$user){
					$this->response(array("flag"=>true,"content"=>"参数不合法"),"json",200);
				}else{
					$data = array(
						"pid"=>$pid,
						"content"=>$content,
						"artid"=>$artid,
						"username"=>$user
					);
					$commentModel = M("comment");
					$res = $commentModel->add($data);
					$this->response(array("flag"=>true,"content"=>$res),"json",200);
				}
			break;
			case "get":
				$condition = \I("get.condition","");
				$artid = \I("get.artid","");
				$commentModel = M("comment");
				if($artid){
					$res = $commentModel->where("artid=".$artid)->getField("cid,pid,artid,username,content");
					$res = generateTree($res);
					$this->response(array("flag"=>true,"content"=>$res),"json",200);
				}else{
					$this->response(array("flag"=>true,"content"=>"参数不合法"),"json",200);
				}
			break;
			default:
			break;
		}
	}
}
?>