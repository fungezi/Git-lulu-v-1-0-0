<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
class ArticleController extends AuthController {
	// 后台首页
	protected $allowMethod =  array('get','post','put','delete');
    public function sendMail(){
      $res = send_mail("2937306985@qq.com","yuxili","这是一份测试邮件","hello world.");
      var_dump($res);
    }
    public function index(){
    	// 首页的逻辑就是：数据库取数据－打包数据成数组或json发送到前端
    	switch($this->_method){
    		case "post":
    			$articleModel  = new \Admin\Model\ArticleModel();
    			$title = \I("post.title");
    			$content = \I("post.content");
                $cid = \I("post.cid","");
                $cid = implode(",",$cid);
                $addtime = \I("post.addtime");
                // $addtime = strtotime($addtime);
    			$data  = array(
        			"title"=>\I("post.title"),
        			"author"=>\I("post.author"),
        			"content"=>\I("post.content"),
        			"keywords"=>\I("post.keywords"),
        			"description"=>\I("post.description"),
        			"is_top"=>\I("post.is_top",false),
        			"click"=>\I("post.click",0),
        			"addtime"=>$addtime,
        			"cid"=>$cid,
        		);
    			if($title && $content){
    				$res = $articleModel->addart($data);//返回这条数据的id
    				if(!empty($res)){
    					$this->response(array("flag"=>true,"content"=>$addtime,"aid"=>$res),"json",200);
    				}else{
    					$this->response(array("flag"=>false,"content"=>"添加失败"),"json",500);
    				}
    			}else{
    				$this->response(array("flag"=>true,"content"=>"标题或者内容不可以为空"),"json",200);
    			}
        		break;
        	case "get"://查询文章
        		$articleModel  = new \Admin\Model\ArticleModel();
                $num = \I("get.num",10);
                $page = \I("get.page",1);
                $aid = \I("get.aid","");
                if($aid){
                    $condition = "aid=".$aid;
                    $data = $articleModel->where($condition)->select();
                    $data[0]["content"] = html_entity_decode($data[0]["content"]);
                    $this->response(array("flag"=>true,"content"=>$data),"json",200);
                }else{
                    $count = $articleModel->count();
                    $begin = ($page -1) * $num;
                    $end = $num * $page;
                    if($count != 0 && $begin< ($count) && $end > ($count)){
                        $end = $count ;
                    }else if($count != 0 && $begin> $count){
                        $this->response(array("flag"=>false,"content"=>"没有文章"),"json",200);
                    }
                    $data = $articleModel->order("addtime desc,aid desc")->limit($begin,$end)->field("title,author,addtime,click,aid")->select();
                    if($data){
                        $this->response(array("flag"=>true,"content"=>$data),"json",200);
                    }else{
                        $this->response(array("flag"=>false,"content"=>"暂时还没有文章"),"json",200);
                    }
                }
                
        		
        		break;
        	case "delete"://删除文章
                parse_str(file_get_contents('php://input'), $input);
                $input = array_map_recursive(C('DEFAULT_FILTER'), $input);
                $aid = ((int) ($input['aid']));
                if($aid){
                    $articleModel  = new \Admin\Model\ArticleModel();
                    $res = $articleModel->delete($aid);
                    if($res){
                        $this->response(array("flag"=>true,"content"=>"删除成功"),"json",200);
                    }else{
                        $this->response(array("flag"=>true,"content"=>"删除失败"),"json",200);
                    }
                }else{
                    $this->response(array("flag"=>true,"content"=>"传参错误"),"json",200);
                }
                
        		break;
        	case "put"://更新文章
                $articleModel  = new \Admin\Model\ArticleModel();
                $title = \I("put.title");
                $content = \I("put.content");
                $cid = \I("put.cid","");
                $cid = implode(",",$cid);
                $addtime = \I("put.addtime");
                $aid = \I("put.aid","");
                // $addtime = strtotime($addtime);
                $data  = array(
                    "title"=>\I("put.title"),
                    "author"=>\I("put.author"),
                    "content"=>\I("put.content"),
                    "keywords"=>\I("put.keywords"),
                    "description"=>\I("put.description"),
                    "is_top"=>\I("put.is_top",false),
                    "click"=>\I("put.click",0),
                    "addtime"=>$addtime,
                    "cid"=>$cid,
                );
                if($title && $content){
                    $res = $articleModel->where("aid=".$aid)->save($data);//返回这条数据的id
                    if(!empty($res)){
                        $this->response(array("flag"=>true,"content"=>"更新成功"),"json",200);
                    }else{
                        $this->response(array("flag"=>true,"content"=>"没有需要更新"),"json",500);
                    }
                }else{
                    $this->response(array("flag"=>true,"content"=>"标题或者内容不可以为空"),"json",200);
                }
        		$this->response(array("flag"=>true,"content"=>$this->_method),"json",200);
        		break;
        	default:
        		$this->show("操作不允许。",'utf-8');
        		break;
        }
    }

