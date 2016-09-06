<?php

// 首页控制器

namespace Home\Controller;
use Common\Controller\AuthController;
class IndexController extends AuthController {
    public function index(){
        //在此处打包所有的数据
        //a.轮播
        $cid = \I("get.cid","");
        $num = \I("get.num","0,9");
        if($cid and $num){
            $articleModel = M("article");
            $condition['cid'] = array(array('like','%,'.$cid.',%'),array('like',$cid.',%'),array('like','%,'.$cid),$cid,'or');
            $lunbo = $articleModel->where($condition)->order("aid desc")->limit(4)->field("aid,title,author,keywords,content,description,cid")->select();
            foreach($lunbo as $key=>$val){
                $lunbo[$key]['firstimg'] = getImgs(html_entity_decode($val['content']),0);
            }
            $conditiona['cid'] = array(array('notlike','%,'.$cid.',%'),array('notlike',$cid.',%'),array('notlike','%,'.$cid),array('notlike',$cid),'and');
            $artList = $articleModel->where($conditiona)->order("aid desc")->field("aid,title,author,keywords,addtime,click,description,content,cid")->limit($num)->select();
            foreach($artList as $key=>$val){
                $artList[$key]['firstimg'] = getImgs(html_entity_decode($val['content']),0);
            }

            $res = array("lunbo"=>$lunbo,"artList"=>$artList);
            $this->response(array("flag"=>true,"content"=>$res),"json",200);

        }else{
            $this->response(array("flag"=>true,"content"=>"参数不合法"),"json",200);
        }
        
    }

    public function category(){
    	$cid = \I("get.cid","");
        if($cid){
            $articleModel = M("article");
            $condition['cid'] = array(array('like','%,'.$cid.',%'),array('like',$cid.',%'),array('like','%,'.$cid),$cid,'or');
            $res = $articleModel->where($condition)->select();
            if($res){
                foreach($res as $key=>$val){
                    $res[$key]['content'] = html_entity_decode($val['content']);
                    $res[$key]['firstimg'] = getImgs(html_entity_decode($val['content']),0);
                }
                $this->response(array("flag"=>true,"content"=>$res),"json",200);
            }else{
                $this->response(array("flag"=>false,"content"=>"暂时没有文章"),"json",200);
            }
        }
    }

    public function  articleList(){
    	$this->show("文章列表页");
    }

    public function tag(){
    	$this->show("标签页","utf-8");
    }

    public function single(){
    	$aid = \I("get.aid","");
        if($aid){
            $articleModel = M("article");
            $res = $articleModel->where("aid=".$aid)->select();
            if($res){
                $res[0]["content"] = html_entity_decode($res[0]["content"]);
                $this->response(array("flag"=>true,"content"=>$res),"json",200);
            }else{
                $this->response(array("flag"=>true,"content"=>"文章不存在"),"json",200);
            }
        }else{
            $this->response(array("flag"=>true,"content"=>"参数不合法"),"json",200);
        }
    }

    public function search(){
    	$this->show("搜索页","utf-8");
    }
}