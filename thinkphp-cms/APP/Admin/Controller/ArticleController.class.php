<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
class ArticleController extends AuthController {
	// 后台首页
	protected $allowMethod =  array('get','post','put','delete');
    public function index(){
    	// 首页的逻辑就是：数据库取数据－打包数据成数组或json发送到前端
    	// echo $this->_method;

    	switch($this->_method){
    		case "post":
    			$articleModel  = new \Admin\Model\ArticleModel();
    			$title = $_POST["title"];
    			$content = $_POST["content"];
    			// $data  = array(
       //  			"title"=>"这是文章的标题1",
       //  			"auhtor"=>"zuozhe1",
       //  			"content"=>"leirong1",
       //  			"keywords"=>"gunajianci1",
       //  			"description"=>"miaoshu",
       //  			"is_top"=>0,
       //  			"clcik"=>120,
       //  			"addtime"=>date("Y-W-M"),
       //  			"cid"=>1,
       //  		);
    			if($title && $content){
    				$res = $articleModel->addart($post);//返回这条数据的id
    				if(!empty($res)){
    					$this->response(array("flag"=>true,"content"=>"添加成功"),"json",200);
    				}else{
    					$this->response(array("flag"=>false,"content"=>"添加失败"),"json",500);
    				}
    			}else{
    				$this->response(array("flag"=>true,"content"=>"标题或者内容不可以为空"),"json",200);
    			}
        		break;
        	case "get"://查询文章
        		$articleModel  = new \Admin\Model\ArticleModel();
        		$data = $articleModel->order("aid")->limit(10)->select();
        		$this->response(array("flag"=>true,"content"=>$this->_method),"json",200);
        		break;
        	case "delete"://删除文章
        		$this->response(array("flag"=>true,"content"=>$this->_method),"json",200);
        		break;
        	case "put"://更新文章
        		$this->response(array("flag"=>true,"content"=>$this->_method),"json",200);
        		break;
        	default:
        		$this->show("操作不允许。",'utf-8');
        		break;
        }
    }

    
}