    public function category(){
        switch ($this->_method){
            case "get":
                $condition = \I("get.condition","");
                $category = M("category");
                if($condition){
                    $res = $category->field($condition)->select();
                }else{
                    $res = $category->select();
                }
                
                if($res){
                    $this->response(array("flag"=>true,"content"=>$res),"json",200);
                }else{
                    $this->response(array("flag"=>true,"content"=>"查询出错"),"json",200);
                }
                
            break;
            case "post":
                $category = M("category");
                $name = \I("post.cname","");
                if($name){
                    $data = array(
                        "cname"=>$name,
                        "parentid"=>\I("post.pid",""),
                        "description"=>\I("post.description",""),
                    );
                    $res = $category->add($data);
                    if($res){
                        $this->response(array("flag"=>true,"content"=>"分类添加成功","cid"=>$res),"json",200);
                    }else{
                        $this->response(array("flag"=>true,"content"=>"分类添加失败"),"json",200);
                    }
                }else{
                    $this->response(array("flag"=>true,"content"=>"传参出错"),"json",200);
                }
                
            break;
            case "delete":
                parse_str(file_get_contents('php://input'), $input);
                $input = array_map_recursive(C('DEFAULT_FILTER'), $input);
                $cid = ((int) ($input['cid']));
                if($cid){
                    $category = M("category");
                    $res = $category->delete($cid);
                    if($res){
                        $this->response(array("flag"=>true,"content"=>"删除成功"),"json",200);
                    }else{
                        $this->response(array("flag"=>false,"content"=>"删除失败"),"json",200);
                    }
                }else{
                    $this->response(array("flag"=>true,"content"=>"传参错误"),"json",200);
                }
            break;
            case "put":
                $category = M("category");
                $name = \I("put.cname","");
                $cid = \I("put.cid","");
                if($name or $cid){
                    $data = array(
                        "cname"=>$name,
                        "parentid"=>\I("put.pid",""),
                        "description"=>\I("put.description",""),
                    );
                    $res = $category->where("cid = ".$cid)->save($data);
                    if($res){
                        $this->response(array("flag"=>true,"content"=>"分类更新成功"),"json",200);
                    }else{
                        $this->response(array("flag"=>true,"content"=>"分类更新失败"),"json",200);
                    }
                }else{
                    $this->response(array("flag"=>true,"content"=>"传参出错"),"json",200);
                }
            break;
            default:
            break;
        }
    }

    public function course(){
        switch ($this->_method){
            case "get":
                $condition = \I("get.condition","");
                $category = M("course");
                if($condition){
                    $res = $category->field($condition)->select();
                }else{
                    $res = $category->select();
                }
                
                if($res){
                    $this->response(array("flag"=>true,"content"=>$res),"json",200);
                }else{
                    $this->response(array("flag"=>true,"content"=>"查询出错"),"json",200);
                }
                
            break;
            case "post":
                $category = M("course");
                $name = \I("post.cname","");
                if($name){
                    $data = array(
                        "cname"=>$name,
                        "description"=>\I("post.description",""),
                    );
                    $res = $category->add($data);
                    if($res){
                        $this->response(array("flag"=>true,"content"=>"分类添加成功","cid"=>$res),"json",200);
                    }else{
                        $this->response(array("flag"=>true,"content"=>"分类添加失败"),"json",200);
                    }
                }else{
                    $this->response(array("flag"=>true,"content"=>"传参出错"),"json",200);
                }
                
            break;
            case "delete":
                parse_str(file_get_contents('php://input'), $input);
                $input = array_map_recursive(C('DEFAULT_FILTER'), $input);
                $cid = ((int) ($input['cid']));
                if($cid){
                    $category = M("course");
                    $res = $category->delete($cid);
                    if($res){
                        $this->response(array("flag"=>true,"content"=>"删除成功"),"json",200);
                    }else{
                        $this->response(array("flag"=>false,"content"=>"删除失败"),"json",200);
                    }
                }else{
                    $this->response(array("flag"=>true,"content"=>"传参错误"),"json",200);
                }
            break;
            case "put":
                $category = M("course");
                $name = \I("put.cname","");
                $cid = \I("put.cid","");
                if($name or $cid){
                    $data = array(
                        "cname"=>$name,
                        "parentid"=>\I("put.pid",""),
                        "description"=>\I("put.description",""),
                    );
                    $res = $category->where("cid = ".$cid)->save($data);
                    if($res){
                        $this->response(array("flag"=>true,"content"=>"分类更新成功"),"json",200);
                    }else{
                        $this->response(array("flag"=>true,"content"=>"分类更新失败"),"json",200);
                    }
                }else{
                    $this->response(array("flag"=>true,"content"=>"传参出错"),"json",200);
                }
            break;
            default:
            break;
        }
    }


    public function question(){
        switch ($this->_method){
            case 'post':
                $data = $_POST;
                $questionModel = M("question");
                $articleModel = M("article");
                if($data){
                    $examName = $data["examName"];
                    $cid = $data["cid"];
                    $data["examName"] = null;
                    $data["cid"] = null;
                    $timu = implode(",", $data);
                    $questionModel->add(array('question' => $timu,'questionName'=>$examName,"courseId"=>$cid));
                    $this->response(array("flag"=>true,"content"=>"试卷生成成功"),"json",200);
                }
                break;
            case 'get':
                $articleModel  = M("question");
                $num = \I("get.num",10);
                $page = \I("get.page",1);
                $aid = \I("get.aid","");
                if($aid){
                    $condition = "examId=".$aid;
                    $data = $articleModel->where($condition)->select();
                    // $data[0]["content"] = html_entity_decode($data[0]["content"]);
                    $qid = $data[0]["question"];
                    $qid = explode(",", $qid);
                    $map["aid"] = array("in",$qid);
                    $res = M("article")->where($map)->field("content")->select();
                    $data[0]["question"] = $res;
                    $this->response(array("flag"=>true,"content"=>$data),"json",200);
                }else{
                    $count = $articleModel->count();
                    $begin = ($page -1) * $num;
                    $end = $num * $page;
                    if($count != 0 && $begin< ($count) && $end > ($count)){
                        $end = $count ;
                    }else if($count != 0 && $begin> $count){
                        $this->response(array("flag"=>false,"content"=>"没有文章"),"json",200);
                    }
                    $data = $articleModel->order("examId desc")->limit($begin,$end)->field("examId,questionName,question")->select();
                    if($data){
                        $this->response(array("flag"=>true,"content"=>$data),"json",200);
                    }else{
                        $this->response(array("flag"=>false,"content"=>"暂时还没有文章"),"json",200);
                    }
                }
                break;
            default:
                $this->response(array("flag"=>true,"content"=>"default"),"json",200);
                break;
        }
    }
}